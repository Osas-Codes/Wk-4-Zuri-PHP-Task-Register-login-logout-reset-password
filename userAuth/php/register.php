<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    $form_data = [$username, $email, $password];
    $handle = fopen("../storage/users.csv", "a");
    fputcsv($handle, $form_data);
    fclose($handle);
    
    echo "OKAY \n";
}
echo "User Successfully registered";


?>