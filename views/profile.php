<?php
use MuhthishimisCoding\PreFramework\Application;
$user = Application::user();
echo '<h1>'.$user['username'].'</h1';
?>