$(function(){
 	$(".zn a img").mouseover(function(){
 		//var src = $(this).attr("src").substr(0, $(this).attr("src").indexOf("."));
 		var src = $(this).attr("src").substr(0, $(this).attr("src").length-4);
 		src += "_1.gif";
 		$(this).attr("src", src);
 	});
	$(".zn a img").mouseout(function(){
		var src = $(this).attr("src").substr(0, $(this).attr("src").indexOf("_"));
		src += ".gif";
		$(this).attr("src", src);
	});
 })