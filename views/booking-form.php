<?php  require_once('layouts/header.php'); ?>

<form method="post" action="<?= APP_BASE_URL ?>/book/date/<?= $id ?>">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Voornaam</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Voornaam" name="first_name" value="<?= $frmData['first_name'] ?? '' ?>"required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Achternaam</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Achternaam" name="last_name" value="<?= $frmData['last_name'] ?? '' ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Email</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Email" name="email" value="<?= $frmData['email'] ?? '' ?>" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault03">Geboortedatum</label>
      <input type="date" class="form-control" id="validationDefault03" placeholder="Geboortedatum" name="birthday" value="<?= $frmData['birthday'] ?? '' ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Telefoonnummer</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Telefoonnummer" name="phone_number" value="<?= $frmData['phone_number'] ?? '' ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Adres</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Adres" name="address" value="<?= $frmData['address'] ?? '' ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Postcode</label>
      <input type="text" class="form-control" id="validationDefault04" placeholder="Postcode" name="postalcode" value="<?= $frmData['postalcode'] ?? '' ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Plaats</label>
      <input type="text" class="form-control" id="validationDefault04" placeholder="Plaats" name="city" value="<?= $frmData['city'] ?? '' ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault05">Land</label>
      <input type="text" class="form-control" id="validationDefault05" placeholder="Land" name="country" value="<?= $frmData['country'] ?? '' ?>" required>
    </div>
  </div>

  <button class="btn btn-primary" type="submit">Volgende</button>
</form>

<?php require_once('layouts/footer.php'); ?>