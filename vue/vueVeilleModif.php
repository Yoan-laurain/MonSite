<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main class='mainAccueil' id='mainAccueil'>
	<?php $topVeilleModif->afficherFormulaire(); ?>

		<div class="ContentBoutons2">
			<?php 
				$Boutons->afficherFormulaire();
			?>
		</div>
		<?php
		if(isset($VeilleModif))
		{
		?>
			<div class="contentVeilleModif">
					<?php 
						$VeilleModif->afficherFormulaire();
					?>
			</div>
		<?php 		
		}
		?>
		<?php
		if(isset($VeilleModif2))
		{
		?>	
			<div class="contentVeilleModif2">
				<?php 
					$VeilleModif2->afficherFormulaire();	
				?>
			</div>
		<?php
		}


		$fPage->afficherFormulaire();	

		?>			
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
