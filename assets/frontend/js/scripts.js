// JavaScript Document
$(window).scroll(function(){
	
	if($(window).scrollTop() >= 10){
		$('header').addClass('sticky');
	}else{
		$('header').removeClass('sticky');
	}
	
});

Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}

$('.cmn-toggle-switch').click(function(){	
	if($(this).hasClass('on') == false){
		$('.main-menu').animate({
			opacity:'1',
			left:'0px'
		});
		
		$(this).addClass('on');
		$('.main-menu').addClass('mobile-on');
	}else{
		$('.main-menu').animate({
			opacity:'0',
			left:'-100%'
		},function(){
			$('.main-menu').removeClass('mobile-on');
		});

		$(this).removeClass('on');
	}
});

$('#close_in').click(function(){
	$('.main-menu').animate({
		opacity:'0',
		left:'-100%'
	},function(){
		$('.main-menu').removeClass('mobile-on');
	});

	$('.cmn-toggle-switch').removeClass('on');

});

$(window).resize(function(e) {
  if($(window).width() > 650){
		$('.main-menu').animate({
			opacity:'1',
			left:'0'
		},function(){
			$('.main-menu').removeClass('mobile-on');
		});
	}
});