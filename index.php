<?php
	include "sub/php/00_conn.php";
	session_cache_expire(30);
	session_start();
?>
<!DOCTYPE html>
<html lang="ko">
 <head>
  <title>Cheese Queen</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <style>
	/*#### reset ####*/
		*{padding:0;margin:0;}
		li{list-style-type:none;}
		a:link,a:visited{text-decoration:none; color:#333;}
		body{font-family:'score400';}
		h5{position:absolute; left:-9999px; width:1px; height:1px; font-size:1px; line-height:0; overflow:hidden;}
		img{border:none;}
		.lineout{display:none;}
		
		@font-face {
			font-family:'jalnan';
			src: url('font/Jalnan.woff');
		}
		@font-face {
			font-family:'nanummyeongjo';
			src: url('font/NanumMyeongjo.woff');
		}
		@font-face {
			font-family:'score400';
			src: url('font/scdream4.woff');
		}
		@font-face {
			font-family:'score700';
			src: url('font/scdream7.woff');
		}
	
	/*##### skipNav #####*/
		#skipNav{width:100%; position:absolute; left:0; top:-30px;}
		#skipNav p{width:150px; height:30px; line-height:30px; text-align:center;}
		#skipNav p a{display:block; width:100%; height:100%; background-color:rgba(0,0,0,0.7); color:#fff; position:absolute;}
		
		#skipNav p a:focus{top:232px; text-decoration:underline; z-index:1;}
	/*#### wrap, 전역 ####*/
		#wrap{width:100%; color:#333;}
		h1{position:absolute; left:-9999px; width:1px; height:1px; font-size:1px; line-height:0; overflow:hidden;}

	/*#### 00. 탑배너 ####*/
		#top_banner{width:100%; height:40px; line-height:40px; background-color:#ffcc32;}
		#top_banner .banner{width:1025px; height:100%; margin:0 auto;}

		#top_banner .banner p{float:left; text-align:center;}
		#top_banner .banner .text{width:980px; font-size:14px;}
		#top_banner .banner .text em{font-style:normal; font-family:'score700'; padding-right:10px;}
		#top_banner .banner .text strong{background-color:#cc2935; color:#fff; padding:0 5px;}

		#top_banner .banner .btn{width:45px;}
		#top_banner .banner .btn a{display:block; width:100%; height:100%; text-align:center;}
		#top_banner .banner .btn a img{width:40%; vertical-align:middle;}

	/*#### 0. header ####*/
		#header{width:100%; background-color:#fff;}
		#mobHeader{display:none;}

	/*#### 0-1. 상단 ####*/
		#topArea{width:100%; height:120px;}
		#infoArea{width:1025px; margin:0 auto;}
		
		/*infoMenu*/
		#infoMenu{width:100%; margin:0 auto; text-align:right;}
		#infoMenu li{display:inline;}
		#infoMenu li a{padding-right:5px; font-size:10px;}
		#infoMenu .green a{color:#00564d; font-family:'score700';}

		/*로고*/
		#infoArea .logo{width:250px; height:100%; margin:0 auto;}
		#infoArea .logo a{display:block; width:100%; height:100%;}
		#infoArea .logo img{width:100%;}		

	/*#### 0-2. gnb ####*/
		#gnb{width:100%;}

		/*#### 바 영역 ####*/
		#barArea{width:100%; height:40px; line-height:40px; border-top:1px solid #eee;}	
		#bar{width:1025px; height:100%; margin:0 auto;}

		#bar .nav{width:720px; padding-right:100px; height:100%; float:left;}
		#bar .nav li{width:180px; float:left;}
		#bar .nav li h2{width:100%; text-align:center; font-size:15px; text-transform:uppercase;}
		#bar .nav li h2 a{display:block; width:100%;}

		/*검색영역*/
		#bar .search{width:170px; margin-right:35px; 
			height:24px; line-height:24px; padding:8px 0;
			background-image:url('img/header/back_search.png');
			background-position:50% 50%; background-repeat:no-repeat;
			float:left;
		}

		#bar .search form{width:140px; height:100%;
			float:left;
		}
		#bar .search fieldset{width:100%; height:100%; border:none;}
		#bar .search legend{display:none;}
		#bar .search p{width:100%; height:100%;}
		#bar .search p input{width:100%; height:100%; text-indent:10px; font-size:10px; color:#777; border:none; background-color:rgba(0,0,0,0);}

		#bar .search .btn{width:14px; height:18px; padding:2px 0; float:left;}
		#bar .search .btn img{width:100%;}

		/*#### 드랍영역 ####*/
		#dropArea{width:100%; height:0;
			overflow:hidden;
			transition:height 0.5s ease-in-out;
			position:absolute; left:0; top:200px;
			z-index:1;
			background-color:#fff;
		}

		#drop{width:1025px; height:100%; margin:0 auto;}
		#drop ul{width:720px; overflow:hidden; padding-top:10px; float:left;}
		#drop li{width:180px; text-align:center; float:left;}
		
		/*드랍 내부 - ul li*/
		#drop .subMenu{width:100%;}
		#drop .subMenu li{padding:10px 0;}
		#drop .subMenu li a{display:block; width:100%; height:100%; font-size:14px; font-weight:400; color:#7c7c7c;}
		
		/*드랍 내부 - event*/
		#drop .event{width:205px; padding-left:100px; height:100%; float:left;}
		#drop .event .imgs{width:170px; height:208px;  margin-top:20px;}
		#drop .event .imgs a{display:block; width:100%; height:100%; position:relative;}
		#drop .event .imgs a img{width:100%;}

		#drop .event a .text{position:absolute; top:5px; left:10px; font-size:10px; line-height:24px; color:#555;}
		#drop .event a .text strong{color:#fe6f5f; font-size:16px; /*font-family:'jua';*/}
		#drop .event a .text em{font-style:normal;}
		
		/*이벤트 기능*/
		#drop .event a:hover em{color:#999;}

		/*드랍 기능*/
		/*#gnb:hover #dropArea{height:306px;}*/
		#drop li a:hover,#drop li a:focus{color:#ffcc32;}
	
	/*#### container ####*/
		#container{width:100%;}
	
	/*#### 1. main_wrap ####*/
		#visual{width:100%; height:400px; background-color:#cae4f1; transition:background-color 0.2s linear; position:relative;}

	/*#### 1. mainVisual / 1025*465 ####*/
		#visual_inner{width:1025px; height:100%; margin:0 auto;}

		/*슬라이딩윈도우 float붙이기*/
		#visual_inner .slidingWindow{width:100%; height:100%;}
		#visual_inner .slidingWindow ul{width:100%; height:100%; position:relative;}
		#visual_inner .slidingWindow li{width:100%; height:100%; position:absolute; left:0; top:0; display:none;}
		#visual_inner .slidingWindow li:first-child{display:block;}
		#visual_inner .slidingWindow li a{display:block; width:100%; height:100%; position:relative;}
		#visual_inner .slidingWindow li a span{display:block; width:100%; height:100%; position:absolute; left:0; top:0;}
		#visual_inner .slidingWindow li img{width:100%;}
		
		/*슬라이딩윈도우 개별작업*/
		#visual_inner .li0{background-color:#cae4f1;}
		#visual_inner .li0 .text{width:400px; height:150px; color:#555; font-size:16px; left:20px; top:50%; transform:translatey(-50%);}
		#visual_inner .li0 .text em{display:block; padding-top:20px; line-height:50px; font-size:20px; font-style:normal;}
		#visual_inner .li0 .text b{font-weight:400; color:#628c02; font-size:42px; font-family:'nanummyeongjo';}		
		
		#visual_inner .li1{background-color:#2e3a52;}
		#visual_inner .li1 .text{width:400px; height:130px; color:#ccc; font-size:16px; left:20px; top:50%; transform:translatey(-50%);}
		#visual_inner .li1 .text em{display:block; color:#fff; padding-top:5px; line-height:50px; font-size:40px; font-style:normal;}
		
		#visual_inner .li2{background-color:#fff;}
		#visual_inner .li2 .text{width:100%; height:100%; color:#fff;}
		#visual_inner .li2 .text em{display:block;
			width:350px; height:200px; line-height:100px;
			font-style:normal; font-size:80px;
			text-align:center;
			position:absolute; left:50%; top:20%;
			transform:translatex(-50%);
			text-shadow:5px 5px 10px rgba(0,0,0,0.5);
			font-family:'jalnan';
		}
		#visual_inner .li2 .text b{display:block;
			width:70%; padding:5px 0;
			line-height:20px;
			font-size:14px; 
			background-color:#ff6e61;
			text-align:center;
			position:absolute; left:50%; top:75%;
			transform:translatex(-50%);
			box-shadow:5px 5px 10px rgba(0,0,0,0.5);
		}
		#visual_inner .li2 .text b br:first-child{display:none;}
		
		#visual_inner .li3{background-color:#d7d6de;}
		#visual_inner .li3 .text{width:400px; height:150px; color:#555; font-size:16px; left:20px; top:50%; transform:translatey(-50%);}		
		#visual_inner .li3 .text b{font-weight:400; font-size:40px; color:#000;}
		#visual_inner .li3 .text em{display:block; padding-top:20px; font-style:normal;}

		/*button0 화살표*/
		#visual_inner .left, #visual_inner .right{width:35px; height:65px; position:absolute; top:50%; margin-top:-32px;}

		#visual_inner a{display:block; width:100%; height:100%;}
		#visual_inner a img{width:100%;}

		#visual_inner .left{ left:2%; }
		#visual_inner .right{ right:2%;}

		/*button1 (.....)*/
		#visual_inner .button1{width:100%; height:20px; text-align:center; position:absolute; left:0; bottom:20px;}
		#visual_inner .button1 a{display:inline; padding:0 5px; color:rgba(255,255,255,0.3); text-shadow:5px 5px 20px rgba(0,0,0,0.3);}
		#visual_inner .button1 .selected{color:rgba(255,255,255,0.7);}

	/*#### 2. time_wrap ####*/
		#time_wrap{width:100%; height:350px; background-color:#efefef; background-image:url('img/basic/pattern_slash.png');}

	/*#### 2. timeSale ####*/
		#timeSale{width:1025px; height:100%; margin:0 auto;}
		
		/*title 200*300 */
		#timeSale .title{width:150px; height:234px; padding:63px 0; padding-left:50px; float:left;}
		#timeSale .title h2{font-size:36px; line-height:36px; 
		background-image:url('img/basic/icon_clock.png'); background-size:40px; background-repeat:no-repeat; background-position:90% 50%;}
		#timeSale .title h2 span{font-weight:400;}

		#timeSale .title .desc{padding:50px 0 20px; font-size:20px; color:#00564d;}
		#timeSale .title .btn{width:100%; height:20px;}
		#timeSale .title .btn a{display:inline-block; width:20px; height:100%; overflow:hidden;}
		#timeSale .title .btn a img{height:100%; transform:translatex(-50%);}
		#timeSale .title .timeBar{width:100%; height:10px; margin-top:50px; text-indent:-9999px; position:relative;}
		#timeSale .title .timeBar .bar{width:100%; height:2px; background-color:#ccc; position:absolute; left:0; top:4px;}
		#timeSale .title .timeBar .color{width:0%; background-color:#00564d; animation:aniBar 10s infinite;}
		#timeSale .title .timeBar .icon{width:4px; height:4px; background-color:#fff; border-radius:3px; border:1px solid #00564d; position:absolute; left:0; top:2px; animation:aniIcon 10s infinite;}

		@keyframes aniBar{
			0%{width:0%;}
			100%{width:100%;}
		}

		@keyframes aniIcon{
			0%{left:0;}
			100%{left:100%;}
		}

		/*itemArea 825*300 */
		#timeSale .itemArea{width:780px; height:260px; margin:50px 20px 50px 25px; overflow:hidden; float:left;}

		#timeSale .itemArea ul{width:2160px; height:100%;}
		#timeSale .itemArea li{width:180px; height:100%; padding-left:60px; float:left;}

		#timeSale .itemArea a{display:block; width:100%; height:100%; text-align:center;}
		#timeSale .itemArea a span{display:block; width:100%;}
		#timeSale .itemArea a .img{height:180px; border-radius:90px; overflow:hidden;}
		#timeSale .itemArea a .img img{width:100%;}

		#timeSale .itemArea a .text{padding-top:10px; line-height:20px;}
		#timeSale .itemArea a .text strong{display:block; width:100%; height:20px; overflow:hidden;  font-size:15px;}
		#timeSale .itemArea a .text i{color:#777; font-size:12px; font-style:normal;}
		#timeSale .itemArea a .text .price{color:#00564d;}
		#timeSale .itemArea a .text .line{font-size:12px; font-style:normal; font-weight:400; text-decoration:line-through; padding-right:10px;}

	/*##### 3.newBanner_wrap #####*/
		#newBanner_wrap{width:100%; height:92px; padding:50px 0; background-color:#fff;}

	/*##### 3.newBanner #####*/
		#newBanner{width:1025px; height:100%; margin:0 auto;}
		#newBanner p{width:900px; height:100%;
			margin:0 auto; background-image:url('img/banners/new_back.png'); background-repeat:no-repeat; background-position:50% 100%;
			}
		#newBanner p a{display:block; width:100%; height:100%; color:#fff;}
		#newBanner p a strong{display:block; width:170px; height:50px; line-height:50px; padding-left:50px; padding-top:42px; float:left; font-size:36px; color:#ffcc32;}
		#newBanner p a em{display:block; width:510px; height:50px; line-height:50px; padding-top:42px; float:left; font-style:normal;}
		#newBanner p a b{padding-left:10px; font-size:20px;}
		#newBanner p a span{display:block; width:141px; height:91px; float:left;}
		#newBanner p a span img{width:100%; vertical-align:middle;}

	/*##### 4. sale_wrap #####*/
		#sale_wrap{width:100%; height:900px; padding-bottom:50px; background-color:#fff;}

	/*##### 4. sale #####*/
		#sale{width:1025px; height:100%; margin:0 auto;}

		/*title 200*300 */
		#sale .title{width:210px; padding-left:40px; float:left;}
		#sale .title h2{font-size:30px; text-transform:uppercase;}
		#sale .title h2 span{font-weight:400;}

		#sale .title .desc{width:85px; padding-top:20px;  font-size:14px; color:#777;}

		#sale .title .button{padding-top:20px; line-height:25px;}
		#sale .title .button a{background-color:#dcdcdc; padding:0 10px; font-size:12px; font-family:'score700'; border-radius:8px}
	
		#sale .title .button .selected{background-color:#ffcc32; color:#fff;}

		#sale .title .button a:not(.selected):hover,#sale .title .button a:not(.selected):focus{background-color:#ccc;}

		/*itemArea 825*300 */
		#sale .itemArea{width:705px; height:100%; float:left; overflow:hidden;}

		#sale .itemArea ul{width:100%;}
		#sale .itemArea li{width:180px; height:300px; padding-left:50px; float:left;}

		#sale .itemArea li .imgLink{width:100%; height:180px; position:relative;}
		#sale .itemArea li .imgLink a{display:block; width:100%; height:100%; overflow:hidden;}
		#sale .itemArea li .imgLink img{width:100%; transition:transform 0.3s ease-in-out;}

		#sale .itemArea li .imgLink i{display:block; position:absolute;}
		#sale .itemArea li .imgLink .dC{width:60px; line-height:60px; background-color:#ffcc32; color:#00564d; font-family:'score700'; font-style:normal; text-align:center; font-size:20px; top:5px; left:5px; border-radius:30px;}
		#sale .itemArea li .imgLink .tasty{width:60px; bottom:5px; right:5px; display:none;}

		#sale .itemArea li .imgLink:hover img,#sale .itemArea li .imgLink a:focus img{transform:scale(1.1);}

		#sale .itemArea li .text{width:100%; line-height:20px; padding-top:10px;}
		#sale .itemArea li .textLink{height:22px; font-size:15px; font-family:'score700';}
		#sale .itemArea li .textLink a{display:block; width:100%; height:100%; overflow:hidden;}

		#sale .itemArea li .desc{font-size:12px; color:#777;}
		#sale .itemArea li .price .line{font-size:12px; text-decoration:line-through; padding-right:10px; color:#777;}
		#sale .itemArea li .price .green{font-size:15px; color:#00564d;}
		
		/*tasty 아이콘 on*/
		#sale .itemArea .tasty .imgLink .tasty{display:block;}
		
		/*ul 높이 막아주기*/
		#sale .itemArea ul:after{content:""; display:block; clear:both;}

	/*##### 5. vote_wrap #####*/
		#vote_wrap{width:100%; height:350px; background-color:#efefef; position:relative;}

	/*##### 5. vote #####*/
		#vote{width:1025px; height:320px; margin:0 auto; text-align:center; overflow:hidden;}

		#vote h2{width:80px; margin:50px auto 0; color:#ffcc32; background-color:#00564d;}
		#vote h3{padding:10px 0 20px;}

		#voteArea{width:600px; height:150px; margin:0 auto;}

		#voteArea div{width:150px; height:150px; border-radius:75px; box-shadow:3px 3px 5px rgba(0,0,0,0.5); overflow:hidden; position:relative; float:left; cursor:pointer;}
		#voteArea .vs{width:300px; height:150px; line-height:150px; font-size:30px; color:#ccc; float:left;}

		#voteArea div .imgs{display:block; height:100%;}
		#voteArea div img{height:100%;}
		#voteArea div .text{display:block; width:100%;	
			height:44px; padding:68px 0 48px; font-style:normal;
			color:rgba(0,0,0,0); background-color:rgba(0,0,0,0); transform:translate(0,-150px);
			transition:all 0.3s ease-out; 
		}

		/*voteArea 기능*/
		#voteArea div:hover .text{background-color:rgba(0,0,0,0.5); transform:translate(0,-160px); color:#fff;}
		
	/*##### 5. result0,1 #####*/
		#result0,#result1{width:100%; height:320px; overflow:hidden; position:relative; display:none;}

		#result0 h3,#result1 h3{position:absolute; left:50%; top:50px; z-index:1; margin-left:-500px; font-size:24px; font-weight:400;}		
		#result0 .btn,#result1 .btn{position:absolute; left:50%; bottom:30px; margin-left:-500px; z-index:1; font-size:11px; background-color:#222; color:#fff; padding:5px 10px; cursor:pointer;}

		#result1 h3{text-align:right; margin-left:500px;}
		#result1 .btn{margin-left:480px;}
	
		/*itemArea*/
		#result0 .itemArea,#result1 .itemArea{width:100%; height:100%; /*position:absolute; left:0; top:0;*/}
		#result0 .itemArea ul,#result1 .itemArea ul{width:120%; height:100%; margin-left:-20%;}
		#result0 .itemArea li,#result1 .itemArea li{width:10%; margin:0 1%; margin-top:30px; height:280px; text-align:center; float:left;}
		#result0 .itemArea .li0,#result1 .itemArea .li0{height:220px; margin-top:120px;}

		#result0 .itemArea li p,#result1 .itemArea li p{width:100%; height:20px; font-size:12px; color:#00564d;}
		#result0 .itemArea li p strong,#result1 .itemArea li p strong{display:none;}
		#result0 .itemArea li a,#result1 .itemArea li a{display:block; width:100%; padding-top:30px;}
		#result0 .itemArea li img,#result1 .itemArea li img{width:60%;}

		/*@keyframes voteAni{
			0%{transform:translatex(-100%);}
			100%{transform:translatex(100%);}
		}*/

		/*result 기능*/
		#result0 .btn:hover{background-color:#ffcc32; color:#333;}
		#result1 .btn:hover{background-color:#00564d;}

	/*#### 5. rate ####*/
		#rate{width:100%; height:30px;
			background:linear-gradient(to right,#00564d 50%,#ffcc32 51%);
			position:absolute; left:0; bottom:0;
			}

		#rateText{width:1025px; height:100%; margin:0 auto; line-height:30px; background-color:#ffcc32; color:#fff; position:relative;}
		#rateText p{height:100%; position:absolute; top:0;}
		#rateText .vote0{width:64%; text-align:left; background-color:#00564d; left:0;}
		#rateText .vote1{text-align:right; right:0;}

		#rateText p span{padding:0 30px;}
		#rateText p i{font-size:12px; font-style:normal; color:rgba(225,225,225,0.8);}

	/*##### 6. pick_wrap #####*/
		#pick_wrap{width:100%; padding-top:100px; background-color:#fff;}

	/*##### 6. pick #####*/
		#pick{width:1025px; overflow:hidden; margin:0 auto; background-color:#fff;}
		
		#pick h2{padding-left:50px; font-weight:400; font-size:26px; text-transform:uppercase;}
		#pick .itemArea{width:100%;}
		#pick .itemArea ul{width:990px; overflow:hidden; margin:30px auto 0;}
		#pick .itemArea li{width:450px; height:300px;
			margin-left:30px; margin-bottom:30px;
			float:left;
			position:relative;
		}

		#pick .itemArea li a{display:block; width:100%; height:100%;}
		#pick .itemArea li a span{display:block; width:100%; overflow:hidden;}
		#pick .itemArea li a .imgs{height:230px;}
		#pick .itemArea li a img{width:100%; transform:scale(1); transition:transform 0.3s ease-out;}
		#pick .itemArea li a .text{width:96%; padding:10px 2% 0; height:60px; font-size:12px; line-height:25px; color:#777;}
		#pick .itemArea li a .text strong{font-size:14px; color:#333;}

		/*img 기능*/
		#pick .itemArea li a:hover img{transform:scale(1.1)}
		
		
	/*##### 7. review_wrap #####*/
		#review_wrap{width:100%; padding-top:50px; height:550px; background-color:#fff;}

	/*##### 7. review #####*/
		#review{width:1025px; height:100%; margin:0 auto; background-color:#fff;}
		
		/*#### title ####*/
		#review .title{width:100%; height:40px; position:relative; overflow:hidden;}
		#review .title p{text-align:center; line-height:40px;}
		#review .title .line{width:98%; border-top:2px solid #ccc; margin:20px auto;}

		#review .title .text{width:100%; position:absolute; left:0; top:0;}
		#review .title .text strong{padding:0 20px; background-color:#fff; text-transform:uppercase; font-size:20px; color:#ccc;}		
		
		/*#### itemArea ####*/
		#review .itemArea{width:1000px; height:400px; margin:30px auto 0; position:relative; overflow:hidden;}

		/*button*/
		/*button 너비높이 지정하면 아래 이미지 클릭 안되는 이슈있음*/
		#review .button p{width:50px; height:100%; background-color:rgba(255,255,255,0.5);}
		#review .button a{display:block;		
			width:100%; height:64px; padding:170px 0;
			text-align:center;
			font-size:20px; color:rgba(0,86,77,0.7);
		}
		#review .button .left{position:absolute; top:0; left:0;}
		#review .button .right{position:absolute; top:0; right:0;}		

		/*ul*/
		#review .itemArea .film{width:200%; height:100%}
		#review .itemArea .scene{width:50%; height:100%; float:left;}
		#review .itemArea .scene li{width:200px; height:200px; outline:1px solid #fff; float:left;}
		#review .itemArea li a{display:block; width:100%; height:100%;}
		#review .itemArea li a img{width:100%;}

		#review .itemArea ul:after{content:""; display:block; clear:both;}
		
	/*##### 8. world_wrap #####*/
		#world_wrap{width:100%; height:585px; 
			background-image:url('img/world/world_background.jpg');
			background-attachment:fixed;
			background-size:100%; overflow:hidden;}

	/*##### 8. world #####*/
		#world{width:1025px; height:100%; margin:0 auto; position:relative;}

		#world h2{text-align:right; 
		position:absolute; right:40px; bottom:50px; font-family:'jalnan'; font-weight:400; font-size:34px; line-height:45px; text-shadow:0 0 30px #fff;}
		#world h2 b{color:#ffcc32;}
		#world h2 i{font-style:normal; color:#00564d;}

		#world ul{width:100%; height:100%;}
		#world li{position:absolute;}
		#world li p{width:60px; position:absolute;}
		#world li p img{width:100%;}
		
		/* li a*/
		#world li a{display:block; outline:2px solid rgba(0,0,0,0); box-shadow:3px 3px 8px rgba(0,0,0,0.5); background-color:#fff; position:absolute;}
		
		/* li 사이즈, 포지션 개별작업*/
			/*이탈리아*/
			#world .li0{width:222px; height:172px;
				left:72px; top:149px;
			}			
			#world .li0 a{width:200px; height:150px;
				right:0; top:0;
				background-image:url('img/world/greet_italy.png');
				background-size:70%;
				background-repeat:no-repeat;
				background-position:20% 80%;
			}
			#world .li0 p{left:0; bottom:0;}
			
			/*스위스*/
			#world .li1{width:180px; height:230px;
				left:280px; top:69px;
			}
			#world .li1 a{width:160px; height:210px;
				right:0; bottom:0;
				background-image:url('img/world/greet_switz.png');
				background-size:60%;
				background-repeat:no-repeat;
				background-position:80% 10%;
			}
			#world .li1 p{left:0; top:0;}

			/*네덜란드*/
			#world .li2{width:210px; height:170px;
				left:466px; top:129px;
			}
			#world .li2 a{width:200px; height:150px;
				left:0; bottom:0;
				background-image:url('img/world/greet_neth.png');
				background-size:35%;
				background-repeat:no-repeat;
				background-position:90% 80%;
			}
			#world .li2 p{right:0; top:0;}

			/*미국*/
			#world .li3{width:220px; height:160px;
				left:210px; top:305px;
			}
			#world .li3 a{width:200px; height:150px;
				right:0; top:0;
				background-image:url('img/world/greet_uSA.png');
				background-size:50%;
				background-repeat:no-repeat;
				background-position:90% 90%;
			}
			#world .li3 p{left:0; bottom:0;}

			/*프랑스*/
			#world .li4{width:170px; height:220px;
				left:436px; top:305px;
			}
			#world .li4 a{width:150px; height:200px;
				left:0; top:0;
				background-image:url('img/world/greet_france.png');
				background-size:75%;
				background-repeat:no-repeat;
				background-position:30% 80%;
			}
			#world .li4 p{right:0; bottom:0;}
		
		/* li 기능 test*/
		#world li a:hover,#world li a:focus{outline:2px solid #ffcc32;}
		/*#world li:hover p{width:65px;}*/

		/* li 내 텍스트 공통작업*/
		#world li a .text{display:block; color:#999; font-size:12px; position:absolute;}
		#world li a .text strong{color:#333; font-size:18px;}

		/* li 내 텍스트 개별작업*/
		#world .li0 a .text{text-align:right; right:25px; bottom:70px;}
		#world .li0 a .text strong{color:#00564d;}

		#world .li1 a .text{text-align:center; left:36px; bottom:70px;}
		#world .li1 a .text strong{color:#cc2935}

		#world .li2 a .text{text-align:left; left:25px; bottom:70px;}
		#world .li2 a .text strong{color:#21468c;}

		#world .li3 a .text{text-align:left; left:25px; top:25px;}
		#world .li3 a .text strong{color:#ffcc32;}

		#world .li4 a .text{text-align:left; left:25px; top:25px;}
		#world .li4 a .text strong{color:#af1c87;}

	/*##### 9. taste_wrap #####*/
		#taste_wrap{width:100%; height:400px; padding-top:100px; background-color:#fff;}

	/*##### 9. taste #####*/
		#taste{width:1025px; height:100%; margin:0 auto;}

		/*##### title #####*/
		#taste .title{width:245px; height:370px;
			border-right:1px solid #ccc; float:left;
		}

		#taste .title .text{text-align:right; padding-right:25px; padding-bottom:30px;}
		#taste .title .desc{font-size:14px;}
		
		#taste .title .mobNav{display:none;}
		#taste .title .pcNav{width:100%; height:250px; position:relative;}

		#taste .title .pcNav li{height:40px; line-height:40px;
			text-align:left; text-indent:20px; font-size:14px;
			position:absolute; right:0; top:0;
		}
		#taste .title .pcNav li a{display:block;
			width:200px; height:100%;
			background-color:#ddd;
			transition:width 0.3s ease-in-out
		}
		
		/*li position 개별작업*/
		#taste .title .pcNav .li1{top:50px;}
		#taste .title .pcNav .li2{top:100px;}
		#taste .title .pcNav .li3{top:150px;}
		#taste .title .pcNav .li4{top:200px;}

		/*li 기능*/
		#taste .title .pcNav .selected a{width:210px; background-color:#00564d; color:#fff;}
		#taste .title .pcNav a:hover,#taste .title .pcNav a:focus{width:210px; outline:none;}

		/*##### itemArea #####*/
		#taste .itemArea{width:750px; height:400px; float:left;}
		#taste .itemArea ul{width:100%; height:100%; display:none;}
		#taste .itemArea ul:first-child{display:block;}
		#taste .itemArea li{width:170px; height:170px; padding-left:10px; padding-top:10px; float:left;}	

		#taste .itemArea li a{display:block; width:100%; height:100%; overflow:hidden; position:relative;}
		#taste .itemArea li a span{display:block; width:100%; height:100%;}
		#taste .itemArea li a .img{width:100%; transition:transform 0.5s ease-out;}
		#taste .itemArea li a .img img{width:100%;}
		#taste .itemArea li a .text{width:80%;	
			height:80%; padding:10%;
			background-color:rgba(0,0,0,0.5); color:#fff;
			font-size:13px;
			position:absolute; left:0; top:0;
			display:none;
		}
		/*li a img 기능*/
		#taste .itemArea li a:hover .img{transform:scale(1.2);}

		/*li a text 기능*/
		#taste .itemArea li a:hover .text,#taste .itemArea li a:focus .text{display:block;}
		
		#taste .itemArea li a .text .title{display:block; border-right:none; width:100%; height:auto; padding-bottom:10px;}
		#taste .itemArea li a .text .desc{display:block; font-style:normal; color:#ccc; font-size:10px; line-height:14px;}
		#taste .itemArea li a .text .price{display:block; position:absolute; left:10%; bottom:10%;}
		
		/*큰 li 개별작업 (.big)*/
		#taste .itemArea .big{width:350px; height:350px; padding-left:30px;}
		#taste .itemArea .big a .text{font-size:16px;}
		#taste .itemArea .big a .text .desc{ font-size:12px; line-height:20px;}

	/*##### 10.testBanner_wrap #####*/
		#testBanner_wrap{width:100%; height:75px; background-color:#fff;}

	/*#### 10.testBanner ####*/
		#testBanner{width:1025px; height:100%; margin:0 auto;}

		#testBanner p{width:100%; height:100%; background-image:url('img/banners/test_back.jpg');}
		#testBanner p a{display:block;
			width:100%; height:100%;
			text-align:center; line-height:33px; background-image:url('img/banners/test_effect.png');
			background-repeat:no-repeat; 
			background-position:50% 50%;
			font-family:'score700';
		}
		
		#testBanner p a i{font-style:normal;}
		#testBanner p a span{font-size:20px;}
		#testBanner p a strong{color:#fff; background-color:#00564d; padding:0 5px;}
		#testBanner p a b{color:#00564d; font-size:22px;}

		/*기능*/
		#testBanner p a:hover b,#testBanner p a:focus b{color:#cc2935;}

	/*#### 11. combi_wrap ####*/
		#combi_wrap{width:100%; height:450px; padding-top:100px; background-color:#fff;}

	/*#### 11. combi ####*/
		#combi{width:1025px; height:100%; margin:0 auto;}

		#combi h2{text-transform:uppercase; font-weight:400; padding:0 0 20px 50px;}

		#combi ul{width:925px; height:300px; margin:0 auto; overflow:hidden;}
		#combi li{width:20%; height:100%; float:left; background-color:#fff; background-size:410px; overflow:hidden; /*transition:width 0.5s ease-in-out;*/}
		#combi .mobTitle{display:none;}
		
		/* li 배경이미지 개별작업 */
			#combi .li0{background-image:url('img/combi/combi_0.webp');}
			#combi .li1{background-image:url('img/combi/combi_1.jpg');}
			#combi .li2{background-image:url('img/combi/combi_2.jpg'); background-size:auto 100%;}
			#combi .li3{background-image:url('img/combi/combi_3.jpg');}
			#combi .li4{background-image:url('img/combi/combi_4.jpg');}

		#combi li a{display:block; width:100%; height:100%; position:relative;}
		#combi li a span{color:#fff; font-size:20px; position:absolute; left:20px; bottom:20px; text-shadow:0 0 10px rgba(0,0,0,0.5);}
		#combi li a .hover{display:block; width:100%; height:100%; left:auto; right:0; bottom:0; background-image:linear-gradient(to left,#fff 0%, rgba(255,255,255,0) 80%); display:none;}
		#combi li a .hover img{position:absolute; bottom:20px;}
		#combi li a .hover img:first-child{right:25px}
		#combi li a .hover img:last-child{right:90px}
		#combi li a em{display:block; width:100%; height:100%; background-image:url('img/combi/back_combiDc.png'); background-repeat:no-repeat; color:#fff; font-family:'score700'; font-size:24px; text-indent:5px; line-height:70px; opacity:0; transition:opacity 0.5s ease-out 0.3s;}
		#combi li a em i{font-size:16px;}

	/*#### 13. friends_wrap ####*/
		#friends_wrap{width:100%; height:1200px;
			background-color:#fff;
			background-image:url('img/friends/fr_back.jpg'); padding-top:50px;
		}

	/*#### 13. friends ####*/
		#friends{width:1025px; height:100%; margin:0 auto;}

		#friends .title{text-transform:uppercase; text-align:center; padding-bottom:50px;}

		#friends section{width:100%; height:350px;}
		#friends section .titleArea{width:195px; padding-right:40px; height:100%; text-align:right; float:left;}
		#friends section .titleArea .h2{font-size:20px;}
		#friends section .titleArea span{display:block;}
		#friends section .titleArea p{line-height:30px; font-size:12px; color:#555;}
		#friends section .itemArea{width:750px; height:100%; float:left; position:relative;}

		/*button*/
		#friends .itemArea .buttonL,#friends .itemArea .buttonR {width:45px; height:100%; position:absolute; top:0;}
		#friends .itemArea .buttonL a,#friends .itemArea .buttonR a{display:block; width:100%; height:64px; padding:68px 0; text-align:center;}
		#friends .itemArea .buttonL{left:0}
		#friends .itemArea .buttonR{right:0}
		
		/*ul*/
		#friends .itemArea .screen{width:660px; height:100%; margin-left:45px; overflow:hidden;}
		#friends .itemArea ul{width:1980px; height:100%;}
		#friends .itemArea li{width:200px; height:100%; padding:0 10px; float:left;}

		#friends .itemArea li .imgLink{width:100%;}
		#friends .itemArea li .imgLink img{width:100%;}

		#friends .itemArea li .text{width:100%; line-height:20px; padding-top:10px;}
		#friends .itemArea li .textLink{font-size:15px; height:20px; overflow:hidden; font-family:'score700';}
		#friends .itemArea li .desc{height:40px; padding-top:5px; line-height:18px; font-size:12px; color:#777;}
		#friends .itemArea li .price .line{font-size:12px; text-decoration:line-through; padding-right:10px; color:#aaa;}
		#friends .itemArea li .price .green{font-size:15px; color:#00564d;}

	/*#### 14. pondue_wrap ####*/
		#pondue_wrap{width:100%; height:400px; background-image:url('img/pondue/p_00.png'); background-size:auto 100%;}

	/*#### 14. pondue ####*/
		#pondue{width:1025px; height:100%; margin:0 auto;}
		
		#pondue .left{width:300px; height:300px; padding-top:50px; padding-left:130px; float:left;}
		
		#pondue .right{width:550px; padding-top:50px; padding-left:45px; float:left;}
		
		#pondue .right .title{height:100px; font-size:12px;}
		#pondue .right .title h2{font-size:24px; padding-bottom:10px;}

		#pondue .itemArea{width:550px; height:130px; padding-top:70px;}
		#pondue .itemArea ul{width:100%; height:100%;}
		#pondue .itemArea li{width:130px; height:130px; margin-right:20px; float:left;}

		/*a태그 공통*/
		#pondue a{display:block; width:100%; height:100%; border-radius:20px; box-shadow:3px 3px 7px rgba(0,0,0,0.3); overflow:hidden; position:relative;}
		#pondue a span{display:block; width:100%;}

		#pondue a .imgs img{width:100%;}

		#pondue a .desc{
			width:80%; padding:20px 10%; position:absolute; bottom:-50%; left:0; background-color:rgba(0,0,0,0.4);
			color:#fff;
			transition:bottom 0.5s ease-in-out;
		}

		#pondue a strong{display:block; width:100%; height:22px; margin-bottom:20px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;}
		#pondue a em{font-style:normal; font-size:14px;}

		/*a태그 개별-작은 오브젝트*/
		#pondue .right a .desc{padding:10px 10%;}
		#pondue .right a strong{height:20px; font-size:14px; margin-bottom:0;}
		#pondue a .desc em{font-size:12px;}

		/*desc 기능*/
		#pondue a:hover .desc,#pondue a:focus .desc{bottom:0;}


	/*#### 15. bestHot_wrap ####*/
		#bestHot_wrap{width:100%; height:600px; padding-top:50px; background-color:#fff;}

	/*#### 15. bestHot ####*/
		#bestHot{width:1025px; height:100%; margin:0 auto;}

		#bestHot h2{width:99%; height:36px; line-height:36px; padding-left:1%;}
		#bestHot h2 strong,#bestHot h2 i{display:inline-block; vertical-align:top;}
		#bestHot h2 strong{font-weight:400; font-size:12px;}
		#bestHot h2 i{width:16px; height:100%; padding-left:350px;}
		#bestHot h2 i img{width:100%;}
		#bestHot h2 b{padding-left:125px; font-weight:400; font-size:10px; letter-spacing:3px;}


		#best{width:600px; height:100%; padding-left:30px; float:left;}
		#best section{width:580px; height:450px; border:1px solid #ccc; overflow:hidden;}
		#best ul{width:100%; height:100%;}
		#best li{width:47%; height:204px; padding-left:2%; padding-top:14px; float:left;}
		#best li .imgLink{width:100%; height:140px; overflow:hidden;}
		#best li .imgLink a{display:block; width:100%; height:100%;}
		#best li .imgLink a img{width:100%; transform:translatey(-12%);}
		@keyframes refresh{
			0%{opacity:1; transform:rotate(0deg);}
			50%{opacity:0.5;}
			100%{opacity:1; transform:rotate(360deg);}
		}

		#best li .text{width:100%; height:60px; line-height:18px; padding-top:5px;}
		#best li .text a{font-size:15px; font-family:'score700';}
		#best li .text .desc{font-size:12px; color:#777;}
		#best li .text .price .line{font-size:12px; text-decoration:line-through; padding-right:10px; color:#aaa;}
		#best li .text .price .green{font-size:15px; color:#00564d;}

		#hot{width:395px; height:100%; float:left;}
		#hot h2 b a{color:#555;}
		#hot .screen{width:365px; height:450px; border:1px solid #ccc; overflow:hidden;}
		#hot ul{width:100%;}
		#hot li{width:100%; height:130px; padding-top:15px;}
		#hot li .imgLink{width:130px; padding-left:15px; height:100%; float:left; overflow:hidden;}
		#hot li .imgLink a{display:block; width:100%; height:100%;}
		#hot li .imgLink a img{width:100%;}

		#hot li .text{width:170px; padding-left:15px;  height:100%; line-height:18px; float:left;}
		#hot li .text a{font-size:15px; font-family:'score700';}
		#hot li .text .num{width:40px; text-align:center; margin-top:15px; background-color:#ffcc32; color:#fff; font-size:16px; font-family:'score700';}
		#hot li .text .num:before{content:""; display:block; height:10px; background-color:#fff; background-image:url('img/basic/icon_rank.png'); background-size:auto 100%; background-repeat:no-repeat; background-position:50%;}
		#hot li .text .textLink{height:20px; overflow:hidden;}
		#hot li .text .desc{font-size:12px; color:#777;}
		#hot li .text .price .line{font-size:12px; text-decoration:line-through; padding-right:10px; color:#aaa;}
		#hot li .text .price .green{font-size:15px; color:#00564d;}

		#hot .btn{display:none;}

	/*#### 16. bisDel_wrap ####*/
		#bisDel_wrap{width:100%; height:350px; background-color:#fff;}

	/*#### 16. bisDel ####*/
		#bisDel{width:1025px; height:100%; margin:0 auto;}
		
		#bisDel h2{padding-bottom:20px;}
		#bisDel div{width:450px; padding:0 30px; float:left;}
		#bisDel div p{width:100%; height:192px; overflow:hidden;}
		#bisDel div p a{display:block; width:100%; height:167px; margin-top:25px; text-align:center;}
		#bisDel div p a .imgs{display:block; width:200px; height:141px; padding:13px 0; float:left;}
		#bisDel div p a .imgs img{height:100%;}
		#bisDel div p a .text{display:block; width:250px; height:121px; line-height:60px; padding:23px 0; font-size:48px; float:left; font-family:'jalnan'; color:#fff; text-shadow:0 0 10px rgba(0,0,0,0.3);}

		#bisDel .bis p{background-image:url('img/banners/business_back.png');}
		#bisDel .del p{background-image:url('img/banners/delivery_back.png');}

		#bisDel div p a:hover .imgs img{animation:bisdel 1s infinite alternate;}
		
		@keyframes bisdel{
			0%{transform:scale(1);}
			100%{transform:scale(1.05);}
		}

	/*#### 17. fixed_wrap ####*/
		#fixed_wrap div{position:fixed;}
		#top{width:50px; bottom:50px; right:5%;}
		#top img{width:100%;}
		
		#allBack{width:100%; height:100%; background-color:rgba(0,0,0,0.5); left:0; top:0; z-index:1; display:none;}

		#sns_modal{width:600px; height:640px;
			transform:translate(-50%, -55%);
			left:50%; top:50%; z-index:1; display:none;
		}
		#sns_modal .btn{width:100%; height:40px; text-align:right;}
		#sns_modal .btn a{display:inline-block; width:30px; height:30px; color:#fff;}
		#sns_modal .btn a img{width:100%;}
		#sns_modal div{width:590px; height:590px; border:5px solid #fff; background:url('img/basic/loading.gif') no-repeat 50% 50% #fff;}
		#sns_modal iframe{width:100%; height:100%; border:none;}

	/*#### 18. footer ####*/
		#footer{width:100%; height:360px; background-color:#fff;}

	/*#### 18-1. footer_desc ####*/
		#footer_desc_wrap{width:100%; height:240px; background-color:#eee; overflow:hidden;}
		#footer_desc{width:1025px; height:160px; margin:50px auto;}

		#footer_desc div{width:210px; padding:0 20px;
			height:100%; line-height:20px;
			border-left:1px solid #ccc;
			font-size:12px; color:#666;
			float:left;
		}
		#footer_desc div h3{font-size:16px; padding-bottom:10px; color:#333;}

		/*개별1_cs*/
		#footer_desc .cs{border-left:none;}
		#footer_desc .cs .call{line-height:34px;	
			margin-bottom:10px;
			font-size:26px; font-family:'score700'; color:#00564d;
		}
		#footer_desc .cs .call img{height:20px;}
		#footer_desc .cs .desc span{display:block;}
		
		/*개별2_bank*/
		#footer_desc .bank .imgs{width:80%; height:34px;  padding-bottom:10px;}
		#footer_desc .bank .imgs img{width:100%;}

		#footer_desc .bank .desc strong{font-size:20px; color:#333;}
		#footer_desc .bank .desc em{display:block; padding-top:5px; font-style:normal;}

		/*개별3,4_board*/
		#footer_desc .board{position:relative;}
		#footer_desc .board h3 em{font-style:normal; font-size:12px; padding-left:10px; }
		#footer_desc .board .more{font-size:20px; font-family:'score700'; position:absolute; right:20px; top:0;}
		#footer_desc .board .more a{padding:0 5px; color:#00564d;}

		#footer_desc .board ul{width:100%;}
		#footer_desc .board li{width:100%; height:30px; list-style-type:"-";}

		#footer_desc .board li a{display:block;
			width:100%; height:100%;
			text-indent:10px;
			line-height:20px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;
			color:#666;
		}
		
		/*기능*/
		#footer_desc .board li a:hover,#footer_desc .board li a:focus{color:#00564d;}

	/*#### 18-2. footer_nav ####*/
		#footer_nav_wrap{width:100%; height:40px; line-height:40px; background-color:#fff; border-bottom:1px solid #ccc;}
		#footer_nav{width:1025px; height:100%; margin:0 auto;}
		#footer_nav ul{width:1005px; height:100%; padding-left:10px;}
		#footer_nav ul li{display:inline; font-size:10px; color:#ccc;}
		#footer_nav ul li a{font-size:12px; padding:0 10px;}

	/*#### 18-3. footer_info ####*/
		#footer_info_wrap{width:100%; height:130px; background-color:#fff;}
		#footer_info_wrap .more_mob{display:none;}

		#footer_info{width:1025px; height:100%; margin:0 auto; display:block;}

		#footer_info h2{width:105px; height:80px; padding:25px 0 25px 15px; float:left;}
		#footer_info h2 img{height:100%;}

		#footer_info div{height:100%; float:left;}
		
		#footer_info .desc{width:765px; height:80px; padding:25px 0; font-size:12px; line-height:20px;}
		#footer_info .desc ul{width:73%;}
		#footer_info .desc li{display:inline-block;}
		#footer_info .desc a:hover,#footer_info .desc a:focus{text-decoration:underline;}
		#footer_info .desc i{font-style:normal; color:#ccc;}

		#footer_info .pay{width:140px; height:100%;}
		#footer_info .pay p{width:100%; height:44px; padding:43px 0;}
		#footer_info .pay p a{display:inline-block;}
	
	/*##### 미디어쿼리 - 태블릿 #####*/
		@media all and (min-width:768px) and (max-width:1024px){
			/*#### 00. 탑배너 ####*/				
				#top_banner .banner{width:100%; height:100%; margin:0 auto;}
				#top_banner .banner .text{width:90%;}
				#top_banner .banner .btn{width:10%; text-align:center;}
				#top_banner .banner .btn a{display:inline-block; width:45px;}

			/*#### 0-1. 상단 ####*/
				#infoArea{width:100%;}
				#infoMenu{width:100%; margin:0;}

			/*#### 0-2. gnb ####*/
				/*#### 바 영역 ####*/
				#bar{width:100%; margin:0;}
				#bar .nav{width:100%; padding:0px; float:none;}
				#bar .nav li{width:25%; float:left;}

				/*검색영역*/
				#bar .search{display:none;}

				/*#### 드랍영역 ####*/
				#drop{width:100%; margin:0;}
				#drop ul{width:100%; float:none;}
				#drop li{width:25%;}				
				/*드랍 내부*/
				#drop .subMenu li{width:100%;}
				#drop .event{display:none;}
			
			/*#### container ####*/
				#container{width:100%;}

			/*#### 1. mainVisual ####*/
				#visual{overflow:hidden;}
				#visual_inner{width:100%;}
				#visual_inner .slidingWindow li img{width:auto; height:100%; transform:translatex(-10%);}

				/*슬라이딩윈도우 개별작업*/
				#visual_inner .li0 .text{left:10%;}
				#visual_inner .li1 .text{left:10%;}		
				#visual_inner .li3 .text{left:10%;}

			/*#### 2. timeSale ####*/
				#timeSale{width:768px;}
				#timeSale .title{width:200px; padding:63px 0; padding-left:40px;}
				#timeSale .itemArea{width:528px; height:260px; margin:50px 0;}

			/*##### 3.newBanner #####*/
				#newBanner_wrap{height:50px;}
				#newBanner{width:100%; margin:0;}
				#newBanner p{width:700px; background:none;
				background-color:#00564d; border-radius:10px;}
				#newBanner p a strong{display:inline-block; width:120px; height:100%; line-height:50px; padding:0; text-align:center; font-size:26px;}
				#newBanner p a em{display:block; width:430px; height:100%; line-height:50px; padding-top:0; float:left;}
				#newBanner p a span{display:block; width:150px; height:100%; text-align:center;}
				#newBanner p a span img{width:100px; transform:translatey(-15px);}

			/*##### 4. sale #####*/
				#sale_wrap{height:950px;}
				#sale{width:600px;}
				#sale .title{width:100%; padding-left:0px; padding-bottom:20px; float:none;}
				#sale .title h2{font-size:20px; text-indent:10px;}
				#sale .title .desc{width:100%; padding-top:0px;  font-size:14px; text-indent:10px;}
				#sale .title .button{width:100%; padding-top:5px;}
				#sale .title .button br{display:none;}
				#sale .title .button a{display:inline-block; height:20px; line-height:20px; border-radius:10px; margin-left:10px; font-size:11px;}

				/*itemArea 825*300 */
				#sale .itemArea{width:600px; height:850px; float:none;}
				#sale .itemArea ul{width:100%;}
				#sale .itemArea li{width:180px; height:260px; padding:10px; float:left;}

			/*##### 5. vote #####*/
				#vote{width:100%; margin:0;}
				#result0 h3,#result1 h3{margin-left:-350px;}	
				#result0 .btn,#result1 .btn{margin-left:-350px;}
				#result1 h3{margin-left:220px;}
				#result1 .btn{margin-left:200px;}
				#rateText{width:768px;}

			/*6. pick_wrap*/
				#pick_wrap{padding-top:0px;}
				#pick{width:100%;margin:0;}				
				#pick h2{padding-left:10px; padding-bottom:10px; font-size:20px;}
				#pick .itemArea{width:100%;}
				#pick .itemArea ul{width:100%; overflow:hidden; margin:0;}
				#pick .itemArea li{width:48%; height:auto;
					margin:0 1% 10px;
				}
				
				#pick .itemArea li a .imgs{height:auto;}
				#pick .itemArea li a img{transform:translatey(0px);}
				#pick .itemArea li a .text{height:60px; font-size:12px; line-height:20px;}
				#pick .itemArea li a:hover img{transform:translatey(0px);}

			/*7. review*/
				#review_wrap{height:auto; padding:50px 0;}
				#review{width:100%; margin:0;}
				#review .itemArea{width:100%; height:auto; margin:0;}
				#review .itemArea .film{width:400%;}
				#review .itemArea .scene{width:25%;}
				#review .itemArea .scene li{width:20%; height:auto;}
				#review .itemArea .button a{height:100%; padding:0; position:relative;}
				#review .itemArea .button a img{position:absolute; top:50%; left:50%; transform:translate(-50%,-50%);}

			/*8. world*/
				#world_wrap{width:100%; height:480px; padding:40px 0 20px; background-size:cover;}
				#world{width:767px;}

				#world h2{width:100%; text-align:center; 
				position:static; font-size:30px;}
				#world h2 br{display:none;}

				/* li 사이즈, 포지션 개별작업*/
				/*프랑스*/
				#world .li4{width:220px; height:160px;}
				#world .li4 a{width:200px; height:150px; background-size:50%;}

			/*##### 9. taste #####*/
				#taste_wrap{width:100%; height:400px; padding-top:100px;}
				#taste{width:100%; margin:0;}

				/*##### title #####*/
				#taste .title{width:30%; height:370px; border-right:1px solid #ccc; box-sizing:border-box;}

				/*##### itemArea #####*/
				#taste .itemArea{width:70%; height:auto; padding-top:2%; box-sizing:border-box;}
				#taste .itemArea li{width:22%; height:auto; padding-left:1%; padding-top:0;}	

				/*li a img 기능*/
				#taste .itemArea li a:hover .img{transform:scale(1);}

				/*li a text 기능*/
				#taste .itemArea li a:hover .text,#taste .itemArea li a:focus .text{display:none;}
				
				/*큰 li 개별작업 (.big)*/
				#taste .itemArea .big{width:45%; height:auto; padding-left:3%;}

			/*#### 10.testBanner ####*/
				#testBanner_wrap{width:100%; height:75px; background-color:#fff;}
				#testBanner{width:90%; height:100%; margin:0 auto;}

				#testBanner p{width:100%; border-radius:5px;}

			/*#### 11. combi 버려버려 ####*/
				#combi_wrap{display:none;}
				#combi{width:90%; height:100%; margin:0 auto;}
				#combi ul{width:100%; height:300px; margin:0 auto; overflow:hidden;}

			/*#### 13. friends ####*/
				#friends{width:100%; margin:0;}
				#friends section .titleArea{width:20%; padding-right:0; padding-left:5%; text-align:left;}
				#friends section .itemArea{width:70%;}
				
				/*ul*/
				#friends .itemArea .screen{width:100%; margin-left:0;}

			/*#### 14. pondue ####*/
				#pondue{width:768px;}
				
				#pondue .left{width:230px; height:230px; padding-left:18px; padding-top:70px;}
				
				#pondue .right{width:460px; padding-top:50px; padding-left:60px;}
				
				#pondue .right .title{height:100px; font-size:12px;}
				#pondue .right .title h2{font-size:24px; padding-bottom:10px;}

				#pondue .itemArea{width:100%; height:130px; padding-top:20px;}
				#pondue .itemArea ul{width:100%; height:100%;}
				#pondue .itemArea li{width:130px; height:130px; margin-right:20px; float:left;}

				/*desc 기능*/
				#pondue a:hover .desc,#pondue a:focus .desc{bottom:-50%;}

			/*#### 15. bestHot ####*/
				#bestHot{width:95%;}
				#bestHot h2 i{padding-left:48%;}
				#bestHot h2 b{padding-left:10%;}
				#best{width:60%; padding-left:0;}
				#best section{width:100%;}
				#best li .textLink{height:20px; overflow:hidden;}

				#hot{width:38%; padding-left:2%;}
				#hot .screen{width:100%;}
				#hot li .imgLink{width:36%; padding:0 2%; position:relative;}
				#hot li .imgLink img{position:absolute; right:0; top:50%; transform:translatey(-50%);}
				#hot li .text{width:56%; padding:0 2%;}

			/*#### 16. bisDel ####*/
				#bisDel{width:100%; max-width:870px;}
				#bisDel div{width:46%; max-width:400px; padding:0 2%;}
				#bisDel div p{height:150px; background-size:100%; border-radius:10px;}
				#bisDel div p a{margin-top:10px;}
				#bisDel div p a .imgs{width:30%; padding:0;}
				#bisDel div p a .text{width:70%; line-height:60px; padding:0; font-size:40px;}

				#bisDel .bis p{background:none; background-color:#ffe78b;}
				#bisDel .del p{background:none; background-color:#02b8cd;}

			/*#### 18-1. footer_desc ####*/
				#footer_desc_wrap{width:100%; height:auto; background-color:#eee; overflow:hidden;}
				#footer_desc{width:100%; margin:50px 0;}
				#footer_desc div{width:25%; padding:0 1%;
					height:auto; line-height:20px;
					box-sizing:border-box;
				}
				#footer_desc .cs .call{font-size:24px;}
		}

	/*##### 미디어쿼리 - 폰가로 #####*/
		@media all and (min-width:481px) and (max-width:767px){			
			#top,#top_banner,#header,#visual_inner .left, #visual_inner .right,#vote_wrap{display:none;}
			#visual_inner,#timeSale{width:100%;}

			/*0.헤더*/
				#mobHeader{display:block; height:100%;}

				#mobHeader .top{background-color:#fff; width:100%; height:30px; padding:10px 0; position:fixed; top:0; left:0; z-index:1;}
				#mobHeader .top .logo{width:130px; height:100%;  margin:0 auto;}
				#mobHeader .top .logo a{display:block; width:100%; height:100%;}
				#mobHeader .top .logo a img{width:100%;}

				#mobHeader .bottom{background-color:#fff; width:100%; height:50px; position:fixed; bottom:0; left:0; z-index:1; border-top:1px solid #ccc;}
				#mobHeader .bottom ul{width:100%; height:40px; padding:5px 0;}
				#mobHeader .bottom li{width:25%; float:left; text-align:center; font-size:10px;}

				.allBack{width:100%; height:100%; position:fixed; left:0; top:0; background-color:rgba(0,0,0,0.5); z-index:9; display:none;}
				#mobSearchArea{width:100%; height:70px; position:fixed; left:0; top:-70px; background-color:#00564d; z-index:9; transition:top 0.5s;}
				#mobSearchArea form{width:100%; height:100%;}
				#mobSearchArea fieldset{width:100%; height:100%; border:none;}
				#mobSearchArea legend{display:none;}
				#mobSearchArea p{width:98%; height:100%; padding-left:2%; line-height:60px;}
				#mobSearchArea p input{width:85%; height:50px; margin:10px 0; border:none; text-indent:10px;}
				#mobSearchArea p span{display:inline-block; width:15%; color:#fff; text-align:center; cursor:pointer;}
			
			#container{padding-top:50px;}

			/*1. 메인비쥬얼*/
				#visual{width:100%; height:350px; background-color:#cae4f1; position:relative;}
				#visual_inner .slidingWindow{width:100%; height:100%; overflow-x:auto; overflow-y:hidden;}
				#visual_inner .slidingWindow li{ overflow:hidden;}
				#visual_inner .slidingWindow li img{width:auto; height:100%; transform:translatex(-20%);}
				
				#visual_inner .li0 .text{width:185px; height:130px; padding:5px; font-size:14px; left:10%; background-color:rgba(255,255,255,0.3);}
				#visual_inner .li0 .text em{ padding-top:10px; line-height:30px;}
				#visual_inner .li0 .text b{font-size:32px;}

				#visual_inner .li1 .text{width:250px; height:100px; font-size:14px; left:10%;}
				#visual_inner .li1 .text em{padding-top:5px; line-height:36px; font-size:30px;}

				#visual_inner .li2 .text{width:100%; height:100%; color:#fff;}
				#visual_inner .li2 .text em{width:240px; height:130px; top:25%; line-height:70px; font-size:60px;}
				#visual_inner .li2 .text b{
					width:100%; 
					line-height:18px;
					font-weight:400;
					font-size:11px; left:0; top:70%;
					transform:translatex(0);}
				#visual_inner .li2 .text b br:first-child{display:block;}

				#visual_inner .li3 .text{width:100%; height:142px; font-size:14px; left:10%;}		
				#visual_inner .li3 .text b{font-weight:400; font-size:32px;}
				#visual_inner .li3 .text em{width:78%; padding-top:10px;}
				
			/*2. 타임세일*/
				#time_wrap{height:300px;}
				#timeSale .title{width:100%; height:30px; padding:10px 0; float:none; background-color:#fff; text-align:center;}
				#timeSale .title h2{padding-left:10px; font-size:20px; text-align:right; line-height:30px; background-image:none; float:left;}
				#timeSale .title .btn{display:none;}
				#timeSale .title h2 br{display:none;}
				#timeSale .title h2 span{padding-right:10px;}
				#timeSale .title .desc{padding-top:0px; text-align:left; line-height:26px; font-size:11px; text-indent:10px; color:#777; float:left;}
				#timeSale .title .timeBar{display:none;}
				

				#timeSale .itemArea{width:100%; margin:0; padding:20px 0px; float:none; overflow-x:auto; overflow-y:hidden;}
				#timeSale .itemArea ul{width:1440px;}
				#timeSale .itemArea li{width:140px; padding:0 10px; height:100%;}
				#timeSale .itemArea a .img{height:140px; border-radius:70px; overflow:hidden;}
				#timeSale .itemArea a .text strong{height:18px; font-size:13px;}

			/*3.newBanner*/
				#newBanner_wrap{height:90px; padding:0; margin:30px 0;}
				#newBanner{width:98%; margin:0 auto; background-color:#00564d; border-radius:10px; position:relative;}
				#newBanner p{width:100%; height:100%; margin:0; background:none}
				#newBanner p a{display:block; width:100%; height:100%; color:#fff;}
				#newBanner p a strong{display:block; width:50%; height:20px; line-height:20px; padding-left:10%; padding-top:10px; float:none; font-size:12px; color:#ffcc32;}
				#newBanner p a em{display:block; width:50%; padding-left:10%; height:60px; line-height:20px; padding-top:0px; float:left; font-style:normal;}
				#newBanner p a b{display:inline-block; padding-left:0px; font-size:20px;}
				#newBanner p a span{width:30%; height:100%; float:none; position:absolute; right:0; bottom:0;}
				#newBanner p a span img{position:absolute; right:20%; bottom:0; max-width:140px;}
			
			/*4. sale*/
				#sale_wrap{padding-bottom:0px; height:350px;}
				#sale{width:100%; margin:0;}

				#sale .title{width:100%; padding-left:0px; float:none;}
				#sale .title h2{font-size:20px; text-indent:10px;}
				#sale .title .desc{width:100%; padding-top:0px;  font-size:14px; text-indent:10px;}
				#sale .title .button{width:100%; padding-top:5px;}
				#sale .title .button br{display:none;}
				#sale .title .button a{display:inline-block; height:20px; line-height:20px; border-radius:10px; margin-left:10px; font-size:11px;}

				/*itemArea*/
				#sale .itemArea{width:100%; height:218px; padding-top:10px; overflow-x:auto; overflow-y:hidden; float:none;}

				#sale .itemArea ul{width:1450px;}
				#sale .itemArea li{width:150px; height:100%; padding-left:10px; padding-bottom:10px;}
				#sale .itemArea li .imgLink{ height:150px;}
				#sale .itemArea li .imgLink .dC{width:36px; line-height:36px; font-size:14px; border-radius:18px;}
				#sale .itemArea li .imgLink .tasty{width:50px; bottom:0px;}

				#sale .itemArea li .text{padding-top:5px;}
				#sale .itemArea li .textLink{font-size:13px;}
		
			/*5. vote - 삭제*/
			/*6. pick_wrap*/
				#pick_wrap{padding-top:0px;}
				#pick{width:100%;margin:0;}				
				#pick h2{padding-left:10px; padding-bottom:10px; font-size:20px;}
				#pick .itemArea{width:100%;}
				#pick .itemArea ul{width:100%; overflow:hidden; margin:0;}
				#pick .itemArea li{width:48%; height:auto;
					margin:0 1% 10px;
				}
				
				#pick .itemArea li a .imgs{height:auto;}
				#pick .itemArea li a img{transform:translatey(0px);}
				#pick .itemArea li a .text{height:60px; font-size:12px; line-height:20px;}
				#pick .itemArea li a:hover img{transform:translatey(0px);}
		
			/*7. review*/
				#review_wrap{height:auto; padding:30px 0 70px;}
				#review{width:100%; margin:0;}			
				#review .title{height:60px;}
				#review .itemArea{width:100%; height:auto; margin:0;}			
				#review .button{display:none;}
				
				#review .itemArea .film{width:100%;}
				#review .itemArea .scene{width:100%; display:none;}
				#review .itemArea .scene:first-child{display:block;}
				#review .itemArea .scene li{width:33%; height:auto;}
				#review .itemArea .scene li:last-child{display:none;}
				
			
			/*8. world*/
				#world_wrap{width:100%; height:480px; 
				background-image:url('img/world/world_background_m.jpg'); background-size:auto;}
				#world{width:100%; margin:0;}

				#world h2{font-size:20px; line-height:26px; text-align:left; padding:30px 0 0 5%; position:static;}
				#world ul{width:90%; margin:0 auto;}
				#world li{position:relative; background-color:#fff; margin-top:10px;}
				
				#world li p{width:60px; height:40px; text-align:center; position:absolute; overflow:hidden; background-color:#f00;}
				#world li p img{width:auto; height:40px;}
				#world li a{display:block; width:100%; height:100%; position:static;}
				#world li a strong{display:block; padding-top:10px;}
				#world li a br{display:none;}
				
				/* li 사이즈, 포지션 개별작업*/
					#world .li0{width:100%; height:60px;  left:0; top:0;}		
					#world .li0 a{width:100%; height:100%; background:none;}
					#world .li0 p{right:5%; bottom:10px; left:auto;}
					
					#world .li1{width:100%; height:60px;  left:0; top:0;}		
					#world .li1 a{width:100%; height:100%; background:none;}
					#world .li1 p{right:5%; bottom:10px; top:auto; left:auto;}
					
					#world .li2{width:100%; height:60px;  left:0; top:0;}		
					#world .li2 a{width:100%; height:100%; background:none;}
					#world .li2 p{right:5%; bottom:10px; top:auto;}

					#world .li3{width:100%; height:60px;  left:0; top:0;}		
					#world .li3 a{width:100%; height:100%; background:none;}
					#world .li3 p{right:5%; bottom:10px; left:auto;}

					#world .li4{width:100%; height:60px;  left:0; top:0;}		
					#world .li4 a{width:100%; height:100%; background:none;}
					#world .li4 p{right:5%; bottom:10px;}
				
				/* li 내 텍스트*/
					#world li a .text{padding-top:2px; padding-left:5%; font-size:12px; position:static;}
					#world li a .text strong{font-size:16px;}
					#world .li0 a .text{text-align:left;}
					#world .li1 a .text{text-align:left;}

			/*9. taste*/
				#taste_wrap{width:100%; height:300px; padding-top:50px; overflow:hidden;}
				#taste{width:90%;}

				#taste .title{width:100%; height:80px; border-right:none; float:none;}
				#taste .title .text{height:40px; text-align:left; padding-right:0px; padding-bottom:0px;}
				#taste .title .text h2{height:100%; text-indent:10px; font-size:20px; float:left;}
				#taste .title .desc{height:100%; line-height:20px; text-indent:5px; font-size:12px; font-weight:400; float:left;}
				#taste .title .desc strong{font-weight:400;}
				
				#taste .title .nav{width:100%; height:38px;  overflow-x:auto; overflow-y:hidden;}
				#taste .title .pcNav{display:none;}
				#taste .title .mobNav{display:block; width:660px; height:100%; position:relative;}
				#taste .title .mobNav li{
					width:18%; height:37px;
					padding:0 1%; line-height:40px;
					text-align:center; font-size:14px;
					float:left; border-bottom:1px solid #ccc;
				}
				#taste .title .mobNav li a,#taste .title .mobNav .li0 a{display:block; width:100%; height:100%; background:none; transition:none; color:#333;}
				
				/*li 기능*/
				#taste .title .mobNav li a:hover{width:100%; background:none; color:#00564d;}

				/*##### itemArea #####*/
				#taste .itemArea{width:100%; height:200px; float:none; overflow-x:auto; overflow-y:hidden;}
				#taste .itemArea ul{width:660px; height:100%;}
				#taste .itemArea li{width:120px; height:100%; padding-left:10px; float:left;}			
				#taste .itemArea li a{display:block; width:100%; height:100%; overflow:visible; position:static;}
				#taste .itemArea li a span{display:block; width:100%; height:auto;}
				#taste .itemArea li a .img{width:100%; height:120px; transition:transform 0.5s ease-out;}
				#taste .itemArea li a .img img{width:100%;}
				#taste .itemArea li a .text{width:100%;	
					height:80px; padding:0px; padding-top:5px;
					background-color:rgba(255,255,255,1); color:#333;
					font-size:12px;
					position:static;
					display:block;
				}
				#taste .itemArea li a .text strong{font-weight:400;}
				#taste .itemArea li a:hover .img{transform:scale(1);}
				
				#taste .itemArea li a .text .title{padding-bottom:0; height:32px; overflow:hidden;}
				#taste .itemArea li a .text .desc{display:none;}
				#taste .itemArea li a .text .price{position:static; padding-top:5px; font-family:'score700'; font-size:14px; color:#00564d;}
				
				/*큰 li 개별작업 (.big)*/
				#taste .itemArea .big{width:120px; height:100%; padding-left:10px;}
				#taste .itemArea .big a .text{width:100%;	
					height:80px; padding:0px; padding-top:5px;
					background-color:rgba(255,255,255,1); color:#333;
					font-size:12px;
					position:static;
				}

			/*10.testBanner*/
				#testBanner{width:95%;}
				#testBanner p{border-radius:5px;}

			/*11. combi */
				#combi_wrap{display:none;}

			/*13. friends*/
				#friends_wrap{display:none;}

			/*14. pondue*/
				#pondue_wrap{height:340px;  background-size:100%;
				margin-top:80px; background-repeat:no-repeat;
				background-position:10% 0;}
				#pondue{width:100%; max-width:500px;}
				#pondue .left{display:none;}				
				#pondue .right{width:96%; padding:25px 2% 0; float:none;}				
				#pondue .right .title{height:100px; font-size:12px;}
				#pondue .right .title h2{font-size:20px; padding-bottom:5px;}

				#pondue .itemArea{width:100%; height:90px; padding-top:30px;}
				#pondue .itemArea ul{width:100%; height:100%;}
				#pondue .itemArea li{width:30%; height:100%; margin-right:3%; float:left;}
				#pondue a{border-radius:5px; position:static;}
				#pondue a .desc{display:none;}

			/*15. bestHot*/
				#bestHot_wrap{height:auto; padding-top:0px;}
				#bestHot{width:95%;}

				#bestHot h2{font-size:20px; font-weight:400;}
				#bestHot h2 i,#bestHot h2 b{padding-left:0;}

				#best{width:100%; height:auto; padding-left:0px; float:none;}
				#best section{width:100%; height:auto; padding:0; border:none;}
				#best ul{width:100%; height:auto;}
				
				#best li{width:48%; padding:1%; padding-top:15px; height:auto;}
				#best li .imgLink{width:100%; height:auto;}
				#best li .imgLink a img{width:100%; transform:translatey(0);}

				#best ul:after{content:"";display:block;clear:both;}

				#hot{display:none;}

			/*#### 16. bisDel_wrap ####*/
				#bisDel_wrap{height:250px; padding-top:50px;}
				#bisDel{width:100%; margin:0;}
				
				#bisDel h2{position:absolute; left:-9999px; width:1px; height:1px; font-size:1px; line-height:0; overflow:hidden;}
				#bisDel div{width:46%; padding:0 2%; float:left;}
				#bisDel div p{width:100%; height:192px; background-position:50% 50%; background-size:auto 140%; border-radius:10px;}
				#bisDel div p a{display:block; width:100%; height:100%; margin-top:0px; text-align:center;}
				#bisDel div p a .imgs{width:100%; height:80px; padding:0; padding-top:10px; float:none;}
				#bisDel div p a .text{display:block; width:100%; height:121px; line-height:40px; padding:0; padding-top:10px; font-size:30px; float:none;}
			
			/*18. footer*/
				#footer{height:auto; padding-bottom:50px; background-color:#eee; text-align:center;}
				#footer_desc_wrap{width:100%; height:auto; padding:20px 0 10px;}
				#footer_desc{width:100%; height:100%; margin:0;}

				#footer_desc div{width:90%; padding:0 5%;
					height:100%; line-height:20px;
					border-left:1px solid #ccc;
					font-size:12px; color:#666;
					float:none;
				}
				#footer_desc div h3{font-size:14px; padding-bottom:5px;}

				/*개별1_cs*/
				#footer_desc .cs .call{line-height:34px; margin-bottom:5px; text-indent:20px; font-size:24px;}
				#footer_desc .cs .desc span{display:inline-block;}
				#footer_desc .cs .desc span:first-child{margin-right:10px;}
				#footer_desc .bank,#footer_desc .board{display:none;}

				#footer_nav_wrap{height:30px; line-height:26px; border:none; background:none; border-top:1px solid #ccc; border-bottom:1px solid #ccc;}
				#footer_nav{width:90%; padding:0 5%; margin:0;}
				#footer_nav ul{width:100%; padding-left:0px;}
				#footer_nav ul li{font-size:10px;}
				#footer_nav ul li a{padding:0; font-size:10px;}

				#footer_info_wrap{height:auto; background:none;}
				#footer_info_wrap .more_mob{display:block; width:100%; padding:10px 0; font-weight:700; font-size:10px; text-align:center;}
				#footer_info_wrap .more_mob span{display:inline-block; height:10px; padding-left:5px;}
				#footer_info_wrap .more_mob img{height:100%;}

				#footer_info{width:100%; margin:0; display:none;}

				#footer_info h2{display:none;}
				#footer_info div{float:none;}
				
				#footer_info .desc{width:90%; height:100%; padding:0 5%; font-size:10px; line-height:18px;}
				#footer_info .desc ul{width:100%;}

				#footer_info .pay{display:none;}
		}
	
	/*##### 미디어쿼리 - 폰세로 #####*/
		@media all and (min-width:320px) and (max-width:480px){
			#top,#top_banner,#header,#visual_inner .left, #visual_inner .right,#vote_wrap{display:none;}
			#visual_inner,#timeSale{width:100%;}

			/*0.헤더*/
				#mobHeader{display:block; height:100%;}

				#mobHeader .top{background-color:#fff; width:100%; height:30px; padding:10px 0; position:fixed; top:0; left:0; z-index:1;}
				#mobHeader .top .logo{width:130px; height:100%;  margin:0 auto;}
				#mobHeader .top .logo a{display:block; width:100%; height:100%;}
				#mobHeader .top .logo a img{width:100%;}

				#mobHeader .bottom{background-color:#fff; width:100%; height:50px; position:fixed; bottom:0; left:0; z-index:1; border-top:1px solid #ccc;}
				#mobHeader .bottom ul{width:100%; height:40px; padding:5px 0;}
				#mobHeader .bottom li{width:25%; float:left; text-align:center; font-size:10px;}

				.allBack{width:100%; height:100%; position:fixed; left:0; top:0; background-color:rgba(0,0,0,0.5); z-index:9; display:none;}
				#mobSearchArea{width:100%; height:70px; position:fixed; left:0; top:-70px; background-color:#00564d; z-index:9; transition:top 0.5s;}
				#mobSearchArea form{width:100%; height:100%;}
				#mobSearchArea fieldset{width:100%; height:100%; border:none;}
				#mobSearchArea legend{display:none;}
				#mobSearchArea p{width:98%; height:100%; padding-left:2%; line-height:60px;}
				#mobSearchArea p input{width:85%; height:50px; margin:10px 0; border:none; text-indent:10px;}
				#mobSearchArea p span{display:inline-block; width:15%; color:#fff; text-align:center; cursor:pointer;}
			
			#container{padding-top:50px;}

			/*1. 메인비쥬얼*/
				#visual{width:100%; height:350px; background-color:#cae4f1; position:relative;}
				#visual_inner .slidingWindow{width:100%; height:100%; overflow-x:auto; overflow-y:hidden;}
				#visual_inner .slidingWindow li{ overflow:hidden;}
				#visual_inner .slidingWindow li img{width:auto; height:100%; transform:translatex(-40%);}
				
				#visual_inner .li0 .text{width:185px; height:130px; padding:5px; font-size:14px; left:10px; background-color:rgba(255,255,255,0.3);}
				#visual_inner .li0 .text em{ padding-top:10px; line-height:30px;}
				#visual_inner .li0 .text b{font-size:32px;}

				#visual_inner .li1 .text{width:250px; height:100px; font-size:14px; left:10px;}
				#visual_inner .li1 .text em{padding-top:5px; line-height:36px; font-size:30px;}

				#visual_inner .li2 .text{width:100%; height:100%; color:#fff;}
				#visual_inner .li2 .text em{width:240px; height:130px; top:25%; line-height:70px; font-size:60px;}
				#visual_inner .li2 .text b{
					width:100%; 
					line-height:18px;
					font-weight:400;
					font-size:11px; left:0; top:70%;
					transform:translatex(0);}
				#visual_inner .li2 .text b br:first-child{display:block;}

				#visual_inner .li3 .text{width:100%; height:142px; font-size:14px; left:10px;}		
				#visual_inner .li3 .text b{font-weight:400; font-size:32px;}
				#visual_inner .li3 .text em{width:78%; padding-top:10px;}
				
			/*2. 타임세일*/
				#time_wrap{height:300px;}
				#timeSale .title{width:100%; height:30px; padding:10px 0; float:none; background-color:#fff; text-align:center;}
				#timeSale .title h2{padding-left:10px; font-size:20px; text-align:right; line-height:30px; background-image:none; float:left;}
				#timeSale .title .btn{display:none;}
				#timeSale .title h2 br{display:none;}
				#timeSale .title h2 span{padding-right:10px;}
				#timeSale .title .desc{padding-top:0px; text-align:left; line-height:26px; font-size:11px; text-indent:10px; color:#777; float:left;}
				#timeSale .title .timeBar{display:none;}
				

				#timeSale .itemArea{width:100%; margin:0; padding:20px 0px; float:none; overflow-x:auto; overflow-y:hidden;}
				#timeSale .itemArea ul{width:1440px;}
				#timeSale .itemArea li{width:140px; padding:0 10px; height:100%;}
				#timeSale .itemArea a .img{height:140px; border-radius:70px; overflow:hidden;}
				#timeSale .itemArea a .text strong{height:18px; font-size:13px;}

			/*3.newBanner*/
				#newBanner_wrap{height:90px; padding:0; margin:30px 0;}
				#newBanner{width:98%; margin:0 auto; background-color:#00564d; border-radius:10px; position:relative;}
				#newBanner p{width:100%; height:100%; margin:0; background:none}
				#newBanner p a{display:block; width:100%; height:100%; color:#fff;}
				#newBanner p a strong{display:block; width:68%; height:20px; line-height:20px; padding-left:2%; padding-top:10px; float:none; font-size:12px; color:#ffcc32;}
				#newBanner p a em{display:block; width:68%; padding-left:2%; height:60px; line-height:20px; padding-top:0px; float:left; font-style:normal;}
				#newBanner p a b{display:inline-block; padding-left:0px; font-size:20px;}
				#newBanner p a span{width:30%; height:100%; float:none; position:absolute; right:0; bottom:0;}
				#newBanner p a span img{position:absolute; right:2%; bottom:0;}
			
			/*4. sale*/
				#sale_wrap{padding-bottom:0px; height:350px;}
				#sale{width:100%; margin:0;}

				#sale .title{width:100%; padding-left:0px; float:none;}
				#sale .title h2{font-size:20px; text-indent:10px;}
				#sale .title .desc{width:100%; padding-top:0px;  font-size:14px; text-indent:10px;}
				#sale .title .button{width:100%; padding-top:5px;}
				#sale .title .button br{display:none;}
				#sale .title .button a{display:inline-block; height:20px; line-height:20px; border-radius:10px; margin-left:10px; font-size:11px;}

				/*itemArea*/
				#sale .itemArea{width:100%; height:218px; padding-top:10px; overflow-x:auto; overflow-y:hidden; float:none;}

				#sale .itemArea ul{width:1450px;}
				#sale .itemArea li{width:150px; height:100%; padding-left:10px; padding-bottom:10px;}
				#sale .itemArea li .imgLink{ height:150px;}
				#sale .itemArea li .imgLink .dC{width:36px; line-height:36px; font-size:14px; border-radius:18px;}
				#sale .itemArea li .imgLink .tasty{width:50px; bottom:0px;}

				#sale .itemArea li .text{padding-top:5px;}
				#sale .itemArea li .textLink{font-size:13px;}
		
			/*5. vote - 삭제*/
			/*6. pick_wrap*/
				#pick_wrap{padding-top:0px;}
				#pick{width:100%;margin:0;}				
				#pick h2{padding-left:10px; padding-bottom:10px; font-size:20px;}
				#pick .itemArea{width:100%;}
				#pick .itemArea ul{width:100%; overflow:hidden; margin:0;}
				#pick .itemArea li{width:100%; height:210px;
					margin-left:0px; margin-bottom:10px;
					float:none;
				}
				
				#pick .itemArea li a .imgs{height:150px;}
				#pick .itemArea li a img{transform:translatey(-30px);}
				#pick .itemArea li a .text{height:40px; font-size:12px; line-height:20px;}
				#pick .itemArea li a:hover img{transform:translatey(-30px);}
		
			/*7. review*/
				#review_wrap{height:auto; padding:30px 0 70px;}
				#review{width:100%; margin:0;}			
				#review .title{height:60px;}
				#review .itemArea{width:100%; height:auto; margin:0;}			
				#review .button{display:none;}
				
				#review .itemArea .film{width:100%;}
				#review .itemArea .scene{width:100%; display:none;}
				#review .itemArea .scene:first-child{display:block;}
				#review .itemArea .scene li{width:33%; height:auto;}
				#review .itemArea .scene li:last-child{display:none;}
				
			
			/*8. world*/
				#world_wrap{width:100%; height:480px; 
				background-image:url('img/world/world_background_m.jpg'); background-size:auto;}
				#world{width:100%; margin:0;}

				#world h2{font-size:20px; line-height:26px; text-align:left; padding:30px 0 0 5%; position:static;}
				#world ul{width:90%; margin:0 auto;}
				#world li{position:relative; background-color:#fff; margin-top:10px;}
				#world li p{width:12%; position:absolute;}
				#world li p img{width:100%;}
				#world li a{display:block; width:100%; height:100%; position:static;}
				
				/* li 사이즈, 포지션 개별작업*/
					#world .li0{width:100%; height:60px;  left:0; top:0;}		
					#world .li0 a{width:100%; height:100%; background:none;}
					#world .li0 p{right:5%; bottom:0; left:auto;}
					
					#world .li1{width:100%; height:60px;  left:0; top:0;}		
					#world .li1 a{width:100%; height:100%; background:none;}
					#world .li1 p{right:5%; bottom:0; top:auto; left:auto;}
					
					#world .li2{width:100%; height:60px;  left:0; top:0;}		
					#world .li2 a{width:100%; height:100%; background:none;}
					#world .li2 p{right:5%; bottom:0; top:auto;}

					#world .li3{width:100%; height:60px;  left:0; top:0;}		
					#world .li3 a{width:100%; height:100%; background:none;}
					#world .li3 p{right:5%; bottom:0; left:auto;}

					#world .li4{width:100%; height:60px;  left:0; top:0;}		
					#world .li4 a{width:100%; height:100%; background:none;}
					#world .li4 p{right:5%; bottom:0;}
				
				/* li 내 텍스트*/
					#world li a .text{padding-top:2px; padding-left:5%; font-size:12px; position:static;}
					#world li a .text strong{font-size:16px;}
					#world .li0 a .text{text-align:left;}
					#world .li1 a .text{text-align:left;}

			/*9. taste*/
				#taste_wrap{height:300px; padding-top:50px;}
				#taste{width:100%; margin:0;}

				#taste .title{width:100%; height:80px; border-right:none; float:none;}
				#taste .title .text{height:40px; text-align:left; padding-right:0px; padding-bottom:0px;}
				#taste .title .text h2{height:100%; text-indent:10px; font-size:20px; float:left;}
				#taste .title .desc{height:100%; line-height:20px; text-indent:5px; font-size:12px; font-weight:400; float:left;}
				#taste .title .desc strong{font-weight:400;}
				
				#taste .title .nav{width:100%; height:38px;  overflow-x:auto; overflow-y:hidden;}
				#taste .title .pcNav{display:none;}
				#taste .title .mobNav{display:block; width:622px; height:100%; position:relative;}
				#taste .title .mobNav li{
					height:37px;
					padding:0 10px; line-height:40px;
					text-align:center; font-size:14px;
					float:left; border-bottom:1px solid #ccc;
				}
				#taste .title .mobNav li a,#taste .title .mobNav .li0 a{display:block; width:100%; height:100%; background:none; transition:none; color:#333;}
				
				/*li 기능*/
				#taste .title .mobNav li a:hover{width:100%; background:none; color:#00564d;}

				/*##### itemArea #####*/
				#taste .itemArea{width:100%; height:200px; float:none; overflow-x:auto; overflow-y:hidden;}
				#taste .itemArea ul{width:660px; height:100%;}
				#taste .itemArea li{width:120px; height:100%; padding-left:10px; float:left;}			
				#taste .itemArea li a{display:block; width:100%; height:100%; overflow:visible; position:static;}
				#taste .itemArea li a span{display:block; width:100%; height:auto;}
				#taste .itemArea li a .img{width:100%; height:120px; transition:transform 0.5s ease-out;}
				#taste .itemArea li a .img img{width:100%;}
				#taste .itemArea li a .text{width:100%;	
					height:80px; padding:0px; padding-top:5px;
					background-color:rgba(255,255,255,1); color:#333;
					font-size:12px;
					position:static;
					display:block;
				}
				#taste .itemArea li a .text strong{font-weight:400;}
				#taste .itemArea li a:hover .img{transform:scale(1);}
				
				#taste .itemArea li a .text .title{padding-bottom:0; height:32px; overflow:hidden;}
				#taste .itemArea li a .text .desc{display:none;}
				#taste .itemArea li a .text .price{position:static; padding-top:5px; font-family:'score700'; font-size:14px; color:#00564d;}
				
				/*큰 li 개별작업 (.big)*/
				#taste .itemArea .big{width:120px; height:100%; padding-left:10px;}
				#taste .itemArea .big a .text{width:100%;	
					height:80px; padding:0px; padding-top:5px;
					background-color:rgba(255,255,255,1); color:#333;
					font-size:12px;
					position:static;
				}
				/*#taste .itemArea .big a .text .desc{display:none;}
				#taste .itemArea .big a .text .price{padding-top:5px; font-family:'score700'; font-size:14px; color:#00564d;}*/

			/*10.testBanner ***************** 날리자! 배너로 서브페이지 고!*/
				#testBanner_wrap{height:100px;}
				#testBanner{width:95%;}
				#testBanner p{background:none; background-color:#dfdfdf; border-radius:10px;}
				#testBanner p a{height:80px; padding-top:20px; text-align:center; line-height:30px; background:none;}		
				#testBanner p a i{font-size:14px;}
				#testBanner p a span{font-size:18px;}

			/*11. combi ***************** 날리자! 배너로 서브페이지 고!*/
				#combi_wrap{height:450px; padding:80px 0 50px; display:none;}
				#combi{width:100%; margin:0;}
				#combi h2{position:absolute; left:-9999px; width:1px; height:1px; font-size:1px; line-height:0; overflow:hidden;}

				#combi ul{width:100%; height:300px; margin:0 auto;}
				#combi li{width:48%; height:48%; margin:1%; float:left; background-color:#fff; border-radius:10px;}
				#combi .mobTitle{display:block; font-size:20px; text-transform:uppercase; position:relative;}
				#combi .mobTitle p{position:absolute; left:10px; top:50%; transform:translatey(-50%);}
				
				#combi .li0{background-size:130%;}
				#combi .li1{background-size:100%;}
				#combi .li3{background-size:100%;}
				#combi .li4{background-size:100%;}

			/*13. friends ********** 날리자! 배너로 서브페이지 고*/
				#friends_wrap{height:1070px; padding-top:0px; display:none;}
				#friends{width:100%; margin:0;}

				#friends .title{text-transform:uppercase; text-align:center; padding:10px 0; margin-bottom:30px; background-color:#00564d; color:#fff; font-size:13px;}

				#friends section{width:100%; height:320px;}
				#friends section .titleArea{width:100%; padding-right:0px; height:30px; text-align:left; float:none;}
				#friends section .titleArea h2{font-size:18px; font-weight:400; text-indent:10px;}
				#friends section .titleArea h2 span{display:inline; padding-left:5px;}
				#friends section .titleArea p{display:none;}
				#friends section .itemArea{width:100%; height:290px; float:none; position:static; overflow-x:auto; overflow-y:hidden;}

				#friends .itemArea .buttonL,#friends .itemArea .buttonR {display:none;}
				
				/*ul*/
				#friends .itemArea .screen{width:100%; margin-left:0; overflow-x:auto; overflow-y:hidden;}
				#friends .itemArea ul{width:1440px;}

				#friends .itemArea li{width:150px; height:100%; padding:0; padding-left:10px; float:left;}

				#friends .itemArea li .imgLink{width:100%;}
				#friends .itemArea li .imgLink img{width:100%;}

				#friends .itemArea li .text{width:100%; line-height:20px; padding-top:10px;}
				#friends .itemArea li .textLink{font-size:13px; height:20px; overflow:hidden; font-family:'score700';}
				#friends .itemArea li .desc{height:40px; padding-top:5px; line-height:18px; font-size:12px; color:#777; overflow:hidden;}
				#friends .itemArea li .price .line{font-size:12px; text-decoration:line-through; padding-right:10px; color:#aaa;}
				#friends .itemArea li .price .green{font-size:14px; color:#00564d;}

			/*14. pondue*/
				#pondue_wrap{height:340px;  background-size:200%; margin-top:80px; background-repeat:no-repeat;
				background-position:10% 0;}
				#pondue{width:100%; margin:0;}
				#pondue .left{display:none;}				
				#pondue .right{width:96%; padding:25px 2% 0; float:none;}				
				#pondue .right .title{height:100px; font-size:12px;}
				#pondue .right .title h2{font-size:20px; padding-bottom:5px;}

				#pondue .itemArea{width:100%; height:90px; padding-top:30px;}
				#pondue .itemArea ul{width:100%; height:100%;}
				#pondue .itemArea li{width:30%; height:100%; margin-right:3%; float:left;}
				#pondue a{border-radius:5px; position:static;}
				#pondue a .desc{display:none;}

			/*15. bestHot *************** best는 3*3, hot은 텍스트로 재디자인*/
				#bestHot_wrap{height:auto; padding-top:0px;}
				#bestHot{width:100%; margin:0;}

				#bestHot h2{font-size:20px; font-weight:400;}
				#bestHot h2 i,#bestHot h2 b{padding-left:0;}

				#best{width:100%; height:auto; padding-left:0px; float:none;}
				#best section{width:100%; height:auto; padding:0; border:none; overflow-x:auto; overflow-y:hidden;}
				#best ul{width:100%; height:auto;}
				#best li{width:48%; padding:1%; padding-top:15px; height:auto;}
				#best li .imgLink{width:100%; height:auto;}
				#best li .imgLink a img{width:100%; transform:translatey(0);}

				#best li .text{height:auto;}
				#best li .text .textLink{height:20px; overflow:hidden;}
				#best li .text a{font-size:13px; height:20px;}
				#best li .text .desc{height:40px; font-size:11px;}
				#best li .text .price .line{font-size:10px; padding-right:5px;}
				#best li .text .price .green{font-size:13px;}
				
				#best ul:after{content:"";display:block;clear:both;}

				#hot{display:none;}

			/*#### 16. bisDel_wrap ####*/
				#bisDel_wrap{height:250px; padding-top:50px;}
				#bisDel{width:100%; margin:0;}
				
				#bisDel h2{position:absolute; left:-9999px; width:1px; height:1px; font-size:1px; line-height:0; overflow:hidden;}
				#bisDel div{width:46%; padding:0 2%; float:left;}
				#bisDel div p{width:100%; height:192px; background-position:50% 50%; background-size:auto 140%; border-radius:10px;}
				#bisDel div p a{display:block; width:100%; height:100%; margin-top:0px; text-align:center;}
				#bisDel div p a .imgs{width:100%; height:80px; padding:0; padding-top:10px; float:none;}
				#bisDel div p a .text{display:block; width:100%; height:121px; line-height:40px; padding:0; padding-top:10px; font-size:30px; float:none;}
			
			/*18. footer*/
				#footer{height:auto; padding-bottom:50px; background-color:#eee; text-align:center;}
				#footer_desc_wrap{width:100%; height:auto; padding:20px 0 10px;}
				#footer_desc{width:100%; height:100%; margin:0;}

				#footer_desc div{width:90%; padding:0 5%;
					height:100%; line-height:20px;
					border-left:1px solid #ccc;
					font-size:12px; color:#666;
					float:none;
				}
				#footer_desc div h3{font-size:14px; padding-bottom:5px;}

				/*개별1_cs*/
				#footer_desc .cs .call{line-height:34px; margin-bottom:5px; text-indent:20px; font-size:24px;}
				#footer_desc .cs .desc span{display:inline-block;}
				#footer_desc .cs .desc span:first-child{margin-right:10px;}
				#footer_desc .bank,#footer_desc .board{display:none;}

				#footer_nav_wrap{height:30px; line-height:26px; border:none; background:none; border-top:1px solid #ccc; border-bottom:1px solid #ccc;}
				#footer_nav{width:90%; padding:0 5%; margin:0;}
				#footer_nav ul{width:100%; padding-left:0px;}
				#footer_nav ul li{font-size:10px;}
				#footer_nav ul li a{padding:0; font-size:10px;}

				#footer_info_wrap{height:auto; background:none;}
				#footer_info_wrap .more_mob{display:block; width:100%; padding:10px 0; font-weight:700; font-size:10px; text-align:center;}
				#footer_info_wrap .more_mob span{display:inline-block; height:10px; padding-left:5px;}
				#footer_info_wrap .more_mob img{height:100%;}

				#footer_info{width:100%; margin:0; display:none;}

				#footer_info h2{display:none;}
				#footer_info div{float:none;}
				
				#footer_info .desc{width:90%; height:100%; padding:0 5%; font-size:10px; line-height:18px;}
				#footer_info .desc ul{width:100%;}

				#footer_info .pay{display:none;}
		}
  </style>
  <script>
		jQuery(document).ready(function(){
			// 필요변수모음
			var bodyW = $("body").width();
			console.log("첫 바디너비 : "+bodyW);
			$(window).resize(function(){
				bodyW = $("body").width();
				//console.log("리사이즈 바디너비 : "+bodyW);
			});

			/*##### 탑배너 #####*/
			jQuery("#top_banner .btn a").click(function(){
				jQuery("#top_banner").slideUp(500,"swing",function(){
					jQuery("#dropArea").css("top","160px");
				});
			});

			/*gnb드랍 기능 - 탭*/
			jQuery("#bar a").on('focus', function(){
				jQuery("#dropArea").css({"height":"306px"});
			});
			jQuery("#dropArea a:last").on('blur', function(){
				jQuery("#dropArea").css({"height":"0"});
			});
			/*gnb드랍 기능 - 마우스*/
			jQuery("#gnb").mouseover(function(){
				jQuery("#dropArea").css({"height":"306px"});
			}).mouseout(function(){
				jQuery("#dropArea").css({"height":"0"});
			});

			// 모바일 검색창
			jQuery(".bottom .search").click(function(){
				jQuery(".allBack").css({"height":$("body").height()}).fadeIn();
				jQuery("#mobSearchArea").css({"top":"0"});
				jQuery("body").css({"height":"100%","overflow":"hidden"});
			});

			jQuery(".allBack, #mobSearchArea span").click(function(){
				jQuery(".allBack").fadeOut();
				jQuery("#mobSearchArea").css({"top":"-70px"});
				jQuery("body").css({"height":"auto","overflow":"auto"});
			});

			/*#### 1. mainVisual / 슬라이딩윈도우 ####*/
			// 슬라이딩윈도우 하단버튼 ....
            $("#visual_inner .button1 a").click(function(){
                $("#visual_inner .button1 a").removeClass("selected");
                $(this).addClass("selected");
                
				var sBtnNum = $(this).attr("title").substring(5);
				//alert(sBtnNum);
				$("#visual_inner .slidingWindow ul li").hide();
                $("#visual_inner .slidingWindow ul .li"+sBtnNum).stop().fadeIn(1000);
                $("#visual").css({"backgroundColor":$("#visual_inner .slidingWindow ul .li"+sBtnNum).css("backgroundColor")});
            });

			// 좌우버튼
			var slideOnf = true;
			$("#visual_inner .right").click(function(){		
				if($("#visual_inner .button1 .selected").attr("title")=="slide3"){
					slideOnf = false;
				}
				//console.log(slideOnf);
				if(slideOnf==true){
					$("#visual_inner .button1 .selected").next().click();
				}
				else{
					$("#visual_inner .button1 a:first").click();
					slideOnf = true;
				}
			});
			$("#visual_inner .left").click(function(){
				if($("#visual_inner .button1 .selected").attr("title")=="slide0"){
					slideOnf = false;
				}
				//console.log(slideOnf);
				if(slideOnf==true){
					$("#visual_inner .button1 .selected").prev().click();
				}
				else{
					$("#visual_inner .button1 a:last").click();
					slideOnf = true;
				}
			});

			// 셋 인터벌
			setInterval(function(){
				$("#visual_inner .right").click();
			},10000);

			
			/*#### 2. timeSale / 슬라이딩윈도우 자동! 반응형에서 없애야 함! ####*/
			// 셋 인터벌
			var timeSale = setInterval(function(){
				jQuery("#timeSale .itemArea ul").animate({"marginLeft":"-720px"},500,"swing",function(){
					jQuery("#timeSale .itemArea ul").append($("#timeSale .itemArea li:lt(3)"));
					jQuery("#timeSale .itemArea ul").css({"marginLeft":"0"});
				});
			}, 10000);
            
			// 재생멈춤버튼
			var onfpp = true;
			$("#timeSale .title .btn a").click(function(){
				if(onfpp==true){
					$("#timeSale .title .btn img").css({"transform":"translatex(0)"});
					$("#timeSale .title .timeBar .color").css({"animation":"none"});
					$("#timeSale .title .timeBar .icon").css({"animation":"none"});

					clearInterval(timeSale);

					onfpp = false;
				}
				else{
					$("#timeSale .title .btn img").css({"transform":"translatex(-50%)"});
					$("#timeSale .title .timeBar .color").css({"animation":"aniBar 10s infinite"});
					$("#timeSale .title .timeBar .icon").css({"animation":"aniIcon 10s infinite"});
					
					timeSale = setInterval(function(){
						jQuery("#timeSale .itemArea ul").animate({"marginLeft":"-720px"},500,"swing",function(){
							jQuery("#timeSale .itemArea ul").append($("#timeSale .itemArea li:lt(3)"));
							jQuery("#timeSale .itemArea ul").css({"marginLeft":"0"});
						});
					}, 10000);

					onfpp = true;
				}
				//console.log(onfpp);
			});

			// 모바일에서 인터벌 없애기
			if(bodyW>=320 && bodyW<=480){
				clearInterval(timeSale);
			}

            /*#### 4. Sale 탭베이직 ####*/
			/*탭 클릭시 색상+상품노출*/
			jQuery("#sale .button a").click(function(){
				jQuery("#sale .button a").removeClass("selected");
				jQuery(this).addClass("selected");
				$("#sale .itemArea").scrollLeft(0);

				var btnHref = $(this).attr("href").substring(1);

				jQuery("#sale .itemArea li").hide();
				jQuery("#sale .itemArea ."+btnHref).show();
				return false;
			});

			/*##### 5. vote #####*/
			// rate 투표율 변수, 초기값
			var num0 = parseInt($("#rateText .num0").text());
			var num1 = parseInt($("#rateText .num1").text());
			var per0 = Math.round(num0/(num0+num1)*100);
			var per1 = Math.round(num1/(num0+num1)*100);
			//console.log(per1);

			$("#rateText .per0").text(per0);
			$("#rateText .per1").text(per1);
			jQuery("#rateText .vote0").css({"width":per0+"%"});
			jQuery("#rateText .vote1").css({"width":(100-per0)+"%"});

			// 투표 버튼 기능
			jQuery("#voteArea .vote0").click(function(){
				jQuery("#vote").hide(500,"swing");
				jQuery("#result0").show(500,"swing");

				jQuery("#rateText .num0").text(num0+1);
			});
			jQuery("#voteArea .vote1").click(function(){
				jQuery("#vote").hide(500,"swing");
				jQuery("#result1").show(500,"swing");

				jQuery("#rateText .num1").text(num1+1);
			});
			jQuery("#result0 .btn").click(function(){
				jQuery("#result0").hide(500,"swing");
				jQuery("#result1").show(500,"swing");
			});
			jQuery("#result1 .btn").click(function(){
				jQuery("#result1").hide(500,"swing");
				jQuery("#result0").show(500,"swing");
			});

			// 결과페이지 흐름
			setInterval(function(){
				jQuery("#result0 .itemArea ul").animate({"marginLeft":"0"},3000,"linear",function(){
					jQuery("#result0 .itemArea ul").prepend($("#result0 .itemArea li:last")).css({"marginLeft":"-14.5%"});
				});
			},3000);

			setInterval(function(){
				jQuery("#result1 .itemArea ul").animate({"marginLeft":"0"},3000,"linear",function(){
					jQuery("#result1 .itemArea ul").prepend($("#result1 .itemArea li:last")).css({"marginLeft":"-14.5%"});
				});
			},3000);
			
			// 결과페이지 상품 hover
			jQuery("#result0 .itemArea li a").bind("mouseover focus",function(){
				jQuery("#result0 .itemArea li strong").hide();
				jQuery(this).parent().find("strong").show();
			}).mouseout(function(){
				jQuery("#result0 .itemArea li strong").hide();
			});
            
			jQuery("#result1 .itemArea li a").bind("mouseover focus",function(){
				jQuery("#result1 .itemArea li strong").hide();
				jQuery(this).parent().find("strong").show();
			}).mouseout(function(){
				jQuery("#result1 .itemArea li strong").hide();
			});
			

			/*##### 7. review #####*/
			// 슬라이딩윈도우
			jQuery("#review .button .right").click(function(){
				jQuery("#review .film").animate({"marginLeft":"-100%"},500,"swing",function(){
					jQuery("#review .film").append($("#review .film .scene:first"));
					jQuery("#review .film").css({"marginLeft":"0"});
				});
			});

			jQuery("#review .button .left").click(function(){
				jQuery("#review .film").prepend($("#review .scene:last")).css({"marginLeft":"-100%"}).animate({"marginLeft":"0"},500,"swing");
			});

			// 클릭 시 모달팝업 - 웹에서만
			function snsModal(){
				jQuery("#review li a").click(function(){
					jQuery("#allBack,#sns_modal").show();
					
					var snsLink = $(this).attr("href");

					jQuery("#sns_modal div").html("<iframe src='"+snsLink+"embed'></iframe>");
					
					return false;
				});

				jQuery("#allBack, #sns_modal a").click(function(){
					jQuery("#allBack,#sns_modal").hide();
				});
			};				

			if(bodyW>480){
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
			});
				

			/*##### 10. 개인의취향 탭 #####*/
			jQuery("#taste .title li").click(function(){
				jQuery("#taste .title li").removeClass("selected");
				jQuery(this).addClass("selected");
			});

			jQuery("#taste .title .li0 a").click(function(){
				jQuery("#taste .itemArea ul").hide();
				jQuery("#taste .itemArea ul:eq(0)").show();
			});
			jQuery("#taste .title .li1 a").click(function(){
				jQuery("#taste .itemArea ul").hide();
				jQuery("#taste .itemArea ul:eq(1)").show();
			});
			jQuery("#taste .title .li2 a").click(function(){
				jQuery("#taste .itemArea ul").hide();
				jQuery("#taste .itemArea ul:eq(2)").show();
			});
			jQuery("#taste .title .li3 a").click(function(){
				jQuery("#taste .itemArea ul").hide();
				jQuery("#taste .itemArea ul:eq(3)").show();
			});
			jQuery("#taste .title .li4 a").click(function(){
				jQuery("#taste .itemArea ul").hide();
				jQuery("#taste .itemArea ul:eq(4)").show();
			});

			/*개취 모바일 네비*/
			// 초기값
			$("#taste .title .mobNav li:first").css({"borderColor":"#00564d"});
			$("#taste .title .mobNav li:first a").css({"color":"#00564d"});

			// 클릭시
			$("#taste .title .mobNav li").click(function(){
				$("#taste .title .mobNav li").css({"borderColor":"#ccc"});
				$("#taste .title .mobNav li a").css({"color":"#333"});
				$(this).css({"borderColor":"#00564d"});
				$(this).children().css({"color":"#00564d"});
				$("#taste .itemArea").scrollLeft(0);

				var linum = ($(this).attr("class").substring(2,3));
				switch(linum){
					case "1" :
					$("#taste .title .nav").animate({"scrollLeft":"0"});
					break;
					case "2" :
					$("#taste .title .nav").animate({"scrollLeft":"150px"});
					break;
					case "3" :
					case "4" :
					$("#taste .title .nav").animate({"scrollLeft":"300px"});
				}
			});


			/*##### 11. 콤비네이션 아코디언 #####*/
			/* 초기값*/
			jQuery("#combi li").css({"width":"14%"});
			jQuery("#combi .li0").css({"width":"44%"});
			
			jQuery("#combi li").find(" em").css({"opacity":"0"});
			jQuery("#combi .li0").find("em").css({"opacity":"1"});

			jQuery("#combi li .hover").hide();
			jQuery("#combi .li0 .hover").show();

			// 이벤트시 동작
			jQuery("#combi li").bind("mouseenter focusin", function(){
				jQuery("#combi li").stop().animate({"width":"14%"});
				jQuery(this).stop().animate({"width":"44%"});
				
				// 할인율 em->block이라 css로 적용!
				jQuery(this).siblings().find(" em").css({"opacity":"0"});
				jQuery(this).find("em").css({"opacity":"1"});

				jQuery(this).siblings().find(".hover").stop().fadeOut(200,"swing");
				jQuery(this).find(".hover").stop().delay(300).fadeIn(500,"swing");				
			});
			
			/*#### 13. friends 슬라이딩 버튼####*/
			jQuery("#friends .itemArea .buttonL").click(function(){
				jQuery(this).parent().find("ul").css({"marginLeft":"-660px"}).prepend($(this).parent().find("li:gt(5)"));
				jQuery(this).parent().find("ul").animate({"marginLeft":"0"},500,"swing");
			});

			jQuery("#friends .itemArea .buttonR").click(function(){
				jQuery(this).parent().find("ul").animate({"marginLeft":"-660px"},500,"swing",function(){
					jQuery(this).parent().find("ul").append($(this).find("li:lt(3)"));
					jQuery(this).parent().find("ul").css({"marginLeft":"0"})
				});
			});

			/*##### 퐁듀#####*/
			//썸네일 정비율 - 모바일에서만 
			if(bodyW<=767 && bodyW>=320){
				$("#pondue .itemArea li").css({"height":$("#pondue .itemArea li").width()-1});
			}
			//console.log($("#pondue .itemArea li").width());

			$(window).resize(function(){
				if(bodyW<=767 && bodyW>=320){
					$("#pondue .itemArea li").css({"height":$("#pondue .itemArea li").width()});
				}
			});

			$(window).scroll(function(){
				var scrollT = window.scrollY;
				/*var frame = Math.floor((scrollT-6300)/3);

				if(frame<10){
					frame = "00"+frame
				}
				else if(frame<100){
					frame = "0"+frame
				}*/				
				console.log("scrollT:"+scrollT);				
				if(scrollT>=5900){
					$("#pondue_wrap").css({"backgroundImage":"url('img/pondue/pondue_back_noloop.gif')"});
				}
				else if(scrollT<5900){
					$("#pondue_wrap").css({"backgroundImage":"url('img/pondue/p_00.png')"});
				}

				if($(window).width()<=480){
					if(scrollT>=2800){
					$("#pondue_wrap").css({"backgroundImage":"url('img/pondue/pondue_back_noloop.gif')"});
					}
					else if(scrollT<2800){
						$("#pondue_wrap").css({"backgroundImage":"url('img/pondue/p_00.png')"});
					}
				}
				else if($(window).width()>480 &&$(window).width()<=767){
					if(scrollT>=2900){
					$("#pondue_wrap").css({"backgroundImage":"url('img/pondue/pondue_back_noloop.gif')"});
					}
					else if(scrollT<2900){
						$("#pondue_wrap").css({"backgroundImage":"url('img/pondue/p_00.png')"});
					}
				}
			});
			

			/*##### best #####*/
			// 영역 높이
			jQuery("#best section li:gt(3)").hide();

			// 랜덤 상품 6개 노출+버튼 애니메이션
			jQuery("#best .refresh").click(function(){
				jQuery(this).find("img").css({"animation":"refresh 1s 1"});

				var random = Math.floor(Math.random()*10);
				jQuery("#best li").hide();

				for(var i=0; i<6; i++){
					//console.log(random);
					jQuery("#best li:eq("+(random+i)%12+")").show();
				}

				setTimeout(function(){
					jQuery("#best .refresh img").css({"animation":"none"});
				},1000);				
			});
			
			/*##### hot #####*/
			/*jQuery("#hot ul li:gt(2)").hide();
			jQuery("#hot .btn").click(function(){
				jQuery("#hot ul li:lt(6)").show(500,"swing");
			});*/
			jQuery("#hot h2 a").click(function(){
				//버튼색상
				$("#hot h2 a").text("○");
				$(this).text("●");
				
				// 슬라이드
				var btnNum = $(this).attr("title").substring(10);

				//alert(btnNum);
				switch(btnNum){
					case "0" :
					$("#hot ul").animate({"marginTop":"0"});
					break;

					case "1" :
					$("#hot ul").animate({"marginTop":"-435px"});
					break;

					case "2" :
					$("#hot ul").animate({"marginTop":"-870px"});
					break;
				}
			});


			/*##### footer 아코디언 #####*/
			var btn0 = true;

			jQuery("#footer_info_wrap .more_mob").click(function(){
				if(btn0==true){
					jQuery(this).find("img").css({"transform":"rotate(180deg)"});
					
					btn0 = false;
				}
				else{
					jQuery(this).find("img").css({"transform":"rotate(0deg)"});

					btn0 = true;
				}
				//console.log(btn0);
				
				jQuery("#footer_info").slideToggle();
			});
			
			// footer 데탑사이즈 복귀시 desc 사라짐 해결
			$(window).resize(function(){
				
				var bodySize = $("body").width();
				if(bodySize>480){
					$("#footer_info").show();				
				}
			});	
			
			
		});

		// footer 팝업창
			function popup(url,name){
				console.log(url,name);
				window.open(url,name,"width=500px, height=500px");
			}
	</script>
 </head>
 <body>
	<div id="skipNav">
		<p><a href="#container" title="본문바로가기">본문 바로가기</a></p>
	</div>
	<div id="wrap">
		<div id="top_banner">
			<div class="banner">
				<p class="text">
					<em>오후 4시 전에 결제하면 당일출고</em> <strong>금요일에도 토요일 도착!</strong>
				</p>
				<p class="btn">
					<a href="#none" title="top_banner">
						<img src="img/basic/exit.png" alt="exit버튼"/>
					</a>
				</p>
			</div>
		</div>
		<header id="header">
			<h1>치즈퀸</h1>
			<div id="topArea">
				<div id="infoArea">
					<ul id="infoMenu">
