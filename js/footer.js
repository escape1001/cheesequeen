$(document).ready(function(){
	/*##### footer 아코디언 #####*/
		var btn0 = true;

		$("#footer_info_wrap .more_mob").click(function(){
			if(btn0==true){
				$(this).find("img").css({"transform":"rotate(180deg)"});
				
				btn0 = false;
			}
			else{
				$(this).find("img").css({"transform":"rotate(0deg)"});

				btn0 = true;
			}
			//console.log(btn0);
			
			$("#footer_info").slideToggle();
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