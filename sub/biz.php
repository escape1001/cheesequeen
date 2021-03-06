<?php
	include "php/00_conn.php";

	/*
		세션이 유지되는 시간
		네트워크 터널에 유지되는 시간
		30은 30분 유지
	*/
	session_cache_expire(30);
	session_start();

		$sql = "SELECT * FROM freeboard ORDER BY no DESC";
		$result = MYSQLI_QUERY($conn, $sql);		
?>
<!DOCTYPE html>
<html lang="ko">
 <head>
  <title>비즈니스 회원가입</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1"/>
  <link rel="stylesheet" type="text/css" href="../css/reset.css"/>
  <link rel="stylesheet" type="text/css" href="../css/header_noTop.css"/>
  <link rel="stylesheet" type="text/css" href="../css/footer.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../js/header.js"></script>
  <script src="../js/footer.js"></script>
  <style>
	/*##### container #####*/
		#container{width:100%;}

	/*##### biz #####*/
		#biz_wrap{width:100%;}
		#biz_wrap h2{text-align:center; font-size:20px; padding:80px 0 20px;}
		#biz{width:1025px; margin:0 auto; padding-bottom:50px;}

		#biz ul{width:80%; margin:0 auto; border-top:1px solid #00564d; border-bottom:1px solid #00564d;}
		#biz li{width:100%; height:30px; line-height:30px; border-top:1px solid #eee; font-size:14px; text-align:center; color:#777;}
		#biz li p{display:block; float:left; overflow:hidden;}
		#biz li .num{width:10%;}
		#biz li .title{width:42%; text-align:left; text-indent:10px; white-space:nowrap; text-overflow:ellipsis;}
		#biz li .name{width:15%; color:#333;}
		#biz li .wdate{width:23%;}
		#biz li .view{width:10%;}
		#biz .thead{border-top:none; border-bottom:1px solid #777; font-family:'score500'; color:#333;}
		#biz .thead .title{text-align:center; text-indent:0;}
		#biz .notice .num,#biz .notice .name{font-family:'score500'; color:#00564d;}
		#biz .notice .title a{font-family:'score500'; color:#00564d;}		

		#biz #btnArea{width:80%; margin:0 auto; padding-top:10px;text-align:right;}
		#btnArea a{border:1px solid #ccc; border-radius:3px; font-size:12px; padding:2px 5px;}
		#btnArea a:hover,#btnArea a:focus{background-color:#efefef; color:#00564d;}

		/*#### 17. fixed_wrap ####*/		
		#allBack{width:100%; height:100%; background-color:rgba(0,0,0,0.5); left:0; top:0; z-index:1; display:none;}

		#modal{transform:translate(-50%, -50%);
			left:50%; top:50%; z-index:1; display:none;
			background-color:#fff; border-radius:3px;
		}
		#modal form{padding:20px 30px; text-align:center;}
		#modal form legend{display:none;}
		#modal form fieldset{width:100%; border:none;}
		#modal form label{display:block; padding-bottom:10px;}
		#modal form input{height:26px; line-height:26px; border:1px solid #777; border-radius:3px; text-indent:10px;}
		#modal .btn{padding-top:10px;}
		#modal .btn input{height:20px; line-height:20px; cursor:pointer; padding:0 5px; text-indent:0px;}
		#modal .btn input:hover,#modal .btn input.focus{color:#00564d; background-color:#fff;}
		
	/*##### 미디어쿼리 #####*/
		@media all and (min-width:320px) and (max-width:767px){
			#container{padding-top:50px;}

			/*##### biz #####*/
				#biz_wrap h2{font-size:20px; padding:20px 0;}
				#biz{width:100%; max-width:480px;}
				
				#biz ul{width:80%; margin:0 auto; border-top:1px solid #00564d; border-bottom:1px solid #00564d;}
				#biz li{font-size:12px;}
				#biz li .num{width:10%;}
				#biz li .title{width:70%;}
				#biz li .name{width:20%; color:#333;}
				#biz li .wdate{display:none;}
				#biz li .view{display:none;}

				#biz #btnArea{width:80%; margin:0 auto; padding-top:10px;text-align:right;}
				#btnArea a{border:1px solid #ccc; border-radius:3px; font-size:12px; padding:2px 5px;}
				#btnArea a:hover,#btnArea a:focus{background-color:#efefef; color:#00564d;}
		}
  </style>
  <script>
	$(document).ready(function(){
		// 클릭 시 모달팝업 - 웹에서만
		/*function snsModal(){*/
			$("li:not(.notice) .title a").click(function(){
				$("#allBack,#modal").show();
				$("#modal form").attr({"action":$(this).attr("href")});
				return false;
			});

			$("#allBack, #modal input[type='button']").click(function(){
				$("#allBack,#modal").hide();
			});
		/*};	*/			

		/*if(bodyW>480){
			snsModal();
		}

		$(window).resize(function(){
			if(bodyW>480){
				snsModal();
			}
			else{
				jQuery("#review li a").off("click");
				jQuery("#allBack,#sns_modal").hide();
			}
		});*/
	});	
  </script>
 </head>
 <body>
	<header id="header">
		<h1>치즈퀸</h1>
		<div id="topArea">
			<div id="infoArea">
				<ul id="infoMenu">
