<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main class='mainAccueil' id='mainAccueil'>
	<?php $topConnexion->afficherFormulaire(); ?>

		<div class="contentConnexion">
				<?php 
					$formulaireConnexion->afficherFormulaire();
				?>
			</div>
		</div>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