<?php if(empty($_SESSION['userid'])){?>
						<li class="green"><a href="sub/login.html" title="로그인">로그인</a></li>
						<li><a href="sub/join.html" title="회원가입">회원가입</a></li>
						<li><a href="sub/login.html" title="장바구니">장바구니</a></li>
						<li><a href="sub/login.html" title="마이페이지">마이페이지</a></li>
						<li><a href="sub/login.html" title="고객센터">고객센터</a></li>
<?php }else{?>
						<li class="green"><a href="sub/php/logout.php" title="로그아웃">로그아웃</a></li>
						<li><a href="sub/cart.html" title="장	바구니">장바구니</a></li>
						<li><a href="sub/mypage.html" title="마이페이지">마이페이지</a></li>
						<li><a href="sub/notice.php" title="고객센터">고객센터</a></li>
<?php }?>			
					</ul>
					<div class="logo">
						<a href="index.php" title="치즈퀸_메인페이지">
							<img src="img/header/logo.png" alt="치즈퀸"/>
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
									<img src="img/header/icon_search.png" alt="검색버튼_이미지"/>
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
									<li><a href="sub/shopping_cheese.html" title="모짜렐라">모짜렐라</a></li>
									<li><a href="sub/shopping_cheese.html" title="자연치즈">자연치즈</a></li>
									<li><a href="sub/shopping_cheese.html" title="스낵·가공치즈">스낵·가공치즈</a></li>
									<li><a href="sub/shopping_cheese.html" title="크림치즈">크림치즈</a></li>
									<li><a href="sub/shopping_cheese.html" title="슬라이스치즈">슬라이스치즈</a></li>
								</ul>
							</li>
							<li>
								<ul class="subMenu">
									<li><a href="sub/shopping_friends.html" title="잼·시럽·버터·크림">잼·시럽·버터·크림</a></li>
									<li><a href="sub/shopping_friends.html" title="하몽·살라미">하몽·살라미</a></li>
									<li><a href="sub/shopping_friends.html" title="올리브·절임·캐비어">올리브·절임·캐비어</a></li>
									<li><a href="sub/shopping_friends.html" title="오일·비네거·발사믹">오일·비네거·발사믹</a></li>
									<li><a href="sub/shopping_friends.html" title="소스·향신료·트러플">소스·향신료·트러플</a></li>
									<li><a href="sub/shopping_friends.html" title="피자·파스타·샌드위치 재료">피자·파스타·샌드위치 재료</a></li>
									<li><a href="sub/shopping_friends.html" title="음료·간식·요거트">음료·간식·요거트</a></li>
								</ul>
							</li>
							<li>
								<ul class="subMenu">
									<li><a href="sub/collection0.html" title="치즈도구">치즈도구</a></li>
									<li><a href="sub/collection1.html" title="와인안주_추천">와인안주 추천</a></li>
									<li><a href="sub/collection2.html" title="치즈_초보자_추천">치즈 초보자 추천</a></li>
									<li><a href="sub/collection3.html" title="선물세트">선물세트</a></li>
									<li><a href="sub/collection4.html" title="업소용_제품추천">업소용 제품추천</a></li>
								</ul>
							</li>
							<li>
								<ul class="subMenu">
									<li><a href="sub/sale.html" title="치즈퀸_세일_모아보기">치즈퀸 세일 모아보기</a></li>
									<li><a href="sub/sale.html" title="기한임박할인">기한임박할인</a></li>
								</ul>
							</li>
						</ul>
						<div class="event">
							<p class="imgs">
								<a href="sub/event.html" title="event">
									<span>
										<img src="img/header/event.jpg" alt="이벤트이미지"/>
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
					<a class="logo" href="index.php" title="치즈퀸_메인페이지">
						<img src="img/header/logo.png" alt="치즈퀸"/>
					</a>
				</p>	
			</div>
			<div class="bottom">
				<ul>
					<li>
						<a href="index.php" title="home">
							<span class="imgs">
								<img src="img/basic/icon_home.svg" title="home"/>
							</span><br/>
							<strong>홈</strong>
						</a>
					</li>
					<li>
						<a href="sub/mobCate.html" title="카테고리">
							<span class="imgs">
								<img src="img/basic/icon_cate.svg" title="카테고리"/>
							</span><br/>
							<strong>카테고리</strong>
						</a>
					</li>
					<li>
						<a class="search" href="#none" title="검색">
							<span class="imgs">
								<img src="img/basic/icon_search.svg" title="검색"/>
							</span><br/>
							<strong>검색</strong>
						</a>
					</li>
