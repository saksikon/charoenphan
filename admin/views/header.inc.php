<div class="row header">
    <div class="col-lg-2">
        <a onclick="menu_toggle()" class="btn" style="cursor: pointer;">
            <div class="menu-icon"></div>
            <div class="menu-icon"></div>
            <div class="menu-icon"></div>
        </a>
    </div>
    <div class="col-lg-10" align="right" >
        <div class="dropdown" style="cursor: pointer;">
            <img src="../img_upload/user/<?php if($user[0][4] != "" ){ echo $user[0][4];}else{ echo "default.png"; }?>" class="avatar">
            <button class="dropbtn"><?php echo $user[0][3];?>
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a class="dropdown-item" href="?content=user&action=update&id=<?php echo $user[0][0];?>"><i class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
            </div>
        </div>
    </div>
</div>
