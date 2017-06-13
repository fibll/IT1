<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	</head>

	<body>
	<div data-role="page">
		<div data-role="header">
			<h1>Welcome To My Homepage</h1>
		</div>
		<div data-role="main" class="ui-content">
			<p>I Am Now A Mobile Developer!!</p>
		</div>

			<!-- footer -->
			<div data-role="footer">
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
			</div>
		</div> 
	</body>
</html>

​


