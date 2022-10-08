<?php

require_once('../Controller/controller.php');

$ac = new admin_user_controller();

$ac->admin_deleteuser_controller($_GET['id_user']);

header('Location: admin_users.php');

?>