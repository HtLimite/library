 (()=>{
let [scroll,scroll_con,scroll_bar] = Array(3);
LeoScroll = function(parameter){

	[scroll,scroll_con,scroll_bar] = [".scroll",".scroll-con",".scroll-bar"];

	let obj = this,
		_sMouseWheel = "mousewheel" ;

	if(!("onmousewheel" in document)){						
		_sMouseWheel = "DOMMouseScroll";
	}
	$("body").on(_sMouseWheel,scroll,function(ev){

		let $scoll = $(this), $scon = $(this).children(scroll_con);

		if($scoll.children(scroll_bar).is(":visible"))
			ev.stopPropagation();

		ev = ev.originalEvent;		
			
		if(ev.wheelDelta){
			iWheelDelta = ev.wheelDelta/120;
		}else{
			iWheelDelta = -ev.detail/3;
		}		
		
		if($scoll.children(scroll_bar).is(":visible"))
		{			
			$scon[0].scrollTop += -1*30*iWheelDelta;
			let bt = $scon.height() * $scon[0].scrollTop / $scon[0].scrollHeight;
			$scoll.children(scroll_bar).css({'top':bt});
		}	
	});
	$("body").on("mousedown",scroll+" "+scroll_bar,function(ev){
		obj.bar = $(this);
		obj.bar.addClass("active");
		obj.scroll = $(this).parent(scroll);
		obj.barMove = true;
		obj.mouseY =  ev.pageY;
		obj.barOT = this.offsetTop;
		obj.maxMove = obj.scroll.height() - $(this).height();
		obj.scroll.attr("onselectstart","return false;");  //chrome禁止内容选中
		obj.scroll.attr("unselectable","on");              //IE禁止内容选中
		obj.scroll.addClass("scroll-unsel");               //ff禁止内容选中
	});
	$(document).on("mousemove",function(ev){
		if(obj.barMove)
		{
			var rate = ev.pageY - obj.mouseY;
			var ot = obj.barOT + rate;
			ot = ot < 0 ? 0 : ot;
			ot = ot > obj.maxMove ? obj.maxMove : ot;
			var sjRate =  ot + obj.bar[0].offsetTop;
			obj.bar.css({"top":ot});
			var st = ot * obj.scroll.find(scroll_con)[0].scrollHeight / obj.scroll[0].clientHeight;
			obj.scroll.find(scroll_con)[0].scrollTop = st;

		}
	});
	$(document).on("mouseup",function(){
		if(obj.barMove)
		{
			obj.barMove = false;
			obj.bar.removeClass("active");
			obj.scroll.removeAttr("onselectstart");
			obj.scroll.removeAttr("unselectable");
			obj.scroll.removeClass("scroll-unsel");
		}		
	});
	this.scrollWatch = setInterval(LeoScroll.ScrollResize,167);
}
LeoScroll.ScrollResize = function(){
	var $scrollList = $(scroll);
	$scrollList.each(function(i,o){
		var $scroll = $(o);

		if($scroll.find(scroll_bar).length==0)
			$scroll.append("<div class='"+scroll_bar.substring(1)+"'></div>");
		var $bar = $scroll.find(scroll_bar)

		if($scroll.find(scroll_con).length==0)
			return true;
		
		var psh = $scroll.find(scroll_con)[0].scrollHeight , pch = $scroll.find(scroll_con)[0].clientHeight;
		
		if(psh > pch){
			var barH = pch * pch / psh;		

			var st = $scroll.find(scroll_con)[0].scrollTop; 
	        var bt = pch * st / psh;

			$bar.show().css({'height':barH,"top":bt});
		}
		else{
			$bar.hide();
		}
	});	
}
})();

let scroll = new LeoScroll();