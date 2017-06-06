<!DOCTYPE html>
<html>
<head>
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
        <form action="lessons.php" method="POST">
		<label>Player: </label>
            	<input name="player" type="text" size="25" />
		<input name="mySubmit" type="submit" value="Submit!" />
        </form>
	<footer>
        <forward>
            <form action="lessons.php">
                <input type="submit" value="lessons" />
            </form>
        </forward>
        <statistic>
            <form action="statistic.php">
                <input type="submit" value="statistic" />
            </form>
        </statistic>
        <setup>
            <form action="setup.php">
                <input type="submit" value="setup" />
            </form>
        </setup>
	</footer>
  </body>
</html>

