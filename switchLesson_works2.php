<?php
	// mode for questioning
	$m = $_REQUEST["m"];
	$translation = $m;

	if($m == "0")
		$origin = 1;
	else
		$origin = 0;	

			// read in the chosen lesson
			$lesson = "uploads/english.txt";//$_REQUEST["lesson"];

			$QNUM = 5;

			// filename should be given by start
			$fileName = "uploads/english.txt";

		// Check if file already exists
		if (file_exists($fileName)) 
		{

			// open file
			$file = fopen($fileName, "r");		
		
			// get first line
			$string = fgets($file);


			$fileContentOK = 1;

			// check input string for < and > characters
			if(strpos($string, '<') !== false)
				$fileContentOK = 0;

			for($i = 0; !feof($file) && $fileContentOK == 1; $i++)
			{
				// read in the ; seperated words			
				$answers[$i] = explode(';', $string);
	
				// get the next line
				$string = fgets($file);

				if(strpos($string, '<') !== false)
				{
					$fileContentOK = 0;
				}
			}		
	
			fclose($file);
	
			if($fileContentOK == 1)
			{			
			// define random variables
				$random = array($QNUM);
				for($i = 0; $i < $QNUM; $i++)
				{
					$random[$i] = -1;
				}
	
				$rand_word = rand(0, sizeof($answers)-1 );
			}
			

			if($fileContentOK == 1)
			{
				$ob = array("");
				$ob[0] = $ob[0]."<form method=\"POST\" action=\"resultJQ.php\">
					<fieldset data-role=\"controlgroup\">
						<legend>Was ist die korrekte Übersetzung für \"".$answers[$rand_word][$origin]."\"?</legend>";
								
	
				/*
				echo "
					<form method=\"POST\" action=\"resultJQ.php\">
					<fieldset data-role=\"controlgroup\">
						<legend>Was ist die korrekte Übersetzung für \"".$answers[$rand_word][$origin]."\"?</legend>";
				*/


				// get random value (no equal) into random variables
				// bring in the correct answer
				$random[rand(0,$QNUM-1)] = $rand_word;
	

				// fill the other with other answers
				for($i = 0; $i < $QNUM; $i++)
				{
					while($random[$i] == -1)
					{
						$random[$i] = rand(0,sizeof($answers) - 1);
	
						// check if the number is already used
						for($j = 0; $j < $i; $j++)
						{
							if(($random[$i] == $random[$j] && $i != $j) || $random[$i] == $rand_word)
							{
								$random[$i] = -1;
							}
						}
					}
			
					// create radio options
					$ob[0] = $ob[0]."<label for=\"poss".$i."\">".$answers[$random[$i]][$translation]."</label>
							<input type=\"radio\" name=\"answer\" id=\"poss".$i."\" value=\"".$answers[$random[$i]][$translation]."\">";
					
					

					/*
					echo "
						<label for=\"poss".$i."\">".$answers[$random[$i]][$translation]."</label>
							<input type=\"radio\" name=\"answer\" id=\"poss".$i."\" value=\"".$answers[$random[$i]][$translation]."\">";
					*/

				}
	
				// end the radio
				$ob[0] = $ob[0]."</fieldset>
				<input type=\"hidden\" name=\"solution\" value=\"".$answers[$rand_word][$translation]."\">
				<input type=\"hidden\" name=\"translation\" value=\"".$answers[$rand_word][$origin]."\">
				<input type=\"hidden\" name=\"lesson\" value=\"".$lesson."\" />
				<input type=\"submit\" data-inline=\"true\" value=\"Senden\">
				</form>";
				

				/*
				echo "</fieldset>";

				echo "<input type=\"hidden\" name=\"solution\" value=\""
					.$answers[$rand_word][$translation]."\">";
	
				echo "<input type=\"hidden\" name=\"translation\" value=\""
					.$answers[$rand_word][$origin]."\">";
	
				echo "<input type=\"hidden\" name=\"lesson\" value=\"".$lesson."\" />";	
				echo "<input type=\"submit\" data-inline=\"true\" value=\"Senden\">";
					
				echo "</form>";
				*/
				
				$myJSON = json_encode($ob);
				echo $myJSON;

			}
			else
			{
				//echo "In der Lektionsdatei befindet sich Zeichen die nicht zulässig sind!<br>";
			}
		}
		else
			//echo "<br>Die Datei kann nicht geöffnet werden!";

?>
