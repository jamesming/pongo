<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Query Library 
 * @autoloaded YES
 * @path \system\application\libraries\Query.php
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @copyright 2010 Prospace LLC
 * @version 1.0
 * 
 */
 
 
 
class Query {

	private $CI;	// CodeIgniter instance
	
	
	function query(){
		
		$this->CI =& get_instance();	
		
	}
	
	
	function get_categories_with_or_without_projects(){
		
		$join_array = array(
									'projects' => 'projects.category_id = categories.id'
									);	
											
		
		$categories_raw =  $this->CI->my_database_model->select_from_table_left_join( 
					$table = 'categories', 
					$select_what = 'categories.*, projects.id as project_id, projects.name as project_name ',    
					$where_array = array(), 
					$use_order = TRUE, 
					$order_field = 'categories.id, project_id', 
					$order_direction = 'asc', 
					$limit = -1, 
					$use_join = TRUE, 
					$join_array
					);
					
					
		$categories_raw = $this->CI->tools->object_to_array($categories_raw);
		

		$count = 0;

		$previous_id = 0;
		
		foreach( $categories_raw  as $key =>  $category){
			$count++;
			if( $category['id'] == $previous_id || $previous_id == 0){

					foreach( $category  as  $field => $value){
		 
		 
						 	if (!in_array($field, array('project_id', 'project_name'))){
						 			$category_array[$field] = $value;
							}else{
									
									if( $field =='project_id'){
										$grouped_project['project_id'] = $value;
									}elseif( $field =='project_name'){
										$grouped_project['project_name'] = $value;
									};
									
									
									
							};
					}
					
					$projects[] = $grouped_project;
					unset($grouped_project);

			}else{

					$category_array['projects'] = $projects;	
					unset($projects);							

					$categories[] = $category_array;	

					foreach( $category  as  $field => $value){
		 
						 	if (!in_array($field, array('project_id', 'project_name'))){
						 			$category_array[$field] = $value;
							}else{
								
									if( $field =='project_id'){
										$grouped_project['project_id'] = $value;
									}elseif( $field =='project_name'){
										$grouped_project['project_name'] = $value;
									};

									
							};
						
					}		
					
					$projects[] = $grouped_project;
					unset($grouped_project);								
			};

			
			$previous_id = $category['id'];		
			

		}
		
		if( $count ==  count($categories_raw) ){

						$category_array['projects'] = ( isset($projects ) ? $projects : array());				
						$categories[] = $category_array;
	
		};

		//echo '<pre>';print_r(  $categories   );echo '</pre>';  exit;	
					
		return $this->CI->tools->object_to_array( $categories );
	}
	
	function get_projects_with_or_without_assets( $category_id ){
		
		$join_array = array(
									'assets' => 'assets.project_id = projects.id'
									);	
									
										
		$projects = $this->CI->my_database_model->select_from_table_left_join( 
				$table = 'projects', 
				$select_what = '
					projects.*, 
					assets.id as asset_id,
					assets.asset_type_id
					',    
				$where_array = array(
					'category_id' => $category_id,
				), 
				$use_order = FALSE, 
				$order_field = 'projects.created', 
				$order_direction = 'asc', 
				$limit = -1, 
				$use_join = TRUE, 
				$join_array
				);
				
	
					
		return $this->CI->tools->object_to_array($projects);
		
		
		
		
	}
	
	
	function get_projects_with_assets( $where_array ){
		

		$join_array = array(
									'assets' => 'assets.project_id = projects.id'
									);
		
		$projects_raw = $this->CI->my_database_model->select_from_table( 
			$table = 'projects', 
			$select_what = 'asset_type_id ,assets.id as asset_id, projects.id as project_id, projects.*',    
			$where_array, 
			$use_order = TRUE, 
			$order_field = 'asset_type_id, assets.created', 
			$order_direction = 'asc', 
			$limit = -1, 
			$use_join = TRUE, 
			$join_array
			);
			
		$projects_raw = $this->CI->tools->object_to_array($projects_raw);


		if( count($projects_raw) == 0 ){
			
				$projects_raw = $this->CI->my_database_model->select_from_table( 
					$table = 'projects', 
					$select_what = 'projects.id as project_id, projects.*',    
					$where_array, 
					$use_order = FALSE, 
					$order_field = '', 
					$order_direction = 'asc', 
					$limit = -1
					);
					
					$projects = $this->CI->tools->object_to_array($projects_raw);

				return $projects;		
			
		};

		$count=0;

		$previous_id = -1;
			
		$asset_types = array(
			0 => 'XXXX',
			1 => 'Video Stills',
			2 => 'Videos',
		);
		

		foreach( $projects_raw  as $key =>  $project){
			$count++;
			if( $project['asset_type_id'] == $previous_id || $previous_id == -1){

					foreach( $project  as  $field => $value){
		 
						 	if( $field != 'asset_id'){
						 			$array[$field] = $value;
							}else{
									$assets[] = $value;
							};
						
					}
					
					
					

			}else{

					$array['assets'] = $assets;	
					unset($assets);			
					$projects[$asset_types[  $previous_id  ]] = $array;					
			
					foreach( $project  as  $field => $value){
		 
						 	if( $field != 'asset_id'){
						 			$array[$field] = $value;
							}else{
									$assets[] = $value;
							};
						
					}					



			};
			
			$previous_id = $project['asset_type_id'];			

		}
		
		if( $count ==  count($projects_raw) ){

						$array['assets'] = ( isset($assets ) ? $assets :array());				
						$projects[$asset_types[   $previous_id  ]] = $array;
	
		};
		
		$projects[] = $projects[  $asset_types[  $previous_id  ] ];  // IE: $projects['video stills']

		return $projects;
		
	}
	
