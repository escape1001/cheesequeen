<?php
	include "php/00_conn.php";
	session_cache_expire(30);
	session_start();
?>
<!DOCTYPE html>
<html lang="ko">
 <head>
  <title>WRITE</title>
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

	/*##### write #####*/
		#write_wrap{width:100%;}
		#write_wrap h2{text-align:center; font-size:20px; padding:80px 0 20px;}
		#write{width:1025px; margin:0 auto; padding-bottom:50px;}
		
		#write form{width:100%;}
		#write legend{display:none;}
		#write .board{width:80%; margin:0 auto; border:none; border-top:1px solid #00564d; border-bottom:1px solid #00564d;}
		#write .board p{width:50%; height:40px; line-height:40px; border-bottom:1px solid #ccc; float:left;}
		#write .board .w100{width:100%;}
		#write .board label{display:inline-block; width:100px; height:100%; margin-right:10px;background-color:#efefef; text-align:center; font-size:14px; vertical-align:top; letter-spacing:10px; text-indent:10px;}
		#write .board label[for="pass"]{letter-spacing:3px; text-indent:3px;}
		#write .board input:not([class="btn"]){text-indent:10px; font-family:'score400'; width:60%; border:1px solid #aaa; border-radius:3px;}
		#write .board #title{width:80%;}
		#write .board textarea{width:98%; height:500px; padding:1%; resize:vertical; font-family:'score400'; border:1px solid #aaa; border-radius:3px;}
		#write .board .textArea{height:auto; border:none; text-align:center; padding:10px 0;}

		#write .board:after{content:"";display:block; clear:both;}

		#btnArea{width:100%; padding-bottom:10px; text-align:right; clear:both;}
		#btnArea .btn{border:1px solid #ccc; border-radius:3px; font-size:12px; padding:2px 5px; cursor:pointer;}
		#btnArea .btn:hover,#btnArea .btn:focus{background-color:#efefef; color:#00564d;}
		
	/*##### ??????????????? #####*/
		@media all and (min-width:320px) and (max-width:767px){
			#container{padding-top:50px;}

			/*##### write #####*/
				#write_wrap h2{font-size:20px; padding:20px 0;}
				#write{width:100%; max-width:480px;}
				#write .board p{width:100%; height:40px; line-height:40px; border-bottom:1px solid #ccc; float:none;}
				#write .board label{width:30%;}
				#write .board #title{width:60%;}
		}
  </style>
 </head>
 <body>
	<header id="header">
		<h1>?????????</h1>
		<div id="topArea">
			<div id="infoArea">
				<ul id="infoMenu">
<?php if(empty($_SESSION['userid'])){?>
					<li class="green"><a href="login.html" title="?????????">?????????</a></li>
					<li><a href="join.html" title="????????????">????????????</a></li>
					<li><a href="login.html" title="????????????">????????????</a></li>
					<li><a href="login.html" title="???????????????">???????????????</a></li>
					<li><a href="login.html" title="????????????">????????????</a></li>
<?php }else{?>
					<li class="green"><a href="php/logout.php" title="????????????">????????????</a></li>
					<li><a href="cart.html" title="???	?????????">????????????</a></li>
					<li><a href="mypage.html" title="???????????????">???????????????</a></li>
					<li><a href="notice.php" title="????????????">????????????</a></li>
<?php }?>			
				</ul>
				<div class="logo">
					<a href="../index.php" title="?????????_???????????????">
						<img src="../img/header/logo.png" alt="?????????"/>
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
								<a href="#none" title="?????????">?????????</a>
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
									<input type="text" id="search" name="search" title="search" placeholder="????????? ???????????? ??????"/>
								</p>
							</fieldset>
						</form>
						<p class="btn">
							<a href="#none" title="????????????">
								<img src="../img/header/icon_search.png" alt="????????????_?????????"/>
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
								<li><a href="shopping_cheese.html" title="????????????">????????????</a></li>
								<li><a href="shopping_cheese.html" title="????????????">????????????</a></li>
								<li><a href="shopping_cheese.html" title="????????????????????">????????????????????</a></li>
								<li><a href="shopping_cheese.html" title="????????????">????????????</a></li>
								<li><a href="shopping_cheese.html" title="??????????????????">??????????????????</a></li>
							</ul>
						</li>
						<li>
							<ul class="subMenu">
								<li><a href="shopping_friends.html" title="???????????????????????????">???????????????????????????</a></li>
								<li><a href="shopping_friends.html" title="?????????????????">?????????????????</a></li>
								<li><a href="shopping_friends.html" title="????????????????????????????">????????????????????????????</a></li>
								<li><a href="shopping_friends.html" title="????????????????????????????">????????????????????????????</a></li>
								<li><a href="shopping_friends.html" title="????????????????????????????">????????????????????????????</a></li>
								<li><a href="shopping_friends.html" title="??????????????????????????????? ??????">??????????????????????????????? ??????</a></li>
								<li><a href="shopping_friends.html" title="?????????????????????????">?????????????????????????</a></li>
							</ul>
						</li>
						<li>
							<ul class="subMenu">
								<li><a href="collection0.html" title="????????????">????????????</a></li>
								<li><a href="collection1.html" title="????????????_??????">???????????? ??????</a></li>
								<li><a href="collection2.html" title="??????_?????????_??????">?????? ????????? ??????</a></li>
								<li><a href="collection3.html" title="????????????">????????????</a></li>
								<li><a href="collection4.html" title="?????????_????????????">????????? ????????????</a></li>
							</ul>
						</li>
						<li>
							<ul class="subMenu">
								<li><a href="sale.html" title="?????????_??????_????????????">????????? ?????? ????????????</a></li>
								<li><a href="sale.html" title="??????????????????">??????????????????</a></li>
							</ul>
						</li>
					</ul>
					<div class="event">
						<p class="imgs">
							<a href="event.html" title="event">
								<span>
									<img src="../img/header/event.jpg" alt="??????????????????"/>
								</span>
								<span class="text">
									<strong>????????? ????????????!</strong><br/>
									<em>??? ???????????? ?????? ????????? ??????</em>
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
				<a class="logo" href="../index.php" title="?????????_???????????????">
					<img src="../img/header/logo.png" alt="?????????"/>
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
						<strong>???</strong>
					</a>
				</li>
				<li>
					<a href="mobCate.html" title="????????????">
						<span class="imgs">
							<img src="../img/basic/icon_cate.svg" title="????????????"/>
						</span><br/>
						<strong>????????????</strong>
					</a>
				</li>
				<li>
					<a class="search" href="#none" title="??????">
						<span class="imgs">
							<img src="../img/basic/icon_search.svg" title="??????"/>
						</span><br/>
						<strong>??????</strong>
					</a>
				</li>
