<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	
   public function __construct(){
        parent::__construct();

			
   }

	/**
	 * Index Page for this controller.
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/index
	 * @access public
	 */
	 

	public function index(){
	

		$data = array(
		);
		

		$this->load->view('main/index_view',
					array('data' => $data));	    
	}
	
	/**
	 * Index Page for this controller.
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/index
	 * @access public
	 */

	public function home(){
	

		$data = array(
		);
		

		$this->load->view('main/home_view',
					array('data' => $data));	    
	}
	
	public function add_asset(){

		$input_array = array(
			'size-class' => 'span3',
			'inputs' => array(
			
				array('input_name'=>'project', 'type' => 'text', 'label' => 'Project', 'placeholder' => ''),
				array('input_name'=>'description', 'type' => 'textarea', 'label' => 'Description', 'placeholder' => 'Write in who, what, when and other details', 'rows' =>5),
				array('input_name'=>'client', 'type' => 'text', 'label' => 'Client', 'placeholder' => ''),
				array('input_name'=>'date', 'type' => 'text', 'label' => 'Date', 'placeholder' => ''),
				array('input_name'=>'fileInput', 'type' => 'file', 'label' => 'Select video thumbnail', 'thumbnailbox' => 1, 'thumbnailbox-size' => array( 'width' => '160px', 'height' => '120px')),
				array('input_name'=>'fileInput', 'type' => 'file', 'label' => 'Select video mp4 file', 'thumbnailbox' => 0),
				array(
						'input_name'=>'sports', 
						'type' => 'select', 
						'label' => 'Sports',
						'options' => array(
								array('value' => '1','text' => 'football'),
								array('value' => '2','text' => 'soccer'),
								array('value' => '3','text' => 'baseball'),
						)
				)
			)
		);
		
		$data = array(
			'input_array' =>  $input_array,
			'record' =>  $this->uri->segment(3)
		);
		
		$this->load->view('main/add_asset_view',
					array('data' => $data));			
		

	}	


	public function generic(){
	

		$data = array(
		);
		

		$this->load->view('main/generic_view',
					array('data' => $data));	    
	}

/**
 * create_table
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/create_table
 * @access public
 **/ 

	
function t(){
$table = 'images';
$this->my_database_model->create_generic_table($table );


$fields_array = array(
                      'user_id' => array(
                                               'type' => 'int(11)'
                                    ),
                      'image_type_id' => array(
                                               'type' => 'int(11)'
                                    ),
//                      'county' => array(
//                                               'type' => 'varchar(255)'
//                                    ),
//                      'city' => array(
//                                               'type' => 'varchar(255)'
//                                    ),
//                      'state' => array(
//                                               'type' => 'varchar(255)'
//                                    )
              ); 
              
              
              
$this->my_database_model->add_column_to_table_if_exist(
	$table, 
	$fields_array
);
   


}
	



}

/* End of file welcome.php */
/* Location: ./application/controllers/home.php */