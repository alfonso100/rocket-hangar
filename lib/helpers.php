<?php 

// read the filters cookie values and activates or deactivates the checkboxes
function hangarFilters($checkbox_val) {
	
	$filters = $_GET['filters'];

		if($filters) {
			if(in_array($checkbox_val, $filters)) {

			return 'checked';
			} else {
				return '';
			}

		} else {
			if($checkbox_val == 'all') {
				return 'checked';
			}
		}
	
}

