<?php 
require_once('layouts/header.php');
if (!empty($falseloginalert)){
    echo '<script language="javascript">';
	echo 'alert("Je hebt te vaak geprobeerd in te loggen! Wacht nog '.$min.' minuten")';
	echo '</script>';
}
if (!empty($message)) {
		print '<p style="color:red;">'.$message.'</p>';	
	}
?>

<div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Inloggen</div>
                        <div class="card-body">
                            <form name="my-form" action="<?= APP_BASE_URL ?>/login/check" method="post">
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Email</label>
                                    <div class="col-md-6">
                                        <input type="email" id="full_name" class="form-control" name="email" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Wachtwoord</label>
                                    <div class="col-md-6">
                                        <input type="password" id="email_address" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                    Inloggen
                                    </button>
                                </div>
                                
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>


<?php require_once('layouts/footer.php'); ?>