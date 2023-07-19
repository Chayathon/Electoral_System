<?php
    SESSION_START();
    $_SESSION['logout'] = "ออกจากระบบสำเร็จ";
    HEADER("location: index");
?>