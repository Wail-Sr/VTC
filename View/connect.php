<?php

require_once('../Controller/controller.php');

$con = new connexion_controller();

#session_start();
  
// Declaring and hoisting the variables
$username = "";
$email    = "";
#$errors = array();
#$_SESSION['success'] = "";
  
// User login
if (isset($_POST['login'])) {


    $email = $_POST['email'];
    $password = $_POST['password'];

    $con->login($email, $password);

}
?>
