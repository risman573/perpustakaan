<?php
    session_start();
    $_SESSION = [];
    session_destroy();
    echo "<script>location='login.php'</script>";
?>