	function clear_table_of_empty_records_flagged_with_update_field_equals_0000( $table ){
		
			$this->CI->my_database_model->delete_from_table(
			$table, 
			$where_array = array(
															'updated' => '0000-00-00 00:00:00' 
													)
			);
		
	}

	
	function get_users( $table, $where_array ){
		

		$join_array = array(
									'images' => 'images.user_id = users.id'
									);
		
		$users_raw = $this->CI->my_database_model->select_from_table( 
			$table = 'users', 
			$select_what = 'image_type_id ,images.id as image_id, users.id as user_id, users.*',    
			$where_array, 
			$use_order = TRUE, 
			$order_field = 'image_type_id, images.created', 
			$order_direction = 'asc', 
			$limit = -1, 
			$use_join = TRUE, 
			$join_array
			);
		$users_raw = $this->CI->tools->object_to_array($users_raw);


		if( count($users_raw) == 0 ){
			
				$users_raw = $this->CI->my_database_model->select_from_table( 
					$table = 'users', 
					$select_what = 'users.id as user_id, users.*',    
					$where_array, 
					$use_order = FALSE, 
					$order_field = '', 
					$order_direction = 'asc', 
					$limit = -1
					);
					
					$users = $this->CI->tools->object_to_array($users_raw);

				return $users;		
			
		};

		$count=0;

		$previous_id = -1;
			
		$image_types = array(
			0 => 'backgrounds',
			1 => 'pictures',
			2 => 'videos',
		);
		

		foreach( $users_raw  as $key =>  $user){
			$count++;
			if( $user['image_type_id'] == $previous_id || $previous_id == -1){

					foreach( $user  as  $field => $value){
		 
						 	if( $field != 'image_id'){
						 			$array[$field] = $value;
							}else{
									$images[] = $value;
							};
						
					}
					
					
					

			}else{

					$array['images'] = $images;	
					unset($images);			
					$users[$image_types[  $previous_id  ]] = $array;					
			
					foreach( $user  as  $field => $value){
		 
						 	if( $field != 'image_id'){
						 			$array[$field] = $value;
							}else{
									$images[] = $value;
							};
						
					}					



			};
			
			$previous_id = $user['image_type_id'];			

		}
		
		if( $count ==  count($users_raw) ){

						$array['images'] = ( isset($images ) ? $images :array());				
						$users[$image_types[   $previous_id  ]] = $array;
	
		};
		
		$users[] = $users[  $image_types[  $previous_id  ] ];  // IE: $users['backgrounds']

		return $users;
		
	}

	function insert($post_array){

		$set_what_array = $this->get_set_what_array_by_parsing_post_parameter($post_array);
		
		$this->add_column_if_not_exist($set_what_array, $post_array['table']);		
		
		return $this->CI->my_database_model->insert_table(
									$post_array['table'], 
									$insert_what = $set_what_array
									); 					

	}

	function update($post_array){

		$set_what_array = $this->get_set_what_array_by_parsing_post_parameter($post_array);
		
		$this->add_column_if_not_exist($set_what_array, $post_array['table']);

		return $this->CI->my_database_model->update_table_where(
					$post_array['table'], 
					$where_array = array('id'=>$post_array['id']),
					$set_what_array = $set_what_array
					);	
	}
	
	function get_set_what_array_by_parsing_post_parameter($post_array){
		
		
			$fields = explode('&', $post_array['set_what']);
			foreach($fields as $field){
				$field_key_value = explode("=",$field);
				$key = urldecode($field_key_value[0]);
				$value = urldecode($field_key_value[1]);
				//eval("$$key = \"$value\";");
				$set_what_array[$key] = $value;
			};	  

			return $set_what_array;
				
	}
	
	
	function add_column_if_not_exist($set_what_array, $table){
		
			foreach( $set_what_array  as  $key => $value){
				$fields_array = array(
							$key => array('type' => 'varchar(255)')                                          
            	); 

				$this->CI->my_database_model->add_column_to_table_if_exist(
					$table, 
					$fields_array
				);    					
			};
 	
		
	}
	
}


/* End of file Tool.php */ 
/* Location: \system\application\libraries\Query.php */
