<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	
   public function __construct(){
        parent::__construct();
        
				if(  isset( $this->session->userdata['user_id'] )  ){

					$this->loggedIn = 1;

				}else{
					
					$this->loggedIn = 0;
					
				}
			
   }


	public function index(){
	

		$data = array(
		);
		

		$this->load->view('main/index_view',
					array('data' => $data));	    
	}
	
	
	
	public function projects(){
		
		$this->query->clear_table_of_empty_records_flagged_with_update_field_equals_0000( $table  = 'projects'); 

		$legend = $this->input->get('legend');
		
		$category_id = $this->uri->segment(3);
		
		$projects = $this->query->get_projects_with_or_without_assets( $category_id );
		?>

											<ul class="thumbnails ">
												
												<?php 
												
												foreach( $projects  as  $key => $project){
													
													if( !in_array($project['asset_type_id'], array('2'))){?>
												
														  <li class="fancyZoom span2"  new='0'  href='#fancyZoom_div'  project_id='<?php echo $project['id']    ?>' category_id='<?php echo $category_id    ?>'  legend='<?php  echo $legend   ?>'>
														    <div class="thumbnail">
														    	<div   style='text-align:center;
														    								border:1px solid gray;
														    								height:120px;
														    								width:160px;
																								background-image: url(<?php  echo base_url()   ?>uploads/<?php echo  $project['asset_id']     ?>/asset_thumb.jpg?random=<?php echo  rand(3445,345345)   ?>);
																								background-position:center center;
																								background-repeat:no-repeat;
																								background-size:cover;'  >
																								
														    	</div>
														    </div>
														   
														  </li>									
														  														
													<?php
													};

												 } ?>
												 
												 <?php if( $this->loggedIn == 0){?>
												 
																  <li 
																  	<?php if( count($projects) == 0 ){?>
																  	
																  			first_in_category=1
																  	
																  	<?php }else{?>
																  	
																  			first_in_category=0
																  	
																  	<?php } ?>
																  	
																  	class="fancyZoom span2"  new='1'  href='#fancyZoom_div'  project_id='-1' category_id='<?php echo $category_id    ?>' legend='<?php  echo $legend   ?>'>
																    <div   class="thumbnail">
																    	<div  style='text-align:center;border:1px solid gray;height:120px'  ><br /><br />Add <?php echo $legend    ?>
																			</div>
																    </div>
																  </li>		
												
												 <?php } ?>
	
	 
			    
											</ul>
		
		<?php     
		
	}
	
	public function video(){
		
		$projects =   $this->query->get_projects_with_assets(
				$where_array = array(
					'projects.id' => $this->input->get('project_id')
				)
			);



		$data = array('projects' => $projects);
		
		$this->load->view('main/video_view',
					array('data' => $data));		
		
	}	


	public function update(){

		echo  $this->query->update( $this->input->post()  );
		
	}

	public function upload(){
     
		$asset_type_id = $this->input->get('asset_type_id');
		$asset_id = $this->input->get('asset_id');
		$project_id = $this->input->get('project_id');
		$category_id = $this->input->get('category_id');
		
		$this->my_database_model->update_table_where(
					'projects', 
					$where_array = array('id'=>$project_id),
					$set_what_array = array(
						'category_id' => $category_id
						)
					);	
		
		
		if( $this->my_database_model->check_if_exist(
							$where_array = array(
								'project_id' => $project_id,
								'asset_type_id' => $asset_type_id
								), 
							$table = 'assets' 
							)
		){

					$assets = $this->my_database_model->select_from_table( 
						$table = 'assets', 
						$select_what = 'id',    
						$where_array = array(
								'project_id' => $project_id,
								'asset_type_id' => $asset_type_id
						), 
						$use_order = FALSE, 
						$order_field = 'created', 
						$order_direction = 'asc', 
						$limit = 1);
						
					$asset_id = $assets[0]->id;
			
		}else{
			
					$asset_id = $this->my_database_model->insert_table(
						$table = 'assets', 
						array(
							'asset_type_id' => $asset_type_id,
							'project_id' => $project_id,
						)
					);
			
		};

		
		$path_array = array(
			'asset_id' => $asset_id
		);
					
		$upload_path = $this->tools->set_directory_for_upload( $path_array );
		
		
		$this->load->library('qquploadedfilexhr');
		
		$allowedExtensions = array("jpg", "JPG", "mp4");
		
		// max file size in bytes
		$sizeLimit = 10000 * 1024 * 1024;
		
		$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		$result = $uploader->handleUpload($upload_path . '/');
		
		$this->my_database_model->update_table_where(
					$table = 'assets', 
					$where_array = array('id' => $asset_id),
					$set_what_array = array(
						'name' => $result['filename']
						)
					);
		
		//sleep(3);

		?>
		{success:true,asset_id:'<?php echo $asset_id; ?>', asset_type_id:'<?php echo $asset_type_id; ?>', filename:'<?php echo $result['filename']; ?>'}
		<?php   	
		
/*	

		ADAPT FILE UPLOADER FOR CODEIGNIGHTER TO BE FOUND:
		http://codeigniter.com/forums/viewthread/175970/#941905  #3


		$config['upload_path'] = './' . $upload_path;
		$config['allowed_types'] = 'bmp|jpeg|gif|jpg|png';
		$config['overwrite'] = 'TRUE';
		$config['file_name'] = 'image.png';
		
		$this->load->library('upload', $config);
		$this->upload->do_upload("qqfile");
			

		
*/		
		  
	}	


	public function resize(){
		
			$asset_id = $this->input->get('asset_id');
			$asset_type_id = $this->input->get('asset_type_id');
			
			$dir_path = 'uploads/'  . $asset_id; 
		
			$asset_information = getimagesize($dir_path . '/' . 'asset.jpg');
			
			$width_of_file = $asset_information[0];
			$height_of_file = $asset_information[1];
			
			$this->thumbnail_size_width  = '160';
			$this->thumbnail_size_height = '120';			
			
			$new_width = $this->thumbnail_size_width;
			$new_height = $this->tools->get_new_size_of (
				$what = 'height', 
				$based_on_new = $new_width, 
				$orig_width = $width_of_file, 
				$orig_height = $height_of_file 
				);
		
		
			$this->tools->clone_and_resize_append_name_of(
				$appended_suffix = '_thumb', 
				$full_path = $dir_path . '/' . 'asset.jpg', 
				$width = $new_width, 
				$height = $new_height
				);
				
				
?>
			<script src="<?php  echo base_url()   ?>bootstrap/js/jquery.js"></script>
			<script type="text/javascript" language="Javascript">
			 $(document).ready(function() { 
						window.parent.$('#thumbnail').css({
							'background-image': 'url(<?php  echo base_url()   ?>uploads/<?php echo $asset_id   ?>/asset_thumb.jpg?random=<?php  echo rand(3452345,345345)   ?>)',
							'background-position':'center center',
							'background-repeat':'no-repeat',
							'background-size':'cover',	
						}).attr('asset_id', '<?php echo $asset_id   ?>')
				});
			
			</script>
	
<?php     
		
	}		
	
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/ajax.php */