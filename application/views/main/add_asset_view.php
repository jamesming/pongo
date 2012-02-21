
<!DOCTYPE html>

<html lang="en">

  <head>


    <link href="<?php  echo base_url()   ?>bootstrap/css/bootstrap.css" rel="stylesheet">

		<?php $this->load->view('header/generic_css.php');    ?>

    <link rel="shortcut icon" href="<?php  echo base_url()   ?>bootstrap/ico/favicon.ico">

    <link rel="apple-touch-icon" href="<?php  echo base_url()   ?>bootstrap/ico/apple-touch-icon.png">

    <link rel="apple-touch-icon" sizes="72x72" href="<?php  echo base_url()   ?>bootstrap/ico/apple-touch-icon-72x72.png">

    <link rel="apple-touch-icon" sizes="114x114" href="<?php  echo base_url()   ?>bootstrap/ico/apple-touch-icon-114x114.png">

		<script src="<?php  echo base_url()   ?>bootstrap/js/jquery.js"></script>
  </head>



  <body>


			<div  >
					<legend >Add Asset <?php echo $data['record']   ?></legend>
			</div>
			
			
			<?php $this->load->view('body/form.php');    ?>
			

  </body> 

    
		<script type="text/javascript" language="Javascript">
			
			$('#submit-button').click(function(event) {
				alert($('#form0').serialize());
			});	
		
		</script>
	
	
	
  </body>

</html>

