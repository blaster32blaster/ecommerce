<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Traits\HasCsv;
use Illuminate\Database\Seeder;

class SeedProductData extends Seeder
{
    use HasCsv;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = storage_path('data/products.csv');
        $productArr = $this->convert($file);

        for ($i = 0; $i < count($productArr); $i ++) {
            Products::firstOrCreate($productArr[$i]);
        }
    }
}