<?php if(empty($_SESSION['userid'])){?>
					<li>
						<a href="sub/login.html" title="로그인">
							<span class="imgs">
								<img src="img/basic/icon_mypage.svg" title="로그인"/>
							</span><br/>
							<strong>로그인</strong>
						</a>
					</li>
<?php }else{?>
					<li>
						<a href="sub/php/logout.php" title="로그아웃">
							<span class="imgs">
								<img src="img/basic/icon_mypage.svg" title="로그아웃"/>
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
			<div id="visual">
				<div id="visual_inner">
					<div class="slidingWindow">
						<ul>
							<li class="li0">
								<a href="sub/shopping_friends.html" title="메인비쥬얼_페이지0">
									<span>
										<img src="img/main/main0.jpg" alt="메인비쥬얼_이미지0"/>
									</span>
									<span class="text">
										| 3월의 테마관 |
										<em>
											<b>My Dear, Olive Oil</b><br/>
											올리브 오일 7종 할인
										</em>
									</span>
								</a>
							</li>
							<li class="li1">
								<a href="sub/shopping_cheese.html" title="메인비쥬얼_페이지1">
									<span>
										<img src="img/main/main1.jpg" alt="메인비쥬얼_이미지1"/>
									</span>
									<span class="text">
										상상도 못한 초간단 레시피 ㄴ(ㅇ0ㅇ)ㄱ
										<em>
											집에서도 뚝딱<br/>
											<b>고르곤졸라 피자</b>
										</em>
									</span>
								</a>
							</li>
							<li class="li3">
								<a href="sub/shopping_cheese.html" title="메인비쥬얼_페이지3">
									<span>
										<img src="img/main/main3.jpg" alt="메인비쥬얼_이미지3"/>
									</span>
									<span class="text">
										<b>
											치즈 견과류 건과일<br/>
											한방에 OK!
										</b>
										<em>
											내 손 안의 작은 플래터 'Snacks to go' 기한임박 세일
										</em>
									</span>
								</a>
							</li>
							<li class="li2">
								<a href="sub/item_delClub.html" title="메인비쥬얼_페이지2">
									<span>
										<img src="img/main/main2.jpg" alt="메인비쥬얼_이미지2"/>
									</span>
									<span class="text">
										<em>
											치즈퀸<br/>
											무배클럽
										</em>
										<b>어제 샀는데 또 사고 싶을 때 /<br/> 구매할 때 마다 결제가 번거로울 때 /<br/> 가족 수가 적어서 조금씩 자주 구매하고 싶을 땐</b>
									</span>
								</a>
							</li>							
						</ul>
					</div>				
					<p class="left">
						<a href="#none" title="left">
							<img src="img/basic/arrow_left.png" alt="왼쪽화살표"/>
						</a>
					</p>
					<p class="right">
						<a href="#none" title="right">
							<img src="img/basic/arrow_right.png" alt="오른쪽화살표"/>
						</a>
					</p>
					<p class="button1">
						<a class="selected" href="#none" title="slide0">●</a><a href="#none" title="slide1">●</a><a href="#none" title="slide2">●</a><a href="#none" title="slide3">●</a>
					</p>
				</div>
			</div>
			<div id="time_wrap">
				<div id="timeSale">
					<div class="title">
						<h2><span>TIME</span><br/>SALE</h2>
						<p class="desc"><strong>기한임박</strong>&nbsp;할인</p>
						<p class="btn">
							<a href="#none" title="재생멈춤버튼">
								<img src="img/basic/icon_pp.png" alt="재생멈춤버튼"/>
							</a>
						</p>
						<div class="timeBar">
							<p class="bar">s</p>
							<p class="bar color">s</p>
							<p class="icon">s</p>
						</div>
					</div>
					<div class="itemArea">
						<ul>
							<li>
								<a href="sub/item.html" title="타임세일_상품페이지0">
									<span class="img">
										<img src="img/item/cheese/natural/0000_0.jpg" alt="타임세일_상품이미지0"/>
									</span>
									<span class="text">
										<strong>
											프란시아 리코타 250g
										</strong>
										<i class="desc">
											유통기한 21.03.02
										</i><br/>
										<strong class="price">
											<i class="line">6400원</i>5760원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="타임세일_상품페이지1">
									<span class="img">
										<img src="img/item/cheese/natural/0001_0.jpg" alt="타임세일_상품이미지1"/>
									</span>
									<span class="text">
										<strong>
											브리미 리코타 쁘띠 100g
										</strong>
										<i class="desc">
											유통기한 21.03.07
										</i><br/>
										<strong class="price">
											<i class="line">3600원</i>2520원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="타임세일_상품페이지2">
									<span class="img">
										<img src="img/item/cheese/natural/0303_0.jpg" alt="타임세일_상품이미지2"/>
									</span>
									<span class="text">
										<strong>
											엠보그 까망베르 125g
										</strong>
										<i class="desc">
											유통기한 21.04.05
										</i><br/>
										<strong class="price">
											<i class="line">3500원</i>5580원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="타임세일_상품페이지0">
									<span class="img">
										<img src="img/item/cheese/natural/0403_0.jpg" alt="타임세일_상품이미지0"/>
									</span>
									<span class="text">
										<strong>
											엠보그 브리 125g
										</strong>
										<i class="desc">
											유통기한 21.04.24
										</i><br/>
										<strong class="price">
											<i class="line">6200원</i>5270원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="타임세일_상품페이지1">
									<span class="img">
										<img src="img/item/cheese/natural/0602_0.jpg" alt="타임세일_상품이미지1"/>
									</span>
									<span class="text">
										<strong>
											만토바 파르미지아노 레지아노 200g
										</strong>
										<i class="desc">
											유통기한 21.04.01
										</i><br/>
										<strong class="price">
											<i class="line">11000원</i>9350원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="타임세일_상품페이지2">
									<span class="img">
										<img src="img/item/cheese/natural/0604_0.jpg" alt="타임세일_상품이미지2"/>
									</span>
									<span class="text">
										<strong>
											안티코 파르미지아노 레지아노 150g
										</strong>
										<i class="desc">
											유통기한 21.03.26
										</i><br/>
										<strong class="price">
											<i class="line">8900원</i>8000원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="타임세일_상품페이지0">
									<span class="img">
										<img src="img/item/cheese/natural/0706_0.jpg" alt="타임세일_상품이미지0"/>
									</span>
									<span class="text">
										<strong>
											고다 큐브 5개입 100g
										</strong>
										<i class="desc">
											유통기한 21.03.24
										</i><br/>
										<strong class="price">
											<i class="line">5560원</i>4990원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="타임세일_상품페이지1">
									<span class="img">
										<img src="img/item/cheese/natural/0805_0.jpg" alt="타임세일_상품이미지1"/>
									</span>
									<span class="text">
										<strong>
											발마틴 에멘탈 250g
										</strong>
										<i class="desc">
											유통기한 21.04.01
										</i><br/>
										<strong class="price">
											<i class="line">6400원</i>5530원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="타임세일_상품페이지2">
									<span class="img">
										<img src="img/item/cheese/natural/0901_0.jpg" alt="타임세일_상품이미지2"/>
									</span>
									<span class="text">
										<strong>
											라이크로스팜 숙성 체다 175g
										</strong>
										<i class="desc">
											유통기한 21.03.26
										</i><br/>
										<strong class="price">
											<i class="line">6200원</i>4660원
										</strong>
									</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div id="newBanner_wrap">
				<div id="newBanner">
					<p>
						<a href="sub/collection_new.html" title="신상_페이지">
							<strong>NEW!</strong>
							<em>
								이 구역의 얼리어답터는 나야!
								<b>신상 스낵치즈 구경하기</b>
							</em>
							<span><img src="img/banners/new_item.png" alt="신상_이미지"/></span>
						</a>
					</p>
				</div>
			</div>
			<div id="sale_wrap">
				<div id="sale">
					<div class="title">
						<h2><span>Queen</span> Sale</h2>
						<p class="desc">
							내일은 없어요 치즈퀸 핫세일
						</p>
						<p class="button">
							<a class="selected" href="#limit" title="기한임박">#기한임박</a><br/>
							<a href="#launch" title="런칭특가">#런칭특가</a><br/>
							<a href="#best" title="BEST">#BEST</a><br/>
							<a href="#tasty" title="TASTY">#TASTY</a>
						</p>
					</div>
					<div class="itemArea">
						<ul>
							<li class="best tasty">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지7">
										<img src="img/item/friends/jamon/000_0.jpg" alt="세일_상품이미지7"/>
									</a>
									<i class="dC">
										15%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지7">
											<strong>빌라르 이베리코 하몽 세보 슬라이스 50g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.05.04</p>
									<p class="price">
										<span class="line">8400원</span><strong class="green">7140원</strong>
									</p>
								</div>
							</li>
							<li class="best">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지8">
										<img src="img/item/friends/jamon/040_0.jpg" alt="세일_상품이미지8"/>
									</a>
									<i class="dC">
										10%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지8">
											<strong>빌라르 살지촌 이베리코 엑스트라 슬라이스 100g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.15</p>
									<p class="price">
										<span class="line">8400원</span><strong class="green">7560원</strong>
									</p>
								</div>
							</li>
							<li class="limit tasty">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지0">
										<img src="img/item/cheese/natural/0000_0.jpg" alt="세일_상품이미지0"/>
									</a>
									<i class="dC">
										10%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지0">
											<strong>프란시아 리코타 250g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.03.02</p>
									<p class="price">
										<span class="line">6400원</span><strong class="green">5760원</strong>
									</p>
								</div>
							</li>
							<li class="limit">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지1">
										<img src="img/item/cheese/natural/0001_0.jpg" alt="세일_상품이미지1"/>
									</a>
									<i class="dC">
										30%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지1">
											<strong>브리미 리코타 쁘띠 100g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.01</p>
									<p class="price">
										<span class="line">3600원</span><strong class="green">2520원</strong>
									</p>
								</div>
							</li>
							<li class="limit">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지2">
										<img src="img/item/cheese/natural/0303_0.jpg" alt="세일_상품이미지2"/>
									</a>
									<i class="dC">
										10%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지2">
											<strong>엠보그 까망베르 125g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.26</p>
									<p class="price">
										<span class="line">6200원</span><strong class="green">5580원</strong>
									</p>
								</div>
							</li>
							<li class="limit">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지3">
										<img src="img/item/cheese/natural/0602_0.jpg" alt="세일_상품이미지3"/>
									</a>
									<i class="dC">
										15%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지3">
											<strong>만토바 파르미지아노 레지아노 200g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.24</p>
									<p class="price">
										<span class="line">11000원</span><strong class="green">9350원</strong>
									</p>
								</div>
							</li>
							<li class="limit">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지4">
										<img src="img/item/cheese/natural/0604_0.jpg" alt="세일_상품이미지4"/>
									</a>
									<i class="dC">
										10%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지4">
											<strong>안티코 파르미지아노 레지아노 150g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.01</p>
									<p class="price">
										<span class="line">8900원</span><strong class="green">8010원</strong>
									</p>
								</div>
							</li>
							<li class="limit tasty">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지5">
										<img src="img/item/cheese/natural/0605_0.jpg" alt="세일_상품이미지5"/>
									</a>
									<i class="dC">
										10%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지5">
											<strong>그라나 파다노 파우더 1kg</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.26</p>
									<p class="price">
										<span class="line">32200원</span><strong class="green">28980원</strong>
									</p>
								</div>
							</li>
							<li class="limit">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지6">
										<img src="img/item/cheese/natural/0706_0.jpg" alt="세일_상품이미지6"/>
									</a>
									<i class="dC">
										11%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지6">
											<strong>고다 큐브 5개입 100g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.24</p>
									<p class="price">
										<span class="line">5560원</span><strong class="green">4990원</strong>
									</p>
								</div>
							</li>
							<li class="limit tasty">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지7">
										<img src="img/item/cheese/natural/1000_0.jpg" alt="세일_상품이미지7"/>
									</a>
									<i class="dC">
										21%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지7">
											<strong>그뤼에르 치즈 200g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.01</p>
									<p class="price">
										<span class="line">12400원</span><strong class="green">9900원</strong>
									</p>
								</div>
							</li>
							<li class="limit">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지8">
										<img src="img/item/cheese/natural/1202_0.jpg" alt="세일_상품이미지8"/>
									</a>
									<i class="dC">
										15%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지8">
											<strong>숌므 르 크레미에 250g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.26</p>
									<p class="price">
										<span class="line">21180원</span><strong class="green">18010원</strong>
									</p>
								</div>
							</li>
							<li class="launch tasty">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지7">
										<img src="img/item/cheese/natural/0406_0.jpg" alt="세일_상품이미지7"/>
									</a>
									<i class="dC">
										5%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지7">
											<strong>브리 레두팔레지앙 125g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.05.01</p>
									<p class="price">
										<span class="line">4300원</span><strong class="green">4085원</strong>
									</p>
								</div>
							</li>
							<li class="launch">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지8">
										<img src="img/item/cheese/natural/0400_0.jpg" alt="세일_상품이미지8"/>
									</a>
									<i class="dC">
										10%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지8">
											<strong>페이장브레통 르 브리 웨지 200g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.26</p>
									<p class="price">
										<span class="line">11200원</span><strong class="green">10080원</strong>
									</p>
								</div>
							</li>
                            <li class="best">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지0">
										<img src="img/item/cheese/natural/0305_0.jpg" alt="세일_상품이미지0"/>
									</a>
									<i class="dC">
										10%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지0">
											<strong>까망베르 레두팔레지앙 125g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.24</p>
									<p class="price">
										<span class="line">4300원</span><strong class="green">3870원</strong>
									</p>
								</div>
							</li>
                            <li class="launch tasty">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지0">
										<img src="img/item/cheese/natural/1208_0.jpg" alt="세일_상품이미지0"/>
									</a>
									<i class="dC">
										25%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지0">
											<strong>일드프랑스 노르망딸 슬라이스 150g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.24</p>
									<p class="price">
										<span class="line">9700원</span><strong class="green">7280원</strong>
									</p>
								</div>
							</li>
							<li class="launch">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지1">
										<img src="img/item/cheese/natural/1214_0.jpg" alt="세일_상품이미지1"/>
									</a>
									<i class="dC">
										10%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지1">
											<strong>만체고(양젖) 6조각 타파스 6개월 숙성 DOP 100g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.01</p>
									<p class="price">
										<span class="line">7900원</span><strong class="green">7110원</strong>
									</p>
								</div>
							</li>
							<li class="launch tasty">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지2">
										<img src="img/item/cheese/natural/1218_0.jpg" alt="세일_상품이미지2"/>
									</a>
									<i class="dC">
										5%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지2">
											<strong>랑그르 AOP 180g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.26</p>
									<p class="price">
										<span class="line">13200원</span><strong class="green">12540원</strong>
									</p>
								</div>
							</li>
							<li class="launch">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지3">
										<img src="img/item/cheese/natural/0600_0.jpg" alt="세일_상품이미지3"/>
									</a>
									<i class="dC">
										15%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지3">
											<strong>메사나 파마산 치즈가루 227g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.24</p>
									<p class="price">
										<span class="line">7200원</span><strong class="green">6120원</strong>
									</p>
								</div>
							</li>
							<li class="launch">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지4">
										<img src="img/item/cheese/natural/0506_0.jpg" alt="세일_상품이미지4"/>
									</a>
									<i class="dC">
										15%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지4">
											<strong>일드 프랑스 브리 오 블루 125g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.05.01</p>
									<p class="price">
										<span class="line">7900원</span><strong class="green">6715원</strong>
									</p>
								</div>
							</li>
							<li class="launch">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지5">
										<img src="img/item/cheese/natural/0503_0.jpg" alt="세일_상품이미지5"/>
									</a>
									<i class="dC">
										10%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지5">
											<strong>안젤로 고르곤졸라 피칸테 150g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.26</p>
									<p class="price">
										<span class="line">5700원</span><strong class="green">5130원</strong>
									</p>
								</div>
							</li>
							<li class="launch">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지6">
										<img src="img/item/cheese/natural/0501_0.jpg" alt="세일_상품이미지6"/>
									</a>
									<i class="dC">
										20%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지6">
											<strong>프로마제 다피누아 블루 170g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.24</p>
									<p class="price">
										<span class="line">12200원</span><strong class="green">9760원</strong>
									</p>
								</div>
							</li>							
							<li class="best">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지1">
										<img src="img/item/cheese/natural/0301_0.jpg" alt="세일_상품이미지1"/>
									</a>
									<i class="dC">
										20%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지1">
											<strong>까망베르 루스티크 250g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.01</p>
									<p class="price">
										<span class="line">14100원</span><strong class="green">11280원</strong>
									</p>
								</div>
							</li>
							<li class="best tasty">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지2">
										<img src="img/item/cheese/natural/0202_0.jpg" alt="세일_상품이미지2"/>
									</a>
									<i class="dC">
										5%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지2">
											<strong>콜리오스 그릭 페타 치즈 150g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.26</p>
									<p class="price">
										<span class="line">5800원</span><strong class="green">5510원</strong>
									</p>
								</div>
							</li>
							<li class="best">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지3">
										<img src="img/item/cheese/natural/0200_0.jpg" alt="세일_상품이미지3"/>
									</a>
									<i class="dC">
										15%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지3">
											<strong>알미토 페타치즈 허브 엔 스파이스 280g (고형량160g)</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.24</p>
									<p class="price">
										<span class="line">8260원</span><strong class="green">7021원</strong>
									</p>
								</div>
							</li>
							<li class="best tasty">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지4">
										<img src="img/item/cheese/natural/0103_0.jpg" alt="세일_상품이미지4"/>
									</a>
									<i class="dC">
										15%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지4">
											<strong>암브로시 마스카포네 500g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.05.01</p>
									<p class="price">
										<span class="line">9600원</span><strong class="green">8160원</strong>
									</p>
								</div>
							</li>
							<li class="best">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지5">
										<img src="img/item/cheese/natural/0101_0.jpg" alt="세일_상품이미지5"/>
									</a>
									<i class="dC">
										20%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지5">
											<strong>밀라 마스카르포네 500g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.05</p>
									<p class="price">
										<span class="line">12400원</span><strong class="green">9920원</strong>
									</p>
								</div>
							</li>
							<li class="best">
								<p class="imgLink">
									<a href="sub/item.html" title="세일_상품페이지6">
										<img src="img/item/cheese/natural/0002_0.jpg" alt="세일_상품이미지6"/>
									</a>
									<i class="dC">
										10%
									</i>
									<i class="tasty">
										<img src="img/basic/icon_tasty.png" alt="tasty_아이콘"/>
									</i>
								</p>
								<div class="text">
									<p class="textLink">
										<a href="sub/item.html" title="세일_상품페이지6">
											<strong>램노스 리코타 250g</strong>
										</a>
									</p>
									<p class="desc">유통기한 21.04.28</p>
									<p class="price">
										<span class="line">8200원</span><strong class="green">7380원</strong>
									</p>
								</div>
							</li>							
						</ul>
					</div>
				</div>
			</div>
			<div id="vote_wrap">
				<div id="vote">
					<h2>VOTE</h2>
					<h3>치즈와 최고의 궁합은?</h3>
					<div id="voteArea">
						<div class="vote0">
							<p class="imgs">
								<img src="img/vote/vote0.png" alt="투표이미지0"/>
							</p>
							<p class="text">
								<em>치즈엔 역시<br/>와인이지!</em>
							</p>
						</div>
						<p class="vs">vs</p>
						<div class="vote1">
							<p class="imgs">
								<img src="img/vote/vote1.png" alt="투표이미지1"/>
							</p>
							<p class="text">
								<em>무슨소리!<br/>	치즈엔 맥주!</em>
							</p>
						</div>
					</div>
				</div>
				<div id="result0">
					<h3>
						<strong>와인안주</strong>를<br/>
						찾고있다면?
					</h3>
					<p class="btn">
						맥주 안주도 보고 싶다면? ▶
					</p>
					<div class="itemArea">
						<ul>
							<li>
								<p>
									<strong>따르따르 아페리프레 프로방스 100g</strong>
								</p>
								<a href="sub/item.html" title="추천상품0_페이지0">
									<img src="img/result/result0_0.png" alt="추천상품0_이미지0"/>
								</a>
							</li>
							<li class="li0">
								<p>
									<strong>숌므 르 크레미에 250g</strong>
								</p>
								<a href="sub/item.html" title="추천상품0_페이지1">
									<img src="img/result/result0_1.png" alt="추천상품0_이미지1"/>
								</a>
							</li>
							<li>
								<p>
									<strong>일드프랑스 노르망딸 슬라이스 150g</strong>
								</p>
								<a href="sub/item.html" title="추천상품0_페이지2">
									<img src="img/result/result0_2.png" alt="추천상품0_이미지2"/>
								</a>
							</li>
							<li class="li0">
								<p>
									<strong>콜리오스 그릭 페타 치즈 150g</strong>
								</p>
								<a href="sub/item.html" title="추천상품0_페이지3">
									<img src="img/result/result0_3.png" alt="추천상품0_이미지3"/>
								</a>
							</li>
							<li>
								<p>
									<strong>램노스 과일치즈(갈릭 차이브) 125g</strong>
								</p>
								<a href="sub/item.html" title="추천상품0_페이지4">
									<img src="img/result/result0_4.png" alt="추천상품0_이미지4"/>
								</a>
							</li>
							<li class="li0">
								<p>
									<strong>토레온 이베리코 베요타 하몽 핸드컷 슬라이스 60g</strong>
								</p>
								<a href="sub/item.html" title="추천상품0_페이지5">
									<img src="img/result/result0_5.png" alt="추천상품0_이미지5"/>
								</a>
							</li>
							<li>
								<p>
									<strong>본 마예네 꺄레 200g</strong>
								</p>
								<a href="sub/item.html" title="추천상품0_페이지6">
									<img src="img/result/result0_6.png" alt="추천상품0_이미지6"/>
								</a>
							</li>
							<li class="li0">
								<p>
									<strong>다미코 블랙 올리브 300g</strong>
								</p>
								<a href="sub/item.html" title="추천상품0_페이지7">
									<img src="img/result/result0_7.png" alt="추천상품0_이미지7"/>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div id="result1">					
					<h3>
						<strong>맥주안주</strong>를<br/>
						찾고있다면?
					</h3>
					<p class="btn">
						◀ 와인 안주도 보고 싶다면?
					</p>
					<div class="itemArea">
						<ul>
							<li>
								<p>
									<strong>이즈니 미몰레트 슬라이스 150g</strong>
								</p>
								<a href="sub/item.html" title="추천상품1_페이지0">
									<img src="img/result/result1_0.png" alt="추천상품1_이미지0"/>
								</a>
							</li>
							<li class="li0">
								<p>
									<strong>벨라 디 체리뇰라 올리브 200g</strong>
								</p>
								<a href="sub/item.html" title="추천상품1_페이지1">
									<img src="img/result/result1_1.png" alt="추천상품1_이미지1"/>
								</a>
							</li>
							<li>
								<p>
									<strong>빔스터 로얄고다 그랑크뤼 250g(12개월숙성)</strong>
								</p>
								<a href="sub/item.html" title="추천상품1_페이지2">
									<img src="img/result/result1_2.png" alt="추천상품1_이미지2"/>
								</a>
							</li>
							<li class="li0">
								<p>
									<strong>프로마제 다피누아 블루 170g</strong>
								</p>
								<a href="sub/item.html" title="추천상품1_페이지3">
									<img src="img/result/result1_3.png" alt="추천상품1_이미지3"/>
								</a>
							</li>
							<li>
								<p>
									<strong>발마틴 에멘탈 250g</strong>
								</p>
								<a href="sub/item.html" title="추천상품1_페이지4">
									<img src="img/result/result1_4.png" alt="추천상품1_이미지4"/>
								</a>
							</li>
							<li class="li0">
								<p>
									<strong>페이장브레통 르 까망베르 125g</strong>
								</p>
								<a href="sub/item.html" title="추천상품1_페이지5">
									<img src="img/result/result1_5.png" alt="추천상품1_이미지5"/>
								</a>
							</li>
							<li>
								<p>
									<strong>크리미 브리 115g</strong>
								</p>
								<a href="sub/item.html" title="추천상품1_페이지6">
									<img src="img/result/result1_6.png" alt="추천상품1_이미지6"/>
								</a>
							</li>
							<li class="li0">
								<p>
									<strong>해피카우 레귤러 8포션 140g</strong>
								</p>
								<a href="sub/item.html" title="추천상품1_페이지7">
									<img src="img/result/result1_3.png" alt="추천상품1_이미지7"/>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div id="rate">
					<div id="rateText">
						<p class="vote0">
							<span>와인 <i><i class="per0">nn</i>% (<i class="num0">352</i>명)</i></span>
						</p>
						<p class="vote1">
							<span><i><i class="per1">nn</i>% (<i class="num1">280</i>명)</i> 맥주</span>
						</p>
					</div>
				</div>
			</div>
			<div id="pick_wrap">
				<div id="pick">
					<h2>Queen's <strong>Pick</strong></h2>
					<div class="itemArea">
						<ul>
							<li class="li0">
								<a href="sub/collection2.html" title="기획전_페이지0">
									<span class="imgs">
										<img src="img/pick/pick0.jpg" alt="기획전_이미지0"/>
									</span>
									<span class="text">
										<strong>누구나 처음은 있잖아요</strong><br/>
										초보자도 부담 없는 입문자용 치즈를 소개해드려요
									</span>
								</a>
							</li>
							<li class="li1">
								<a href="sub/collection4.html" title="기획전페이지1">
									<span class="imgs">
										<img src="img/pick/pick1.jpg" alt="기획전_이미지1"/>
									</span>
									<span class="text">
										<strong>사장님~ 여기 와인 추가요~</strong><br/>
										와인바 사장님들을 위한 추천. 대용량 구매도 OK!
									</span>
								</a>
							</li>
							<li class="li2">
								<a href="sub/collection3.html" title="기획전페이지2">
									<span class="imgs">
										<img src="img/pick/pick2.jpg" alt="기획전_이미지2"/>
									</span>
									<span class="text">
										<strong>널 위해 준비했어</strong><br/>
										소중한 마음을 담아 보내드려요. 치즈퀸 선물세트
									</span>
								</a>
							</li>
							<li class="li3">
								<a href="sub/collection1.html" title="기획전페이지3">
									<span class="imgs">
										<img src="img/pick/pick3.jpg" alt="기획전_이미지3"/>
									</span>
									<span class="text">
										<strong>혼술에 딱이야!</strong><br/>
										치즈퀸이 추천하는 와인 안주 플래터
									</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div id="review_wrap">
				<div id="review">
					<div class="title">
						<p class="line"></p>
						<p class="text"><strong>cheesequeen review</strong></p>	
					</div>
					
					<div class="itemArea">
						<div class="button">
							<p class="left">
								<a href="#none" title="left">
									<img src="img/basic/arrow_left.png" alt="왼쪽화살표"/>
								</a>
							</p>
							<p class="right">
								<a href="#none" title="right">
									<img src="img/basic/arrow_right.png" alt="오른쪽화살표"/>
								</a>
							</p>
						</div>
						<ul class="film">
							<li class="scene">
								<ul>
									<li>
										<a href="https://www.instagram.com/p/CAfDviSAQ8Z/" title="후기_상품페이지00">
											<img src="img/review/review00.jpg" alt="후기_이미지00"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CA_9MjBB8MG/" title="후기_상품페이지01">
											<img src="img/review/review01.jpg" alt="후기_이미지01"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CCLmKZrnZXF/" title="후기_상품페이지02">
											<img src="img/review/review02.jpg" alt="후기_이미지02"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CGV-cIpBE3d/" title="후기_상품페이지03">
											<img src="img/review/review03.jpg" alt="후기_이미지03"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CGt4MZ6LABe/" title="후기_상품페이지04">
											<img src="img/review/review04.jpg" alt="후기_이미지04"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CGypnDLlAM9/" title="후기_상품페이지05">
											<img src="img/review/review05.jpg" alt="후기_이미지05"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CG9jZ_aglHQ/" title="후기_상품페이지06">
											<img src="img/review/review06.jpg" alt="후기_이미지06"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CG7NuzUsZZr/" title="후기_상품페이지07">
											<img src="img/review/review07.jpg" alt="후기_이미지07"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CG4eujpg9Xw/" title="후기_상품페이지08">
											<img src="img/review/review08.jpg" alt="후기_이미지08"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CHKGAVSFh4U/" title="후기_상품페이지09">
											<img src="img/review/review09.jpg" alt="후기_이미지09"/>
										</a>
									</li>
								</ul>
							</li>
							<li class="scene">
								<ul>
									<li>
										<a href="https://www.instagram.com/p/CHPlr2JA-2q/" title="후기_상품페이지10">
											<img src="img/review/review10.jpg" alt="후기_이미지10"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/Bj4479oAOL2/" title="후기_상품페이지11">
											<img src="img/review/review11.jpg" alt="후기_이미지11"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CHSlrofsAzA/" title="후기_상품페이지12">
											<img src="img/review/review12.jpg" alt="후기_이미지12"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CHRypNUh--Z/" title="후기_상품페이지13">
											<img src="img/review/review13.jpg" alt="후기_이미지13"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CHXinIUFPh_/" title="후기_상품페이지14">
											<img src="img/review/review14.jpg" alt="후기_이미지14"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CHX2mV8D1d_/" title="후기_상품페이지15">
											<img src="img/review/review15.jpg" alt="후기_이미지15"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CHiBPfPHyuG/" title="후기_상품페이지16">
											<img src="img/review/review16.jpg" alt="후기_이미지16"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CHnkLY0JvMY/" title="후기_상품페이지17">
											<img src="img/review/review17.jpg" alt="후기_이미지17"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CHvJ59TFt-E/" title="후기_상품페이지18">
											<img src="img/review/review18.jpg" alt="후기_이미지18"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CH23LmbDVHN/" title="후기_상품페이지19">
											<img src="img/review/review19.jpg" alt="후기_이미지19"/>
										</a>
									</li>
								</ul>
							</li>
							<li class="scene">
								<ul>
									<li>
										<a href="https://www.instagram.com/p/CH0aXuZhDid/" title="후기_상품페이지20">
											<img src="img/review/review20.jpg" alt="후기_이미지20"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CIGRbucnAnj/" title="후기_상품페이지21">
											<img src="img/review/review21.jpg" alt="후기_이미지21"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CH24bSkBfIr/" title="후기_상품페이지22">
											<img src="img/review/review22.jpg" alt="후기_이미지22"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CIGTK0vpczt/" title="후기_상품페이지23">
											<img src="img/review/review23.jpg" alt="후기_이미지23"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CIIncvanWR_/" title="후기_상품페이지24">
											<img src="img/review/review24.jpg" alt="후기_이미지24"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CIGB8bHBjZr/" title="후기_상품페이지25">
											<img src="img/review/review25.jpg" alt="후기_이미지25"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CIFjkG3pMbG/" title="후기_상품페이지26">
											<img src="img/review/review26.jpg" alt="후기_이미지26"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CINo9Zbl09K/" title="후기_상품페이지27">
											<img src="img/review/review27.jpg" alt="후기_이미지27"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CIQFsFWpMN4/" title="후기_상품페이지28">
											<img src="img/review/review28.jpg" alt="후기_이미지28"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CIIWtvRJxQZ/" title="후기_상품페이지29">
											<img src="img/review/review29.jpg" alt="후기_이미지29"/>
										</a>
									</li>
								</ul>
							</li>
							<li class="scene">
								<ul>
									<li>
										<a href="https://www.instagram.com/p/CIkXGCsFBVc/" title="후기_상품페이지30">
											<img src="img/review/review30.jpg" alt="후기_이미지30"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CIbJPqhJB0k/" title="후기_상품페이지31">
											<img src="img/review/review31.jpg" alt="후기_이미지31"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CIRzhgQhkPX/" title="후기_상품페이지32">
											<img src="img/review/review32.jpg" alt="후기_이미지32"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CIigpUGHRX4/" title="후기_상품페이지33">
											<img src="img/review/review33.jpg" alt="후기_이미지33"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CIncPAlpBb9/" title="후기_상품페이지34">
											<img src="img/review/review34.jpg" alt="후기_이미지34"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CI3Dxeajx41/" title="후기_상품페이지35">
											<img src="img/review/review35.jpg" alt="후기_이미지35"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CI678kvlbsb/" title="후기_상품페이지36">
											<img src="img/review/review36.jpg" alt="후기_이미지36"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CI7nAxrgzwC/" title="후기_상품페이지37">
											<img src="img/review/review37.jpg" alt="후기_이미지37"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CI9wuS0jyhQ/" title="후기_상품페이지38">
											<img src="img/review/review38.jpg" alt="후기_이미지38"/>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/p/CJIDIAxhYuO/" title="후기_상품페이지39">
											<img src="img/review/review39.jpg" alt="후기_이미지39"/>
										</a>
									</li>
								</ul>
							</li>
						</ul>						
					</div>
				</div>
			</div>
			<div id="world_wrap">
				<div id="world">
					<h2>
						떠나자!<br/>
						<b>치즈</b>로 <i>세계여행</i>
					</h2>
					<ul>
						<li class="li0">				
							<a href="sub/world.html" title="이탈리아치즈_페이지">
								<span class="text">
									<strong>이탈리아</strong><br/>
									고르곤졸라, 모짜렐라, 리코타 <br/>
									파르미자노 레자노 치즈
								</span>
							</a>
							<p>
								<img src="img/world/flag_italy.png" alt="이탈리아국기"/>
							</p>
						</li>
						<li class="li1">
							<a href="sub/world.html" title="스위스치즈_페이지">
								<span class="text">
									<strong>스위스</strong><br/>
									그뤼에르, 라끌렛<br/>
									에멘탈 치즈
								</span>
							</a>
							<p>
								<img src="img/world/flag_switz.png" alt="스위스국기"/>
							</p>
						</li>
						<li class="li2">					
							<a href="sub/world.html" title="네덜란드치즈_페이지">
								<span class="text">
									<strong>네덜란드</strong><br/>
									고다, 에담, 마스댐머<br/>
									고트 치즈
								</span>
							</a>
							<p>
								<img src="img/world/flag_neth.png" alt="네덜란드국기"/>
							</p>
						</li>
						<li class="li3">
							<a href="sub/world.html" title="미국치즈_페이지">
								<span class="text">
									<strong>미국</strong><br/>
									콜비, 몬트레이잭<br/>
									페퍼잭, 아메리칸 치즈
								</span>
							</a>
							<p>
								<img src="img/world/flag_uSA.png" alt="미국국기"/>
							</p>
						</li>
						<li class="li4">
							<a href="sub/world.html" title="프랑스치즈_페이지">
								<span class="text">
									<strong>프랑스</strong><br/>
									꽁떼, 미몰레뜨<br/>
									까망베르, 브리 치즈
								</span>
							</a>
							<p>
								<img src="img/world/flag_france.png" alt="프랑스국기"/>
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div id="taste_wrap">
				<div id="taste">
					<div class="title">
						<div class="text">
							<h2>개인의 취향</h2>
							<p class="desc">카테고리별 <strong>베스트 5</strong></p>
						</div>
						<div class="nav">
							<ul class="pcNav">
								<li class="li0 selected">
									<a href="#none" title="생치즈">크리미한 생치즈</a>
								</li>
								<li class="li1">
									<a href="#none" title="하드치즈">짭짤한 하드치즈</a>
								</li>
								<li class="li2">
									<a href="#none" title="과일치즈">산뜻해요 과일치즈</a>
								</li>
								<li class="li3">
									<a href="#none" title="블루치즈">콤콤한 블루치즈</a>
								</li>
								<li class="li4">
									<a href="#none" title="크림치즈">빵과 함께 크림치즈</a>
								</li>
							</ul>
							<ul class="mobNav">
								<li class="li0 selected">
									<a href="#none" title="생치즈">크리미한 생치즈</a>
								</li>
								<li class="li1">
									<a href="#none" title="하드치즈">짭짤한 하드치즈</a>
								</li>
								<li class="li2">
									<a href="#none" title="과일치즈">산뜻해요 과일치즈</a>
								</li>
								<li class="li3">
									<a href="#none" title="블루치즈">콤콤한 블루치즈</a>
								</li>
								<li class="li4">
									<a href="#none" title="크림치즈">빵과 함께 크림치즈</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemArea">
						<ul>
							<li class="big">
								<a href="sub/item.html" title="taste_상품페이지0">
									<span class="img">
										<img src="img/taste/taste0_0.jpg" alt="taste0_상품이미지0"/>
									</span>
									<span class="text">
										<strong class="title">
											벨지오이오소 블랙 트러플 부라타 226g
										</strong>
										<i class="desc">
											신선한 모짜렐라 치즈 주머니 속에 생크림과 블랙트러플, 모짜조각이 가득. 향긋한 부라타 괜찮은 선택!
										</i>
										<strong class="price">
											16100원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지1">
									<span class="img">
										<img src="img/taste/taste0_1.jpg" alt="taste0_상품이미지1"/>
									</span>
									<span class="text">
										<strong class="title">
											브리미 모짜렐라 로그 400g
										</strong>	
										<i class="desc">
											보기 드문 로그타입 이탈리안 후레시 모짜렐라. 가장 맛있는 카프레제를 원하신다면!
										</i>
										<strong class="price">
											12800원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지2">
									<span class="img">
										<img src="img/taste/taste0_2.jpg" alt="taste0_상품이미지2"/>
									</span>
									<span class="text">
										<strong class="title">
											브렐렛 후레쉬 모짜렐라 125g
										</strong>
										<i class="desc">
											치즈 초보자도 부담없이 먹을 수 있는 고소하고 신선한 생모짜렐라
										</i>
										<strong class="price">
											5200원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지3">
									<span class="img">
										<img src="img/taste/taste0_3.jpg" alt="taste0_상품이미지3"/>
									</span>
									<span class="text">
										<strong class="title">
											가로팔로 버팔로 모짜렐라 125g
										</strong>
										<i class="desc">
											버팔로 물소젖으로 만든 정통 모짜렐라
										</i>
										<strong class="price">
											7800원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지4">
									<span class="img">
										<img src="img/taste/taste0_4.jpg" alt="taste0_상품이미지4"/>
									</span>
									<span class="text">
										<strong class="title">
											벨지오이오소 부라타 226g
										</strong>
										<i class="desc">
											모짜렐라 속에 크림이 꿀럭꿀럭 들어차있습니다. 샐러드와 함께 먹으면 환상적인 별미에요!
										</i>
										<strong class="price">
											14200원
										</strong>
									</span>
								</a>
							</li>
						</ul>
						<ul>
							<li class="big">
								<a href="sub/item.html" title="taste_상품페이지0">
									<span class="img">
										<img src="img/taste/taste1_0.jpg" alt="taste1_상품이미지0"/>
									</span>
									<span class="text">
										<strong class="title">
											안티코 파르미지아노 레지아노 150g
										</strong>
										<i class="desc">
											깊은 풍미의 경성치즈 파르미지아노 레지아노. 진짜 덩어리 파마산
										</i>
										<strong class="price">
											8900원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지1">
									<span class="img">
										<img src="img/taste/taste1_1.jpg" alt="taste1_상품이미지1"/>
									</span>
									<span class="text">
										<strong class="title">
											페이장 브레통 에멘탈 프랑시스 250g
										</strong>	
										<i class="desc">
											섬세함이 돋보이는 프랑스산 에멘탈은 어떠신가요?
										</i>
										<strong class="price">
											8000원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지2">
									<span class="img">
										<img src="img/taste/taste1_2.jpg" alt="taste1_상품이미지2"/>
									</span>
									<span class="text">
										<strong class="title">
											엠보그 스위스 슬라이스 에멘탈 200g (10장)
										</strong>
										<i class="desc">
											그저 그런 샌드위치를 특별하게 만들어드릴 슬라이스 에멘탈입니다
										</i>
										<strong class="price">
											5540원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지3">
									<span class="img">
										<img src="img/taste/taste1_3.jpg" alt="taste1_상품이미지3"/>
									</span>
									<span class="text">
										<strong class="title">
											더치 마스터피스 빈센트 200g
										</strong>
										<i class="desc">
											마지막 한 조각까지 멈출 수 없는 중독성 강한 맛. 26주 숙성고다
										</i>	
										<strong class="price">
											9180원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지4">
									<span class="img">
										<img src="img/taste/taste1_4.jpg" alt="taste1_상품이미지4"/>
									</span>
									<span class="text">
										<strong class="title">
											베르기어 포션 믹스 6pcs(고다, 에담, 체다, 더블 글로체스터) 120g
										</strong>
										<i class="desc">
											유명한 반경성 치즈들이 다모였습니다. 골고루 드셔보기에 딱이에요
										</i>
										<strong class="price">
											7200원
										</strong>
									</span>
								</a>
							</li>
						</ul>
						<ul>
							<li class="big">
								<a href="sub/item.html" title="taste_상품페이지0">
									<span class="img">
										<img src="img/taste/taste2_0.jpg" alt="taste2_상품이미지0"/>
									</span>
									<span class="text">
										<strong class="title">
											아폴로 과일치즈 살구 앤 아몬드 125g
										</strong>
										<i class="desc">
											코st코에서 판매중인 그 제품이 맞습니다. 달콤한 크림치즈에 상큼한 살구5.3%와 고소한 아몬드2.1% 함유
										</i>
										<strong class="price">
											4920원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지1">
									<span class="img">
										<img src="img/taste/taste2_1.jpg" alt="taste2_상품이미지1"/>
									</span>
									<span class="text">
										<strong class="title">
											램노스 과일치즈(블랙포레스트) 125g
										</strong>
										<i class="desc">
											체리와 딸기가 듬뿍 들어간 과일치즈랍니다
										</i>
										<strong class="price">
											5400원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지2">
									<span class="img">
										<img src="img/taste/taste2_2.jpg" alt="taste2_상품이미지2"/>
									</span>
									<span class="text">
										<strong class="title">
											엘프 망고 멜론치즈 125g
										</strong>
										<i class="desc">
											말린 멜론과 망고가 쫀득하게 씹히는 맛좋은 스낵치즈입니다
										</i>
										<strong class="price">
											4900원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지3">
									<span class="img">
										<img src="img/taste/taste2_3.jpg" alt="taste2_상품이미지3"/>
									</span>
									<span class="text">
										<strong class="title">
											램노스 과일치즈(후르츠 넛트) 125g
										</strong>
										<i class="desc">
											후루츠루츠르 후루츠루츠르 후루츠루츠르 넛넛넛 달콤하고 고소한 인기치즈
										</i>
										<strong class="price">
											5400원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지4">
									<span class="img">
										<img src="img/taste/taste2_4.jpg" alt="taste2_상품이미지4"/>
									</span>
									<span class="text">
										<strong class="title">
											램노스 과일치즈(갈릭 차이브) 125g
										</strong>
										<i class="desc">
											허브의 향미가 좋고 맛이 부드러워 와인과 잘 어울려요
										</i>
										<strong class="price">
											5400원
										</strong>
									</span>
								</a>
							</li>
						</ul>
						<ul>
							<li class="big">
								<a href="sub/item.html" title="taste_상품페이지0">
									<span class="img">
										<img src="img/taste/taste3_0.jpg" alt="taste3_상품이미지0"/>
									</span>
									<span class="text">
										<strong class="title">
											안젤로 고르곤졸라 피칸테 150g
										</strong>
										<i class="desc">
											냉장고를 부탁해 지누션 편 중 션의 냉장고에 있던 바로 그 제품
										</i>
										<strong class="price">
											5700원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지1">
									<span class="img">
										<img src="img/taste/taste3_1.jpg" alt="taste3_상품이미지1"/>
									</span>
									<span class="text">
										<strong class="title">
											생 아구르(생 따귀르) 크림 150g
										</strong>
										<i class="desc">
											발라먹는 블루치즈, 예상밖의 조화
										</i>
										<strong class="price">
											9380원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지2">
									<span class="img">
										<img src="img/taste/taste3_2.jpg" alt="taste3_상품이미지2"/>
									</span>
									<span class="text">
										<strong class="title">
											일드 프랑스 브리 오 블루 125g
										</strong>
										<i class="desc">
											블루치즈를 품은 브리, 본격 블루치즈가 부담스러운 분들에게 추천합니다
										</i>
										<strong class="price">
											7900원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지3">
									<span class="img">
										<img src="img/taste/taste3_3.jpg" alt="taste3_상품이미지3"/>
									</span>
									<span class="text">
										<strong class="title">
											캔토렐 블루 도베르뉴 125g
										</strong>
										<i class="desc">
											이태리에 고르곤졸라가 있다면 프랑스에는 블루 도베르뉴가 있습니다
										</i>
										<strong class="price">
											5980원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지4">
									<span class="img">
										<img src="img/taste/taste3_4.jpg" alt="taste3_상품이미지4"/>
									</span>
									<span class="text">
										<strong class="title">
											엠보그 다나블루 클래식 100g
										</strong>
										<i class="desc">
											부드러운 질감과 독특한 블루치즈의 향을 즐기실 수 있습니다. 데니쉬(덴마크) 블루치즈
										</i>
										<strong class="price">
											3560원
										</strong>
									</span>
								</a>
							</li>
						</ul>
						<ul>
							<li class="big">
								<a href="sub/item.html" title="taste_상품페이지0">
									<span class="img">
										<img src="img/taste/taste4_0.jpg" alt="taste4_상품이미지0"/>
									</span>
									<span class="text">
										<strong class="title">
											퀘스크렘 유기농 크림치즈 200g
										</strong>
										<i class="desc">
											원유는 물론 소금까지, 모든 재료 유기농 크림치즈, EU유기농인증! 상상하시는 그 크림치즈
										</i>	
										<strong class="price">
											7400원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지2">
									<span class="img">
										<img src="img/taste/taste4_1.jpg" alt="taste4_상품이미지1"/>
									</span>
									<span class="text">
										<strong class="title">
											데본 클로티드 크림 170g
										</strong>
										<i class="desc">
											버터보단 가볍고, 크리미하며, 농축된 우유맛의 아무데나 발라도 다 맛나는 크림. 사장의 최고 훼이보릿
										</i>
										<strong class="price">
											10600원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지2">
									<span class="img">
										<img src="img/taste/taste4_2.jpg" alt="taste4_상품이미지2"/>
									</span>
									<span class="text">
										<strong class="title">
											따르따르 아페리프레 프로방스 100g
										</strong>
										<i class="desc">
											다섯가지 허브가 사뿐히 올라앉은 크림치즈가 당신에게 시원한 화이트 와인 한잔을 권합니다.
										</i>
										<strong class="price">
											8200원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지3">
									<span class="img">
										<img src="img/taste/taste4_3.jpg" alt="taste4_상품이미지3"/>
									</span>
									<span class="text">
										<strong class="title">
											그릴드 머쉬룸 위드 크림치즈 280g(고형량 180g)
										</strong>
										<i class="desc">
											구운 양송이에 양념된 크림치즈와 고트 치즈를 듬뿍 채워 카놀라유에 재운 제품
										</i>
										<strong class="price">
											8300원
										</strong>
									</span>
								</a>
							</li>
							<li>
								<a href="sub/item.html" title="taste_상품페이지4">
									<span class="img">
										<img src="img/taste/taste4_4.jpg" alt="taste4_상품이미지4"/>
									</span>
									<span class="text">
										<strong class="title">
											마담로익 크림치즈 샬롯 앤 차이브 150g
										</strong>
										<i class="desc">
											갈릭앤 허브와 비슷지만 좀 가벼운 향이랄까. 양파와 부추계열의 풍미로 산뜻합니다
										</i>
										<strong class="price">
											11900원
										</strong>
									</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div id="testBanner_wrap">
				<div id="testBanner">
					<p>
						<a href="sub/test.html" title="테스트배너_페이지">
							<i>내 취향을 나도 잘 모르겠다면?</i><br/>
							<span><strong>치즈 MBTI</strong> 테스트 하러 가기 <b>GO!</b></span>
						</a>
					</p>
				</div>
			</div>
			<div id="combi_wrap">
				<div id="combi">
					<h2><strong>combination</strong> set</h2>
					<ul>
						<li class="mobTitle">
							<p><strong>combination</strong> set</p>
						</li>
						<li class="li0">
							<a href="sub/item_combi0.html" title="combi_page0">
								<span>
									<strong>파마산</strong><br/>
									직접<br/>
									갈아먹기
								</span>
								<span class="hover">
									<img src="img/combi/li0_item0.png" alt="소스이미지0"/>
									<img src="img/combi/li0_item1.png" alt="소스이미지1"/>
								</span>
								<em>
									11<i>%</i>
								</em>
							</a>
						</li>
						<li class="li1">
							<a href="sub/item_combi1.html" title="combi_page0">
								<span>
									<strong>티타임</strong>을<br/>
									위하여
								</span>
								<span class="hover">
									<img src="img/combi/li1_item0.png" alt="소스이미지0"/>
									<img src="img/combi/li1_item1.png" alt="소스이미지1"/>
								</span>
								<em>
									&nbsp;5<i>%</i>
								</em>
							</a>
						</li>
						<li class="li2">
							<a href="sub/item_combi2.html" title="combi_page0">
								<span>
									말로만<br/>
									듣던<br/>
									<strong>라끌렛</strong>
								</span>
								<span class="hover">
									<img src="img/combi/li2_item0.png" alt="소스이미지0"/>
									<img src="img/combi/li2_item1.png" alt="소스이미지1"/>
								</span>
								<em>
									10<i>%</i>
								</em>
							</a>
						</li>
						<li class="li3">
							<a href="sub/item_combi3.html" title="combi_page0">
								<span>
									맛있고<br/>
									간편한<br/>
									<strong>파스타</strong>
								</span>
								<span class="hover">
									<img src="img/combi/li3_item0.png" alt="소스이미지0"/>
									<img src="img/combi/li3_item1.png" alt="소스이미지1"/>
								</span>
								<em>
									16<i>%</i>
								</em>
							</a>
						</li>
						<li class="li4">
							<a href="sub/item_combi4.html" title="combi_page0">
								<span>
									미니미니<br/>
									<strong>잼&amp;버터</strong>
								</span>
								<span class="hover">
									<img src="img/combi/li4_item0.png" alt="소스이미지0"/>
									<img src="img/combi/li4_item1.png" alt="소스이미지1"/>
								</span>
								<em>
									&nbsp;5<i>%</i>
								</em>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="friends_wrap">
				<div id="friends">
					<div class="title">
						<h2>cheese friends</h2>
						<p>치즈와 찰떡궁합! 함께 담으면 요긴한 추천상품</p>
					</div>
					<section>
						<h5>하몽과 살라미</h5>
						<div class="titleArea">
							<strong class="h2">하몽과<span>살라미</span></strong>
							<p>치즈 플래터 단짝친구</p>
						</div>
						<div class="itemArea">
							<p class="buttonL">
								<a href="#none" title="left">
									<img src="img/basic/arrow_left.png" alt="왼쪽화살표"/>
								</a>
							</p>
							<div class="screen">
								<ul>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="하몽과살라미_상품페이지0">
												<img src="img/item/friends/jamon/s121.jpg" alt="하몽과살라미_상품이미지0"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="타임세일_상품페이지0">
													<strong>다니엘 살라미 소프레사타 198g</strong>
												</a>
											</p>
											<p class="desc">이태리 베네토 지방의 살라미</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">11800원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="하몽과살라미_상품페이지1">
												<img src="img/item/friends/jamon/s122.jpg" alt="하몽과살라미_상품이미지1"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="타임세일_상품페이지1">
													<strong>에스푸나 초리조 드 하몽 스낵 50g</strong>
												</a>
											</p>
											<p class="desc">안주 플래터를 장식해줄 최고의 하몽스낵!</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">5020원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="하몽과살라미_상품페이지2">
												<img src="img/item/friends/jamon/s123.jpg" alt="하몽과살라미_상품이미지2"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="타임세일_상품페이지2">
													<strong>에스푸나 살지촌 키콘 슬라이스 100g</strong>
												</a>
											</p>
											<p class="desc">
												담백하고 깔끔한 스페인 맛. 샌드위치 재료로 추천!
											</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">4480원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="하몽과살라미_상품페이지3">
												<img src="img/item/friends/jamon/010_0.jpg" alt="하몽과살라미_상품이미지3"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="타임세일_상품페이지3">
													<strong>에스푸나 살라미 슬라이스 100g</strong>
												</a>
											</p>
											<p class="desc">피자토핑으로 매우 추천합니다</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">8840원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="하몽과살라미_상품페이지4">
												<img src="img/item/friends/jamon/020_0.jpg" alt="하몽과살라미_상품이미지4"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="타임세일_상품페이지4">
													<strong>빌라르 초리조 이베리코 엑스트라 슬라이스 100g</strong>
												</a>
											</p>
											<p class="desc">왕년의 베스트셀러 컴백!</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">8400원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="하몽과살라미_상품페이지5">
												<img src="img/item/friends/jamon/030_0.jpg" alt="하몽과살라미_상품이미지5"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="타임세일_상품페이지5">
													<strong>볼피 롤티니(로톨라) 226g</strong>
												</a>
											</p>
											<p class="desc">
												모짜렐라와 프로슈토가 함께 돌돌 말렸습니다. 얇게 썰어 안주로, 살짝 뎁혀 빵위에!
											</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">14600원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="하몽과살라미_상품페이지6">
												<img src="img/item/friends/jamon/063_0.jpg" alt="하몽과살라미_상품이미지6"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="하몽과살라미_상품페이지6">
													<strong>티롤러 쉰켄스펙 슬라이스 GGA 100g(약10매)</strong>
												</a>
											</p>
											<p class="desc">허브향이 잡내를 잡아낸 독일 티롤지방의 생햄 스펙입니다.</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">7060원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="하몽과살라미_상품페이지7">
												<img src="img/item/friends/jamon/060_0.jpg" alt="하몽과살라미_상품이미지7"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="하몽과살라미_상품페이지7">
													<strong>에스푸나 잠봉 슬라이스 100g</strong>
												</a>
											</p>
											<p class="desc">은은한 훈제향이 매력적인 짜지 않은 잠봉!</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">6800원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="하몽과살라미_상품페이지8">
												<img src="img/item/friends/jamon/061_0.jpg" alt="하몽과살라미_상품이미지8"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="하몽과살라미_상품페이지8">
													<strong>페라리니 프로슈토 꼬또 2.9kg (비정량)</strong>
												</a>
											</p>
											<p class="desc">
												익힌 프로슈토 입니다. 맛있는 샌드위치를 만들고 싶다면 추천!
											</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">140510원</strong>
											</p>
										</div>
									</li>
								</ul>
							</div>
							<p class="buttonR">
								<a href="#none" title="right">
									<img src="img/basic/arrow_right.png" alt="오른쪽화살표"/>
								</a>
							</p>
						</div>
					</section>
					<section>
						<h5>발사믹과 요리식초</h5>
						<div class="titleArea">
							<strong class="h2">발사믹과<span>요리식초</span></strong>
							<p>샐러드에 산미를 더해요</p>
						</div>
						<div class="itemArea">
							<p class="buttonL">
								<a href="#none" title="left">
									<img src="img/basic/arrow_left.png" alt="왼쪽화살표"/>
								</a>
							</p>
							<div class="screen">
								<ul>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="식초_상품페이지0">
												<img src="img/item/friends/oil/s088.jpg" alt="타임세일_상품이미지0"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="식초_상품페이지0">
													<strong>에밀리아 유기농 애플 비네거 250ml</strong>
												</a>
											</p>
											<p class="desc">
												이태리산 유기농 사과과즙을 오크숙성한 유기농 사과식초
											</p>
											<p class="price">
												<span class="line">14800원</span><strong class="green">14060원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="식초_상품페이지1">
												<img src="img/item/friends/oil/s087.jpg" alt="식초_상품이미지1"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="식초_상품페이지1">
													<strong>에밀리아 유기농 레드와인 비네거 250ml</strong>
												</a>
											</p>
											<p class="desc">
												레드와인의 향을 즐길 수 있는 레드와인 발사믹
											</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">8400원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="식초_상품페이지2">
												<img src="img/item/friends/oil/s089.jpg" alt="식초_상품이미지2"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="식초_상품페이지2">
													<strong>에밀리아 유기농 모데나 발사믹 비네거 250ml</strong>
												</a>
											</p>
											<p class="desc">
												단맛이 강한 유기농 포도즙과 발효된 와인을 섞어 제작한 오크숙성 비니거
											</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">16400원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="식초_상품페이지3">
												<img src="img/item/friends/oil/020_0.jpg" alt="식초_상품이미지3"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="식초_상품페이지3">
													<strong>플랜틴 블랙 트러플 발사믹 글레이즈 250ml</strong>
												</a>
											</p>
											<p class="desc">
												스프레이타입X
											</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">16400원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="식초_상품페이지4">
												<img src="img/item/friends/oil/021_0.jpg" alt="타임세일_상품이미지4"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="식초_상품페이지4">
													<strong>클로비스 샴페인 비네거 500ml</strong>
												</a>
											</p>
											<p class="desc">
												독특한 풍미를 더하고 싶다면 추천!
											</p>
											<p class="price">
												<span class="line">12000원</span><strong class="green">9600원</strong>
											</p>
										</div>
									</li>								
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="식초_상품페이지5">
												<img src="img/item/friends/oil/022_0.jpg" alt="식초_상품이미지5"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="식초_상품페이지5">
													<strong>클로비스 프로방스 허브 비네거 250ml</strong>
												</a>
											</p>
											<p class="desc">
												허브향이 코 끝을 스치는 유니크한 비네거!
											</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">9600원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="식초_상품페이지6">
												<img src="img/item/friends/oil/030_0.jpg" alt="타임세일_상품이미지6"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="식초_상품페이지6">
													<strong>빌라 비토리아 모데나 발사믹 글레이즈 IGP 500ml</strong>
												</a>
											</p>
											<p class="desc">
												IGP(이탈리안 지역인증)급 글레이즈를 이 가격에!!! 맛은 기본. 가격이 장점
											</p>
											<p class="price">
												<span class="line">12400원</span><strong class="green">11160원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="식초_상품페이지7">
												<img src="img/item/friends/oil/000_0.jpg" alt="식초_상품이미지7"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="식초_상품페이지7">
													<strong>루글리오 화이트 트러플 오일 250ml</strong>
												</a>
											</p>
											<p class="desc">
												저렴한 가격에 즐기는 트러플
											</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">9300원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="식초_상품페이지8">
												<img src="img/item/friends/oil/001_0.jpg" alt="식초_상품이미지8"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="식초_상품페이지8">
													<strong>압착 엑스트라버진 올리브유 250ml</strong>
												</a>
											</p>
											<p class="desc">
												기본에 충실한 제품. 저렴한 가격이 장점!
											</p>
											<p class="price">
												<!--<span class="line">6400원</span>--><strong class="green">4900원</strong>
											</p>
										</div>
									</li>
								</ul>
							</div>							
							<p class="buttonR">
								<a href="#none" title="right">
									<img src="img/basic/arrow_right.png" alt="오른쪽화살표"/>
								</a>
							</p>
						</div>
					</section>
					<section>
						<h5>과일잼과 마법의 재료</h5>
						<div class="titleArea">
							<strong class="h2">과일잼과<span>마법의 재료</span></strong>
							<p>이국적 풍미 모음</p>
						</div>
						<div class="itemArea">
							<p class="buttonL">
								<a href="#none" title="left">
									<img src="img/basic/arrow_left.png" alt="왼쪽화살표"/>
								</a>
							</p>
							<div class="screen">
								<ul>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="잼_상품페이지0">
												<img src="img/item/friends/jam/s130.jpg" alt="잼_상품이미지0"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="잼_상품페이지0">
													<strong>Jam For Cheese 라즈베리와 스타아니스</strong>
												</a>
											</p>
											<p class="desc">라즈베리와 향신료 스타아니스의 풍미</p>
											<p class="price">
												<span class="line">6400원</span><strong class="green">4600원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="잼_상품페이지1">
												<img src="img/item/friends/jam/s017.jpg" alt="잼_상품이미지1"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="잼_상품페이지1">
													<strong>만토바 이탈리안 고메버터 250g (무염)</strong>
												</a>
											</p>
											<p class="desc">리뷰확인필수! 품질과 가격 둘 다 아름다와요!</p>
											<p class="price">
												<span class="line">6200원</span><strong class="green">5270원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="잼_상품페이지2">
												<img src="img/item/friends/jam/s120.jpg" alt="잼_상품이미지2"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="잼_상품페이지2">
													<strong>포메리 머스타드 500g</strong>
												</a>
											</p>
											<p class="desc">광장동 워커*호텔에서 사용하는 최고급 홀그레인</p>
											<p class="price">
												<span class="line">6400원</span><strong class="green">14020원</strong>
											</p>
										</div>
									</li>					<li>
										<p class="imgLink">
											<a href="sub/item.html" title="잼_상품페이지3">
												<img src="img/item/friends/spice/000_0.jpg" alt="잼_상품이미지3"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="잼_상품페이지3">
													<strong>베가 카제레 훈제 파프리카 파우더 비터스윗 75g</strong>
												</a>
											</p>
											<p class="desc">예쁜 빨간색이지만 매운맛은 아니에요!</p>
											<p class="price">
												<span class="line">12900원</span><strong class="green">11000원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="잼_상품페이지4">
												<img src="img/item/friends/spice/010_0.jpg" alt="잼_상품이미지4"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="잼_상품페이지4">
													<strong>바릴라 바질 파스타 소스 400g (바질 2% 함유)</strong>
												</a>
											</p>
											<p class="desc">바질향이 듬뿍 나는 소스!</p>
											<p class="price">
												<span class="line">4600원</span><strong class="green">4000원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="잼_상품페이지5">
												<img src="img/item/friends/spice/030_0.jpg" alt="잼_상품이미지5"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="잼_상품페이지5">
													<strong>다미코 트러플소스 130g</strong>
												</a>
											</p>
											<p class="desc">어디에 넣어도 어울리는 고소한 풍미</p>
											<p class="price">
												<span class="line">5800원</span><strong class="green">5440원</strong>
											</p>
										</div>
									</li>		
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="잼_상품페이지6">
												<img src="img/item/friends/jam/000_0.jpg" alt="잼_상품이미지6"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="잼_상품페이지6">
													<strong>샹 달프 금귤잼 284g (금귤 35% 함유)</strong>
												</a>
											</p>
											<p class="desc">날마다 오는게 아닌 샹달프 금귤! 강력추천해요!</p>
											<p class="price">
												<span class="line">7900원</span><strong class="green">7200원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="잼_상품페이지7">
												<img src="img/item/friends/jam/001_0.jpg" alt="잼_상품이미지7"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="잼_상품페이지7">
													<strong>샹 달프 블루베리잼 (블루베리 50% 함유) 284g</strong>
												</a>
											</p>
											<p class="desc">인공첨가물, 방부제를 전혀 사용하지 않은 천연재료 100%의 블루베리잼</p>
											<p class="price">
												<span class="line">7900원</span><strong class="green">7200원</strong>
											</p>
										</div>
									</li>
									<li>
										<p class="imgLink">
											<a href="sub/item.html" title="잼_상품페이지8">
												<img src="img/item/friends/jam/002_0.jpg" alt="잼_상품이미지8"/>
											</a>
										</p>
										<div class="text">
											<p class="textLink">
												<a href="sub/item.html" title="잼_상품페이지8">
													<strong>샹 달프 딸기잼 (딸기 50%함유) 284g</strong>
												</a>
											</p>
											<p class="desc">인공첨가물, 방부제를 전혀 사용하지 않은 천연재료 100%의 딸기잼</p>
											<p class="price">
												<span class="line">7900원</span><strong class="green">7200원</strong>
											</p>
										</div>
									</li>
								</ul>
							</div>
							<p class="buttonR">
								<a href="#none" title="right">
									<img src="img/basic/arrow_right.png" alt="오른쪽화살표"/>
								</a>
							</p>
						</div>
					</section>
				</div>
			</div>
			<div id="pondue_wrap">
				<div id="pondue">
					<p class="left">
						<a href="sub/item.html" title="퐁듀_추천페이지">
							<span class="imgs">
								<img src="img/pondue/pondue_0.jpg" alt="퐁듀_이미지"/>
							</span>
							<span class="desc">
								<strong>보스카 블랙 퐁듀 타파스 (용량 200ml)</strong>
								<em>48400원</em>
							</span>
						</a>
					</p>
					<div class="right">
						<div class="title">
							<h2>
								마음까지 따뜻해♡<br/>
								퐁당퐁당 퐁듀
							</h2>
							<p>
								치즈퀸만의 다양한 퐁듀치즈들을 만나보세요!
							</p>
						</div>
						<div class="itemArea">
							<ul>
								<li>
									<a href="sub/item.html" title="퐁듀_상품페이지0">
										<span class="imgs">
											<img src="img/item/cheese/natural/0715_0.jpg" alt="퐁듀_상품이미지0"/>
										</span>
										<span class="desc">
											<strong>더치 마스터피스 빈센트 200g</strong>
											<em>9180원</em>
										</span>
									</a>
								</li>
								<li>
									<a href="sub/item.html" title="퐁듀_상품페이지1">
										<span class="imgs">
											<img src="img/item/cheese/natural/0711_0.jpg" alt="퐁듀_상품이미지1"/>
										</span>
										<span class="desc">
											<strong>고다 웨지 275g</strong>
											<em>8700원</em>
										</span>
									</a>
								</li>
								<li>
									<a href="sub/item.html" title="퐁듀_상품페이지2">
										<span class="imgs">
											<img src="img/item/cheese/natural/0718_0.jpg" alt="퐁듀_상품이미지2"/>
										</span>
										<span class="desc">
											<strong>빔스터 로얄고다 그랑크뤼 250g</strong>
											<em>11800원</em>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="bestHot_wrap">
				<div id="bestHot">
					<div id="best">
						<h2>
							BEST 60
							<strong>치즈퀸 베스트 60</strong>
							<i class="refresh">
								<a href="#none" title="새로고침버튼">
									<img src="img/basic/icon_refresh.png" alt="새로고침"/>
								</a>
							</i>
						</h2>
						<section>
							<h5>치즈퀸 베스트 60</h5>
							<ul>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="베스트60_상품페이지0">
											<img src="img/item/cheese/natural/1002_1.jpg" alt="베스트60_상품이미지0"/>
										</a>
									</p>
									<div class="text">
										<p class="textLink">
											<a href="sub/item.html" title="타임세일_상품페이지0">
												<strong>하르데거 A.O.C. 그뤼에르 200g</strong>
											</a>
										</p>
										<p class="desc">남산 위 H호텔에서 사용중</p>
										<p class="price">
											<span class="line">11600원</span><strong class="green">11000원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="베스트60_상품페이지1">
											<img src="img/item/cheese/natural/1101_1.jpg" alt="베스트60_상품이미지1"/>
										</a>
									</p>
									<div class="text">
										<p class="textLink">
											<a href="sub/item.html" title="타임세일_상품페이지1">
												<strong>이즈니 미몰레트 데미 빌르 210g</strong>
											</a>
										</p>
										<p class="desc">치즈냄새가 강하지 않고 고소해요.</p>
										<p class="price">
											<span class="line">15200원</span><strong class="green">14100원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="베스트60_상품페이지2">
											<img src="img/item/cheese/natural/0904_1.jpg" alt="베스트60_상품이미지2"/>
										</a>
									</p>
									<div class="text">
										<p class="textLink">
											<a href="sub/item.html" title="타임세일_상품페이지1">
												<strong>캐시밸리 마일드 체다 치즈 226g</strong>
											</a>
										</p>
										<p class="desc">녹여드세요! 더 맛있으니까요.</p>
										<p class="price">
											<span class="line">5560원</span><strong class="green">4480원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="베스트60_상품페이지2">
											<img src="img/item/cheese/natural/0000_1.jpg" alt="베스트60_상품이미지2"/>
										</a>
									</p>
									<div class="text">
										<p class="textLink">
											<a href="sub/item.html" title="타임세일_상품페이지2">
												<strong>브리미 리코타 쁘띠 100g</strong>
											</a>
										</p>
										<p class="desc">앙증맞은 1인1끼 사이즈</p>
										<p class="price">
											<span class="line">3600원</span><strong class="green">2520원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="베스트60_상품페이지0">
											<img src="img/item/cheese/natural/0101_1.jpg" alt="베스트60_상품이미지0"/>
										</a>
									</p>
									<div class="text">
										<p class="textLink">
											<a href="sub/item.html" title="타임세일_상품페이지0">
												<strong>밀라 마스카르포네 500g</strong>
											</a>
										</p>
										<p class="desc">장충동 S호텔에서 대놓고 쓰는 제품.</p>
										<p class="price">
											<span class="line">6400원</span><strong class="green">4480원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="베스트60_상품페이지1">
											<img src="img/item/cheese/natural/0201_1.jpg" alt="베스트60_상품이미지1"/>
										</a>
									</p>
									<div class="text">
										<p class="textLink">
											<a href="sub/item.html" title="타임세일_상품페이지1">
												<strong>생모르 카브리핀 180g</strong>
											</a>
										</p>
										<p class="desc">염소젖으로 만든 자연치즈입니다.</p>
										<p class="price">
											<span class="line">12460원</span><strong class="green">1180원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="베스트60_상품페이지2">
											<img src="img/item/cheese/natural/0202_1.jpg" alt="베스트60_상품이미지2"/>
										</a>
									</p>
									<div class="text">
										<p class="textLink">
											<a href="sub/item.html" title="타임세일_상품페이지1">
												<strong>콜리오스 그릭 페타 치즈 150g</strong>
											</a>
										</p>
										<p class="desc">화이트 와인과 어울리는 염소 치즈</p>
										<p class="price">
											<span class="line">5800원</span><strong class="green">5200원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="베스트60_상품페이지2">
											<img src="img/item/cheese/natural/0203_1.jpg" alt="베스트60_상품이미지2"/>
										</a>
									</p>
									<div class="text">
										<p class="textLink">
											<a href="sub/item.html" title="타임세일_상품페이지2">
												<strong>일드 프랑스 쉐브르 150g</strong>
											</a>
										</p>
										<p class="desc">빵에 발라먹기 좋은 염소젖 생치즈</p>
										<p class="price">
											<span class="line">13900원</span><strong class="green">1220원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="베스트60_상품페이지2">
											<img src="img/item/cheese/natural/0300_1.jpg" alt="베스트60_상품이미지2"/>
										</a>
									</p>
									<div class="text">
										<p class="textLink">
											<a href="sub/item.html" title="타임세일_상품페이지2">
												<strong>본 마예네 까망베르 250g</strong>
											</a>
										</p>
										<p class="desc">프랑스인 고객님들이 자주 찾는 고향의 맛</p>
										<p class="price">
											<span class="line">10840원</span><strong class="green">9960원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="베스트60_상품페이지2">
											<img src="img/item/cheese/natural/0403_1.jpg" alt="베스트60_상품이미지2"/>
										</a>
									</p>
									<div class="text">
										<p class="textLink">
											<a href="sub/item.html" title="타임세일_상품페이지1">
												<strong>엠보그 브리 125g</strong>
											</a>
										</p>
										<p class="desc">살짝 데워 꿀과 견과류를 얹어 냠냠</p>
										<p class="price">
											<span class="line">6200원</span><strong class="green">5270원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="베스트60_상품페이지2">
											<img src="img/item/cheese/natural/0405_1.jpg" alt="베스트60_상품이미지2"/>
										</a>
									</p>
									<div class="text">
										<p class="textLink">
											<a href="sub/item.html" title="타임세일_상품페이지2">
												<strong>페이장브레통 르 브리 125g</strong>
											</a>
										</p>
										<p class="desc">가격 풍미 무난한 입문용 기본 브리</p>
										<p class="price">
											<span class="line">4600원</span><strong class="green">4480원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="베스트60_상품페이지2">
											<img src="img/item/cheese/natural/0503_1.jpg" alt="베스트60_상품이미지2"/>
										</a>
									</p>
									<div class="text">
										<p class="textLink">
											<a href="sub/item.html" title="타임세일_상품페이지2">
												<strong>안젤로 고르곤졸라 피칸테 150g</strong>
											</a>
										</p>
										<p class="desc">냉장고를 부탁해 지누션 편 바로 그 제품!</p>
										<p class="price">
											<span class="line">5700원</span><strong class="green">5480원</strong>
										</p>
									</div>
								</li>
							</ul>
						</section>
					</div>
					<div id="hot">
						<h2>
							HOT
							<strong>요즘 떠오르는 인기상품</strong>
							<b>
								<span>
									<a href="#none" title="인기상품_리스트버튼0">●</a>
								</span>
								<span>
									<a href="#none" title="인기상품_리스트버튼1">○</a>
								</span>
								<span>
									<a href="#none" title="인기상품_리스트버튼2">○</a>
								</span>
							</b>
						</h2>
						<div class="screen">
							<ul>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="hot_상품페이지0">
											<img src="img/item/cheese/natural/0500_0.jpg" alt="hot60_상품이미지0"/>
										</a>
									</p>
									<div class="text">
										<p class="num">1</p>
										<p class="textLink">
											<a href="sub/item.html" title="hot_상품페이지0">
												<strong>브레스 블루 140g</strong>
											</a>
										</p>
										<p class="desc">
											부드럽고 하얀속살. 부담없이 도전해볼만한 착한 블루치즈
										</p>
										<p class="price">
											<!--<span class="line">6400원</span>--><strong class="green">11080원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="hot_상품페이지1">
											<img src="img/item/cheese/natural/0508_0.jpg" alt="hot_상품이미지1"/>
										</a>
									</p>
									<div class="text">
										<p class="num">2</p>
										<p class="textLink">
											<a href="sub/item.html" title="hot_상품페이지0">
												<strong>엠보그 다나블루 클래식 100g</strong>
											</a>
										</p>
										<p class="desc">
											부드러운 질감과 독특한 블루치즈의 향을 즐기실 수 있습니다.
										</p>
										<p class="price">
											<!--<span class="line">6400원</span>--><strong class="green">3560원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="hot_상품페이지2">
											<img src="img/item/cheese/natural/0707_0.jpg" alt="hot_상품이미지2"/>
										</a>
									</p>
									<div class="text">
										<p class="num">3</p>
										<p class="textLink">
											<a href="sub/item.html" title="hot_상품페이지2">
												<strong>프리코 고다 마일드 웨지 260g</strong>
											</a>
										</p>
										<p class="desc">
											실온에 잠시 두었다 드셔 보세요. 빵과 함께 살짝 녹여먹어도 굿!
										</p>
										<p class="price">
											<!--<span class="line">6400원</span>--><strong class="green">7800원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="hot_상품페이지3">
											<img src="img/item/cheese/natural/0713_0.jpg" alt="hot60_상품이미지3"/>
										</a>
									</p>
									<div class="text">
										<p class="num">4</p>
										<p class="textLink">
											<a href="sub/item.html" title="hot_상품페이지3">
												<strong>빔스터 로얄 고다(스윗 앤 너티) 150g</strong>
											</a>
										</p>
										<p class="desc">
											고소함 속 은은한 달콤함이 있습니다.
										</p>
										<p class="price">
											<!--<span class="line">6400원</span>--><strong class="green">7260원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="hot_상품페이지4">
											<img src="img/item/cheese/natural/0717_0.jpg" alt="hot_상품이미지4"/>
										</a>
									</p>
									<div class="text">
										<p class="num">5</p>
										<p class="textLink">
											<a href="sub/item.html" title="hot_상품페이지4">
												<strong>바시론 트러플 고다치즈 200g (송로버섯0.8%)</strong>
											</a>
										</p>
										<p class="desc">
										</p>
										<p class="price">
											<!--<span class="line">6400원</span>--><strong class="green">14200원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="hot_상품페이지5">
											<img src="img/item/cheese/natural/1002_0.jpg" alt="hot_상품이미지5"/>
										</a>
									</p>
									<div class="text">
										<p class="num">6</p>
										<p class="textLink">
											<a href="sub/item.html" title="hot_상품페이지5">
												<strong>하르데거 A.O.C. 그뤼에르 200g</strong>
											</a>
										</p>
										<p class="desc">
											남산위 H호텔에서 사용중. 어떻게 먹어도 맛있습니다
										</p>
										<p class="price">
											<!--<span class="line">6400원</span>--><strong class="green">11600원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="hot_상품페이지6">
											<img src="img/item/cheese/natural/0000_0.jpg" alt="hot60_상품이미지6"/>
										</a>
									</p>
									<div class="text">
										<p class="num">7</p>
										<p class="textLink">
											<a href="sub/item.html" title="hot_상품페이지6">
												<strong>프란시아 리코타 250g</strong>
											</a>
										</p>
										<p class="desc">
											신선한 우유맛, 주말 브런치로 리코타 치즈 샐러드 어떠세요?
										</p>
										<p class="price">
											<span class="line">6400원</span><strong class="green">5760원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="hot_상품페이지7">
											<img src="img/item/cheese/natural/0300_0.jpg" alt="hot_상품이미지7"/>
										</a>
									</p>
									<div class="text">
										<p class="num">8</p>
										<p class="textLink">
											<a href="sub/item.html" title="hot_상품페이지7">
												<strong>본 마예네 까망베르 250g</strong>
											</a>
										</p>
										<p class="desc">
											프랑스인 고객님들이 고향의 맛 찾을때 이 제품 사가시더라구요.
										</p>
										<p class="price">
											<!--<span class="line">6400원</span>--><strong class="green">4480원</strong>
										</p>
									</div>
								</li>
								<li>
									<p class="imgLink">
										<a href="sub/item.html" title="hot_상품페이지8">
											<img src="img/item/cheese/natural/1211_0.jpg" alt="hot_상품이미지8"/>
										</a>
									</p>
									<div class="text">
										<p class="num">9</p>
										<p class="textLink">
											<a href="sub/item.html" title="hot_상품페이지8">
												<strong>생 앙드레 200g</strong>
											</a>
										</p>
										<p class="desc">
											버터 저리가라 크리미 보송보송 구름같은 연성치즈입니다.
										</p>
										<p class="price">
											<!--<span class="line">6400원</span>--><strong class="green">13400원</strong>
										</p>
									</div>
								</li>
							</ul>
						</div>
						<p class="btn">
							<a href="#none" title="더보기">더보기 ∨</a>
						</p>
					</div>
				</div>
			</div>
			<div id="bisDel_wrap">
				<div id="bisDel">
					<div class="bis">
						<h2>BUSINESS</h2>
						<p>
							<a href="sub/biz.php" title="비지니스회원신청_페이지">
								<span class="imgs">
									<img src="img/banners/business_icon.png" alt="비지니스_이미지"/>
								</span>
								<span class="text"><b>비지니스</b><br/>회원가입</span>
							</a>
						</p>
					</div>
					<div class="del">
						<h2>무배클럽</h2>
						<p>
							<a href="sub/item_delClub.html" title="무배클럽_페이지">
								<span class="imgs">
									<img src="img/banners/delivery_icon.png" alt="무배클럽_이미지"/>
								</span>
								<span class="text">슬기로운<br/><b>무배생활</b></span>
							</a>
						</p>
					</div>
				</div>
			</div>
			<div id="fixed_wrap">
				<div id="top">
					<a href="#" title="top_button">
						<img src="img/basic/icon_top_yellow.png" alt="top_button"/>
					</a>
				</div>
				<div id="allBack"></div>
				<div id="sns_modal">
					<p class="btn">
						<a href="#none" title="나가기버튼">
							<img src="img/basic/exit.png" alt="나가기버튼"/>
						</a>
					</p>
					<div></div>
				</div>
			</div>
		</div>
		<div id="footer">
			<div id="footer_desc_wrap">
				<div id="footer_desc">
					<div class="cs">
						<h3>고객센터</h3>
						<p class="call">
							<img src='img/footer/call.png' alt='call_icon'/> 02.425.6117
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
							<img src="img/footer/kbBank.png" alt="bank_logo"/>
						</p>
						<p class="desc">
							<strong>836301-04-125192</strong><em>예금주 : 씨큐컴퍼니</em>
						</p>
					</div>
					<div class="board">
						<h3>NOTICE <em>공지사항</em></h3>
						<p class="more">
							<a href="sub/notice.php" title="공지사항_페이지">+</a>
						</p>
						<ul>
							<li>
								<a href="sub/notice.php" title="공지사항_페이지0">
									[공지] 2020 크리스마스 배송안내
								</a>
							</li>
							<li>
								<a href="sub/notice.php" title="공지사항_페이지1">
									[이벤트] 2020 유러피안 치즈데이
								</a>
							</li>
							<li>
								<a href="sub/notice.php" title="공지사항_페이지2">
									[공지] 2020 한글날 배송안내
								</a>
							</li>
							<li>
								<a href="sub/notice.php" title="공지사항_페이지3">
									[배송] 2020 추석연휴 배송안내
								</a>
							</li>
						</ul>
					</div>
					<div class="board">
						<h3>FAQ <em>자주 묻는 질문</em></h3>
						<p class="more">
							<a href="sub/faq.php" title="FAQ_페이지">+</a>
						</p>
						<ul>
							<li>
								<a href="sub/faq.php" title="FAQ_페이지0">
									[회원] 등급별 혜택
								</a>
							</li>
							<li>
								<a href="sub/faq.php" title="FAQ_페이지1">
									[결제] 로그인하면 네이버(N)페이 버튼이 안보여요. 
								</a>
							</li>
							<li>
								<a href="sub/faq.php" title="FAQ_페이지2">
									[배송] 당일발송 마감시각은 언제인가요?
								</a>
							</li>
							<li>
								<a href="sub/faq.php" title="FAQ_페이지3">
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
						<li><a href="sub/company.html" title="회사소개">회사소개</a> |</li>
						<li><a href="sub/agreement.html" title="이용약관">이용약관</a> |</li>
						<li><a href="sub/privacy.html" title="개인정보취급방침">개인정보취급방침</a> |</li>
						<li><a href="sub/guide.html" title="이용안내">이용안내</a></li>
					</ul>
				</div>
			</div>
			<div id="footer_info_wrap">
				<div class="more_mob">
					기업 정보 보기 <span><img src="img/basic/arrow_under_555.png" alt="화살표"/></span>
				</div>
				<div id="footer_info">
					<h2>
						<img src="img/basic/logo_thumb.png" alt="치즈퀸"/>
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
								<img src="img/footer/inipay.png" alt="이니페이_이미지"/>
							</a>
							<a href="https://mark.inicis.com/mark/escrow_popup.php?mid=ESGBchee30" title="에스크로_페이지"  onclick="popup('https://mark.inicis.com/mark/escrow_popup.php?mid=ESGBchee30','에스크로_페이지','500','500'); return false;">
								<img src="img/footer/escrow.png" alt="에스크로_이미지"/>
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
 </body>
</html>
