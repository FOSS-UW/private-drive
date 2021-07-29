<?php

function scan_drive($path) {
	$dir = scandir($path);
	for ($i = 2; $i < count($dir); $i++) {
		if (is_dir($path . '/' . $dir[$i])) {
			echo "<li><h3>$dir[$i]</h3></li><ul>";
			scan_drive($path . "/$dir[$i]");
		} else {
			echo "<li><h4>$dir[$i]</h4></li>";
		}
	}
	echo "</ul>";
}

function on_load($usr_dir_path) {
	echo '<h3>root</h3><ul>';
	$root_dir = $usr_dir_path .  '/root';
	scan_drive($root_dir);	
}
