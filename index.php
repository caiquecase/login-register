<?php
include 'code/connection.inc.php';

include 'header.php';

if (isset($_SESSION['USER_LOGIN']) == '') {
    header('location:login.php');
}

?>

<header class="header">
    <a href="#" class="logo"> <img scr="../image/logo.png"></i>Seja bem-vindo(a)</a>
    <div class="icons">
        <a href="logout.php" class="fa-solid fa-door-open"></a>
    </div>
</header>

<section class="home" id="home">
        <img src="./image/not-found.jpg" width="100%" height="auto">
</section>

