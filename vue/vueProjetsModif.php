<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main class='mainAccueil' id='mainAccueil'>
	<?php $topProjetModif->afficherFormulaire(); ?>
		<div class="ContentBoutons2">
			<?php 
				$Boutons->afficherFormulaire();
			?>
		</div>
		<?php
		if(isset($ProjetModif))
		{
		?>
			<div class="contentProjetModif">
					<?php 
						$ProjetModif->afficherFormulaire();
					?>
			</div>
		<?php 		
		}
		?>
		<?php
		if(isset($projet))
		{
		?>
			<main class='mainAccueil' id='mainAccueil'>
				<?php $projet->afficherFormulaire(); ?>
			</main>
		<?php 		
		}
		?>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
