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
		$answers = array
			( 
			array("Hund", "dog"),
			array("Katze", "cat"), 
			array("Hase", "rabbit"), 
			array("Kuh", "cow"), 
			array("Tiger", "tiger"), 
			array("Bär", "bear"), 
			array("Elefant", "elefant"), 
			array("Ente", "duck"), 
			array("Hirsch", "deer"), 
			array("Adler", "eagle"), 
			array("Vogel", "bird")
			);


		//$answers = array("dog", "cat", "rabbit", "cow", "tiger", "bear", "elefant", "duck", "deer", "eagle", "bird");

		// define random variables
		$random = array(-1, -1, -1);
		$rand_word = rand(0, sizeof($answers)-1 );

		// print POST'ed data
		$player = $_POST["player"];
		echo $player;
	?>


    	<h1>Lessons</h1>
	<question>
		<p>Was heißt <?php echo $answers[$rand_word][0]; ?> auf Englisch?</p>
	</question>
	<form action="result.php" method="POST">


	  <?php
		// get random value (no equal) into random variables
		// bring in the correct answer
		$random[rand(0,2)] = $rand_word;

		
		// fill the other with other answers
		for($i = 0; $i < 3; $i++)
		{
			while($random[$i] == -1)
			{
				$random[$i] = rand(0,sizeof($answers) - 1);

				for($j = 0; $j < 3; $j++)
				{
					if($random[$i] == $random[$j] && $i != $j)
					{
						$random[$i] = -1;
					}
				}
			}
			
			// create radio options
	 		echo "<input type=\"radio\" name=\"answer\" value=\""
			.$answers[$random[$i]][1]."\"> ".$answers[$random[$i]][1]."<br>";
		}
	  ?>	


	  <input name="mySubmit" type="submit" value="next" />
	</form>
    
    <footer>
        <forward>
            <form action="result.php">
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

