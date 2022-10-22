<?php

function logout(){
    session_start();
    if (isset($_SESSION['username']) && $_SESSION['username'] == TRUE) {
        session_destroy();
        header("location: ../forms/login.html");
    }
    session_write_close();

}
logout();
echo "HANDLE THIS PAGE";

?>