$(function  () {
		$(".myRecom,.myMoney,.user,.outLogin,.backIndex,.login").hover(function(){
			$(this).addClass("active").siblings().removeClass("active");
		});
		

		// $(".houses li:odd").css("background","#fdf2f1");
		$(".houses li").live("mouseenter",function(){
			$(this).css("background","#fdf2f1");
		}).live("mouseleave",function(){$(this).css("background","#fff"); });


		$(".menu li,.title li").click(function(){
			$(this).addClass("active").siblings().removeClass("active");
		});
		// 固定footer
		var h = $(document.body).height();
		var _height = $(window).height();
		var changecss = {
			position:"absolute",
			bottom:"0"
		};
		if(h<=_height){
			$(".footer").css(changecss);
		}

$(".login").click(function(){
	$(this).addClass("active").siblings().removeClass("active");
		$(".box11").fadeIn();	
		});
		$(".close").click(function(){
			$(".box11").fadeOut();
			$(".login").removeClass("active");
		});
		
		
		 $("#username,#personMsg").mouseover(function(){
        $("#personMsg").show();
    })
    $("#personMsg").mouseout(function(){
        $("#personMsg").hide();
    })
		
		
	})