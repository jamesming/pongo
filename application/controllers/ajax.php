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
		
		$num = $this->uri->segment(3)
		
		?>
		
											<ul class="thumbnails">
												
												
												<?php 
												
												for($i=0; $i <= $num; $i++){
													$arrays[]=$i;
												}
												
												//$arrays= array(1,2,3,4,5,6,7,8,9);
												
												foreach( $arrays  as  $key => $value){?>
												
														  <li class="fancyZoom span2"    href='#fancyZoom_div'>
														    <div class="thumbnail">
														      <img src="http://placehold.it/169x130" alt="">
														    </div>
														  </li>									
														  
												<?php } ?>
			
			    
											</ul>
		
		<?php     
		
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/ajax.php */