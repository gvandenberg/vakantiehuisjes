<?php  require_once('layouts/header.php'); ?>

<form method="post" action="<?= APP_BASE_URL ?>/book/finish/<?= $id ?>">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Startdatum</label>
      <input type="date" class="form-control" id="validationDefault01" placeholder="Startdatum" name="start_date" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Einddatum</label>
      <input type="date" class="form-control" id="validationDefault01" placeholder="Einddatum" name="end_date" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault03">Aantal personen:</label>
      <input type="number" class="form-control" id="validationDefault03" placeholder="Aantal personen" name="number_persons" required>
    </div>
    

  <button class="btn btn-primary" type="submit">Boeken</button>
</form>

<?php require_once('layouts/footer.php'); ?>