<?php

require './includes/configs/Configs.php';
require './includes/autoload/autoload.php';

$template = new Template();

$template->set('home');

$template->assign('title', 'this is a title');
$template->assign('home', 'this is home');
$template->assign('footer', 'this is a footer');

echo $template->display();