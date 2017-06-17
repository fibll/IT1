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
			<h1>Auswahl</h1>
		</div>
		<div data-role="main" class="ui-content">
		<div data-role="controlgroup" data-type="vertical">

		<?php
			// read info where it is coming from
			$from = $_POST["from"];
	
			// get in uploaded lessons
			$file = fopen("lessons.data", "c+");
			$string = fgets($file);
			
			if($string == "")
			{
				echo "<a class=\"ui-btn\">Keine Lektionen vorhanden</a>";
			}
			else
			{
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
						<form action=\"lessonsJQ.php?lesson=uploads/english.txt\" method=\"POST\">
							<input type=\"hidden\" name=\"lesson\" value=\"".$lessons[$i]."\">
							<input type=\"submit\" value=\"Lektion: ".$lessons_name[$i]."\">
						</form>";
				}
			}
		?>

		</div>
		</div>

			<!-- footer -->
			<div data-role="footer"><div data-role="navbar"><ul><li>

				<!-- Option 1 -->
				<statistic>
					<form action="statisticJQ.php">
						<input type="submit" value="Statistik" />
					</form>
				</statistic>

			</li><li>

				<!-- Option 2 -->
				<setup>
					<form action="setupJQ.php" method="GET">
						<input type="hidden" name="a" value="Hallo">
						<input type="hidden" name="b" value="Welt">
						<input type="submit" value="Setup" />
					</form>
				</setup>

			</li></ul></div></div>

		</div> 
	</body>
</html>

​


