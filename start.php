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
	?>

    <h1>Start</h1>
	<!--        
	Informationen die immer gegeben sein sollten:
	- welche lesson ist aktuell -> nur auf den Lesson seiten? weg von start->staticstic->lesson??
	- gleiche session? -> sessionID
	- welche Seite kam vorher?
	
	<form action="lessons.php" method="POST">
		<label>Player: </label>
            	<input name="player" type="text" size="25" />
		<input name="mySubmit" type="submit" value="Submit!" />
        </form>
	-->

    <?php

	// get in uploaded lessons
	$file = fopen("lessons.info", "r");	
	$string = fgets($file);
		
	for($i = 0; !feof($file); $i++)
	{
		// read in the ; seperated words			
		$lessons[$i] = $string;
		$lessons[$i] = str_replace("\n", "", $lessons[$i]);

		// get the next line
		$string = fgets($file);
	}
	
	for($i = 0; $i < sizeof($lessons); $i++)
	{
		echo "
		    <form action=\"lessons.php\" method=\"POST\">
		    <input type=\"hidden\" name=\"lesson\" value=\"".$lessons[$i]."\">
        	    <input type=\"submit\" value=\"".$lessons[$i]."\" />
       		    </form>";
	}	
    ?>

    <footer>
        <setup>
            <form action="setup.php" method="POST">
		<input type="hidden" name="from" value="start">
		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
                <input type="submit" value="setup" />
            </form>
        </setup>
        <statistic>
            <form action="statistic.php" method="POST">
		<input type="hidden" name="lesson" value="<?php echo $lesson;?>" />
		<input type="submit" value="statistic" />
            </form>
        </statistic>
    </footer>
  </body>
</html>

