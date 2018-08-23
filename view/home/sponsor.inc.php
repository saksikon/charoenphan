<div class="sponsor-section"> 
        <h1>ผู้สนับสนุนหลัก</h1>
        <div class="row" style="margin:24px 0px;" align="center">
            
        <?PHP for($i=0 ;  $i < count($sponsor) ; $i++){ ?>
            <div class="col-md-1 col-sm-4 col-xs-4 card-sponsor" >
                <a href="<?PHP echo $sponsor[$i]['sponsor_url']; ?>" title="<?PHP echo $sponsor[$i]['sponsor_name']; ?>">
                    <img  src="img_upload/sponsor/<?PHP echo $sponsor[$i]['sponsor_image']; ?>" class="img-responsive" />
                </a>
            </div>
        <?PHP } ?>
        
        </div>
</div>