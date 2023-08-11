<?php

use MuhthishimisCoding\PreFramework\Application;

class m0003_contact
{
    public function up()
    {
        $sql = "CREATE TABLE contact(
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            fullName VARCHAR(255) NOT NULL,
            subject TEXT(250) NOT NULL,
            message TEXT(2900) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )ENGINE=INNODB;";
        Application::app()->db->pdo->exec($sql);
    }
    public function down()
    {
        $sql = "DROP TABLE contact";
        Application::app()->db->pdo->exec($sql);

    }
}