<?php if(empty($_SESSION['userid'])){?>
					<li class="green"><a href="login.html" title="로그인">로그인</a></li>
					<li><a href="join.html" title="회원가입">회원가입</a></li>
					<li><a href="login.html" title="장바구니">장바구니</a></li>
					<li><a href="login.html" title="마이페이지">마이페이지</a></li>
					<li><a href="login.html" title="고객센터">고객센터</a></li>
<?php }else{?>
					<li class="green"><a href="php/logout.php" title="로그아웃">로그아웃</a></li>
					<li><a href="cart.html" title="장	바구니">장바구니</a></li>
					<li><a href="mypage.html" title="마이페이지">마이페이지</a></li>
					<li><a href="notice.php" title="고객센터">고객센터</a></li>
<?php }?>			
				</ul>
				<div class="logo">
					<a href="../index.php" title="치즈퀸_메인페이지">
						<img src="../img/header/logo.png" alt="치즈퀸"/>
					</a>
				</div>				
			</div>
		</div>
		<div id="gnb">
			<div id="barArea">
				<div id="bar">
					<ul class="nav">
						<li>
							<h2>
								<a href="#none" title="cheese">cheese</a>
							</h2>
						</li>
						<li>
							<h2>
								<a href="#none" title="cheese_friends">cheese friends</a>
							</h2>
						</li>
						<li>
							<h2>
								<a href="#none" title="기획전">기획전</a>
							</h2>
						</li>
						<li>
							<h2>
								<a href="#none" title="sale">sale</a>
							</h2>
						</li>
					</ul>
					<div class="search">
						<form action="#" method="GET">
							<fieldset>
								<legend>search</legend>
								<p>
									<input type="text" id="search" name="search" title="search" placeholder="딸기엔 클로티드 크림"/>
								</p>
							</fieldset>
						</form>
						<p class="btn">
							<a href="#none" title="검색버튼">
								<img src="../img/header/icon_search.png" alt="검색버튼_이미지"/>
							</a>
						</p>
					</div>
				</div>
			</div>
			<div id="dropArea">
				<div id="drop">
					<ul>
						<li>
							<ul class="subMenu">
								<li><a href="shopping_cheese.html" title="모짜렐라">모짜렐라</a></li>
								<li><a href="shopping_cheese.html" title="자연치즈">자연치즈</a></li>
								<li><a href="shopping_cheese.html" title="스낵·가공치즈">스낵·가공치즈</a></li>
								<li><a href="shopping_cheese.html" title="크림치즈">크림치즈</a></li>
								<li><a href="shopping_cheese.html" title="슬라이스치즈">슬라이스치즈</a></li>
							</ul>
						</li>
						<li>
							<ul class="subMenu">
								<li><a href="shopping_friends.html" title="잼·시럽·버터·크림">잼·시럽·버터·크림</a></li>
								<li><a href="shopping_friends.html" title="하몽·살라미">하몽·살라미</a></li>
								<li><a href="shopping_friends.html" title="올리브·절임·캐비어">올리브·절임·캐비어</a></li>
								<li><a href="shopping_friends.html" title="오일·비네거·발사믹">오일·비네거·발사믹</a></li>
								<li><a href="shopping_friends.html" title="소스·향신료·트러플">소스·향신료·트러플</a></li>
								<li><a href="shopping_friends.html" title="피자·파스타·샌드위치 재료">피자·파스타·샌드위치 재료</a></li>
								<li><a href="shopping_friends.html" title="음료·간식·요거트">음료·간식·요거트</a></li>
							</ul>
						</li>
						<li>
							<ul class="subMenu">
								<li><a href="collection0.html" title="치즈도구">치즈도구</a></li>
								<li><a href="collection1.html" title="와인안주_추천">와인안주 추천</a></li>
								<li><a href="collection2.html" title="치즈_초보자_추천">치즈 초보자 추천</a></li>
								<li><a href="collection3.html" title="선물세트">선물세트</a></li>
								<li><a href="collection4.html" title="업소용_제품추천">업소용 제품추천</a></li>
							</ul>
						</li>
						<li>
							<ul class="subMenu">
								<li><a href="sale.html" title="치즈퀸_세일_모아보기">치즈퀸 세일 모아보기</a></li>
								<li><a href="sale.html" title="기한임박할인">기한임박할인</a></li>
							</ul>
						</li>
					</ul>
					<div class="event">
						<p class="imgs">
							<a href="event.html" title="event">
								<span>
									<img src="../img/header/event.jpg" alt="이벤트이미지"/>
								</span>
								<span class="text">
									<strong>과일과 찰떡궁합!</strong><br/>
									<em>▶ 클로티드 크림 만나러 가기</em>
								</span>
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div id="mobHeader">
		<div class="top">
			<p class="logo">
				<a class="logo" href="../index.php" title="치즈퀸_메인페이지">
					<img src="../img/header/logo.png" alt="치즈퀸"/>
				</a>
			</p>	
		</div>
		<div class="bottom">
			<ul>
				<li>
					<a href="../index.php" title="home">
						<span class="imgs">
							<img src="../img/basic/icon_home.svg" title="home"/>
						</span><br/>
						<strong>홈</strong>
					</a>
				</li>
				<li>
					<a href="mobCate.html" title="카테고리">
						<span class="imgs">
							<img src="../img/basic/icon_cate.svg" title="카테고리"/>
						</span><br/>
						<strong>카테고리</strong>
					</a>
				</li>
				<li>
					<a class="search" href="#none" title="검색">
						<span class="imgs">
							<img src="../img/basic/icon_search.svg" title="검색"/>
						</span><br/>
						<strong>검색</strong>
					</a>
				</li>
