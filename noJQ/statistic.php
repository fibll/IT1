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
			
				// print content
				echo $lessons_name.": richtig: ".$line[0].", falsch: ".$line[1];
			}

			fclose($file);
		?>

		<h1>Statistik</h1>    
		
		<footer>
			<start>
				<form action="start.php" method="POST">
					<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
					<input type="submit" value="Auswahl" />
				</form>
			</start>
			<setup>
				<form action="setup.php">
					<input type="hidden" name="from" value="start">
					<input type="submit" value="Setup" />
				</form>
			</setup>
		</footer>
	</body>
</html>

