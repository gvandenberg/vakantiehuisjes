<?php require_once('layouts/header.php'); ?>

<section id="gallery">
    <div class="container">
        <div class="row">
            <?php foreach ($data as $row) { ?>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img src="<?= APP_BASE_URL ?>/resources/img/<?= $row['image'] ?>"
                        alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['title'] ?></h5>
                        <p class="card-text"><?= $row['description'] ?></p>
                        <a href="<?= APP_BASE_URL ?>/house/details/<?= $row['id'] ?>"
                            class="btn btn-outline-success btn-sm">Details</a>
                        <a href="<?= APP_BASE_URL ?>/house/edit/<?= $row['id'] ?>"
                            class="btn btn-outline-primary btn-sm">Bewerken</a>
                        <?php 
                            foreach ($bookings as $booking){
                                if ($booking['house_id'] == $row['id']){
                                    $date1=date_create($booking['start_date']);
                                    $date2=date_create(date("Y-m-d"));
                                    
                                    if ($date2 > $date1){
                                        $diff=date_diff($date1, $date2);
                                        if ($diff->days > 0){
                                            $cancel = true;?>
                                        <?php } else {
                                            if (isset($cancel)){
                                                if ($cancel = true){
                                                    $cancel = true;
                                                } else{
                                                    $cancel = false;
                                                }
                                            }
                                        }
                                    }
                                    if (isset($cancel)){
                                        if($cancel == true){
                                            $cancel == true;
                                        } else{
                                            $cancel == false;
                                        }
                                    }
                                } else {
                                    if (isset($cancel)){
                                        if ($cancel = true){
                                            $cancel = true;
                                        } else {
                                            $cancel = false;
                                        }
                                    }else {
                                            $cancel = false;
                                        }?>
                                    
                                <?php } 
                                if (isset($cancel)){
                                    if ($cancel == true){?>
                                        <a href="<?= APP_BASE_URL ?>/house/delete/<?= $row['id'] ?>"
                                        class="btn btn-outline-danger btn-sm">Verwijderen</a>
                                    <?php } 
                                    unset($cancel);
                                    }
                            }?>
                        <a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php require_once('layouts/footer.php'); ?>