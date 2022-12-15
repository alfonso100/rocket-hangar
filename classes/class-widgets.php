<?php 
// widgets builder

	class widget {

		var $title; 
		var $body;
		var $class;  
		var $icon;  

		function display_widget($title, $body, $class, $icon) { 
			
			$widget_output  = '<div class="widget grid-item '.$class.'">';
			$widget_output .= '<div class="title"><h4><i class="fas '.$icon.'"></i> '.$title.'</h4></div>';
			$widget_output .= '<div class="body align-middle">'.$body.'</div>';
			$widget_output .= '</div>';

			$this->widget = $widget_output;
			return $this->widget;
 		}



	} 
