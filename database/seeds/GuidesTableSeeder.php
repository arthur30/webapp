<?php

use Illuminate\Database\Seeder;
use App\Guide;

class GuidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Guide::class, 5)->create();
    }
}
