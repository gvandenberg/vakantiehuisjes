<?php require_once('layouts/header.php'); ?>


<div class="container">

    <h1 class="my-4"><?= $frmData['title']?>
        <small><?= $frmData['country']?></small>
    </h1>


    <div class="row">

        <div class="col-md-8">
            <img class="img-fluid" src="<?= APP_BASE_URL ?>/resources/img/<?= $frmData['image'] ?>" alt="houseimg">
        </div>

        <div class="col-md-4">
            <h3 class="my-3">Beschrijving</h3>
            <p><?= $frmData['description']?></p>
            <h3 class="my-3">Faciliteiten</h3>
            <ul>
                <li>Lorem Ipsum</li>
                <li>Dolor Sit Amet</li>
                <li>Consectetur</li>
                <li>Adipiscing Elit</li>
            </ul>
            <br>
            <div class="my-3">
                <a href="<?= APP_BASE_URL ?>/book/<?= $frmData['id'] ?>" type="button" class="btn btn-success">Boeken</a>
            </div>
        </div>

    </div>
    <!-- /.row -->
 <br><br>
    
    <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=APP_BASE_URL?>/resources/css/review.css">
    <div class="container">
<div class="col-md-12">
    <div class="offer-dedicated-body-left">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade active show" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
                    <a href="#" class="btn btn-outline-primary btn-sm float-right">Top Rated</a>
                    <h5 class="mb-1">Alle reviews</h5>
                    
                    <hr>
                    
                    <?php foreach ($reviews as $review){?>
                        <div class="reviews-members pt-4 pb-4">
                            <div class="media">
                                <a href="#"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar6.png" class="mr-3 rounded-pill"></a>
                                <div class="media-body">
                                    <div class="reviews-members-header">
                                        <span class="star-rating float-right">
                                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                                            <a href="#"><i class="icofont-ui-rating"></i></a>
                                            </span>
                                        <h6 class="mb-1"><a class="text-black" href="#"><?= $review['user_id']?></a></h6>
                                        <p class="text-gray"><?=$review['date']?></p>
                                    </div>
                                    <div class="reviews-members-body">
                                        <b><?=$review['title']?></b>
                                        <p><?=$review['description']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?=$frmData['city']?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2piratebay.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">iframe google map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
    <!-- Related Projects Row -->
    <h3 class="my-4">Meer foto's</h3>

    <div class="row">

        <?php foreach ($data as $row){ ?>
        <div class="col-md-3 col-sm-6 mb-4">
            <a href="#">
                <img class="img-fluid" src="<?= APP_BASE_URL ?>/resources/img/<?= $row['path'] ?>" alt="" width="100%">
            </a>
        </div>
        <?php } ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php require_once('layouts/footer.php'); ?>