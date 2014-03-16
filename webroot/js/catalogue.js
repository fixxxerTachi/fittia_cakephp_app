$(function(){
	$('.type_select').eq(0).find('label').css({
		'background':'url("/online_store/img/oval_ico.gif") no-repeat left center'
	});
	$('.type_select').eq(1).find('label').css({
		'background':'url("/online_store/img/square_ico.gif") no-repeat left center'
	});
	$('.type_select').eq(2).find('label').css({
		'background':'url("/online_store/img/wellington_ico.gif") no-repeat left center'
	});
	var l=$('#color .checkbox label');
	$('#color .checkbox label').eq(0).css({
		'background':'url("/online_store/img/black_ico.gif") no-repeat left center'
	});
	$('#color .checkbox label').eq(1).css('background','url("/online_store/img/blue_ico.gif") no-repeat left center');
		l.eq(2).css('background','url("/online_store/img/brown_ico.gif") no-repeat left center');
		l.eq(3).css('background','url("/online_store/img/green_ico.gif") no-repeat left center');
		l.eq(4).css('background','url("/online_store/img/lime_icon.gif") no-repeat left center');
		l.eq(5).css('background','url("/online_store/img/red_ico.gif") no-repeat left center');
		l.eq(6).css('background','url("/online_store/img/pink_ico.gif") no-repeat left center');
		l.eq(7).css('background','url("/online_store/img/purple_ico.gif") no-repeat left center');

$('#search_btn').click(function(){
	$('form').submit();
});

});
