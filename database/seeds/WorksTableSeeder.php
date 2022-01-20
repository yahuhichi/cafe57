<?php

use Illuminate\Database\Seeder;
use App\Work;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Work::class, 5)->create();
    }
}
