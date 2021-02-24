<?php
session_start();
unset($_SESSION['id'],$_SESSION['IS_LOGIN'],$_SESSION['LAST_LOGIN_TIME']);
?>
<script>
window.location.href='login.php';
</script>