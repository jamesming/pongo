
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

    <style>

      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
      .float_left{
      float:left;	
      }
      .clearfix{
      clear:both;	
      }
			.yellow{
			background:yellow;	
			}
			.orange{
			background:orange;	
			}			
    </style>

    <link href="<?php  echo base_url()   ?>bootstrap/css/bootstrap-responsive.css" rel="stylesheet">



    <!-- Le fav and touch icons -->

    <link rel="shortcut icon" href="<?php  echo base_url()   ?>bootstrap/ico/favicon.ico">

    <link rel="apple-touch-icon" href="<?php  echo base_url()   ?>bootstrap/ico/apple-touch-icon.png">

    <link rel="apple-touch-icon" sizes="72x72" href="<?php  echo base_url()   ?>bootstrap/ico/apple-touch-icon-72x72.png">

    <link rel="apple-touch-icon" sizes="114x114" href="<?php  echo base_url()   ?>bootstrap/ico/apple-touch-icon-114x114.png">

  </head>



  <body>



    	
          <div id="navbar-example" class="navbar  navbar-fixed-top">

            <div class="navbar-inner">

              <div class="container" >

                <a class="brand" href="#">Pongo</a>

                <ul class="nav  pull-right ">

                  <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>

                    <ul class="dropdown-menu">

                      <li><a href="#">Action</a></li>

                      <li><a href="#">Another action</a></li>

                      <li><a href="#">Something else here</a></li>

                      <li class="divider"></li>

                      <li><a href="#">Separated link</a></li>

                    </ul>

                  </li>

                  <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown 2 <b class="caret"></b></a>

                    <ul class="dropdown-menu">

                      <li><a href="#">Action</a></li>

                      <li><a href="#">Another action</a></li>

                      <li><a href="#">Something else here</a></li>

                      <li class="divider"></li>

                      <li><a href="#">Separated link</a></li>

                    </ul>

                  </li>
                  
			            <li class="dropdown">
			
			              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dropdown 3<b class="caret"></b></a>
			
			              <ul id="menu1" class="dropdown-menu">
			
			                <li><a href="#">Action</a></li>
			
			                <li><a href="#">Another action</a></li>
			
			                <li><a href="#">Something else here</a></li>
			
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
					</style>


			    <div  id='left-side-div' class="container">
			    	<h1  id='work-label'>Work</h1>
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
												
												$arrays= array(
												'Animation',
												'Cable',
												'Children\'s',
												'Digital Content',
												'Integrated Marketing',
												'Network',
												'Shoot Spots',
												'Sizzles Presentation',
												);
												
												foreach( $arrays  as  $key => $value){?>
												
									            <div class="accordion-group">
									              <div class="accordion-heading">
									
									                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $key    ?>">
									                  <?php echo $value    ?>
									                </a>
									              </div>
									              <div id="collapse<?php echo $key    ?>" class="accordion-body collapse">
									                <div class="accordion-inner">
									                  <ol>
									                  	<?php for($i=1;$i<=8;$i++ ){?>
									                  	
											                  	<li   style='cursor:pointer'  >
											                  		Sample Show <?php echo $i    ?>
											                  	</li>
									                  	
									                  	<?php } ?>
									                  </ol>
									                  
									                </div>
									              </div>
									            </div>							
														  
												<?php } ?>
			
			
			          </div>
					    	
					    	
					    </div>	
					    
					    <div class="span1" >
					    	<div   style='height:700px;border-left:3px solid gray'  >
					    	</div>
					    </div>	
					    
					    		    	    
					    <div class="span6">
					    
					    
					    
											<ul class="thumbnails">
												
												
												<?php 
												
												$arrays= array(1,2,3,4,5,6,7,8,9);
												
												foreach( $arrays  as  $key => $value){?>
												
														  <li class=" span2">
														    <div class="thumbnail">
														      <img src="http://placehold.it/169x130" alt="">
														    </div>
														  </li>									
														  
												<?php } ?>
			
			    
											</ul>
					    
					    
					    </div>
				    </div>
			    </div>





    <!-- Le javascript

    ================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->


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


	<script type="text/javascript" language="Javascript">
		$(document).ready(function() { 
			$('#theButton').click(function(event) {
					$('#theMessage').show()	
			});	
				
		});
	</script>
  </body>

</html>

