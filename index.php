<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Application\Controller\App;
use Application\Controller\Router;
use Application\Controller\Request;
use Application\Controller\Response;
use Application\Database\Migrations\Migration;
use Application\Database\Seeders\Seeder;
use Application\Models\User;
use Application\Models\Gym;
use Application\Models\Card;
use Application\Models\CardHistory;
use DateTime;

Router::get('/', function () {
    echo 'Fittpass test Stefan!';
});

Router::get('/reception/([0-9]*)/([0-9]*)', function (Request $request, Response $response) {
    $card = Card::find(['id' => $request->parameters[1], 'gymId' => $request->parameters[0]]);
    $gym = Gym::find(['id' => $request->parameters[0]]);

    if (!empty($card))
    {
        $date = new DateTime();
        $date->setTime(00, 00, 00);
        $timeStamp = $date->getTimestamp();

        if (empty(CardHistory::find("createdAt >= $timeStamp"))) {
            $user = User::find(['id' => $card->userId]);

            $cardHistory = new CardHistory();
            $cardHistory->cardId = $card->id;
            $cardHistory->save();

            $response->toJSON([
                'status' => 'OK',
                'object_name' => $gym->name,
                'first_name' => $user->name,
                'last_name' => $user->surname
            ]);
        } else {
            $response->toJSON([
                'status' => 403,
                'message' => "You've been to this gym today: $gym->name",
            ]);
        }
    } else {
        $response->toJSON([
            'status' => 403,
            'message' => "You don't have access to this gym: $gym->name",
        ]);
    }
});

Router::get('/migrateSeed', function() {
    Migration::runMigration();
    Seeder::runSeeder();
});

App::run();
