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
		// filename should be given by start
		//$fileName = $_POST["fileName"];
		$fileName = "uploads/foo.txt";		
		
		// Check if file already exists
		if (!file_exists($fileName)) {
		    echo "Sorry, file does not exists.";
		    $uploadOk = 0;
		}

		// open file
		$file = fopen($fileName, "r") or die("<br>Unable to open file!");		
		
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

		fclose($file);

		// define random variables
		$random = array(-1, -1, -1);
		$rand_word = rand(0, sizeof($answers)-1 );

		// print POST'ed data
		//$player = $_POST["player"];
		//echo $player;
	?>


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

