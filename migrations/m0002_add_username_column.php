<?php
use MuhthishimisCoding\PreFramework\Application;

class m0002_add_username_column
{
    public function up()
    {
        $sql = "ALTER TABLE `users` ADD `username` VARCHAR(999) NOT NULL AFTER `fullName`";
        Application::app()->db->pdo->exec($sql);
    }
    public function down()
    {
        $sql = "ALTER TABLE `users` DROP `username`";
        Application::app()->db->pdo->exec($sql);
    }
}