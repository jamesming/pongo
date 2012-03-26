
<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <title>Pongo</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="">



    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->

    <!--[if lt IE 9]>

      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <![endif]-->



    <!-- Le styles -->

    <link href="<?php  echo base_url()   ?>bootstrap/css/bootstrap.css" rel="stylesheet">

		<?php $this->load->view('header/generic_css.php');    ?>

    <link href="<?php  echo base_url()   ?>bootstrap/css/bootstrap-responsive.css" rel="stylesheet">



    <!-- Le fav and touch icons -->

    <link rel="shortcut icon" href="<?php  echo base_url()   ?>bootstrap/ico/favicon.ico">

    <link rel="apple-touch-icon" href="<?php  echo base_url()   ?>bootstrap/ico/apple-touch-icon.png">

    <link rel="apple-touch-icon" sizes="72x72" href="<?php  echo base_url()   ?>bootstrap/ico/apple-touch-icon-72x72.png">

    <link rel="apple-touch-icon" sizes="114x114" href="<?php  echo base_url()   ?>bootstrap/ico/apple-touch-icon-114x114.png">
    <script src="<?php  echo base_url()   ?>bootstrap/js/jquery.js"></script>
  </head>

<style>
body{
padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */	
}
</style>
  <body>



    	
          <div id="navbar-example" class="navbar  navbar-fixed-top">

            <div class="navbar-inner">

              <div class="container" >

                <a class="brand" href="#">Pongo</a>
                
                <script type="text/javascript" language="Javascript">
                $(document).ready(function() { 
                	$('#login').click(function(event) {
                				document.location = '<?php  echo base_url()   ?>index.php/main/login';
                	});	
                	$('#logout').click(function(event) {
                				document.location = '<?php  echo base_url()   ?>index.php/main/logout';
                	});	                	
                });
                </script>

                <ul class="nav  pull-right ">


                  
			            <li class="dropdown">
			
			              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account<b class="caret"></b></a>
			
			              <ul id="menu1" class="dropdown-menu">
			
			                <li><a id='login'  href="#">Log in</a></li>
			
			                <li><a id='logout'  href="#">Logout</a></li>
			
			
			                <li class="divider"></li>
			
			                <li><a href="#">Separated link</a></li>
			
			              </ul>
			
			            </li>                  
                  
                </ul>

                

              </div>

            </div>

          </div>

					<style>
					#left-spacer{
					height:105px;
					border:0px solid gray;
					}
					#work-label{
					margin-bottom:10px;
					}
						
					#left-side-div li, #left-side-div a.accordion-toggle{
				    color: gray;
				    font-size: 19px;
				    margin-bottom: 11px;
				    text-decoration:none;
				    padding:0px 0px 0px 0px;
				    outline: 0;
					}
					#left-side-div div.accordion-inner ol li{
						font-size: 14px;
					}					
					.accordion-group, .accordion-inner{
					border:0px;	
					}
					#middle-vertical-line{
						height: 429px;
						border-left:3px solid gray;
					</style>

					<div  id='close_fancy_zoom'>
					</div>
			    <div  id='left-side-div' class="container">
			    	<h1  id='work-label'>Work  <a  id='test' class='btn'   href='#jcrop_fancyZoom_div'   style='display:none'     >launch</a></h1>
				    <div class="row">
					    <div class="span2">
					    	
					    		<ul class="unstyled">
					    			<li>Home</li>	
					    			<li>Client Page</li>	
					    			<li>Login</li>	
					    		</ul>
					    		<hr  id='left-spacer'  />
					    		<ul class="unstyled">
					    			<li>Pongo Address</li>	
					    			<li>Contact Information</li>	
					    		</ul>		    		
					    </div>
					    
					    <div class="span3">
					    	
			         <div class="accordion" id="accordion2">
												<?php 
												
												foreach( $data['categories']  as  $key => $category){?>
													
									            <div class="accordion-group">
									              <div class="accordion-heading">
									
									                <a category_id='<?php echo $category['id']    ?>' legend='<?php echo $category['name']    ?>' class="accordion-toggle theList"  data-toggle="collapse" data-parent="#accordion2"   style='cursor:pointer'  
									                	
									                	<?php if( $category['projects'][0]['project_id'] != '' ){?>
									                	
									                			href="#collapse<?php echo $category['id']    ?>"
									                	
									                	<?php }else{?>
									                	
									                			href=""
									                	
									                	<?php } ?>
									                	
									                >
									                  <?php echo $category['name']    ?>
									                </a>
									              </div>
									              <div id="collapse<?php echo  $category['id']    ?>" class="accordion-body collapse"   >
									                <div class="accordion-inner">
									                  <ol  class='accordion-inner_listing' category_id='<?php echo $category['id']    ?>'    >
									                  	
									                  	
									                  	<?php foreach( $category['projects']  as  $project ){
									                  	
									                  			if( $project['project_id'] != ''){?>
									                  				
														                  	<li 	 class="fancyZoom "  new='0'  href='#fancyZoom_div'  category_id='<?php echo $category['id']    ?>'  legend='<?php echo $category['name']    ?>' project_id='<?php echo $project['project_id']    ?>' >
														                  		<?php echo $project['project_name']    ?>
														                  	</li>									                  			
									                  			
									                  			<?php } 
									                  			
									                  	} ?>
									                  	
									                  </ol>
									                  
									                </div>
									              </div>
									            </div>							
														  
												<?php } ?>
			
			
			          </div>
					    	
					    	
					    </div>	
					    
					    <div  class="span1"  >
					    	<div  id='middle-vertical-line'  >
					    	</div>
					    </div>	
					    

					    <div  id='right-panel' class="span6" >
					    
					    
					    

					    
					    
					    </div>
				    </div>
			    </div>


					<div id="fancyZoom_div"  style='display:none;'  >
						
						<iframe   id="iframe_fancyZoom_div" scrolling="no"  frameborder="0" src=""  >
						    <p>Your browser does not support iframes.</p>
						</iframe>
					</div>	


  </body>

