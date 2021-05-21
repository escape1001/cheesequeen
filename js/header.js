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
});