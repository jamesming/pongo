<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	$this->load->view('header/blueprint_css.php');  ?>
<style>
	body{

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

</script>


</head>

<html>

<body>
	<br />
	<div class='container '  >


					<style>
					#video_container{
						width:640px;
					}
					</style>
<link href="http://vjs.zencdn.net/c/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/c/video.js"></script>
					<div  id='video_container'>
							<video id="my_video_1" class="video-js vjs-default-skin" controls  
							  preload="auto" width="640" height="400" poster="<?php  echo base_url()   ?>images/Pongo_Logo.png"
							  data-setup='{"autoplay": true}'>
							  <source src="<?php  echo base_url()   ?>uploads/<?php echo $data['projects']['Videos']['assets'][0]   ?>/asset.mp4" type='video/mp4'>
							</video>		
					</div>


	</div>
</body>
</html>

