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
	<?php
		$lesson = $_POST["lesson"];
	?>

    <h1>Statistic</h1>    
    <footer>
	<start>
            <form action="start.php" method="POST">
		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
                <input type="submit" value="start" />
            </form>
	</start>
        <forward>
            <form action="lessons.php" method="POST">
		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
                <input type="submit" value="lessons" />
            </form>
        </forward>
        <statistic>
        </statistic>
	</footer>
  </body>
</html>

