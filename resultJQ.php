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
			<h1>Ergebnis</h1>
		</div>
		<div data-role="main" class="ui-content">

		<!-- main content -->
		<?php
			// read info where it is coming from
			$from = $_POST["from"];
			$lesson = $_POST["lesson"];

			$answer = $_POST["answer"];
			$solution = $_POST["solution"];
			$translation = $_POST["translation"];

			$info = array(2);


			// get .stat fileName
			$lessons_name = str_replace(".txt", "", $lesson);
			$lessons_name = str_replace("uploads/", "", $lessons_name);
			$fileName = $lessons_name.".stat";

			// open statistic file
			$file = fopen($fileName, "c+") or die("<br>Die Datei kann nicht geöffnet werden!");

			// get content
			$string = fgets($file);
			fclose($file);	

			// was the file just created?
			if($string != "")
			{
				$line = explode(';', $string);
			}
			else
			{
				$line[0] = 0;
				$line[1] = 0;
			}

			// correct the numbers of the statistic and display


			if(strcmp($answer, $solution) == 0)
			{
				echo "<a class=\"ui-btn\" style=\"background: green; color: white;\">";
				echo $translation."<br>";
				echo $solution."<br>";
				echo "</a>";

				// correct answer counter
				$line[0] += 1;
			}
			else
			{
				echo "<a class=\"ui-btn\" style=\"background: red; color: white;\";>";
				echo $translation."<br>";

				if(strcmp($answer, "") == 0)
					echo "(keine Antwort ausgewählt!)<br>";
				else
					echo "<strike>".$answer."</strike><br>";

				echo $solution."<br>";
				echo "</a>";
			}


			// question counter
			$line[1] += 1;

			$output = $line[0].";".$line[1];

			// open statistic file	
			$file = fopen($fileName, "w") or die("<br>Die Datei kann nicht zum schreiben geöffnet werden!");

			// write content
			fwrite($file, $output);
	
			fclose($file);
		?>

		<forward>
			<form action="lessonsJQ.php" method="POST">
				<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
				<input type="submit" value="Weiter" />
			</form>
		</forward>

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


