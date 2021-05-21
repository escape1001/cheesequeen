<?php
	include "php/00_conn.php";

	session_cache_expire(30);
	session_start();

	$no = $_GET['no'];

	# db출력
	$sql = "SELECT * FROM faq WHERE no='$no'";
	$result = MYSQLI_QUERY($conn, $sql);
	$row = MYSQLI_FETCH_ARRAY($result);
	//echo $row['content'];
?>
<!DOCTYPE html>
<html lang="ko">
 <head>
  <title>FAQ</title>
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

	/*##### read #####*/
		#read_wrap{width:100%;}
		#read_wrap h2{text-align:center; font-size:20px; padding:80px 0 20px;}
		#read{width:1025px; margin:0 auto; padding-bottom:50px;}

		#read .board{width:80%; margin:0 auto; border-top:1px solid #00564d; border-bottom:1px solid #00564d;}
		#read .board p{width:50%; height:40px; line-height:40px; border-bottom:1px solid #ccc; float:left;}
		#read .board .w100{width:100%;}
		#read .board label{display:inline-block; width:100px; height:100%; background-color:#efefef; text-align:center; font-size:14px; vertical-align:top; letter-spacing:10px; text-indent:10px;}
		#read .board input{width:70%; border:none; outline:none; text-indent:10px; font-family:'score400';}
		#read .board textarea{width:98%; height:300px; padding:1%; resize:none; border:none; outline:none; font-family:'score400';}
		#read .board p:last-child{height:auto; border:none;}

		#read .board:after{content:"";display:block; clear:both;}

		#read #btnArea{width:80%; margin:0 auto; padding-top:10px;text-align:right;}
		#btnArea a{border:1px solid #ccc; border-radius:3px; font-size:12px; padding:2px 5px;}
		#btnArea a:hover,#btnArea a:focus{background-color:#efefef; color:#00564d;}
		
	/*##### 미디어쿼리 #####*/
		@media all and (min-width:320px) and (max-width:767px){
			#container{padding-top:50px;}

			/*##### read #####*/
				#read_wrap h2{font-size:20px; padding:20px 0;}
				#read{width:100%; max-width:480px;}
				#read .board p{width:100%; float:none;}
				#read .board input{width:60%; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;}
				#read .board label{width:30%;}
				#read .board #title{width:60%;}
		}
  </style>
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
		<section id="read_wrap">
			<h2>자주 묻는 질문</h2>
			<div id="read">	
				<div class="board">
					<p class="w100">
						<label for="title">제목</label>
						<input id="title" type="text" name="title" value="<?=$row['title']?>" readonly/>
					</p>
					<p>
						<label for="name">이름</label>
						<input id="name" type="text" name="name" value="<?=$row['name']?>" readonly/>
					</p>
					<p>
						<label for="wdate">날짜</label>
						<input id="wdate" type="text" name="wdate" value="<?=$row['wdate']?>" readonly/>
					</p>
					<p class="w100">
<textarea id="content" name="content" readonly title="내용">
<?=$row['content']?>
</textarea>
					</p>
				</div>
				<div id="btnArea">
					<a href="faq.php" title="글쓰기">목록</a>
				</div>
<?php
	$sqlV = "UPDATE faq
			SET view=view+1 WHERE no='$no'";
	$resultV = MYSQLI_QUERY($conn, $sqlV);
?>
			</div>
		</section>
		<div id="fixed_wrap">
			<div id="top">
				<a href="#" title="top_button">
					<img src="../img/basic/icon_top_yellow.png" alt="top_button"/>
				</a>
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
