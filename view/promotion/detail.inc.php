<div class="promotion-section"> 
    <div  style="padding:32px;">
        <div class="row">
            <div class="col-md-9">
                <?PHP echo $shop_promotion['shop_promotion_detail'];?>
            </div>
            <div class="col-md-3" style="padding:0px;">
                <div class="shop-card">
                    <img src="img_upload/shop/<?PHP if($shop['shop_image'] != ''){echo $shop['shop_image']; }else{ echo 'default.png';} ?>" class="img-responsive" />
                    <div class="title" ><?PHP echo $shop['shop_name'];?> </div>
                    <div class="row" style="margin:0px;">
                        <div class="col-md-12" style="padding:8px;">
                            <div class="row" style="padding:8px;">
                                    <div class="col-md-4 " style="word-wrap: break-word;"><b>ประเภทบริการ</b></div>
                                    <div class="col-md-8 " style="word-wrap: break-word;"> <?PHP echo $shop['shop_category_name'];?> </div>
                            </div>
                            <div class="row" style="padding:8px;">
                                    <div class="col-md-4 " style="word-wrap: break-word;"><b>เวลาทำการ</b></div>
                                    <div class="col-md-8 " style="word-wrap: break-word;"> <?PHP echo $shop['shop_open'];?>  ถึง <?PHP echo $shop['shop_close'];?></div>
                            </div>
                            <div class="row" style="padding:8px;">
                                    <div class="col-md-4 " style="word-wrap: break-word;"><b>ที่อยู่</b></div>
                                    <div class="col-md-8 " style="word-wrap: break-word;"><?PHP echo $shop['shop_address'];?> </div>
                            </div>
                            <div class="row" style="padding:8px;">
                                    <div class="col-md-4 " style="word-wrap: break-word;"><b>เบอร์โทรศัพท์</b></div>
                                    <div class="col-md-8 " style="word-wrap: break-word;"> <?PHP echo $shop['shop_phone'];?> </div>
                            </div>
                            <div class="row" style="padding:8px;">
                                    <div class="col-md-4 " style="word-wrap: break-word;"><b>อีเมล์</b></div>
                                    <div class="col-md-8 " style="word-wrap: break-word;"> <?PHP echo $shop['shop_email'];?></div>
                            </div>
                            <div class="row" style="padding:8px;">
                                    <div class="col-md-4 " style="word-wrap: break-word;"><b>Facebook </b></div>
                                    <div class="col-md-8 " style="word-wrap: break-word;"> <?PHP echo $shop['shop_facebook'];?></div>
                            </div>
                            <div class="row" style="padding:8px;">
                                    <div class="col-md-4 " style="word-wrap: break-word;"><b>Line </b></div>
                                    <div class="col-md-8 " style="word-wrap: break-word;"> <?PHP echo $shop['shop_line'];?></div>
                            </div>
                            <div class="row" style="padding:8px;">
                                    <div class="col-md-4 " style="word-wrap: break-word;"><b>Youtube </b></div>
                                    <div class="col-md-8 " style="word-wrap: break-word;"> <?PHP echo $shop['shop_youtube'];?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?PHP 
        if(count($shop_promotions) > 0){
        ?>
        <hr style="border-color: #d0c8c8;">
        <div class="row" >
            <div class="col-md-12">
                <div class="my-promotion" >โปรโมชั่นอื่นๆ ของร้าน</div>
            </div>
        </div>

        <div class="row"> 
            <?PHP for($i=0 ; $i < count($shop_promotions) ; $i++){ 
                ?>
                <div class="col-md-2" style="padding:0px;">
                    <div class="card-promotion">
                        <a href="promotion.php?promotion=<?PHP echo $shop_promotions[$i]['shop_promotion_id']; ?>">
                            <img  src="img_upload/shop_promotion/<?PHP echo $shop_promotions[$i]['shop_promotion_image']; ?>" class="img-responsive" />
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
            <?PHP } ?> 
        </div>
        <?PHP } ?>
    </div>

</div>