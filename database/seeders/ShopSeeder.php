<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::all();
        foreach ($user as  $value) {
            $userName = $value->firstname . ' ' . $value->lastname;
            DB::table('shops')->insert(
                [
                    'name' => $userName,
                    'user_id' => $value->id,
                ]
            );

        }
    }
}
