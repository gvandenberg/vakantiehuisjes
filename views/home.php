<?php require_once('layouts/header.php'); ?>
<link rel="stylesheet" href="<?=APP_BASE_URL ?>/resources/css/home.css">
<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Maak je reservering</h1>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi facere, soluta magnam consectetur molestias itaque
								ad sint fugit architecto incidunt iste culpa perspiciatis possimus voluptates aliquid consequuntur cumque quasi.
								Perspiciatis.
							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form method="post" action="<?= APP_BASE_URL ?>/results">
								<div class="form-group">
									<span class="form-label">Land</span>
									<input class="form-control" type="text" placeholder="Land" name="country" required>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Aankomstdatum</span>
											<input class="form-control" type="date" name="start_date" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Vertrekdatum</span>
											<input class="form-control" type="date" name="end_date" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Aantal personen</span>
											<select class="form-control" name="number_persons" required>
												<option>1</option>
												<option>2</option>
												<option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="form-btn">
									<button class="submit-btn">Check beschikbaarheid</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php require_once('layouts/footer.php'); ?>