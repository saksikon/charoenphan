<div class="head" id="head" >
    <h1><?PHP echo $page['page_title'];?></h1>
</div>
<style>
.head{
    background: url('img_upload/page/<?PHP if($page['page_header_image'] != "") {echo $page['page_header_image'];} else { echo "default.png";}?>') no-repeat;
    background-size: 100% ;
    background-position: left top;
    position: relative;
    z-index: -1;
    padding-top:48px;
    padding-bottom: 48px;
    min-height: 600px;
    vertical-align: middle;
    text-align:center;
}

.head h1{
    text-align: center;
    color:#FFF;
    font-size: 60pt;
    font-weight: 600;
    margin-top:140px;
}

@media screen and (min-width: 1024px) and  (max-width: 1280px)  {
    .head{
        background: url('img_upload/page/<?PHP if($page['page_header_image'] != "") {echo $page['page_header_image'];} else { echo "default.png";}?>') no-repeat;
        background-size: auto 100% ;
        background-position: center center;
        position: relative;
        z-index: -1;
        padding-top:48px;
        padding-bottom: 48px;
        min-height: 480px;
        vertical-align: middle;
        text-align:center;
    }

    .head h1{
        text-align: center;
        color:#FFF;
        margin-top:40px;
        font-size: 28pt;
        font-weight: 600;
        
    }
}

@media screen and (min-width: 481px) and  (max-width: 1023px)  {
    .head{
        background: url('img_upload/page/<?PHP if($page['page_header_image'] != "") {echo $page['page_header_image'];} else { echo "default.png";}?>') no-repeat;
        background-size: auto 100% ;
        background-position: center center;
        position: relative;
        z-index: -1;
        padding-top:48px;
        padding-bottom: 48px;
        min-height: 320px;
        vertical-align: middle;
        text-align:center;
    }

    .head h1{
        text-align: center;
        color:#FFF;
        margin-top:40px;
        font-size: 28pt;
        font-weight: 600;
        
    }
}

@media screen and (max-width: 480px) {
    .head{
        background: url('img_upload/page/<?PHP if($page['page_header_image'] != "") {echo $page['page_header_image'];} else { echo "default.png";}?>') no-repeat;
        background-size: auto 100% ;
        background-position: center center;
        position: relative;
        z-index: -1;
        padding-top:48px;
        padding-bottom: 48px;
        min-height: 240px;
        vertical-align: middle;
        text-align:center;
    }

    .head h1{
        text-align: center;
        color:#FFF;
        margin-top:40px;
        font-size: 24pt;
        font-weight: 600;
        
    }
}
</style>
