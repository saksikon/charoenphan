<div class="promotion-section"> 
    <div class="container ">
        <h1>ข้อเสนอพิเศษยอดนิยม</h1>
        <div class="row row-flex" style="margin:24px 0px;">
        <?PHP for($i=0 ; $i < 3 && $i < count($shop_promotion) ; $i++){ ?>
            <div class="col-md-4 " style="display:flex">
                <div class="card-promotion">
                    <a href="promotion.php?promotion=<?PHP echo $shop_promotion[$i]['shop_promotion_id']; ?>">
                        <img  src="img_upload/shop_promotion/<?PHP echo $shop_promotion[$i]['shop_promotion_image']; ?>" class="" />
                        <div class="title">
                            <div class="shop-name">
                                <?PHP echo $shop_promotion[$i]['shop_name']; ?>
                            </div>
                            <div class="category-name">
                                <?PHP echo $shop_promotion[$i]['shop_category_title']; ?>
                            </div>
                        </div>
                        <div class="content">
                            <?PHP echo $shop_promotion[$i]['shop_promotion_title']; ?>
                        </div>
                    </a>
                </div>
            </div>
        <?PHP } ?>
        </div>
        <div class="row">
            <div class="col-md-12" align="center">
                <a class="btn btn-promotion" href="promotion.php">ดูทั้งหมด</a>
            </div>
        </div>
    </div>
</div>