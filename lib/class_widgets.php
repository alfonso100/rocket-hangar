<?php 
	class widget {

		var $title; 
		var $body;
		var $class;  

		function display_widget($title, $body, $class) { 
			
			$widget_output  = '<div class="widget grid-item '.$class.'">';
			$widget_output .= '<div class="title"><h4>'.$title.'</h4></div>';
			$widget_output .= '<div class="body">'.$body.'</div>';
			$widget_output .= '</div>';

			$this->widget = $widget_output;
			return $this->widget;
 		}



	} 
?>