<div class="tour-section"> 
    <div class="container ">
        <h1 class="header_1"><?PHP echo $page['page_header_1']?></h1>
        <div class="header_2"><?PHP echo $page['page_header_2']?></div>
    </div>
        <?PHP 
            
        for($i = 0; $i < count($tour);$i++){ 
            if($i % 2 == 0){
                ?>
                <div class="row row-flex tour-card-left" style="padding:16px 0px; margin:16px 0px;">
                    
                    <div class="col-md-7 tour-content">
                        <div class="title">
                            <?PHP echo  $tour[$i]['tour_title'] ?>
                        </div>
                        <div class="body"> 
                            <?PHP echo  $tour[$i]['tour_description'] ?>
                        </div>
                        <div class="link">
                            <a  href="tour.php?tour=<?PHP echo $tour[$i]['tour_id']; ?>" >
                                ดูรายละเอียด
                            </a>
                        </div>
                    </div>
        
                    <div class="col-md-3 tour-image">
                        <img src="img_upload/tour/<?PHP if($tour[$i]['tour_image'] != ""){ echo $tour[$i]['tour_image']; }else{ echo "default.png";} ?>" class="img-responsive" />
                    </div>
                    <div class="col-md-2 ">
        
                    </div>
        
                </div>
                <?PHP
            }else{
                ?>
                <div class="row row-flex tour-card-right" style="padding:16px 0px; margin:16px 0px;">
                    <div class="col-md-2 ">
                    
                    </div>
                    <div class="col-md-3 tour-image">
                        <img src="img_upload/tour/<?PHP if($tour[$i]['tour_image'] != ""){ echo $tour[$i]['tour_image']; }else{ echo "default.png";} ?>" class="img-responsive" />
                    </div>
                    <div class="col-md-7 tour-content">
                        <div class="title">
                            <?PHP echo  $tour[$i]['tour_title'] ?>
                        </div>
                        <div class="body"> 
                            <?PHP echo  $tour[$i]['tour_description'] ?>
                        </div>
                        <div class="link">
                            <a  href="tour.php?tour=<?PHP echo $tour[$i]['tour_id']; ?>" >
                                ดูรายละเอียด
                            </a>
                        </div>
                    </div>

                </div>
                <?PHP
            }
            
         } ?>
</div>