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
	
	
	
	public function projects(){

		$legend = $this->input->get('legend');
		
		$category_id = $this->uri->segment(3);
		
		$projects = $this->query->get_projects( $category_id );
		
		?>
											<ul class="thumbnails">
												
												<?php 
												
												foreach( $projects  as  $key => $project){?>
												
														  <li class="fancyZoom span2"    href='#fancyZoom_div'  project_id='<?php echo $project['id']    ?>' category_id='<?php echo $category_id    ?>'>
														    <div class="thumbnail">
														    	<!--<div   style='text-align:center;border:1px solid gray;height:120px'  ><?php echo ($project );    ?>
														    	</div>
														      <img src="http://placehold.it/169x130&text=<?php echo $label.' '.($project + 1);    ?>" alt="">-->
														      <img src="http://placedog.com/169/130?random=<?php   echo rand(4,12312313)  ?>" alt="">
														    </div>
														   
														  </li>									
														  
												<?php } ?>
			
											  <li class="fancyZoom span2"    href='#fancyZoom_div'  project_id='-1' category_id='<?php echo $category_id    ?>' legend='<?php  echo $legend   ?>'>
											    <div class="thumbnail">
											    	<div   style='text-align:center;border:1px solid gray;height:120px'  >NEW
														</div>
											    </div>
											  </li>			 
			    
											</ul>
		
		<?php     
		
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

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/ajax.php */