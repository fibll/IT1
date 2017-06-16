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
			<h1>Start</h1>
		</div>
		<div data-role="main" class="ui-content">

		<!-- main content -->
		
		</div>

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


