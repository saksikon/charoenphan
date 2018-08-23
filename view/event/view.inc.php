<div class="event-section"> 
    <div class="container ">
        <?PHP for($i = 0; $i < count($event);$i++){ ?>
        <a href="event.php?event=<?PHP echo $event[$i]['event_id']; ?>">
            <div class="row" style="padding:16px;">
                
                <div class="col-md-2 event-head">
                <?PHP 
                    $time = strtotime($event[$i]['event_date_begin']);
                ?> 
                    <div class="event-head-date"><?PHP echo strtoupper(date('M',$time));?></div>
                    <div class="event-head-date"><?PHP echo date('d',$time);?></div>
                    <div class="event-head-mid">ถึง</div>
                <?PHP 
                    $time = strtotime($event[$i]['event_date_end']);
                ?> 
                    <div class="event-head-date"><?PHP echo strtoupper(date('M',$time));?></div>
                    <div class="event-head-date"><?PHP echo date('d',$time);?></div>
                </div>
                <div class="col-md-8 event-content">
                    <div class="title">
                    <?PHP echo  $event[$i]['event_title'] ?>
                    </div>
                    <div class="body">
                    <?PHP echo  $event[$i]['event_description'] ?>
                    </div>
                    <div class="foot">
                        
                        <i class="fa fa-clock-o"></i> 
                        <?PHP echo  $event[$i]['event_date_end'] ?> 
                        <i class="fa fa-map-marker"> </i>  
                        <?PHP echo  $event[$i]['event_location'] ?>  

                    </div>
                </div>

                <div class="col-md-2 event-foot">
                    <img src="img_upload/event/<?PHP if($event[$i]['event_image'] != ""){ echo $event[$i]['event_image']; }else{ echo "default.png";} ?>" height="154" />
                </div>
            </div>
        </a>
        <?PHP } ?>
    </div>
</div>