<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>

	<main class='mainAccueil' id='mainAccueil'>
	<?php $topParcoursModif->afficherFormulaire(); ?>

		<div class="ContentBoutons">
			<?php 
				$Boutons->afficherFormulaire();
			?>
		</div>
		<?php
		if(isset($ParcoursModif))
		{
		?>
			<div class="contentParcoursModif">
					<?php 
						$ParcoursModif->afficherFormulaire();
					?>
			</div>
		<?php 		
		}
		?>	
		<?php
		if(isset($Parcours))
		{
		?>	
			<main class='mainAccueil' id='mainAccueil'>
				<?php $Parcours->afficherFormulaire(); ?>
			</main>
		<?php
		}
		?>
		<?php 
		if(isset($Cursus))
		{
		?>
			<div class="contentParcoursModif">
					<?php 
						$Cursus->afficherFormulaire();
					?>
			</div>
		<?php 		
		}
		?>				
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
