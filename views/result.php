<?php require_once('layouts/header.php'); ?>

<section id="gallery">
    <div class="container">
        <div class="row">
            <?php foreach ($frmData as $row) { ?>

            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img src="resources/img/<?= $row['image'] ?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['title'] ?></h5>
                        <p class=" card-text"><?= $row['description'] ?></p>
                        <a href="house/details/<?= $row['id'] ?>" class="btn btn-outline-success btn-sm">Details</a>
                        <a href="house/addtofavorites/<?= $row['id'] ?>" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php require_once('layouts/footer.php'); ?>