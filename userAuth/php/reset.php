<?php
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];  
    $newpassword = $_POST['password']; 

    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword){
    $file = "../storage/users.csv";
    $read_file = fopen($file, "r");
    $write_file = fopen($file, "a");

        while (($data = fgetcsv($read_file)) !== FALSE) {
            
            if ($data[1] == $email) {
                $data[2] = $newpassword;

                if(($data_amend = fputcsv($write_file, $data)) !==FALSE) {
                    echo '<script> 
                    alert("Successful change of password");
                    window.location.href="../forms/resetpassword.html";
                    </script>';
                    exit();
                }else {
                echo '<script> 
                alert("Sorry user does not exist");
                window.location.href="../forms/resetpassword.html";
                </script>';
                }
            }        
            
        }
    fclose($read_file);
    fclose($write_file);
}
echo "HANDLE THIS PAGE";

session_write_close();



?>