<?php if(empty($_SESSION['userid'])){?>
				<li>
					<a href="login.html" title="로그인">
						<span class="imgs">
							<img src="../img/basic/icon_mypage.svg" title="로그인"/>
						</span><br/>
						<strong>로그인</strong>
					</a>
				</li>
<?php }else{?>
				<li>
					<a href="php/logout.php" title="로그아웃">
						<span class="imgs">
							<img src="../img/basic/icon_mypage.svg" title="로그아웃"/>
						</span><br/>
						<strong>로그아웃</strong>
					</a>
				</li>
<?php }?>	
			</ul>
		</div>
		<p class="allBack"></p>
		<div id="mobSearchArea">
			<form action="#" method="GET">
				<fieldset>
					<legend>검색영역</legend>
					<p><input id="mobSearch" type="text" name="mobSearch" title="검색" placeholder="검색어를 입력해주세요."/><span>닫기</span></p>
				</fieldset>						
			</form>
		</div>
	</div>
	<div id="container">
		<section id="biz_wrap">
			<h2>비지니스 회원가입</h2>
			<div id="biz">
				<ul>
					<li class="thead">
						<p class="num">번호</p>
						<p class="title">제목</p>
						<p class="name">작성자</p>
						<p class="wdate">작성일</p>
						<p class="view">조회수</p>
					</li>
					<li class="notice">
						<p class="num">공지</p>
						<p class="title">
							<a href="biz_notice.php" title="공지페이지">비지니스 회원가입 안내</a>
						</p>
						<p class="name">치즈퀸</p>
						<p class="wdate">2021-04-10 16:03:00</p>
						<p class="view"></p>
					</li>
