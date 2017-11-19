<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
        $this->call(PengurusTableSeeder::class);
//        $this->call(OrdersTableSeeder::class);
//        $this->call(JenisRecordersTableSeeder::class);
//        $this->call(OrderRecordersTableSeeder::class);
//        $this->call(KerusakanStudiosTableSeeder::class);
//        $this->call(StudiosTableSeeder::class);
//        $this->call(JenisAlatsTableSeeder::class);
//        $this->call(NewInstsTableSeeder::class);
        $this->call(\App\JamOrder::class);
    }
}
