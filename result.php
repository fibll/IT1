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
    <h1>Results</h1>  
    <?php
	$answer = $_POST["answer"];
	echo $answer;
    ?>
  
    <footer>
        <forward>
            <form action="lessons.php">
                <input type="submit" value="forward" />
            </form>
        </forward>
        <statistic>
            <form action="statistic.php">
                <input type="submit" value="statistic" />
            </form>
        </statistic>
	</footer>
  </body>
</html>

