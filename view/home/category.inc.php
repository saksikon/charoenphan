<div class="category-section">
    <div class="container ">
        <div class="row">
        <?PHP for($i=0 ; $i < 6 && $i < count($shop_category) ; $i++){ ?>
            <div class="col-md-4 card-category">
                <a href="promotion.php?category=<?PHP echo $shop_category[$i]['shop_category_id']; ?>">
                <img  src="img_upload/shop_category/<?PHP echo $shop_category[$i]['shop_category_image']; ?>" class="" />
                <div ><?PHP echo $shop_category[$i]['shop_category_title']; ?></div>
                </a>
            </div>
        <?PHP } ?>
        </div>
    </div>
</div>