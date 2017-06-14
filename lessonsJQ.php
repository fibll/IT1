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
			// read info where it is coming from
			$from = $_POST["from"];
			$lesson = $_POST["lesson"];

			$QNUM = 6;

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
			$random = array($QNUM);
			for($i = 0; $i < $QNUM; $i++)
			{
				$random[$i] = -1;
			}

			$rand_word = rand(0, sizeof($answers)-1 );

			// print POST'ed data
			//$player = $_POST["player"];
			//echo $player;
	

			// Question
			echo "<question>
					<p>Was ist die korrekte Übersetzung für \"".$answers[$rand_word][0]."\"?</p>
				</question>
				<form action=\"resultJQ.php\" method=\"POST\">";
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
				/*
				echo "<label for=\"male\">Male</label>
				<input type=\"radio\" name=\"gender\" id=\"male\" value=\"male\">";
				*/
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
//			echo "</div>";

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
						<input type="hidden" name="from" value="start">
						<input type="submit" value="Setup" />
					</form>
				</setup>

			</li></ul></div></div>


		</div> 
	</body>
</html>

​


