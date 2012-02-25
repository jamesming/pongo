    <style>

      body {
  			//background: url(<?php  echo  base_url()  ?>images/grid.png) repeat-y center top;  
        
      }
      .float_left{
      float:left;	
      }
      .clearfix{
      clear:both;	
      }
			.yellow{
			background:yellow;	
			}
			.orange{
			background:orange;	
			}		
			.rounded{
					border-top-left-radius: 6px;
					border-top-right-radius: 6px;
					-moz-border-radius-topleft: 6px;
					-moz-border-radius-topright: 6px;
					-webkit-border-top-right-radius: 6px;
					-webkit-border-top-left-radius: 6px;
					border-bottom-left-radius: 6px;
					border-bottom-right-radius: 6px;
					-moz-border-radius-bottomleft: 6px;
					-moz-border-radius-bottomright: 6px;
					-webkit-border-bottom-right-radius: 6px;
					-webkit-border-bottom-left-radius: 6px;
				}
				.shadowed{
				  -webkit-box-shadow: 0 0 12px #dbc59e;
				  -moz-box-shadow: 0 0 6px #dbc59e;
				  box-shadow: 0 0 6px #dbc59e;	
				}
	.transparent{
			/* Fallback for web browsers that don't support RGBa */
			background-color: rgb(0, 0, 0);
			/* RGBa with 0.6 opacity */
			background-color: rgba(0, 0, 0, 0.3);
			<?php if( $this->tools->browserIsExplorer() ){?>
				background: transparent; 
			<?php } ?>
			<?php     
			/*
			http://robertnyman.com/2010/01/11/css-background-transparency-without-affecting-child-elements-through-rgba-and-filters/ 
			*/
			?>
		}
    </style>