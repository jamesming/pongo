<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	
   public function __construct(){
        parent::__construct();

			
   }


	public function index(){
	

		$data = array(
		);
		

		$this->load->view('main/index_view',
					array('data' => $data));	    
	}
	
	
	
	public function assets(){
		
		
/*
						$this->my_database_model->delete_from_table(
								$table = 'assets', 
								$where_array = array(
																				'updated' => '0000-00-00 00:00:00' 
																		)
							);

*/
		
		
		
		$num = $this->uri->segment(3);
		?>
		
											<ul class="thumbnails">
												
												
												<?php 
												
												for($i=1; $i <= $num; $i++){
													$arrays[]=$i;
												}
												
												//$arrays= array(1,2,3,4,5,6,7,8,9);
												
												foreach( $arrays  as  $key => $value){?>
												
														  <li class="fancyZoom span2"    href='#fancyZoom_div'  record='<?php echo $value    ?>'>
														    <div class="thumbnail">
														    	<!--<div   style='text-align:center;border:1px solid gray;height:120px'  ><?php echo ($value );    ?>
														    	</div>
														      <img src="http://placehold.it/169x130&text=<?php echo $label.' '.($value + 1);    ?>" alt="">-->
														      <img src="http://placedog.com/169/130?random=<?php   echo rand(4,12312313)  ?>" alt="">
														    </div>
														   
														  </li>									
														  
												<?php } ?>
			
			
											  <li class="fancyZoom span2"    href='#fancyZoom_div'  record='-1'>
											    <div class="thumbnail">
											    	<div   style='text-align:center;border:1px solid gray;height:120px'  >NEW
														</div>
											     <!-- <img src="http://placehold.it/169x130&text=<?php echo $label.' '.($value + 1);    ?>" alt="">
											      <img src="http://placehold.it/169x130" alt="">-->
											    </div>
											  </li>			 
			
			    
											</ul>
		
		<?php     
		
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/ajax.php */