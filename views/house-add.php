<?php require_once('layouts/header.php');
if (isset($message)) {
print '<p style="color:red;"><b>'.$message.'</b></p>';
}
 ?>

<form class="col-lg-6 offset-lg-3" action="<?= APP_BASE_URL ?>/house/add/save" method="post"
    enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-control" name="type">
                <option>chalet</option>
                <option>bungalow</option>
                <option>villa</option>
                <option>apartment</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="capacity" class="form-label">Aantal personen</label>
            <input type="text" class="form-control" id="capacity" name="capacity">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prijs</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Land</label>
            <input type="text" class="form-control" id="country" name="country">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Stad</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Titel</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Beschrijving</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="mb-3">
            <input name="houseimg" id="productimg" onchange="displayImage(this)" class="form-control" type="file"
                accept="image/x-png,image/jpeg" style="display: none;">
            <img src="http://placehold.it/500x300" onclick="imgClick()" alt="placeholder" id="productDisplay"><br>
        </div>
        <button type="submit" class="btn btn-primary">Toevoegen</button>
    </div>
</form>
<?php require_once('layouts/footer.php'); ?>