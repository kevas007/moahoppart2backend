<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
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

            DB::table('profils')->insert([
            'firstname' => $value->firstname,
            'lastname' => $value->lastname,
            'user_id' => $value->id,
            'picture_path' => $value->picture,
            ]);
      }
    }
}
