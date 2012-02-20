
<!DOCTYPE html>

<html lang="en">

  <head>


    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->

    <!--[if lt IE 9]>

      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <![endif]-->



    <!-- Le styles -->

    <link href="<?php  echo base_url()   ?>bootstrap/css/bootstrap.css" rel="stylesheet">

  
    <link href="<?php  echo base_url()   ?>bootstrap/css/bootstrap-responsive.css" rel="stylesheet">



    <!-- Le fav and touch icons -->

    <link rel="shortcut icon" href="<?php  echo base_url()   ?>bootstrap/ico/favicon.ico">

    <link rel="apple-touch-icon" href="<?php  echo base_url()   ?>bootstrap/ico/apple-touch-icon.png">

    <link rel="apple-touch-icon" sizes="72x72" href="<?php  echo base_url()   ?>bootstrap/ico/apple-touch-icon-72x72.png">

    <link rel="apple-touch-icon" sizes="114x114" href="<?php  echo base_url()   ?>bootstrap/ico/apple-touch-icon-114x114.png">

  </head>



  <body>


		<div  class=' container' >
			
			<div>
					<legend >Add Asset</legend>
			</div>
			
			
			<?php $this->load->view('body/form.php');    ?>
			
			
			
		</div>
  </body> 
    <!-- Le javascript

    ================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->


    <script src="<?php  echo base_url()   ?>bootstrap/js/jquery.js"></script>

    <script src="<?php  echo base_url()   ?>bootstrap/js/bootstrap-button.js"></script>


	<script type="text/javascript" language="Javascript">
		$(document).ready(function() { 
			
				
		});
	</script>
  </body>

</html>

