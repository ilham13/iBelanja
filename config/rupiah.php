<?php  
function rupiah($input_number){
	$number=number_format($input_number,2,',','.');
	return $number;
}

?>