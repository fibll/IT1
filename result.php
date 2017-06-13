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
	  // read info where it is coming from
	  $from = $_POST["from"];
	  $lesson = $_POST["lesson"];

	  $answer = $_POST["answer"];
	  $solution = $_POST["solution"];
	  $poss0 = $_POST["poss0"];
	  $poss1 = $_POST["poss1"];
	  $poss2 = $_POST["poss2"];
	  $poss3 = $_POST["poss3"];
	  $poss4 = $_POST["poss4"];
	  $poss5 = $_POST["poss5"];


	  echo "Lesson: ___".$lesson."___<br><br>";
	  echo "Solution: ".$solution;
	  echo "<br>poss0: ".$poss0;
	  echo "<br>poss1: ".$poss1;
	  echo "<br>poss2: ".$poss2;
	  echo "<br>poss2: ".$poss3;
	  echo "<br>poss2: ".$poss4;
	  echo "<br>poss2: ".$poss5;
	  echo "<br>Answer: ".$answer;
    ?>
    <h1>Results</h1>


        <forward>
            <form action="lessons.php" method="POST">
		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
                <input type="submit" value="Weiter" />
            </form>
        </forward>


    <footer>
        <start>
            <form action="start.php" method="POST">
		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
                <input type="submit" value="Auswahl" />
            </form>
        </start>
        <statistic>
            <form action="statistic.php" method="POST">
		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
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

