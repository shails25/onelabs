<?php
 require_once('main.php');	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>OneLabs Assignment</title>
		<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Limelight&display=swap" rel="stylesheet"> 
		<link href="style.css" rel="stylesheet"> 
		
	</head>
	<body>
		<main>
			<nav class="container nav">
				<div class="logo">OneLabs Assignment</div>
			</nav>
			<section class="main-section">
				<div class="container columns">
					<div class="input-form">
						<form id="php-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<input type="text" placeholder="Enter Image API Url" name="image-url">
							<input type="submit" value="Fetch Images" name="image-api">
						</form>
					</div>
					<div class="image-preview">
						<?php 
							if(!empty($error)){
								echo "<div class='error'>". $error[0]. "</div>";
							}else{
								foreach($images as $image){
									echo "<div class='result-img'><img src='data:image/png;base64,".$image."'></div>";
								}
							}
						?>
					</div>
				</div>
			</section>
		</main>
	</body>
</html>