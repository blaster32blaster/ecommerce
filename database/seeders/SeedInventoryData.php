<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Traits\HasCsv;
use Illuminate\Database\Seeder;

class SeedInventoryData extends Seeder
{
    use HasCsv;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = storage_path('data/inventory.csv');
        $inventoryArr = $this->convert($file);

        for ($i = 0; $i < count($inventoryArr); $i ++) {
            Inventory::firstOrCreate($inventoryArr[$i]);
        }
    }
}
