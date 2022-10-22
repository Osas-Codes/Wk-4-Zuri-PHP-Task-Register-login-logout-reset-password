<?php
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];  
    $password = $_POST['password']; 

loginUser($email, $password);

}

function loginUser($email, $password){
    $file =  "../storage/users.csv";
    $read_file = fopen($file, "r");

    while (!feof($read_file)) {
        $line = fgetcsv($read_file);
        if ($line[1] == $email && $line[2] == $password) {
            $_SESSION['username'] = $line[0];
            header("LOCATION: ../dashboard.php");
            exit();
        }
    }
    fclose($read_file);
    echo "Invalid Username or Password";
}

session_write_close();

// echo "HANDLE THIS PAGE";

?>
    