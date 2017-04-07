<!DOCTYPE html>
<html class="bg4">
	<head>
		
		<!--There is a special meta tag you can append into the document header which resets this in most Android and iPhone devices.-->
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
		<link rel="stylesheet" type="text/css" href="css/style.css?2" />
		<!--[if IE]> <link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]--> 
		<title>公司内部竞稿平台</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!-- 禁止选择文本： --> 
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
</script></head>
	<body>
		<section id="container" class="blue">

			<!-- TOOLS PANEL-->
			
			
			  <!-- / TOOLS PANEL -->

			<!-- LOGO -->
			
			<!-- /LOGO -->

			

			<!-- WELCOME TEXT -->
			
			<!-- WELCOME TEXT -->

		

			<!-- COUNTDOWN // html code generated in main.js -->
			<div id="count" style="
    top: 50%;
    position: absolute;
    margin-top: -105px;
"></div>
			<!-- /COUNTDOWN  -->

			<!-- SUBSCRIBE FORM -->
			
			<!-- /SUBSCRIBE FORM -->

			 <!-- SOCIAL -->
		
			<!-- /SOCIAL -->
		</section>

		<!--JS FILES LOAD-->
		<script src="script/jquery.min.js" type="text/javascript"></script>
		<script src="script/jcountdown.min.js" type="text/javascript"></script>
		
	
	
		<script>
		$(document).ready(function() {
	$("#count").countdown({
		//to change lunch date just replace the current date with yours .
		date: "<?php echo $mtime=date('M',$ttitme);?> <?php echo $conf['my'];?>, <?php echo $dtime=date('Y',$ttitme);;?>",  
		//html code in count div here.
		htmlTemplate: "<div id='days-count' class='numbers'>%{d}<span class='days-label'>days</span></div> <div id='hours-count' class='numbers'>%{h}<span class='hours-label'>hours</span></div><div id='min-count' class='numbers'>%{m}<span class='min-label'>min</span></div><div id='sec-count' class='numbers'>%{s}<span class='sec-label'>sec</span></div>"
	});
});
		</script>
		
		<script src="script/main.js" type="text/javascript"></script>

</body>
</html>