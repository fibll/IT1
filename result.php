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

	  $info = array(2);


	// get .stat fileName
	$lessons_name = str_replace(".txt", "", $lesson);
	$lessons_name = str_replace("uploads/", "", $lessons_name);
	$fileName = $lessons_name.".stat";

	// open statistic file
	$file = fopen($fileName, "c+") or die("<br>Die Datei kann nicht geöffnet werden!");

	// get content
	$string = fgets($file);
	fclose($file);

	echo "string: ".$string."<br>";		

	if($string != "")
	{
	  echo "read<br>";
	  $line = explode(';', $string);
	}
	else
	{
	  echo "create<br>";
	  $line[0] = 0;
	  $line[1] = 0;
	}

	// correct the numbers of the statistic
	if(strcmp($answer, $solution) == 0)
	{
	  echo "Anwort richtig!<br>";
	  $line[0] += 1;
	}
	else
	{
	  echo "Anwort falsch!<br>";
	  $line[1] += 1;
	}

	$output = $line[0].";".$line[1];

	echo "output: ".$line[0].";".$line[1]."\n";


	// open statistic file	
	$file = fopen($fileName, "w") or die("<br>Die Datei kann nicht zum schreiben geöffnet werden!");

	// write content
	fwrite($file, $output);

	fclose($file);
	

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

