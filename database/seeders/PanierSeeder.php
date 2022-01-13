<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PanierSeeder extends Seeder
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
            DB::table('paniers')->insert(
                [
                    'users_id' => $value->id,
                ]
            );

        }
    }
}
