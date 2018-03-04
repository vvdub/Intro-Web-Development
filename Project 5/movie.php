<!-- Dusten Peterson | Web Development 3610 | PHP Practice -->

<?php
	#Variables
	$movie = $_GET["film"];
	$info = file("moviefiles/" . $movie . "/info.txt");
	$explode_info = explode("\n", implode($info));
	$overview = file("moviefiles/" . $movie . "/overview.txt");
	$explode_overview = explode("\n", implode($overview));
	$fresh = "";
	$fresh_alt = "";
	$fresh_small = "";
	$fresh_small_alt = "";



	#set the value for $fresh
	if(intval($explode_info[2]) >= 60){
		$fresh = "freshbig.png";
		$fresh_alt = "Fresh";
	}
	else{
		$fresh = "rottenbig.png";
		$fresh_alt = "Rotten";
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Rancid Tomatoes</title>
		<meta charset="utf-8" />
		<link href="movie.css" type="text/css" rel="stylesheet" />
		<link href="rotten.gif" type="image/gif" rel="shortcut icon" />
	</head>

	<body>
		<div id="topbanner">
			<img src="banner.png" alt="Rancid Tomatoes" />
		</div>

		<h1>
			<?= "$explode_info[0] ($explode_info[1])" ?>
		</h1>

		<div id="overall">
			<div id="generaloverview">
				<img src="<?= "moviefiles/" . $movie . "/overview.png" ?>" alt="general overview" />

				<dl>
					<?php foreach($explode_overview as $row){
						$row = explode(":", $row);
						echo "<dt>$row[0]</dt><dd>$row[1]</dd>";
					}
					?>
				</dl>
			</div>

			<div id="reviews">
				<div id="rottenpane">
					<img class="icon" src="<?= $fresh ?>" alt="<?= $fresh_alt ?>" />
					<span class="rating"><?= "$explode_info[2]%" ?></span>
				</div>


				<div class="column">
					<?php
						$files = glob("moviefiles/" . $movie . "/review*.txt");
						$files_slice = array_slice($files, 0, ceil(count($files)/2));
						foreach($files_slice as $filename){
						$reviews = file($filename);
						$review = $reviews[0];
						$fresh_img = trim($reviews[1]);
						$critic = $reviews[2];
						$publication = $reviews[3];
						if($fresh_img == "FRESH"){
							$fresh_small = "fresh.gif";
							$fresh_small_alt = "fresh";
						}
						else {
							$fresh_small = "rotten.gif";
							$fresh_small_alt = "rotten";
						}

					?>
					<div class="review">
						<p class="quotebubble">
							<img class="icon" src="<?= $fresh_small ?>" alt="<?= $fresh_small_alt ?>" />
							<q><?= $review ?></q>
						</p>


						<p>
							<img class="icon" src="critic.gif" alt="Critic" />
							<?= $critic ?> <br />
							<span class="publication"><?= $publication ?></span>
						</p>
					</div>
						<?php }?>
				</div>

				<div class="column">
					<?php
						$files = glob("moviefiles/" . $movie . "/review*.txt");
						$files_slice2 = array_slice($files, ceil(count($files)/2));
						foreach($files_slice2 as $filename){
						$reviews = file($filename);
						$review = $reviews[0];
						$fresh_img = trim($reviews[1]);
						$critic = $reviews[2];
						$publication = $reviews[3];
						if($fresh_img == "FRESH"){
							$fresh_small = "fresh.gif";
							$fresh_small_alt = "fresh";
						}
						else {
							$fresh_small = "rotten.gif";
							$fresh_small_alt = "rotten";
						}

					?>
					<div class="review">
						<p class="quotebubble">
							<img class="icon" src="<?= $fresh_small ?>" alt="<?= $fresh_small_alt ?>" />
							<q><?= $review ?></q>
						</p>


						<p>
							<img class="icon" src="critic.gif" alt="Critic" />
							<?= $critic ?> <br />
							<span class="publication"><?= $publication ?></span>
						</p>
					</div>
						<?php }?>
				</div>
			</div>

			<p id="footer">(1- <?= sizeof($files);?>) of <?= sizeof($files); ?></p>
		</div>

		<div id="w3c">
			<a href="https://webster.cs.washington.edu/validate-html.php"><img src="http://webster.cs.washington.edu/w3c-html.png" alt="Valid HTML5" /></a> <br />
			<a href="https://webster.cs.washington.edu/validate-css.php"><img src="http://webster.cs.washington.edu/w3c-css.png" alt="Valid CSS" /></a>
		</div>
	</body>
</html>
