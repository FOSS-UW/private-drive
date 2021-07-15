<?php

function djb2($str){
	$hash = 5381;
		
	for($i = 0; $i < strlen($str); $i++) {
		$hash = (($hash << 5) + $hash) + ord($str[$i]);
	}
		
	return $hash;
}


