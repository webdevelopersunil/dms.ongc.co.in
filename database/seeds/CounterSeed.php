<?php

use App\User;
use App\Category;
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

        // DB::table('auto_increment')->insert([
        //     ['category' => Category::create(["cm_code" => "001", "cm_name" => "govt"]), 'counter' => 0],
        //     ['category' => Category::create(["cm_code" => "002", "cm_name" => "cmd"]), 'counter' => 0],
        //     ['category' => Category::create(["cm_code" => "003", "cm_name" => "general"]), 'counter' => 0],
        //     ['category' => Category::create(["cm_code" => "004", "cm_name" => "file"]), 'counter' => 0],
        //     ['category' => Category::create(["cm_code" => "005", "cm_name" => "misc"]), 'counter' => 0],
        // ]);

        // Category::create(["cm_code" => "001", "cm_name" => "govt", "counter" => 1]);
        // Category::create(["cm_code" => "002", "cm_name" => "cmd", "counter" => 1]);
        // Category::create(["cm_code" => "003", "cm_name" => "general", "counter" => 1]);
        // Category::create(["cm_code" => "004", "cm_name" => "files", "counter" => 1]);
        // Category::create(["cm_code" => "005", "cm_name" => "misc", "counter" => 1]);

        Category::create([
            'cm_name' => 'govt',
            'cm_diaryno' => 1,
            'cm_folder' => 'Govtletters',
            'cm_IsInUse' => false,
            'cm_UsedBy' => null
        ]);

        User::create([
            "name" => "Sreenath S Das",
            "username" => "sree",
            "email" => "sreenathsdas@gmail.com",
            "password" => Hash::make("sree5633")
        ]);

        User::create([
            "name" => "Himanshu Martoliya",
            "username" => "himanshu",
            "email" => "h_martoliya@ongc.co.in",
            "password" => Hash::make("sree5633")
        ]);
    }
}
