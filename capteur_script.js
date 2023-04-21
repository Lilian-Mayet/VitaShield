$(document).ready(function(){
	var mainImageWidth = $("#mainImage").width();
	var mainImageHeight = $("#mainImage").height();
	var containerWidth = $("#container").width();
	var containerHeight = $("#container").height();
	var distance = containerWidth/2 - mainImageWidth/2;
	$(".floatingImage:nth-child(1)").css({left: containerWidth/2 - distance/2, top: containerHeight/2 - distance/2});
	$(".floatingImage:nth-child(2)").css({left: containerWidth/2 + distance/2, top: containerHeight/2 - distance/2});
	$(".floatingImage:nth-child(3)").css({left: containerWidth/2 - distance/2, top: containerHeight/2 + distance/2});
	$(".floatingImage:nth-child(4)").css({left: containerWidth/2 + distance/2, top: containerHeight/2 + distance/2});
	$(".floatingImage:nth-child(5)").css({left: containerWidth/2, top: containerHeight/2 - distance});
});
