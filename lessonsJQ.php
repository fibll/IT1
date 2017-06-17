<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8"/>

		<!-- jQuery stuff -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<link rel="stylesheet" href="stylesheet.css">
		<script src="jquery1.js"></script>
		<script src="jquery2.js"></script>
	</head>

	<body>	

		<div data-role="page">
		<div data-role="header">
			<h1>Lesson</h1>
		</div>
		<div data-role="main" class="ui-content">

		<!-- main content -->

		<!-- javascript -->
		<script>
		function showHint(str) 
		{
			num = 0;

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			{
				if (this.readyState == 4 && this.status == 200)
				{
					var myObj = JSON.parse(this.responseText);
					document.getElementById("q").innerHTML = myObj[0];
					document.getElementById("a1").innerHTML = myObj[1];
					document.getElementById("a2").innerHTML = myObj[2];
					document.getElementById("a3").innerHTML = myObj[3];
					document.getElementById("a4").innerHTML = myObj[4];
					document.getElementById("a5").innerHTML = myObj[5];
					document.getElementById("e").innerHTML = myObj[6];
				}
			};
		
			xmlhttp.open("GET", "switchLesson_works.php?m=" + str, true);
			xmlhttp.send();
		}
		</script>


		<?php

/*
			// read in the chosen lesson
			$lesson = $_POST["lesson"];

			$QNUM = 5;

			// filename should be given by start
			$fileName = $_POST["lesson"];

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
			}*/

// ==================================================================================
			/* ajax:
				javascript benutzen:
					+ xml http request stuff
					+ onreadystatechange = 'function{}', dort den Code für die Antwort der aufgerufenen php seite schreiben 
					+ für Aufruf, open() und send()
			*/	


			// Question
			
			/*
				// Switch Button
				echo "
				<div data-role=\"controlgroup\" data-type=\"horizontal\">
  					<a href=\"#\" class=\"ui-btn ui-btn-up-c\">Button 1</a>
  					<a href=\"#\" class=\"ui-btn\">Button 2</a>
				</div>
				";
			*/

	?>

	

	<script>showHint(1);</script>

	<div data-role="controlgroup" data-type="horizontal">
		<a href="#" class="ui-btn ui-btn-up-c" onclick="showHint(1)">Button 1</a>
		<a href="#" class="ui-btn" onclick="showHint(0)">Button 2</a>
	</div>

	<form method="POST" action="resultJQ.php">
		<fieldset data-role="controlgroup">
			<legend>
				Was ist die korrekte Übersetzung für <p id="q" style="display:inline"></p>
			</legend>

	<label><p id="a1" style="display:inline"></p></label>
	<input type="radio" name="answer" id="poss1" value="a1">
	
	<p id="e"></p>

	
	<?php
/*	

			if($fileContentOK == 1)
			{
				echo "
					<form method=\"POST\" action=\"resultJQ.php\">
					<fieldset data-role=\"controlgroup\">
						<legend>Was ist die korrekte Übersetzung für \"".$answers[$rand_word][0]."\"?</legend>";

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
					echo "
						<label for=\"poss".$i."\">".$answers[$random[$i]][1]."</label>
							<input type=\"radio\" name=\"answer\" id=\"poss".$i."\" value=\"".$answers[$random[$i]][1]."\">";

				}
	
				// end the radio
				echo "</fieldset>";

				echo "<input type=\"hidden\" name=\"solution\" value=\""
					.$answers[$rand_word][1]."\">";
	
				echo "<input type=\"hidden\" name=\"translation\" value=\""
					.$answers[$rand_word][0]."\">";
	
				echo "<input type=\"hidden\" name=\"lesson\" value=\"".$lesson."\" />";	
				echo "<input type=\"submit\" data-inline=\"true\" value=\"Senden\">";
					
				echo "</form>";
			}
			else
			{
				echo "In der Lektionsdatei befindet sich Zeichen die nicht zulässig sind!<br>";
			}
		}
		else
			echo "<br>Die Datei kann nicht geöffnet werden!";
*/

		?>	
		


		</div>

			<!-- footer -->
			<div data-role="footer"><div data-role="navbar"><ul><li>

				<!-- Option 1 -->
				<start>
					<form action="startJQ.php" method="POST">
						<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
						<input type="submit" value="Auswahl" />
					</form>
				</start>

			</li><li>

				<!-- Option 2 -->
				<statistic>
					<form action="statisticJQ.php">
						<input type="submit" value="Statistik" />
					</form>
				</statistic>

			</li><li>

				<!-- Option 3 -->
				<setup>
					<form action="setupJQ.php">
						<input type="submit" value="Setup" />
					</form>
				</setup>

			</li></ul></div></div>


		</div> 
	</body>
</html>

​


