<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8"/>
<style> 
//body {
//	width: 10px;
//	min-height: 50px;
//	display: flex;
//	flex-direction: row;
//}

footer {
	width: 5em;
    height: 10em;
    display: flex;
	flex-direction: row;
}


</style>
</head>
  <body>
    <h1>Setup</h1>

    <header>
	<?php
	  // read info where it is coming from
	  $from = $_POST["from"];
		
	  $target_dir = "uploads/";
	  $target_file = $target_dir . basename($_FILES["fileToUpload"]	["name"]);
	  $uploadOk = 1;
	  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	  if(strcmp($from, "setup") == 0)
	  {
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "<br>Sorry, file already exists.";
		    $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "<br>Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		
		// Allow certain file formats
		if($imageFileType != "txt") {
		    echo "<br>Sorry, only txt files are allowed.";
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "<br>Sorry, your file was not uploaded.";

		// if everything is ok, try to upload file
		} 
		else 
		{
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
		    {
		        echo "<br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

			// write the new path in the lessons.info
			$file = fopen("lessons.info", "a") or die("<br>Unable to open file!");		fwrite($file, $target_file."\n");
			fclose($file);
		    } 
		    else 
		    {
		        echo "<br>Sorry, there was an error saving your uploaded file.";
		    }
		}
	  }
	?>

	<!-- Upload visual elements --><br><br>
	<form action="setup.php" method="post" enctype="multipart/form-data">
	    Select image to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="hidden" name="from" value="setup">
	    <input type="submit" value="Upload File" name="submit">
	</form>
    </header>

    <footer>
         <start>
            <form action="start.php" method="POST">
		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
                <input type="submit" value="Auswahl" />
            </form>
        </start>
        <statistic>
            <form action="statistic.php" method="POST">
		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
                <input type="submit" value="Statistik" />
            </form>
        </statistic>
    </footer>
  </body>
</html>

