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
	  	// read info where it is coming from
	  	$from = $_POST["from"];
		$lesson = $_POST["lesson"];

		// filename should be given by start
		//$fileName = $_POST["fileName"];
		$fileName = $_POST["lesson"];

		// Check if file already exists
		if (!file_exists($fileName)) {
		    echo "Sorry, file does not exists.";
		    $uploadOk = 0;
		}

		// open file
		$file = fopen($fileName, "r") or die("<br>Unable to open file!");		
		
		// get first line
		$string = fgets($file);

		for($i = 0; !feof($file); $i++)
		{
			// read in the ; seperated words			
			$answers[$i] = explode(';', $string);

			// get the next line
			$string = fgets($file);
		}		

		fclose($file);

		// define random variables
		$random = array(-1, -1, -1);
		$rand_word = rand(0, sizeof($answers)-1 );

		// print POST'ed data
		//$player = $_POST["player"];
		//echo $player;
	

		// Question
    		echo "<h1>Lessons</h1>
		<question>
			<p>Was ist die korrekte Übersetzung für \"".$answers[$rand_word][0]."\"?</p>
		</question>
		<form action=\"result.php\" method=\"POST\">";
		

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
				.$answers[$random[$i]][1]."\"> "
				.$answers[$random[$i]][1]."<br>";
		}
	  ?>	

	  <!-- should be handled from the forward button -->
	  <!--
		<input name="mySubmit" type="submit" value="next" />
	  -->
	</form>
    
    <footer>
        <start>
            <form action="start.php" method="POST">
		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
                <input type="submit" value="start" />
            </form>
        </start>
        <statistic>
            <form action="statistic.php" method="POST">
		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
                <input type="submit" value="statistic" />
            </form>
        </statistic>
        <forward>
            <form action="result.php" method=POST>

			
		<?php
	  	// should be handled from the forward button
		echo "<input type=\"hidden\" name=\"solution\" value=\""
			.$answers[$rand_word][1]."\">";
	
		for($i = 0; $i < 3; $i++)
		{
		  echo "<input type=\"hidden\" name=\"poss".$i."\" value=\""
			.$answers[$random[$i]][1]."\">";
		}
		?>

		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
                <input type="submit" value="forward" />
            </form>
        </forward>
    </footer>
  </body>
</html>

<!--  
	  echo "</form>";
-->

