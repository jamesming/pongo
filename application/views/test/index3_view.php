<!DOCTYPE html> 
<html> 
	<head> 
	<title>My Page</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
 	
 	<head>
		<link href="<?php echo  base_url();   ?>js/jquery.mobile-1.0.1.css" rel="stylesheet">
		
		<script type="text/javascript"  src="http://www.google.com/jsapi"></script>
		<script type="text/javascript">
				google.load("jquery", "1.7.1");
		</script>		
	
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo  base_url();   ?>js/jquery.scrollTo-min.js"></script>
<script type="text/javascript" language="Javascript">
		$(document).ready(function() { 
			$('#pushend').click(function(event) {
				$('#container').scrollTo( $('#end'), 500 )
			});	
			$('#pushstart').click(function(event) {
				$('#container').scrollTo( $('#start'), 500 )
			});				
		});
</script>

	</head>
	
	<body> 
	<div id="very_top"><div>
		<center><input  id='pushend'  type="button" value="End"></center>
		<center><input  id='pushstart'  type="button" value="Start"></center>
		<div  id='container'   style='width:300px;margin:0 auto; overflow:hidden'  >
			<div   style='float:left;width:600px'>
					<div id='start'   style='float:left;width:200px;height:200px;background:red'  >Ben
					</div>			
					<div   style='float:left;width:200px;height:200px;background:yellow'  >James
					</div>							
					<div  id='end'   style='float:left;width:200px;height:200px;background:blue'  >Raymond
					</div>					
			</div>
		</div>



	</body>
</html>