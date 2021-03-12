<div class="container-fluid">
	<?php
	// var_dump($_SESSION);
	?>
	<!-- Jumbotron -->
	<div class="container my-5">
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron jumbotron-fluid" id="backColorJumbotronPres">
					<div class="container">
						<h1 class="display-4 mb-3">Présentation de notre agence</h1>
						<p class="lead text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos error aspernatur explicabo nostrum? Ut, ullam! Assumenda ex voluptates error est? Eaque hic, beatae quae facilis esse mollitia eos temporibus debitis!</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Section Cards -->
	<div class="container">
		<div class="row">
			<?php
			foreach ($random as $card) {
			?>
				<div class="col-md-4 mb-5">
					<div class="card shadow-lg">
						<img src="<?= base_url(); ?>assets/images/<?= $card['Image']; ?>" alt="<?= $card['Mark'] . ' ' . $card['Model']; ?>" class="img-thumbnail">
						<div class="card-body">
							<!-- Marque et modèle du véhicule -->
							<h2 class="card-text"><?= $card['Mark']; ?> <?= $card['Model']; ?></h2>
							<p class="card-text"><?= $card['Description']; ?></p>
							<a href="<?= base_url(); ?>index.php/Vehicle_controller/viewVehicle/<?= $card['idVehicle']; ?>" class="btn btn-primary">Voir détails</a>
						</div>
					</div>
				</div>
			<?php
			}
			?>
			<!-- <div class="col-md-4 mb-5">
				<div class="card shadow-lg">
					<img src="<?= base_url(); ?>assets/images/car-2580234_640.jpg" class="card-img-top" alt="image coccinelle">
					<div class="card-body">
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto minus ipsum molestias vel?</p>
						<a href="#" class="btn btn-primary">Voir détails</a>
					</div>
				</div>
			</div>

			<div class="col-md-4 mb-5">
				<div class="card shadow-lg">
					<img src="<?= base_url(); ?>assets/images/car-2506090_640.jpg" class="card-img-top" alt="image mustang gt">
					<div class="card-body">
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto minus ipsum molestias vel?</p>
						<a href="#" class="btn btn-primary">Voir détails</a>
					</div>
				</div>
			</div>

			<div class="col-md-4 mb-5">
				<div class="card shadow-lg">
					<img src="<?= base_url(); ?>assets/images/car-2664447_640.jpg" class="card-img-top" alt="image plymouth">
					<div class="card-body">
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto minus ipsum molestias vel?</p>
						<a href="#" class="btn btn-primary">Voir détails</a>
					</div>
				</div>
			</div> -->

		</div>
	</div>

	<div class="row justify-content-center mb-4">
		<div class="col-md-4 text-center">
			<a class="btn btn-primary" href="index.php/Vehicle_controller/listVehicles">Voir notre catalogue</a>
		</div>
	</div>

</div>