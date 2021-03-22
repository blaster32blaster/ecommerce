<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Traits\HasCsv;
use Illuminate\Database\Seeder;

class SeedOrderData extends Seeder
{
    use HasCsv;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = storage_path('data/orders.csv');
        $orderArr = $this->convert($file);

        for ($i = 0; $i < count($orderArr); $i ++) {
            Order::firstOrCreate($orderArr[$i]);
        }
    }
}
