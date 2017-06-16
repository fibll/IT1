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
		<h1>Start</h1>


		<?php
			// read info where it is coming from
			$from = $_POST["from"];
	
			// get in uploaded lessons
			$file = fopen("lessons.data", "r");	
			$string = fgets($file);
			
			for($i = 0; !feof($file); $i++)
			{
				// read in the ; seperated words			
				$lessons[$i] = $string;
				$lessons[$i] = str_replace("\n", "", $lessons[$i]);
	
				// get printing name
				$lessons_name[$i] = str_replace(".txt", "", $lessons[$i]);
				$lessons_name[$i] = str_replace("uploads/", "", $lessons_name[$i]);
	
				// get the next line
				$string = fgets($file);
			}
		
			for($i = 0; $i < sizeof($lessons); $i++)
			{
				echo "
					<form action=\"lessons.php\" method=\"POST\">
						<input type=\"hidden\" name=\"lesson\" value=\"".$lessons[$i]."\">
						<input type=\"submit\" value=\"".$lessons_name[$i]."\" />
					</form>";
			}
		?>
	
		<footer>
			<statistic>
				<form action="statistic.php">
					<input type="submit" value="Statistik" />
				</form>
			</statistic>
			<setup>
				<form action="setup.php">
					<input type="hidden" name="from" value="start">
					<input type="submit" value="Setup" />
				</form>
			</setup>
		</footer>
	</body>
</html>

