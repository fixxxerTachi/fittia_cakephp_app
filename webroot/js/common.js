$(function(){

	//rollover
	$('#navi img,#side img').each(function(){
		$('<img />').attr('src',$(this).attr('src').replace('_off','_on'));
	});
	$('#navi img, #side img').bind('mouseenter',function(){
		$(this).attr('src',$(this).attr('src').replace('_off','_on'));
	}).bind('mouseleave',function(){
		$(this).attr('src',$(this).attr('src').replace('_on','_off'));
	});

	
	/*
	//bxslider
	$('#slider1').bxSlider({
		auto:true,
		pager:true,
		autoHover: true,
		controls:false,
		speed:1000,
		pause:4500,
		//mode:'vertical'
	});
	*/
	
	//slideshow
	/*
	var interval=4000;
	$('.slideshow').each(function(){
		$('.slideshow a').hide();
		var timer;
		var container=$(this);
		function switchImg(){
			var anchors=container.find('a');
			var first=anchors.eq(0);
			var second=anchors.eq(1);
			first.fadeOut('slow').appendTo(container);
			second.fadeIn('slow');
		}
		function startTimer(){
			timer=setInterval(switchImg,interval);
		}
		function stopTimer(){
			clearInterval(timer);
		}
		container.find('a').hover(stopTimer,startTimer);
		
		$('.slideshow img').imagesLoaded(function(){
			startTimer();
		});
	});		
	*/
	
	//rollover
	$('<div class="box"/>')
		.css({
			'position':'absolute',
			'background-image':'url("/online_store/img/halfback.png")',
			'display':'none',
		})
	.appendTo(document.body);
	$('<a class="box_a" />').css('display','block').appendTo('.box');


$('.products img').mouseenter(function(){
		$('.box').css({
			'top':$(this).offset().top,
			'left':$(this).offset().left,
			'width':$(this).attr('width'),
			'height':$(this).attr('height'),
			'display':'block',
		})
		$('.box_a').attr('href',$(this).parent().attr('href')).text('.').css({
			'height':$(this).attr('height'),
			'color':'#fff'
		})
	});
$('.box').mouseleave(function(){

	$('.box').hide();
});
	
	
});
