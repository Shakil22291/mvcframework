<?php

class m0001_initial
{
    public function up()
    {
        $db = \App\Core\Application::$app->db;

        $sql = "
            CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                status TINYINT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";

        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = \App\Core\Application::$app->db;
        $sql = "DROP TABLE users";
        $db->pdo->exec($sql);
    }
}