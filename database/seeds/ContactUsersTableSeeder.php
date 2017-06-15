<?php

use Illuminate\Database\Seeder;
use App\ContactUser;

class ContactUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ContactUser::class, 5)->create();
    }
}
