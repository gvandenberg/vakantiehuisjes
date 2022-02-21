<?php require_once('layouts/header.php'); ?>


<div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Registreren</div>
                        <div class="card-body">
                            <form name="my-form" action="<?= APP_BASE_URL ?>/register/check" method="post">
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Voornaam</label>
                                    <div class="col-md-6">
                                        <input type="text" id="full_name" class="form-control" name="first_name" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Achternaam</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="last_name" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Email</label>
                                    <div class="col-md-6">
                                        <input type="email" id="user_name" class="form-control" name="email" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Wachtwoord</label>
                                    <div class="col-md-6">
                                        <input type="password" id="phone_number" class="form-control" name="password" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Wachtwoord herhalen</label>
                                    <div class="col-md-6">
                                        <input type="password" id="present_address" class="form-control" name="password_repeat" required>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                    Registreren
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