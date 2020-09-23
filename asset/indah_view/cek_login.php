<?php
    
    ob_start();
    session_start();
    ob_end_clean();
    
    $nik=$_POST["nik"];
    $pass=$_POST["pass"];
    
    if($nik=="1" AND $pass=="1")
    {
        $_SESSION["nik"]=$nik;
        header("location:users/uploader/up_video.php");
    }else if($nik=="2" AND $pass=="2"){
        $_SESSION["nik"]=$nik;
        header("location:users/marketing/tm_video.php");
    }else if($nik=="3" AND $pass=="3"){
        $_SESSION["nik"]=$nik;
        header("location:users/spv/spv_video.php");
    }else{
        header("location:index.php?login_error");
    }
?>