<script>
function load_page(){
    var category = document.getElementById("category").value;
    window.location="promotion.php?category="+category;
} 
</script>
<div class="promotion-section">
    <div class="row" style="margin:0px 0px;">
        <div class="col-md-12">
            <div class="row header-promotion" style="margin:0px 0px;">
                <div class="col-md-4" style="padding:8px 0px;">
                    <select class="form-control" onchange="load_page();" id="category">
                        <option value="">เลือกหมวดหมู่ที่ท่านต้องการ</option>
                        <?PHP
                        for($i = 0; $i < count($shop_category);$i++){
                        ?>
                        <option value="<?PHP echo $shop_category[$i]['shop_category_id']; ?>"  <?PHP if($_GET['category'] == $shop_category[$i]['shop_category_id']){ ?> SELECTED <? } ?>><?PHP echo $shop_category[$i]['shop_category_name'];?></option>
                        <?PHP
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-8" style="padding:8px 0px;">
                <?PHP
                        for($i = 0; $i < count($shop_category);$i++){
                        ?>
                        <a href="promotion.php?category=<?PHP echo $shop_category[$i]['shop_category_id']; ?>" >
                            <img src="img_upload/shop_category/<?PHP if($shop_category[$i]['shop_category_image'] != ""){ echo $shop_category[$i]['shop_category_image']; }else{ echo "default.png"; }?>" style="margin-left:8px;" height="32px;" />
                        </a>
                        <?PHP
                        }
                        ?>
                    
                </div>
            </div>
        </div>
    </div>
    
    <?PHP for($i=0 ; $i < count($shop_promotions) ; $i++){ ?>
    <?PHP if($i%3 == 0){?>
        <div class="row row-flex" style="margin:8px 0px;">
    <?PHP } ?>
        <div class="col-md-4" style="display:flex;">
            <div class="card-promotion">
                <a href="promotion.php?promotion=<?PHP echo $shop_promotions[$i]['shop_promotion_id']; ?>">
                    <img  src="img_upload/shop_promotion/<?PHP echo $shop_promotions[$i]['shop_promotion_image']; ?>" class="" />
                    <div class="title">
                        <div class="shop-name">
                            <?PHP echo $shop_promotions[$i]['shop_name']; ?>
                        </div>
                        <div class="category-name">
                            <?PHP echo $shop_promotions[$i]['shop_category_title']; ?>
                        </div>
                    </div>
                    <div class="content">
                        <?PHP echo $shop_promotions[$i]['shop_promotion_title']; ?>
                    </div>
                </a>
            </div>
        </div>
        <?PHP if($i % 3 == 2 || $i + 1 == count($shop_promotions)){?>
        </div>
        <?PHP } ?>
    <?PHP } ?>
    
</div>