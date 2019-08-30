<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            "name" => "Sreenath S Das",
            "email" => "sreenathsdas@gmail.com",
            "password" => Hash::make("sree5633")
        ]);

        User::create([
            "name" => "Himanshu Martoliya",
            "email" => "h_martoliya@ongc.co.in",
            "password" => Hash::make("sree5633")
        ]);
    }
}
