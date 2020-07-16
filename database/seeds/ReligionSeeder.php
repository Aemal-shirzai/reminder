<?php

use App\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religions= ["Islam", "Chirstian", "Hindo", "Booda"];
        foreach($religions as $rel) {
            Religion::create(["name"=>$rel]);
        }
       
    }
}
