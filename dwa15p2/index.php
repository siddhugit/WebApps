<!DOCTYPE html>
<html>
<head>

	<title>xkcd Password Generator</title>
	<meta charset='utf-8'>	
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link href='/style.css' rel="stylesheet">
	
	<?php require 'password_generator.php'?>
	
</head>
<body>


	<div class='main'>
		<h1>xkcd Password Generator</h1>
	
		<p class='password'>
			<?php echo $result; ?>		
		</p>
		
		<form action='index.php' method='post'>
			<p class='options'>
			
				<label for='number_of_words'># of Words</label>
				<select name="NumberOfWords">
					<?php for($i = 1;$i < 10;$i++){ ?>
						<?php if($i == $numWords){ ?>
							<option selected='selected' value="<?php echo $i?>"><?php echo $i?></option>
						<?php }else{ ?>
							<option value="<?php echo $i?>"><?php echo $i?></option>
						<?php } ?>	
					<?php } ?>
				</select>
				<br>
				<input type='checkbox' name='add_number' id='add_number' > 
				<label for='add_number'>Add a number</label>
				<br>
				<input type='checkbox' name='add_symbol' id='add_symbol' > 
				<label for='add_symbol'>Add a symbol</label>
				<br>
				<input type='checkbox' name='add_caps' id='add_caps' > 
				<label for='add_caps'>First letter in upper case</label>
			</p>
		
			<input type='submit' class='submitBtn' id='submitBtn' value='Gimme Another'>
					
		</form>
		
		<p class='details'>
			<a href='http://xkcd.com/936/'>xkcd password strength</a><br>
		
			<a href='http://xkcd.com/936/'>
				<img class='comic' src='/password_strength.png' alt='xkcd style passwords'>
			</a>
			<br>
		</p>
			
	</div>
	
</body>
</html>