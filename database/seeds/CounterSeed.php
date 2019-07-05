<?php

use Illuminate\Database\Seeder;

class CounterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auto_increment')->insert([
            [ 'category' => 'files', 'counter' => 0 ],
            [ 'category' => 'general', 'counter' => 0 ],
            [ 'category' => 'govt_letters', 'counter' => 0 ],
            [ 'category' => 'cmd_office_correspondence', 'counter' => 0 ],
            [ 'category' => 'disha_file', 'counter' => 0 ],
        ]);
    }
}
