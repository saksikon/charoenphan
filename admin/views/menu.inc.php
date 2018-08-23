<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="logo">
            <div align="center"> 
              <img src="../template/images/logo.png" class="img-responsive" width="96px" > 
          </div>
        </li>
        <li>
            <div style="padding-top: 32px; text-indent: 0px;" align="center">
                <span class="brand-line-one">เจริญภัณฑ์เบเกอรี่</span><br>
                <span class="brand-line-second">Charoenphan Bakery</span>
            </div>
        </li>
        <li><a href="?content=news">
            <div <?php if($page=="news" || $page=="news_image"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <i class="fa fa-newspaper-o" style="font-size:24px"></i>
                <span style="padding:5px; font-size:15px;">ข่าวสาร</span>
            </div>
        </a></li>
        <li><a href="?content=event">
            <div <?php if($page=="event" || $page=="event_image" ){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <i class="fa fa-calendar" style="font-size:24px"></i>
                <span style="padding:5px; font-size:15px;">กิจกรรม</span>
            </div>
        </a></li>
        <li><a href="?content=bakery">
            <div <?php if($page=="bakery" || $page=="bakery_type" || $page=="bakery_image"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <i class="fa fa-birthday-cake" style="font-size:24px"></i>
                <span style="padding:5px; font-size:15px; ">เบเกอรี่</span>
            </div>
        </a></li>
        <li><a href="?content=snack">
            <div <?php if($page=="snack" || $page=="snack_type" || $page=="snack_image"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <i class="fa fa-shopping-basket" style="font-size:24px"></i>
                <span style="padding:5px; font-size:15px; ">ขนม</span>
            </div>
        </a></li>
        <li><a href="?content=food">
            <div <?php if($page=="food" || $page=="food_type" || $page=="food_image"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <i class="fa fa-cutlery" style="font-size:24px"></i>
                <span style="padding:5px; font-size:15px; ">อาหาร</span>
            </div>
        </a></li>
        <li><a href="?content=promotion">
            <div <?php if($page=="promotion" || $page=="promotion_image"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <i class="fa fa-tags" style="font-size:24px"></i>
                <span style="padding:5px; font-size:15px; ">โปรโมชั่น</span>
            </div>
        </a></li>
        <li><a href="index.php?content=meeting_room">
            <div <?php if($page=="meeting_room"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <i class="fa fa-comments" style="font-size:24px"></i>
                <span style="padding:5px; font-size:15px;">ห้องประชุม</span>
            </div>
        </a></li>
        <li><a href="?content=branch">
            <div 
            <?php if($page=="branch"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <i class="fa fa-map-marker" style="font-size:24px"></i>
                <span style="padding:5px; font-size:15px;">สาขา</span>
            </div>
        </a></li>
        <li><a href="?content=user">
            <div <?php if($page=="user"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <i class="fa fa-user" style="font-size:24px"></i>
                <span style="padding:5px; font-size:15px; ">ผู้ดูเเลระบบ</span>
            </div>
        </a></li>
        <li><a href="?content=about">
            <div <?php if($page=="about" || $page=="about_slide"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <i class="fa fa-users" style="font-size:24px"></i>
                <span style="padding:5px; font-size:15px; ">เกี่ยวกับเรา</span>
            </div>
        </a></li>
        <li><a href="?content=setting">
            <div <?php if($page=="setting"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <i class="fa fa-gears" style="font-size:24px"></i>
                <span style="padding:5px; font-size:15px; ">ตั้งค่า</span>
            </div>
        </a></li>
        <li><a href="index.php?content=contact">
            <div <?php if($page=="contact"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <i class="fa fa-commenting" style="font-size:24px"></i>
                <span style="padding:5px; font-size:15px;">การติดต่อ</span>
            </div>
        </a></li>
    </ul>
</div>