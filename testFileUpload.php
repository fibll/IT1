<!DOCTYPE html>
<html>
<head>
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
	
	<?php
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]	["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		
		// Allow certain file formats
		if($imageFileType != "txt") {
		    echo "Sorry, only txt files are allowed.";
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";

		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error saving your uploaded file.";
		    }
		}

		// open file
		$file = fopen("uploads/".$_FILES["fileToUpload"]["name"], "r") or die("<br>Unable to open file!");		
		
		// get first line
		$string = fgets($file)."<br>";

		for($i = 0; !feof($file); $i++)
		{
			// remove line escapor in the end
			//$string = trim(preg_replace('/\s\s+/', ' ', $string));
			//$string = str_replace(array("\r\n", "\r"), "", $string);

			// read in the ; seperated words			
			$answers[$i] = explode(';', $string);

			// get the next line
			$string = fgets($file)."<br>";
		}

		echo "<br><br><br>".$answers[5][0];		

		fclose($file);

		// define random variables
		$random = array(-1, -1, -1);
		$rand_word = rand(0, sizeof($answers)-1 );

	?>


	<form action="test.php" method="post" enctype="multipart/form-data">
	    Select image to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload Image" name="submit">
	</form>



    	<h1>Lessons</h1>
	<question>
		<p>Was heißt <?php echo $answers[$rand_word][0]; ?> auf Englisch?</p>
	</question>
	<form action="result.php" method="POST">


	  <?php
		// get random value (no equal) into random variables
		// bring in the correct answer
		$random[rand(0,2)] = $rand_word;

		
		// fill the other with other answers
		for($i = 0; $i < 3; $i++)
		{
			while($random[$i] == -1)
			{
				$random[$i] = rand(0,sizeof($answers) - 1);

				for($j = 0; $j < 3; $j++)
				{
					if($random[$i] == $random[$j] && $i != $j)
					{
						$random[$i] = -1;
					}
				}
			}
			
			// create radio options
	 		echo "<input type=\"radio\" name=\"answer\" value=\""
			.$answers[$random[$i]][1]."\"> ".$answers[$random[$i]][1]."<br>";
		}
	  ?>	


	  <input name="mySubmit" type="submit" value="next" />
	</form>
    
    <footer>
        <forward>
            <form action="result.php">
                <input type="submit" value="forward" />
            </form>
        </forward>
        <statistic>
            <form action="statistic.php">
                <input type="submit" value="statistic" />
            </form>
        </statistic>
    </footer>
  </body>
</html>

