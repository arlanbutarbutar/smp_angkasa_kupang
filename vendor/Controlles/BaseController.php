<?php
if (isset($_GET['viewAdmin'])) {
    $viewAdmin   = $_GET['viewAdmin'];
    include_once "app/admin/view/" . $viewAdmin . ".php";
} else
if (isset($_GET['viewHome'])) {
    $viewHome   = $_GET['viewHome'];
    include_once "app/home/view/" . $viewHome . ".php";
} else
if (isset($_GET['deleteAdmin'])) {
    $deleteAdmin   = $_GET['deleteAdmin'];
    include_once "app/admin/delete/" . $deleteAdmin . ".php";
} else
if (isset($_GET['deleteHome'])) {
    $deleteHome   = $_GET['deleteHome'];
    include_once "app/home/delete/" . $deleteHome . ".php";
} else {
    if (!empty($_SESSION['username'])) {
        if ($_SESSION['level'] == "admin") {
            include_once "app/admin/view/home.php";
        } else
        if ($_SESSION['level'] == "guru") {
            include_once "app/admin/view/biodataGuru.php";
        } else
        if ($_SESSION['level']) {
            include_once "app/admin/view/homeSiswa.php";
        }
    } else {
        include_once "app/home/view/home.php";
    }
}
