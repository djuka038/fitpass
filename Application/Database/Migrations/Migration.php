<?php

namespace Application\Database\Migrations;

use Application\Controller\App_config;

class Migration
{

    public static function runMigration()
    {
        $dsn = 'mysql:dbname=' . App_config::get('dbName') . ';host=' . App_config::get('dbHost');
        $db = new \PDO($dsn, App_config::get('dbUsername'), App_config::get('dbPassword'));

        $tableUser = "CREATE TABLE IF NOT EXISTS users (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(63) NOT NULL,
            surname VARCHAR(63) NOT NULL,
            createdAt INT NULL
        );";

        $db->exec($tableUser);

        $tableGym = "CREATE TABLE IF NOT EXISTS gyms (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(63) NOT NULL,
            createdAt INT NULL
        );";

        $db->exec($tableGym);

        $tableCard = "CREATE TABLE IF NOT EXISTS cards (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            userId INT UNSIGNED NOT NULL,
            gymId INT UNSIGNED NOT NULL,
            createdAt INT NULL,
            CONSTRAINT fk_card_user_id FOREIGN KEY (userId) REFERENCES users(id),
            CONSTRAINT fk_card_gym_id FOREIGN KEY (gymId) REFERENCES gyms(id)
        );";

        $db->exec($tableCard);

        $tableCardHistory = "CREATE TABLE IF NOT EXISTS card_history (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            cardId INT UNSIGNED NOT NULL,
            createdAt INT NULL,
            CONSTRAINT fk_card_history_card_id FOREIGN KEY (cardId) REFERENCES cards(id)
        );";

        $db->exec($tableCardHistory);

        echo 'Migration Success!';
    }
}
