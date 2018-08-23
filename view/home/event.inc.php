<div class="event-section"> 
    <div class="container ">
        <h1>กิจกรรมที่กำลังจะมาถึง</h1>
        <div class="row" style="margin:24px 0px;">
        <?PHP for($i=0 ; $i < 4 && $i < count($event) ; $i++){ ?>
            <div class="col-md-3">
                <div class="card-event" >
                
                    <img  src="img_upload/event/<?PHP echo $event[$i]['event_image']; ?>" class="" />
                    <div class="title-date">
                        <?PHP 
                            $time = strtotime($event[$i]['event_date_begin']);

                            $newformat = date('d-M-Y',$time);
                            echo $newformat; 
                        ?> 
                    </div>
                    <div class="title">
                        <?PHP echo $event[$i]['event_title']; ?> 
                    </div>
                    <div class="content">
                        <?PHP echo $event[$i]['event_description']; ?>
                    </div>
                    <a href="event.php?event=<?PHP echo $event[$i]['event_id']; ?>">
                    อ่านต่อ
                    </a>
                </div>
            </div>
        <?PHP } ?>
        </div>
    </div>
</div>