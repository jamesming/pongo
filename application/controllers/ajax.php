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
		
		$this->query->clear_table_of_empty_records_flagged_with_update_field_equals_0000( $table  = 'projects'); 

		$legend = $this->input->get('legend');
		
		$category_id = $this->uri->segment(3);
		
		$projects = $this->query->get_projects( $category_id );

		?>
											<ul class="thumbnails ">
												
												<?php 
												
												foreach( $projects  as  $key => $project){?>
												
														  <li class="fancyZoom span2"    href='#fancyZoom_div'  project_id='<?php echo $project['id']    ?>' category_id='<?php echo $category_id    ?>'  legend='<?php  echo $legend   ?>'>
														    <div class="thumbnail">
														    	<div   style='text-align:center;border:1px solid gray;height:120px'  ><?php echo ($project['name'] );    ?>
														    	</div>
														    </div>
														   
														  </li>									
														  
												<?php } ?>
	
											  <li class="fancyZoom span2"    href='#fancyZoom_div'  project_id='-1' category_id='<?php echo $category_id    ?>' legend='<?php  echo $legend   ?>'>
											    <div class="thumbnail">
											    	<div   style='text-align:center;border:1px solid gray;height:120px'  >NEW ONE
														</div>
											    </div>
											  </li>			 
			    
											</ul>
		
		<?php     
		
	}


	public function upload(){
     
		$asset_type_id = $this->input->get('asset_type_id');
		$asset_id = $this->input->get('asset_id');
		$project_id = $this->input->get('project_id');
		
		
		if( $this->my_database_model->check_if_exist(
							$where_array = array(
								'id' => $asset_id,
								'asset_type_id' => $asset_type_id
								), 
							$table = 'assets' 
							)
		){

			
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
		
		$allowedExtensions = array("jpg", "JPG");
		
		// max file size in bytes
		$sizeLimit = 10 * 1024 * 1024;
		
		$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		$result = $uploader->handleUpload($upload_path . '/');

		?>
		{success:true,asset_id:'<?php echo $asset_id; ?>', asset_type_id:'<?php echo $asset_type_id; ?>'}
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
		
			$asset_information = getimagesize($dir_path . '/' . 'image.jpg');
			
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
				$full_path = $dir_path . '/' . 'image.jpg', 
				$width = $new_width, 
				$height = $new_height
				);
				
				
?>
			<script src="<?php  echo base_url()   ?>bootstrap/js/jquery.js"></script>
			<script type="text/javascript" language="Javascript">
			 $(document).ready(function() { 
						window.parent.$('#thumbnail').css({
							'background-image': 'url(<?php  echo base_url()   ?>uploads/<?php echo $asset_id   ?>/image_thumb.jpg?random=<?php  rand(3452345,345345)   ?>)',
							'background-position':'center center',
							'background-repeat':'no-repeat',
							'background-size':'cover',	
						})
				});
			
			</script>
	
<?php     
		
	}		
	
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/ajax.php */