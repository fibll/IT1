<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8"/>

		<!-- jQuery stuff -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<link rel="stylesheet" href="../stylesheet.css">
		<script src="../jquery1.js"></script>
		<script src="../jquery2.js"></script>
	</head>

	<body>	

		<div data-role="page">
		<div data-role="header">
			<h1>Start</h1>
		</div>
		<div data-role="main" class="ui-content">

		<!-- main content -->

		<?php
			$gender = $_POST["gender"];
			echo $gender."<br>";
		?>

		<form method="post" action="JQ.php">
			<fieldset data-role="controlgroup">
				<legend>Question bla bla?</legend>
					<label for="male">Male</label>
					<input type="radio" name="gender" id="male" value="male">
					<label for="female">Female</label>
					<input type="radio" name="gender" id="female" value="female">
			</fieldset>
			<input type="submit" data-inline="true" value="Submit">
		</form>


			<!-- footer -->
			<div data-role="footer"><div data-role="navbar"><ul><li>

				<statistic>
					<form action="statistic.php">
						<input type="submit" value="Statistik" />
					</form>
				</statistic>

			</li><li>

				<setup>
					<form action="setup.php">
						<input type="hidden" name="from" value="start">
						<input type="submit" value="Setup" />
					</form>
				</setup>

			</li></ul></div></div>


		</div> 
	</body>
</html>

​


