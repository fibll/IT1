<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8"/>

		<!-- jQuery stuff -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	</head>

	<body>
		<?php
			$lesson = $_POST["lesson"];

			// read from all .stat files ==================================================================================

			// get .stat fileName
			$lessons_name = str_replace(".txt", "", $lesson);
			$lessons_name = str_replace("uploads/", "", $lessons_name);
			$fileName = $lessons_name.".stat";
			
			// open file
			$file = fopen($fileName, "c+") or die("<br>Die Datei kann nicht geöffnet werden!");

			// get content
			$string = fgets($file);
			if($string == "")
			{
				// write content
				fwrite($file, "0;0");

				// print content
				echo $lessons_name.": richtig: 0, falsch: 0";
			}
			else
			{
				// seperate string
				$line = explode(';', $string);
			}

			fclose($file);
		?>

		<div data-role="page">
		<div data-role="header">
			<h1>Statistik</h1>
		</div>
		<div data-role="main" class="ui-content">

		<!-- main content -->
		<div data-role="controlgroup" data-type="vertical">
		
		<?php
				// print content
				echo "<a class=\"ui-btn\">";
				echo $lessons_name."Richtig: ".$line[0]." / ".$line[1];
				echo "</a>";
		?>

		</div>

		
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


