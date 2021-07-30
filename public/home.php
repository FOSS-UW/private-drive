<!doctype html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./style/home.css">
        <?php 
            session_start();
            if (!isset($_SESSION['user'])) {
                header('Location: index.php');
                session_destroy();
            }
        ?>
    </head>
    <body>
	<div id="upload-form">
		<form enctype="multipart/form-data" action="file.upload.php"
			method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="20000000"/>
			Upload file: <input name="upload-file" type="file"/>
			File destination: <input name="dest-path" type="text"/>
			<input type="submit" value="Upload"/>
		</form>
	</div>
	<div id="content">
		<?php
	    		require 'on.load.php';
			echo '<i>Welcome back,</i> ' . $_SESSION['user'];			
    			on_load($_SESSION['user']); 	    
		?>
	</div>
    </body>
</html>
