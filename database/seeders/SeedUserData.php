<?php

namespace Database\Seeders;

use App\Models\User;
use App\Traits\HasCsv;
use Illuminate\Database\Seeder;

class SeedUserData extends Seeder
{
    use HasCsv;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = storage_path('data/users.csv');
        $userArr = $this->convert($file);

        for ($i = 0; $i < count($userArr); $i ++) {
            User::firstOrCreate($userArr[$i]);
        }
    }
}
