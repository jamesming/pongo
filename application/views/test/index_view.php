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
	
		<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.mobile-1.0.1.min.js"></script>
	</head>
	
	<body> 
	
		<div data-role="page" class="type-interior">
		
				<div data-role="content">
							
							<div class="ui-grid-a">
								<div class="ui-block-a">
									<a href="#dialog" data-role="button" data-transition="slide">slide</a>
									<a href="#dialog" data-role="button" data-transition="slideup">slideup</a>
									<a href="#dialog" data-role="button"  data-transition="slidedown">slidedown</a>
								</div>
								<div class="ui-block-b">
								    <a href="#dialog" data-role="button" data-transition="pop">pop</a>
									<a href="#dialog" data-role="button"  data-transition="fade">fade</a>
									<a href="#dialog" data-role="button"  data-transition="flip">flip*</a>
								</div>
							</div>
							
				</div>
		
		</div>
					
		<div data-role="page" id="dialog">
		
			<div data-role="content" data-theme="e">
				test
				<a href="docs-transitions.html" data-role="button" data-theme="b" data-rel="back">I like it</a>   
			</div>
			
		</div>
	
	</body>
</html>