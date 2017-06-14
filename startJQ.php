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
		
		<style>
			asdf {
				//position: fixed;
				//bottom: 0;
			}
		</style>

	</head>

	<body>
		<div data-role="page">
		<div data-role="header">
			<h1>Auswahl</h1>
		</div>
		<div data-role="main" class="ui-content">
		
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
		?>		


			<div data-role="controlgroup" data-type="vertical">

		<?php
				for($i = 0; $i < sizeof($lessons); $i++)
				{
					echo "
						<form action=\"lessonsJQ.php\" method=\"POST\">
							<input type=\"hidden\" name=\"lesson\" value=\"".$lessons[$i]."\">
							<input type=\"submit\" value=\"".$lessons_name[$i]."\" />
						</form>";
				}
			?>


			</div>
		</div>

			<!-- footer -->
			<asdf><div data-role="footer"><div data-role="navbar"><ul><li>

				<!-- Option 1 -->
				<statistic>
					<form action="statisticJQ.php">
						<input type="submit" value="Statistik" />
					</form>
				</statistic>

			</li><li>

				<!-- Option 2 -->
				<setup>
					<form action="setupJQ.php">
						<input type="hidden" name="from" value="start">
						<input type="submit" value="Setup" />
					</form>
				</setup>

			</li></ul></div></div></asdf>

		</div> 
	</body>
</html>

​


