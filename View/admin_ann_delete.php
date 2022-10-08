<?php

require_once('../Controller/controller.php');

$ac = new admin_ann_controller();

$ac->admin_deleteann_controller($_GET['id_ann']);

header('Location: admin_ann.php');

?>