<?php if(empty($_SESSION['userid'])){?>
				<li>
					<a href="login.html" title="?????????">
						<span class="imgs">
							<img src="../img/basic/icon_mypage.svg" title="?????????"/>
						</span><br/>
						<strong>?????????</strong>
					</a>
				</li>
<?php }else{?>
				<li>
					<a href="php/logout.php" title="????????????">
						<span class="imgs">
							<img src="../img/basic/icon_mypage.svg" title="????????????"/>
						</span><br/>
						<strong>????????????</strong>
					</a>
				</li>
<?php }?>	
			</ul>
		</div>
		<p class="allBack"></p>
		<div id="mobSearchArea">
			<form action="#" method="GET">
				<fieldset>
					<legend>????????????</legend>
					<p><input id="mobSearch" type="text" name="mobSearch" title="??????" placeholder="???????????? ??????????????????."/><span>??????</span></p>
				</fieldset>						
			</form>
		</div>
	</div>
	<div id="container">
		<section id="write_wrap">
			<h2>???????????? ????????????</h2>
			<div id="write">
				<form action="php/biz_write_control.php" method="POST">
					<legend>????????? ??????</legend>
					<fieldset class="board">
						<p class="w100">
							<label for="title">??????</label>
							<input id="title" type="text" name="title" required/>
						</p>
						<p>
							<label for="name">??????</label>
							<input id="name" type="text" name="name" required maxlength="8" placeholder="8????????? ??????"/>
						</p>
						<p>
							<label for="pass">????????????</label>
							<input id="pass" type="password" name="pass" required autocomplete="off" maxlength="10" placeholder="10????????? ??????">
						</p>
						<p class="w100 textArea">
