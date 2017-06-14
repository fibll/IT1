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

		<div data-role="page">
		<div data-role="header">
			<h1>Setup</h1>
		</div>
		<div data-role="main" class="ui-content">

		<!-- main content -->
		<?php
			// read info where it is coming from
			$from = $_POST["from"];
		
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]	["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			if(strcmp($from, "setup") == 0)
			{
				// Check if file already exists
				if (file_exists($target_file)) {
					echo "<br>Die Datei existiert bereits.";
					$uploadOk = 0;
				}

				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo "<br>Datei ist zu groß.";
					$uploadOk = 0;
				}
		
				// Allow certain file formats
				if($imageFileType != "txt") {
					echo "<br>Die Dateiendung muss txt sein.";
					$uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "<br>Datei wurde nicht hochgeladen.";

				// if everything is ok, try to upload file
				} 
				else 
				{
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
					{
						echo "<br>Die Datei ". basename( $_FILES["fileToUpload"]["name"]). " wurde hochgeladen.";

						// write the new path in the lessons.info
						$file = fopen("lessons.data", "a") or die("<br>Die Lessons-Datei kann nicht geöffnet werden!");		
						fwrite($file, $target_file."\n");
						fclose($file);

						// write into statistic file
						$file = fopen("statistic.data", "a") or die("<br>Die Statistik-Datei kann nicht geöffnet werden!");
						fwrite($file, $target_file.";0;0\n");
						fclose($file);
					} 
					else 
					{
						echo "<br>Es gab einen Fehler beim speichern der hochgeladenen Datei.";
					}
				}
			}
		?>		


		<!-- Upload visual elements --><br><br>
		<form action="setupJQ.php" method="post" enctype="multipart/form-data">
			Datei zum Hochladen wählen:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="hidden" name="from" value="setup">
			<input type="submit" value="Datei hochladen" name="submit">
		</form>

		</div>

			<!-- footer -->
			<div data-role="footer"><div data-role="navbar"><ul><li>

				<start>
					<form action="startJQ.php" method="POST">
						<input type="submit" value="Auswahl" />
					</form>
				</start>

			</li><li>

				<statistic>
					<form action="statisticJQ.php">
						<input type="submit" value="Statistik" />
					</form>
				</statistic>

			</li></ul></div></div>


		</div> 
	</body>
</html>

​


