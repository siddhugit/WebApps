<?php
		$handle = fopen("wordlist.txt", "r");
		$words = array();
		if ($handle) {
			while (($line = fgets($handle)) !== false) {
				// process the line read.
				$line=trim($line);
				array_push($words, $line);
			}
		} else {
			// error opening the file.
		} 
		fclose($handle);
		$numWords = 4;
		if(isset($_POST['NumberOfWords'])){
			$numWords = $_POST["NumberOfWords"];
		}
		$result = '';
		if($numWords > 0){
			$wordListSize = count($words);
			$randInt = rand(0,$wordListSize - 1);
			$result = $words[$randInt];
			for($j = 1;$j < $numWords;$j++){
				$result .= '-';
				$randInt = rand(0,$wordListSize - 1);
				$result .=  $words[$randInt];
			}
			if(isset($_POST["add_number"])){
				$result .=  '1';
			}
			if(isset($_POST["add_symbol"])){
				$result .=  '@';
			}
			if(isset($_POST["add_caps"])){
				$result = ucfirst($result); 
			}
		}
?>