</html>

    <script src="<?php  echo base_url()   ?>bootstrap/js/jquery.js"></script>
    <script src="<?php  echo base_url()   ?>bootstrap/js/bootstrap-transition.js"></script>
    <script src="<?php  echo base_url()   ?>bootstrap/js/bootstrap-alert.js"></script>
    <script src="<?php  echo base_url()   ?>bootstrap/js/bootstrap-modal.js"></script>
    <script src="<?php  echo base_url()   ?>bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="<?php  echo base_url()   ?>bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="<?php  echo base_url()   ?>bootstrap/js/bootstrap-tab.js"></script>
    <script src="<?php  echo base_url()   ?>bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="<?php  echo base_url()   ?>bootstrap/js/bootstrap-popover.js"></script>
    <script src="<?php  echo base_url()   ?>bootstrap/js/bootstrap-button.js"></script>
    <script src="<?php  echo base_url()   ?>bootstrap/js/bootstrap-collapse.js"></script>
    <script src="<?php  echo base_url()   ?>bootstrap/js/bootstrap-carousel.js"></script>
    <script src="<?php  echo base_url()   ?>bootstrap/js/bootstrap-typeahead.js"></script>

		<?php $this->load->view('footer/fancy_zoom.php');    ?>
		
		<script type="text/javascript" language="Javascript">
			
			
			
			$.fn.setFancyZoomWindowSize = function(width, height) {
						$(this).css({width:width+'px',height:height+'px'})
						.children('iframe').css({
								width:width+'px',
								height:height+'px',
								<?php     
									echo ( $this->tools->browserIsExplorer()  ? "'margin-top':'40px'" :"" );
								?>
						})
			};
	
			$('#fancyZoom_div').setFancyZoomWindowSize(794, 450);
			
			$.fn.attach_FancyZoom_AddAssetFormPopWindow = function() {
				$(this).fancyZoom().css({cursor:'pointer'}).click(function(event) {
					$('#iframe_fancyZoom_div').attr('src','<?php  echo base_url()   ?>index.php/main/add_asset?category_id=' + $(this).attr('category_id') +  '&project_id=' + $(this).attr('project_id') + '&legend='+ $(this).attr('legend')   + '&first_in_category=' + $(this).attr('first_in_category') )
				});	
				
				return this;
			};
			
			$(document).ready(function() {

						$('.theList').click(function(event) {
							$('#right-panel').load('<?php  echo base_url()   ?>index.php/ajax/projects/' +  $(this).attr('category_id')  + '?legend=' + encodeURI($(this).attr('legend')) + '&random=' + Math.floor(Math.random()*99999999999), function() {
								
								
								<?php if( $data['loggedIn']  ){?>
									
										  $('ul.thumbnails li.fancyZoom').css({cursor:'pointer'}).click(function(event) {
										  	
										  	$('#right-panel').html('').append('<iframe border=\'0\' 		vspace=\'\'		hspace=\'0\'	scrolling=\'none\'	frameborder=\'0\' style=\'overflow:hidden;width:650px;height:700px\'  src=\'<?php  echo base_url()   ?>index.php/ajax/video?project_id=' + $(this).attr('project_id') +  '\'/>');


										  });	
									
								<?php }else{?>
									
											/*  FANCYZOOM THE RIGHT PANEL */
										  $('ul.thumbnails li.fancyZoom').css({cursor:'pointer'}).attach_FancyZoom_AddAssetFormPopWindow().click(function(event) {
										  	
										  	$(this).parent().children('.fancyZoom').children('.thumbnail').children().removeClass('selected');
										  	
										  	$(this).children('.thumbnail').children().addClass('selected');
										  	
										  });		
										
								<?php } ?>
								
							  
							});
						});	
						
//						$('#test').click(function(event) {
//									$('.accordion-heading a[category_id=5]').attr('href','#collapse'+5)
//									.click()
//									
//						});	

						$('#test').click(function(event) {
									$('.accordion-body').each(function(event) {
												if( $(this).hasClass('in') ){
													
													$(this).collapse('hide')
													
												};
												
									});	
									
						});	
						$(".accordion-heading a[href='']").click(function(event) {
							
									$('.accordion-body').each(function(event) {
												if( $(this).hasClass('in') ){
													
													$(this).collapse('hide')
													
												};
												
									});				
															
						});	
						
						//.fancyZoom();
						
						/*  FANCYZOOM THE LEFT PANEL */
					  $('ol.accordion-inner_listing li.fancyZoom').css({cursor:'pointer'})
					  
					  
								<?php if( !$data['loggedIn']  ){?>
									
											.attach_FancyZoom_AddAssetFormPopWindow().click(function(event) {
												
											});
									
								<?php }else{?>
									
										  .click(function(event) {
										  	
										  	$('#right-panel').html('').append('<iframe border=\'0\' 		vspace=\'\'		hspace=\'0\'	scrolling=\'none\'	frameborder=\'0\' style=\'overflow:hidden;width:650px;height:700px\'  src=\'<?php  echo base_url()   ?>index.php/ajax/video?project_id=' + $(this).attr('project_id') +  '\'/>');
								
										  });										
									
								<?php } ?>
					  
					  
					  
					  			
					  	
					  
			});
			

			
		</script>
	
