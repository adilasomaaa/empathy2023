<?php

namespace Database\Seeders;

use App\Models\Operator;
use App\Models\Rumah_sakit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'operator',
            'email' => 'operator@app.id',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('operator');

        $rs = Rumah_sakit::create([
            'nama' => 'Rumah sakit 1',
            'lokasi' => 'jl. cendana',
            'lat' => '0.5769006147053415',
            'lng' => '123.05885910987854',
        ]);

        Operator::create([
            'user_id' => $user->id,
            'rumah_sakit_id' => $rs->id,
            'nama' => 'Operator 1',
            'alamat' => 'jl. cendana',
            'jk' => 'l',
            'nohp' => '0989886856865',
        ]);
    }
}
