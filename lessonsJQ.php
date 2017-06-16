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
		<?php
			// read in the chosen lesson
			$lesson = $_POST["lesson"];

			$QNUM = 5;

			// filename should be given by start
			//$fileName = $_POST["fileName"];
			$fileName = $_POST["lesson"];

		// Check if file already exists
		if (file_exists($fileName)) 
		{

			// open file
			$file = fopen($fileName, "r");		
		
			// get first line
			$string = fgets($file);


			$fileContentOK = 1;

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

			// print POST'ed data
			//$player = $_POST["player"];
			//echo $player;

			// lesson name einfach als "fake" GET beim aufruf (aktion) anhängen ==================================================================================
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

<!--
			<script>
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function()
				{
					/* Stuff that will be executed when php file returns */
					if (this.readyState == 4 && this.status == 200)
					{
						document.getElementById("txtHint").innerHTML = this.responseText;
					}
				};

				xmlhttp.open("GET", "gethint.php?q=" + str, true);
				xmlhttp.send();
			</script>

-->
			<?php


			if($fileContentOK == 1)
			{
				echo "<question>
						<p>Was ist die korrekte Übersetzung für \"".$answers[$rand_word][0]."\"?</p>
					</question>
					<form action=\"resultJQ.php?lesson=uploads/english.txt\" method=\"POST\">";
				//<div data-role=\"controlgroup\" data-type=\"vertical\">";
			
					/*
						echo "<div data-role=\"main\" class=\"ui-content\">
							<form method=\"post\" action=\"/action_page_post.php\">
							<fieldset data-role=\"controlgroup\">
							<legend>Was ist die korrekte Übersetzung für \"".$answers[$rand_word][0]."\"?</legend>";
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
					echo "<input type=\"radio\" name=\"answer\" value=\""
						.$answers[$random[$i]][1]."\"> "
						.$answers[$random[$i]][1]."<br>";
				}
	
				// create forward button
				//echo "</fieldset>
					//	<input type=\"Senden\" data-inline=\"true\" value=\"Submit\">";

				echo "<input type=\"hidden\" name=\"solution\" value=\""
					.$answers[$rand_word][1]."\">";
	
				echo "<input type=\"hidden\" name=\"translation\" value=\""
					.$answers[$rand_word][0]."\">";
	
				echo "<input type=\"hidden\" name=\"lesson\" value=\"".$lesson."\" />";	
				echo "<input type=\"submit\" value=\"Senden\" />";
		
	
				echo "</form>";
			}
			else
			{
				echo "In der Lektionsdatei befindet sich Zeichen die nicht zulässig sind!<br>";
			}
		}
		else
			echo "<br>Die Datei kann nicht geöffnet werden!";
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


