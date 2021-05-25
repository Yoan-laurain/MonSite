<?php
require_once 'lib/autoLoader.php';
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Veroz</title>
		<link rel="icon" href="images/favicon.ico"/>
		<style type="text/css">
			@import url(styles/veroz.css);
		</style>
		
		<script>
			var bleep = new Audio();
			bleep.src = 'sons/rhinoshield-joyca-youtunes.mp3';
			bleep.volume = 0.3;
		</script>

	</head>
	<body >
		<?php
			require_once 'controleur/controleurPrincipal.php';	
		?>
	</body>
</html>