<textarea id="content" name="content" title="??????" required>
</textarea>
						</p>
						<div id="btnArea">
							<a href="biz.php" title="??????">
								<input class="btn" type="button" value="??????" title="??????"/>
							</a>
							<input class="btn" type="submit" value="??????" title="??????"/>	
						</div>
					</fieldset>
				</form>
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
					<h3>????????????</h3>
					<p class="call">
						<img src='../img/footer/call.png' alt='call_icon'/> 02.425.6117
					</p>
					<p class="desc">
						<span>
							<b>????????????</b> 14:00 ~ 18:00
						</span>
						<span>
							<b>???&nbsp;&nbsp;&nbsp;&nbsp;???</b> ????????? ??????, ?????????&amp;??????
						</span>
						<span>
							??????, ???????????? ???????????? ??????????????????.
						</span>
					</p>
				</div>
				<div class="bank">
					<h3>????????????</h3>
					<p class="imgs">
						<img src="../img/footer/kbBank.png" alt="bank_logo"/>
					</p>
					<p class="desc">
						<strong>836301-04-125192</strong><em>????????? : ???????????????</em>
					</p>
				</div>
				<div class="board">
					<h3>NOTICE <em>????????????</em></h3>
					<p class="more">
						<a href="notice.php" title="????????????_?????????">+</a>
					</p>
					<ul>
						<li>
							<a href="notice.php" title="????????????_?????????0">
								[??????] 2020 ??????????????? ????????????
							</a>
						</li>
						<li>
							<a href="notice.php" title="????????????_?????????1">
								[?????????] 2020 ???????????? ????????????
							</a>
						</li>
						<li>
							<a href="notice.php" title="????????????_?????????2">
								[??????] 2020 ????????? ????????????
							</a>
						</li>
						<li>
							<a href="notice.php" title="????????????_?????????3">
								[??????] 2020 ???????????? ????????????
							</a>
						</li>
					</ul>
				</div>
				<div class="board">
					<h3>FAQ <em>?????? ?????? ??????</em></h3>
					<p class="more">
						<a href="faq.php" title="FAQ_?????????">+</a>
					</p>
					<ul>
						<li>
							<a href="faq.php" title="FAQ_?????????0">
								[??????] ????????? ??????
							</a>
						</li>
						<li>
							<a href="faq.php" title="FAQ_?????????1">
								[??????] ??????????????? ?????????(N)?????? ????????? ????????????. 
							</a>
						</li>
						<li>
							<a href="faq.php" title="FAQ_?????????2">
								[??????] ???????????? ??????????????? ????????????????
							</a>
						</li>
						<li>
							<a href="faq.php" title="FAQ_?????????3">
								[??????] ???????????? ??????????????? ??????????????? ???????????????.
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="footer_nav_wrap">
			<div id="footer_nav">
				<ul>
					<li><a href="company.html" title="????????????">????????????</a> |</li>
					<li><a href="agreement.html" title="????????????">????????????</a> |</li>
					<li><a href="privacy.html" title="????????????????????????">????????????????????????</a> |</li>
					<li><a href="guide.html" title="????????????">????????????</a></li>
				</ul>
			</div>
		</div>
		<div id="footer_info_wrap">
			<div class="more_mob">
				?????? ?????? ?????? <span><img src="../img/basic/arrow_under_555.png" alt="?????????"/></span>
			</div>
			<div id="footer_info">
				<h2>
					<img src="../img/basic/logo_thumb.png" alt="?????????"/>
				</h2>
				<div class="desc">
					<ul>
						<li>
							<b>?????????????????????</b> : <span class="textLink"><a href="https://www.ftc.go.kr/bizCommPop.do?wrkr_no=4031587592&apv_perm_no=" title="?????????????????????" onclick="popup('https://www.ftc.go.kr/bizCommPop.do?wrkr_no=4031587592&apv_perm_no=','???????????????????????????'); return false;" >403-15-87592</a></span> <i>|</i>
						</li>
						<li>
							<b>?????????</b> : ?????????, ?????? <i>|</i>
						</li>
						<li>
							<b>?????????????????????</b> : ??? 2015-????????????-0977???
						</li>
						<li>
							????????? ????????? ????????? 176?????? 72 <i>|</i>
						</li>
						<li>
							<b>TEL</b> : 02-425-6117 <i>|</i>
						</li>
						<li>
							<b>FAX</b> : 02-425-6118
						</li>
						<li>
							<b>???????????????????????????</b> : ?????? <i>|</i>
						</li>
						<li>
							<b>????????????</b> : <span><a href="mailto:2cheesequeen@gmail" title="????????????" >es.c.ape1001@hanmail.net</a></span>
						</li>
						<li class="copy">
							&copy; 2021 es.c.ape1001 ALL RIGHT RESERVED
						</li>
					</ul>
				</div>
				<div class="pay">
					<p>
						<a href="https://mark.inicis.com/mark/popup_v1.php?mid=GBFchee301" title="????????????_?????????" onclick="popup('https://mark.inicis.com/mark/popup_v1.php?mid=GBFchee301','????????????_?????????'); return false;">
							<img src="../img/footer/inipay.png" alt="????????????_?????????"/>
						</a>
						<a href="https://mark.inicis.com/mark/escrow_popup.php?mid=ESGBchee30" title="????????????_?????????"  onclick="popup('https://mark.inicis.com/mark/escrow_popup.php?mid=ESGBchee30','????????????_?????????','500','500'); return false;">
							<img src="../img/footer/escrow.png" alt="????????????_?????????"/>
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>
 </body>
</html>
