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
<script src="<?php echo base_url()    ?>js/effects.slide.js"></script>

<script type="text/javascript" language="Javascript">
	jQuery.fn.extend({
	  slideRightShow: function() {
	    return this.each(function() {
	        $(this).show('slide', {direction: 'right'}, 700);
	    });
	  },
	  slideLeftHide: function() {
	    return this.each(function() {
	      $(this).hide('slide', {direction: 'left'}, 700);
	    });
	  },
	  slideRightHide: function() {
	    return this.each(function() {
	      $(this).hide('slide', {direction: 'right'}, 700);
	    });
	  },
	  slideLeftShow: function() {
	    return this.each(function() {
	      $(this).show('slide', {direction: 'left'}, 700);
	    });
	  }
	});


function swap(){

$('#one').slideLeftHide()	
	
}
$(document).ready(function() { 
	setTimeout(swap,700);
	
});
</script>

	</head>
	
	<body> 
		<div   style=''  >
			<div  id='one'   style='border:1px solid gray;margin:200px; position:absolute;top:0px;'  >
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>			
			<div  id='two'   style='border:1px solid gray;margin:200px; position:absolute;top:0px;'  >
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>				
		</div>

	</body>
</html>