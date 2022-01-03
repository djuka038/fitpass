<?php

namespace Application\Database\Seeders;

use Application\Models\User;
use Application\Models\Gym;
use Application\Models\Card;

class Seeder
{

    public static function runSeeder()
    {
        // Users seeder
        $user1 = new User();

        $user1->name = 'Stefan';
        $user1->surname = 'Djukelic';

        $user1->save();

        $user2 = new User();

        $user2->name = 'Milan';
        $user2->surname = 'Petrovic';

        $user2->save();

        $user3 = new User();

        $user3->name = 'Goran';
        $user3->surname = 'Smelcerovic';

        $user3->save();
        // Users seeder

        // Gyms seeder
        $gym1 = new Gym();

        $gym1->name = 'Ahilej';

        $gym1->save();

        $gym2 = new Gym();

        $gym2->name = 'Tehnohym';

        $gym2->save();

        $gym3 = new Gym();

        $gym3->name = 'Akademik';

        $gym3->save();
        // Gyms seeder

        // Cards seeder
        $card1 = new Card();

        $card1->userId = $user1->id;
        $card1->gymId = $gym1->id;

        $card1->save();

        $card2 = new Card();

        $card2->userId = $user1->id;
        $card2->gymId = $gym2->id;

        $card2->save();

        $card3 = new Card();

        $card3->userId = $user2->id;
        $card3->gymId = $gym3->id;

        $card3->save();

        // Cards seeder

        echo 'Seeder Success!';
    }
}
