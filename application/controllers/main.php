<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	
   public function __construct(){
        parent::__construct();

				
				if(  isset( $this->session->userdata['user_id'] )  ){

					$this->loggedIn = 1;

				}else{
					
					$this->session->sess_create();	
					
					$this->loggedIn = 0;
					
				}				
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
		
		$this->home();
    
	}

	public function home(){
		
		$categories = $this->query->get_categories_with_or_without_projects();
		
		$data = array(
			'loggedIn' => $this->loggedIn,
			'categories' => $categories
		);

		//echo '<pre>';print_r(  $categories  );echo '</pre>';  exit;

		$this->load->view('main/home_view',
					array('data' => $data));			
		
	}


	public function login(){
		
					$this->session->sess_create();
					
					redirect('/main/index');						
		
	}
	
	public function logout(){
		
					$this->session->sess_create();
		
					$newdata = array('user_id' => 1 );						
						
					$this->session->set_userdata($newdata);
					
					redirect('/main/index');			

		
	}
	

	
	public function add_asset(){
		
		//echo '<pre>';print_r(  $this->input->get('project_id')  );echo '</pre>';  exit;

		if( $this->input->get('project_id') == -1 ){
			
			$project_id = $this->my_database_model->insert_table( $table = 'projects', $insert_what = array() );
			
			$new = 1;
			
		}else{
			
			$projects =   $this->query->get_projects_with_assets($where_array = array('projects.id' => $this->input->get('project_id')));

			$project_id = $projects[0]['id'];
			
		};

		$category_id = $this->input->get('category_id');
		
		$input_array = array(
			'action' => 'index.php/ajax/update_asset',
			'size-class' => 'span3',
			'table' => 'projects',
			'primary_key' => $project_id,
			'inputs' => array(
			
				array('input_name'=>'category_id', 'type' => 'hidden', 'value' => $category_id, 'label' => '', 'placeholder' => ''),
				array('input_name'=>'new', 'type' => 'hidden', 'value' => ( isset( $new ) ? 1:'0' ), 'label' => '', 'placeholder' => ''),
				array('input_name'=>'name', 'type' => 'text', 'value' => ( isset( $projects[0]['name'] ) ? $projects[0]['name'] :'' ), 'label' => 'Name of Project', 'placeholder' => 'type in project name'),
				array('input_name'=>'description', 'type' => 'textarea', 'value' => ( isset( $projects[0]['name'] ) ? $projects[0]['description'] :'' ), 'label' => 'Description', 'placeholder' => 'Write in who, what, when and other details', 'rows' =>5),
				array('input_name'=>'client', 'type' => 'text', 'value' => ( isset( $projects[0]['name'] ) ? $projects[0]['client'] :'' ), 'label' => 'Client', 'placeholder' => ''),
				array('input_name'=>'date', 'type' => 'text', 'value' => ( isset( $projects[0]['name'] ) ? $projects[0]['date'] :'' ), 'label' => 'Date', 'placeholder' => ''),
				array('input_name'=>'fileImage', 'type' => 'file', 'category_id' => $category_id, 'project_id' => $project_id,  'asset_type_id' => '1',  'label' => 'Select video thumbnail', 'thumbnailbox' => 1, 'fileuploader_name' => 'upload_button_video_still', 'thumbnailbox-size' => array( 'width' => '160px', 'height' => '120px'), 'asset_id' => ( isset($projects['Video Stills']['assets'][0] ) ? $projects['Video Stills']['assets'][0]:'-1' ), 'allowable extensions' => 'jpg', 'show_filename' => 0),
				array('input_name'=>'fileVideo', 'type' => 'file', 'category_id' => $category_id, 'project_id' => $project_id,  'asset_type_id' => '2', 'label' => 'Select video mp4 file', 'thumbnailbox' => 0, 'fileuploader_name' => 'upload_button_video', 'asset_id' => ( isset($projects['Videos']['assets'][0] ) ? $projects['Videos']['assets'][0]:'-1' ), 'allowable extensions' => 'mp4', 'filename' => ( isset($projects[0]['asset_name'] ) ? $projects[0]['asset_name']:'' ), 'show_filename' => 1),
				array(
						'input_name'=>'aspect_ratio', 
						'type' => 'select', 
						'label' => 'Aspect Ratio',
						'options' => array(
								array('value' => '1','text' => '16:2', 'selected' => ( isset( $projects[0]['name']) && $projects[0]['aspect_ratio'] == 1  ? 1:'0')),
								array('value' => '2','text' => '20:30', 'selected' => ( isset( $projects[0]['name']) && $projects[0]['aspect_ratio'] == 2  ? 1:'0'))
						)
				)
			)
		);

	
		$data = array(
			'input_array' =>  $input_array,
			'legend' =>   $this->input->get('legend'),
			'first_in_category' => $this->input->get('first_in_category')
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
$table = 'project_types';
$this->my_database_model->create_generic_table($table );


$fields_array = array(

                      'name' => array(
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
              echo '<pre>';print_r(  $fields_array    );echo '</pre>'; 
              
$this->my_database_model->add_column_to_table_if_exist(
	$table, 
	$fields_array
);              
              
$table = 'assets';
$this->my_database_model->create_generic_table($table );


$fields_array = array(

                      'project_id' => array(
                                               'type' => 'int(11)'
                                    ),
                      'asset_type_id' => array(
                                               'type' => 'int(11)'
                                    ),
              );               
              
$this->my_database_model->add_column_to_table_if_exist(
	$table, 
	$fields_array
);
   


}
	



}

/* End of file welcome.php */
/* Location: ./application/controllers/home.php */