<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	$this->load->view('header/blueprint_css.php');  ?>
<style>
	body{
  background-image: url(<?php  echo base_url()   ?>uploads/<?php echo $data['user_id']   ?>/<?php echo ( isset( $data['users']['backgrounds']['images'][0]) ? $data['users']['backgrounds']['images'][0]:'0' )    ?>/image.jpg);
  background-position:center 0px;
  background-repeat:no-repeat;/*
  -webkit-background-size:1280px 1024px;
  background-size:1280px 1024px;*/
	}
	.top-right-rounded{
		border-top-right-radius: 6px;
		-moz-border-radius-topright: 6px;
		-webkit-border-top-right-radius: 6px;	
	}
	.transparent{
			/* Fallback for web browsers that don't support RGBa */
			background-color: rgb(0, 0, 0);
			/* RGBa with 0.6 opacity */
			background-color: rgba(0, 0, 0, 0.3);
			<?php if( $this->tools->browserIsExplorer() ){?>
				background: transparent; 
			<?php } ?>
			<?php     
			/*
			http://robertnyman.com/2010/01/11/css-background-transparency-without-affecting-child-elements-through-rgba-and-filters/ 
			*/
			?>
		}
	.rounded{
		border-top-left-radius: 6px;
		border-top-right-radius: 6px;
		-moz-border-radius-topleft: 6px;
		-moz-border-radius-topright: 6px;
		-webkit-border-top-right-radius: 6px;
		-webkit-border-top-left-radius: 6px;
		border-bottom-left-radius: 6px;
		border-bottom-right-radius: 6px;
		-moz-border-radius-bottomleft: 6px;
		-moz-border-radius-bottomright: 6px;
		-webkit-border-bottom-right-radius: 6px;
		-webkit-border-bottom-left-radius: 6px;
	}
	.float_left{
	float:left;	
	}
	.float_right{
	float:right;	
	}
	.clearfix{
	clear:both;	
	}
	

	
	div.container{
	min-height:30px;	
	border:0px solid gray;
	}
	

</style>


<script type="text/javascript" 
        src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
 
  google.load("jquery", "1.4.2");
 	google.load("jqueryui", "1.8.16");

</script>



	<link rel="stylesheet" href="<?php echo  base_url();   ?>js/jquery-ui/themes/base/jquery.ui.all.css"> 
	<script src="<?php echo  base_url();   ?>js/external/jquery.bgiframe-2.1.2.js"></script> 
	<script src="<?php echo  base_url();   ?>js/jquery-ui/jquery.ui.core.min.js"></script> 
	<script src="<?php echo  base_url();   ?>js/jquery-ui/jquery.ui.widget.min.js"></script> 
	<script src="<?php echo  base_url();   ?>js/jquery-ui/jquery.ui.mouse.min.js"></script> 
	<script src="<?php echo  base_url();   ?>js/jquery-ui/jquery.ui.draggable.min.js"></script> 
	<script src="<?php echo  base_url();   ?>js/jquery-ui/jquery.ui.position.min.js"></script> 
	<script src="<?php echo  base_url();   ?>js/jquery-ui/jquery.ui.resizable.min.js"></script> 
	<script src="<?php echo  base_url();   ?>js/jquery-ui/jquery.ui.dialog.min.js"></script> 
	<script src="<?php echo  base_url();   ?>js/easing/jquery.easing.1.1.js"></script> 
	<script src="<?php echo  base_url();   ?>js/cufon.js"></script> 

</head>

<html>

<body>
	
	<div class='container '  >

					<div   style='
						font-size:33px;
						font-weight:bold;
						text-align:center;
						margin-top:100px;
						'  >
						PONGO SAMPLE HTML5 PLAYER
					</div>
				
					<iframe  
						id="results"   
						name="results"
						style='background:white;border:0px solid gray;width:0px;height:0px'  
						border="1" 
						frameborder="1" 
						scrolling="auto" 
						align="center" 
						hspace="0" 
						vspace="">
					</iframe>
					
				
					
					
					
					<style>
					#video_container{
						width:640px;
					}
					</style>
<link href="http://vjs.zencdn.net/c/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/c/video.js"></script>
					<div  id='video_container'>
							<video id="my_video_1" class="video-js vjs-default-skin" controls  autoplay 
							  preload="auto" width="640" height="400" poster="<?php  echo base_url()   ?>images/Pongo_Logo.png"
							  data-setup="{}">
							  <source src="<?php  echo base_url()   ?>images/pongo.mp4" type='video/mp4'>
							</video>		
					</div>


	</div>
</body>
</html>

<script type="text/javascript" language="Javascript">
	
		$(document).ready(function() { 
					$('#video_container').css({
						'position':'absolute',
						'left':($(window).width() / 2)-($('#video_container').width()/2),
						'top':'150px'
					})
		});


</script>




