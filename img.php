<!DOCTYPE html>
<html><!-- 禁止选择文本： --> 
<script type="text/javascript">

var omitformtags=["input", "textarea", "select"]

omitformtags=omitformtags.join("|")

function disableselect(e){ 
if (omitformtags.indexOf(e.target.tagName.toLowerCase())==-1) 
return false 
}

function reEnable(){ 
return true 
}

if (typeof document.onselectstart!="undefined") 
document.onselectstart=new Function ("return false") 
else{ 
document.onmousedown=disableselect 
document.onmouseup=reEnable 
} 
</script><!-- 禁用右键: --> 
<script> 
function stop(){ 
return false; 
} 
document.oncontextmenu=stop; 
</script>
<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="wheel.js"></script>
<style>
*{padding:0px;margin:0px;}
.classsss{padding-top:2.5%;text-align: center;/*background: url(5-130H2191322-52.gif);*/width: 100%;height: 100%;/*background-repeat: no-repeat;background-position: center 20%;*/}
.classssooo{max-width:95%;padding-bottom:2.5%;}
#drag{
cursor:move;
	/*position: absolute;
	top:0px;
	left:0px;*/
}

</style>

</head>

<body>
<div id="dragdrag" class="classsss">
<img id="drag" src="u/<?php echo $_GET['srcs'];?>.jpg" class="classssooo" />
</div>
<script type="text/javascript">
niii=0;
window.onload=function (){
	//var oImg=document.getElementsByTagName("img")[0];
	var oImg=document.getElementById('drag');
	//alert(oImg.offsetWidth);
	/*niii=0;
	if(!niii){
		niii=1;
		$('#drag').css({'top':'2.5%','left':'50%','marginLeft':'-'+(oImg.offsetWidth/2)+'px','position':'absolute'});
	}*/
	fnWheel(oImg,function (down,oEvent){
		

		var oldWidth=this.offsetWidth;
		var oldHeight=this.offsetHeight;
		var oldLeft=this.offsetLeft;
		var oldTop=this.offsetTop;
		if(!niii){
			$("#dragdrag").removeClass('classsss');
			$("#drag").removeClass('classssooo');
			$('#drag').css({'position':'absolute'});
			//oldTop='2.5%';
		}
		niii=1;
		var scaleX=(oEvent.clientX-oldLeft)/oldWidth;//比例
		var scaleY=(oEvent.clientY-oldTop)/oldHeight;

		if (down){
			//$("div").removeClass('classsss');
			//$("img").removeClass('classssooo');
			this.style.width=this.offsetWidth*0.9+"px";
			this.style.height=this.offsetHeight*0.9+"px";
			
			/*var newWidthsss=this.offsetWidth*0.9;
			var newHeightsss=this.offsetHeight*0.9;*/
		}
		else{
			//$("div").removeClass('classsss');
			//$("img").removeClass('classssooo');
			this.style.width=this.offsetWidth*1.1+"px";
			this.style.height=this.offsetHeight*1.1+"px";
			
			/*var newWidthsss=this.offsetWidth*1.1;
			var newHeightsss=this.offsetHeight*1.1;*/
		}

		var newWidth=this.offsetWidth;
		var newHeight=this.offsetHeight;
		
		/*if(newWidthsss>document.getElementById('fdasfdasfdsa').offsetWidth){
			$("div").removeClass('classsss');
			$("img").removeClass('classssooo');
		}*/
		

		this.style.left=oldLeft-scaleX*(newWidth-oldWidth)+"px";
		this.style.top=oldTop-scaleY*(newHeight-oldHeight)+"px";
	});
}	



       $(function(){
            /*--------------拖曳效果----------------
            *原理：标记拖曳状态dragging ,坐标位置iX, iY
            *         mousedown:fn(){dragging = true, 记录起始坐标位置，设置鼠标捕获}
            *         mouseover:fn(){判断如果dragging = true, 则当前坐标位置 - 记录起始坐标位置，绝对定位的元素获得差值}
            *         mouseup:fn(){dragging = false, 释放鼠标捕获，防止冒泡}
            */
            var dragging = false;
            var iX, iY;
            $("#drag").mousedown(function(e) {
			
			

			
			
                dragging = true;
                iX = e.clientX - this.offsetLeft;
                iY = e.clientY - this.offsetTop;
                this.setCapture && this.setCapture();
                return false;
            });
            document.onmousemove = function(e) {
                if (dragging) {
                var e = e || window.event;
                var oX = e.clientX - iX;
                var oY = e.clientY - iY;
                $("#drag").css({"left":oX + "px", "top":oY + "px"});
				
				
		if(!niii){
			$("#dragdrag").removeClass('classsss');
			$("#drag").removeClass('classssooo');
			$('#drag').css({'position':'absolute'});
			//oldTop='2.5%';
		}
		niii=1;
				
				
				
				
				
                return false;
                }
            };
            $(document).mouseup(function(e) {
                dragging = false;
                $("#drag")[0].ReleaseCapture && $("#drag")[0].ReleaseCapture();
                e.cancelBubble = true;
            })
 
        })






</script>





</body>

</html>

