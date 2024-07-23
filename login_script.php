<?php
session_start();

$login = $_POST["login"];
$password = $_POST["password"];
if ($login == "admin") {
    if ($password == "admin") {
        $_SESSION["login"] = "admin";
        header ("location: logged_session.php");
    }
}
else {
    $_SESSION["login"] = "unknown";
        header ("location: login_form.php");
}

?>