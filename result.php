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
	  // read info where it is coming from
	  $from = $_POST["from"];
	  $lesson = $_POST["lesson"];
	  
	  $answer = $_POST["answer"];
	  $solution = $_POST["solution"];
	  $poss0 = $_POST["poss0"];
	  $poss1 = $_POST["poss1"];
	  $poss2 = $_POST["poss2"];

	  echo "Solution: ".$solution;
	  echo "poss0: ".$poss0;
	  echo "poss1: ".$poss1;
	  echo "poss2: ".$poss2;
	  echo "Answer: ".$answer;
    ?>
    <h1>Results</h1>  

  
    <footer>
        <forward>
            <form action="lessons.php" method="POST">
		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
                <input type="submit" value="forward" />
            </form>
        </forward>
        <statistic>
            <form action="statistic.php" method="POST">
		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
                <input type="submit" value="statistic" />
            </form>
        </statistic>
	</footer>
  </body>
</html>

