<?php

require_once('../Controller/controller.php');

$ac = new admin_news_controller();

$ac->admin_deletenews_controller($_GET['id_news']);

header('Location: admin_news.php');

?>