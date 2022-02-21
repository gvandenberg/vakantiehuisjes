<?php require_once('layouts/header.php'); ?>
<link rel="stylesheet" href="<?= APP_BASE_URL?>/resources/css/account.css">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?= $frmData['first_name'] ?></span><span class="text-black-50"><?= $frmData['email'] ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Account Instellingen</h4>
                </div>
                <form action="<?= APP_BASE_URL ?>/account/save" method="post">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Voornaam</label><input type="text" name="first_name" class="form-control" placeholder="Voornaam" value="<?= $frmData['first_name'] ?? '' ?>"></div>
                    <div class="col-md-6"><label class="labels">Achternaam</label><input type="text" name="last_name" class="form-control" value="<?= $frmData['last_name'] ?? '' ?>" placeholder="Achternaam"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Telefoonnummer</label><input type="text" name="phone_number" class="form-control" placeholder="Vul telefoonnummer in" value="<?= $frmData['phone_number'] ?? ''?>"></div>
                    <div class="col-md-12"><label class="labels">Adres</label><input type="text" name="address" class="form-control" placeholder="Vul adres in" value="<?= $frmData['address'] ?? ''?>"></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" name="postalcode" class="form-control" placeholder="Vul postcode in" value="<?= $frmData['postalcode'] ?? ''?>"></div>
                    <div class="col-md-12"><label class="labels">Plaats</label><input type="text" name="city" class="form-control" placeholder="Vul plaats in" value="<?= $frmData['city'] ?? ''?>"></div>
                    <div class="col-md-12"><label class="labels">Land</label><input type="text" name="country" class="form-control" placeholder="Vul land in" value="<?= $frmData['country'] ?? ''?>"></div>
                    <div class="col-md-12"><label class="labels">Geboortedatum</label><input type="date" name="birthday" class="form-control" placeholder="Vul geboortedatum in" value="<?= $frmData['birthday'] ?? ''?>"></div>

                </div>

                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php require_once('layouts/footer.php'); ?>