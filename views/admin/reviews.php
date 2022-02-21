<link rel="stylesheet" href="<?=APP_BASE_URL?>/resources/css/review.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="col-md-12">
    <div class="offer-dedicated-body-left">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade active show" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
                        <h5 class="mb-1">Reviews in afwachting van goedkeuring</h5>
<?php foreach ($frmData as $row) { ?>
    <div class="reviews-members pt-4 pb-4">
        <div class="media">
            <a href="#"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-pill"></a>
            <div class="media-body">
                <div class="reviews-members-header">
                    <span class="star-rating float-right">
                         
                        <?php 
                        $a = $row['stars']+1;
                        for ($i=1; $i<$a; $i++){?>
                            <i class="fas fa-star"></i>
                        <?php } ?>
                          </span>
                    <h6 class="mb-1"><a class="text-black" href="#">User id = <?= $row['user_id']; ?></a></h6>
                    <p class="text-gray"><?= $row['date']?></p>
                </div>

                <div class="reviews-members-body">
                    <p><?= $row['title']?></p>
                    <p><?= $row['description']?></p>
                </div>
                <div class="reviews-members-footer">
                    <a href="<?= APP_BASE_URL ?>/admin/checkreview/<?= $row['id'] ?>" class="btn btn-primary">Goedkeuren</a>
                    <a href="<?= APP_BASE_URL ?>/admin/deletereview/<?= $row['id'] ?>" class="btn btn-danger">Afkeuren</a>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
