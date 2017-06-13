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

