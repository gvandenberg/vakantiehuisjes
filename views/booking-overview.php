<?php require_once('layouts/header.php'); ?>

<section id="gallery">
    <div class="container">
        <div class="row">
            <?php foreach ($frmData as $row) { ?>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img src="<?= APP_BASE_URL ?>/resources/img/<?= $row['image'] ?>"
                        alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['house_id'] ?></h5>
                        <p class="card-text"><?= $row['start_date']?> - <?=$row['end_date'] ?></p>
                        <a href="<?= APP_BASE_URL ?>/house/details/<?= $row['id'] ?>"
                            class="btn btn-outline-success btn-sm">Details</a>
                        <?php
                            
                            $date1=date_create($row['start_date']);
                            $date2=date_create(date("Y-m-d"));
                            if ($date1 > $date2){
                                $diff=date_diff($date1, $date2); 
                    
                                if ($diff->days>=7){?>
                                    <a href="<?= APP_BASE_URL ?>/booking/cancel/<?= $row['id'] ?>" class="btn btn-outline-danger btn-sm">Annuleren</a>
                                <?php }
                            }
                        ?>
                        <a href="<?= APP_BASE_URL ?>/booking/downloadpdf/<?= $row['id'] ?>"
                        class="btn btn-outline-success btn-sm">Download PDF</a>
                        
                        <a href="<?= APP_BASE_URL ?>/review/<?= $row['id']?>" class="btn btn-outline-warning btn-sm">Geef een review</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php require_once('layouts/footer.php'); ?>