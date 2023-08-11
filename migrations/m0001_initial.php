<?php 
use MuhthishimisCoding\PreFramework\Application;
class m0001_initial{
    public function up(){
        $db = Application::app()->db;
        $sql = "CREATE TABLE users(
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            fullName VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL,
            user_pass VARCHAR(1000) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )ENGINE=INNODB;";

        $db->pdo->exec($sql);
    }
    public function down(){
        $sql = "DROP TABLE users";
        Application::app()->db->pdo->exec($sql);
    }
}