<?php
	$num = 0;

	while($row = MYSQLI_FETCH_ARRAY($result)){
?>
					<li>
						<p class="num"><?=$num+1?></p>
						<p class="title">
							<a href="biz_read.php?no=<?=$row['no']?>" title="게시글페이지"><?=$row['title']?></a>
						</p>
						<p class="name"><?=$row['name']?></p>
						<p class="wdate"><?=$row['wdate']?></p>
						<p class="view"><?=$row['view']?></p>
					</li>
<?php $num++; } ?>
				</ul>
<?php if(!empty($_SESSION['userid'])){?>
				<div id="btnArea">
					<a href="biz_write.php" title="글쓰기">글쓰기</a>
				</div>
<?php } ?>
			</div>
		</section>
		<div id="fixed_wrap">
			<div id="top">
				<a href="#" title="top_button">
					<img src="../img/basic/icon_top_yellow.png" alt="top_button"/>
				</a>
			</div>
			<div id="allBack"></div>
			<div id="modal">
				<form action="#" method="POST">
					<fieldset>
						<legend>비밀번호 입력창</legend>
						<p>
							<label for="pass">비밀번호를 입력하세요</label><input id="pass" type="password" name="pass" autocomplete="off" required placeholder="10자까지 입력" maxlength="10"/>
						</p>
						<p class="btn">
							<input type="button" value="취소" title="취소"/>
							<input type="submit" value="확인" title="확인"/>
						</p>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<div id="footer">
		<div id="footer_desc_wrap">
			<div id="footer_desc">
				<div class="cs">
					<h3>고객센터</h3>
					<p class="call">
						<img src='../img/footer/call.png' alt='call_icon'/> 02.425.6117
					</p>
					<p class="desc">
						<span>
							<b>상담시간</b> 14:00 ~ 18:00
						</span>
						<span>
							<b>휴&nbsp;&nbsp;&nbsp;&nbsp;무</b> 공휴일 전날, 공휴일&amp;주말
						</span>
						<span>
							휴일, 주말에는 게시판을 이용해주세요.
						</span>
					</p>
				</div>
				<div class="bank">
					<h3>계좌안내</h3>
					<p class="imgs">
						<img src="../img/footer/kbBank.png" alt="bank_logo"/>
					</p>
					<p class="desc">
						<strong>836301-04-125192</strong><em>예금주 : 씨큐컴퍼니</em>
					</p>
				</div>
				<div class="board">
					<h3>NOTICE <em>공지사항</em></h3>
					<p class="more">
						<a href="notice.php" title="공지사항_페이지">+</a>
					</p>
					<ul>
						<li>
							<a href="notice.php" title="공지사항_페이지0">
								[공지] 2020 크리스마스 배송안내
							</a>
						</li>
						<li>
							<a href="notice.php" title="공지사항_페이지1">
								[이벤트] 2020 유러피안 치즈데이
							</a>
						</li>
						<li>
							<a href="notice.php" title="공지사항_페이지2">
								[공지] 2020 한글날 배송안내
							</a>
						</li>
						<li>
							<a href="notice.php" title="공지사항_페이지3">
								[배송] 2020 추석연휴 배송안내
							</a>
						</li>
					</ul>
				</div>
				<div class="board">
					<h3>FAQ <em>자주 묻는 질문</em></h3>
					<p class="more">
						<a href="faq.php" title="FAQ_페이지">+</a>
					</p>
					<ul>
						<li>
							<a href="faq.php" title="FAQ_페이지0">
								[회원] 등급별 혜택
							</a>
						</li>
						<li>
							<a href="faq.php" title="FAQ_페이지1">
								[결제] 로그인하면 네이버(N)페이 버튼이 안보여요. 
							</a>
						</li>
						<li>
							<a href="faq.php" title="FAQ_페이지2">
								[배송] 당일발송 마감시각은 언제인가요?
							</a>
						</li>
						<li>
							<a href="faq.php" title="FAQ_페이지3">
								[배송] 치즈퀸은 로젠택배와 롯데택배를 이용합니다.
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="footer_nav_wrap">
			<div id="footer_nav">
				<ul>
					<li><a href="company.html" title="회사소개">회사소개</a> |</li>
					<li><a href="agreement.html" title="이용약관">이용약관</a> |</li>
					<li><a href="privacy.html" title="개인정보취급방침">개인정보취급방침</a> |</li>
					<li><a href="guide.html" title="이용안내">이용안내</a></li>
				</ul>
			</div>
		</div>
		<div id="footer_info_wrap">
			<div class="more_mob">
				기업 정보 보기 <span><img src="../img/basic/arrow_under_555.png" alt="화살표"/></span>
			</div>
			<div id="footer_info">
				<h2>
					<img src="../img/basic/logo_thumb.png" alt="치즈퀸"/>
				</h2>
				<div class="desc">
					<ul>
						<li>
							<b>사업자등록번호</b> : <span class="textLink"><a href="https://www.ftc.go.kr/bizCommPop.do?wrkr_no=4031587592&apv_perm_no=" title="사업자정보확인" onclick="popup('https://www.ftc.go.kr/bizCommPop.do?wrkr_no=4031587592&apv_perm_no=','사업자등록번호확인'); return false;" >403-15-87592</a></span> <i>|</i>
						</li>
						<li>
							<b>대표자</b> : 김민수, 유민 <i>|</i>
						</li>
						<li>
							<b>통신판매업신고</b> : 제 2015-서울송파-0977호
						</li>
						<li>
							경기도 하남시 광암로 176번길 72 <i>|</i>
						</li>
						<li>
							<b>TEL</b> : 02-425-6117 <i>|</i>
						</li>
						<li>
							<b>FAX</b> : 02-425-6118
						</li>
						<li>
							<b>개인정보관리책임자</b> : 유민 <i>|</i>
						</li>
						<li>
							<b>메일문의</b> : <span><a href="mailto:2cheesequeen@gmail" title="메일문의" >es.c.ape1001@hanmail.net</a></span>
						</li>
						<li class="copy">
							&copy; 2021 es.c.ape1001 ALL RIGHT RESERVED
						</li>
					</ul>
				</div>
				<div class="pay">
					<p>
						<a href="https://mark.inicis.com/mark/popup_v1.php?mid=GBFchee301" title="이니페이_페이지" onclick="popup('https://mark.inicis.com/mark/popup_v1.php?mid=GBFchee301','이니페이_페이지'); return false;">
							<img src="../img/footer/inipay.png" alt="이니페이_이미지"/>
						</a>
						<a href="https://mark.inicis.com/mark/escrow_popup.php?mid=ESGBchee30" title="에스크로_페이지"  onclick="popup('https://mark.inicis.com/mark/escrow_popup.php?mid=ESGBchee30','에스크로_페이지','500','500'); return false;">
							<img src="../img/footer/escrow.png" alt="에스크로_이미지"/>
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>
 </body>
</html>
