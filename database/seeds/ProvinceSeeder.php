<?php

use Illuminate\Database\Seeder;

use App\Province;
class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create(['province_name'=>'khyber pakhtunkhwa']);
        Province::create(['province_name'=>'Punjab']);
        Province::create(['province_name'=>'Balochistan']);
        Province::create(['province_name'=>'Sindh']);
        
    }
}
