<!DOCTYPE html> 
<html> 
	<head> 
<style>		
.box{
    width:0px;
    height:0px;
    padding:10px;
    border:1px solid black;
    position:absolute;
    top:400px;
    left:500px;
}?
</style>
		<script type="text/javascript"  src="http://www.google.com/jsapi"></script>
		<script type="text/javascript">
				google.load("jquery", "1.7.1");
		</script>		
	
<script type="text/javascript" language="Javascript">
window.speed = 100;
$(document).ready(function() { 
	     $('.box').hover(
          function(){
              $(this).animate({'top':'-=20px','left':'-=20px', 'height':'+=240px', 'width':'+=240px'}, speed);
         },
          function(){
            	$(this).animate({'top':'+=20px','left':'+=20px', 'height':'-=240px', 'width':'-=240px'}, speed);
          }
     );
});
</script>
	</head>
	
	<body> 
		<div class="box"></div>
	</body>
</html>