
			<div  >
					<legend >Add Project to <?php echo $data['legend']   ?></legend>
			</div>

			<script src="<?php echo  base_url();   ?>js/fileuploader.js"></script>


      <form  
      	id='form0' 
      	class="form-horizontal"
 				METHOD="POST" 
 				enctype="multipart/form-data"
      >

        <fieldset>

					<div  class='span5  '   style='margin-left:0px'  >
		         <?php foreach( $data['input_array']['inputs']  as  $inputs){ 
         
         
         				if( $inputs['type'] == 'text'){?>
         					
						          <div class="control-group">
						
						            <label class="control-label" for="<?php echo $inputs['input_name']    ?>"><?php echo $inputs['label']    ?></label>
						
						            <div class="controls">
						
						              <input id='<?php echo $inputs['input_name']    ?>' name="<?php echo $inputs['input_name']    ?>" type="text" class="<?php echo $data['input_array']['size-class']    ?> input_fields "  value="<?php echo ( isset( $inputs['value'] ) ? $inputs['value']:'' )    ?>"  placeholder="<?php echo $inputs['placeholder']    ?>">
						
						            </div>
						
						          </div>										         				
         				
         				<?php
         				}elseif( $inputs['type'] == 'hidden'){
         				?>	

						              <input id='<?php echo $inputs['input_name']    ?>' name="<?php echo $inputs['input_name']    ?>" type="hidden" class="<?php echo $data['input_array']['size-class']    ?> input_fields "  value="<?php echo ( isset( $inputs['value'] ) ? $inputs['value']:'' )    ?>"  placeholder="<?php echo $inputs['placeholder']    ?>">
		
         					
         				<?php
         				}elseif( $inputs['type'] == 'select'){
         				?>	
         					
						          <div class="control-group">
						
						            <label class="control-label" for="<?php echo $inputs['input_name']    ?>"><?php echo $inputs['label']    ?></label>
						
						            <div class="controls">
						
						              <select   id="<?php echo $inputs['input_name']    ?>"  name="<?php echo $inputs['input_name']    ?>" class="<?php echo $data['input_array']['size-class']    ?> input_fields "    ?>'>
						              	
						              						<?php foreach( $inputs['options']  as  $option){ ?>	
						              							
																									<option <?php     
																										
																										if( $option['selected'] == 1){?>
																											selected
																										<?php  
																										   	
																										}?>value="<?php echo $option['value']    ?>"><?php echo $option['text']    ?></option>
																									
																			<?php } ?>	
						              </select>
						
						            </div>
						
						          </div>
         					
         				<?php
         				}elseif( $inputs['type'] == 'textarea'){
         				?>	
         					

						          <div class="control-group">
						
						            <label class="control-label"  for="<?php echo $inputs['input_name']    ?>"><?php echo $inputs['label']    ?>
						            </label>
						
						            <div class="controls">
						
						              <textarea  id="<?php echo $inputs['input_name']    ?>" name="<?php echo $inputs['input_name']    ?>" class="<?php echo $data['input_array']['size-class']    ?> input_fields " rows="<?php echo $inputs['rows']    ?>" placeholder="<?php echo $inputs['placeholder']    ?>"><?php echo ( isset( $inputs['value'] ) ? $inputs['value']:'' )    ?></textarea>
						
						            </div>
						
						          </div>
         					
         				<?php
         				}elseif( $inputs['type'] == 'radio'){
         				?>	
         					
					          <div class="control-group">
					
					            <label class="control-label">Radio buttons</label>
					
					            <div class="controls">
					
					              <label class="radio">
					
					                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
					
					                Option one is this and that&mdash;be sure to include why it's great
					
					              </label>
					
					              <label class="radio">
					
					                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
					
					                Option two can is something else and selecting it will deselect option one
					
					              </label>
					
					            </div>
					
					          </div>

         					
         				<?php
         				};
         			 
         			}?>
					</div>

					<div  class='span5 '   style='margin-left:30px'  >
						
						<?php foreach( $data['input_array']['inputs']  as  $inputs){ 
         
         				if( $inputs['type'] == 'file'){
							?>	
								
							
							      <div class="control-group ">
							      
							
							        <label class="control-label" for="<?php echo $inputs['input_name']    ?>"><?php echo $inputs['label']    ?></label>
							
							        <div class="controls">
							
												<div id="<?php  echo $inputs['fileuploader_name']   ?>"   class='btn float_right'    />	</div>
													<!-- STYLE ICON IN BUTTON USING js/fileuploader.js line 511  -->
							        </div>
							
							      </div>
							      
							      <script type="text/javascript" language="Javascript">
							      
								      $(document).ready(function() { 
								      	
								      			            window.<?php  echo $inputs['fileuploader_name']   ?> = new qq.FileUploader({
													                element: document.getElementById('<?php  echo $inputs['fileuploader_name']   ?>'),
													                action: '<?php echo base_url();    ?>index.php/ajax/upload',
													                params: {
																			        asset_id: <?php echo $inputs['asset_id']    ?>,
																			        asset_type_id: <?php echo $inputs['asset_type_id']    ?>,
																			        project_id:<?php echo $inputs['project_id']    ?>
																			    },
													                onComplete: function(id, fileName, responseJSON){
													                	
													                	<?php if( $inputs['asset_type_id'] == 1){?>
													                		
												                			$('#iframe_dom').attr('src','<?php echo base_url()    ?>index.php/ajax/resize?asset_id='  + responseJSON['asset_id'] +  '&asset_type_id=' + responseJSON['asset_type_id'] +  '&random='+ Math.floor(Math.random()*9999));
												                			
												                		<?php } ?>
													                	
													                },
													                debug: true,
																					multiple: false
													            }); 
								      
								      });
							      
							      </script>							      

							      <?php if(  $inputs['thumbnailbox']== 1){?>
							      
							      

							      							      
							      
									      	<div  class='clearfix '   style='margin-bottom:20px'   >
									      		<div  id='thumbnail' asset_id='<?php  echo $inputs['asset_id']   ?>' style='
									      			border:1px solid #CCCCCC;
									      			text-align:center; 
									      			width:<?php echo $inputs['thumbnailbox-size']['width']    ?>;
									      			height:<?php echo $inputs['thumbnailbox-size']['height']    ?>;
									      			margin:0 auto;
															background-image: url(<?php  echo base_url()   ?>uploads/<?php echo $inputs['asset_id']   ?>/image_thumb.jpg?random=<?php echo rand(345345,32452345)    ?>);
															background-position:'center center';
															background-repeat:'no-repeat';
															background-size:'cover';	
									      			'  ></div>
									      	</div>							      
							     
							     	<?php } ?>

							      
								
							<?php
         				};
         			 
         		}?>
					</div>
         
          <div class="form-actions clearfix"   style='padding-left:0px;'  >

            <button  id='submit-button' type="button" class="btn btn-primary"   >Save</button>

          </div>
          
          <script type="text/javascript" language="Javascript">
          	$(document).ready(function() { 
          		
          		
          		
          		
          		$('button#submit-button')
          			.css({position:'relative', left:($(window).width() / 2) - ($('button#submit-button').width()/2) })
          			.click(function(event) {
												
												$.post("<?php echo base_url(). 'index.php/main/update';    ?>",{
												table:'<?php echo $data['input_array']['table']    ?>',
												id:'<?php echo $data['input_array']['primary_key']    ?>',
												set_what:$('#form0').serialize()
												},function(data) {

															window.parent.$('.thumbnail div.selected').css({
																'background-image': 'url(<?php  echo base_url()   ?>uploads/' + $('#thumbnail').attr('asset_id') + '/image_thumb.jpg?random=<?php echo  rand(3452345,345345)   ?>)',
																'background-position':'center center',
																'background-repeat':'no-repeat',
																'background-size':'cover',	
															}).html('')
															.parent().parent().attr('project_id','<?php echo $data['input_array']['primary_key']    ?>');
															
															
															if( window.parent.$('.thumbnail div.selected').parent().parent().attr('new') == 1 ){
																
																
																	var clone = window.parent.$('.thumbnail div.selected').parent().parent().clone();
																	
																	clone.attr('project_id', '-1').children('.thumbnail').children('div').css({background:'white'}).text('NEW ONE')
																	
																	clone.css({cursor:'pointer'}).fancyZoom().click(function(event) {
							  	
																  	$(this).parent().children('.fancyZoom').children('.thumbnail').children().removeClass('selected');
																  	
																  	$(this).children('.thumbnail').children().addClass('selected');
									
																  	window.parent.$('#iframe_fancyZoom_div').attr('src','<?php  echo base_url()   ?>index.php/main/add_asset?category_id=' + $(this).attr('category_id') +  '&project_id=' + $(this).attr('project_id') + '&legend='+ $(this).attr('legend') )
																  	
																  });	
																	
																	window.parent.$('.thumbnail div.selected').parent().parent()
																	.attr('new', '0').after(  clone  );
																	
																	
																	
																
															};
															
															window.parent.$('#close_fancy_zoom').click();
												});	
				
								});	
								
          			
          	});
          </script>

        </fieldset>

      </form>
      
	<iframe  
		id="iframe_dom"   
		name="iframe_dom"
		style='background:white;
		border:0px solid gray;width:0px;height:0px'  
		border="0" 
		frameborder="0" 
		scrolling="auto" 
		align="center" 
		hspace="0" 
		vspace="">
	</iframe>      