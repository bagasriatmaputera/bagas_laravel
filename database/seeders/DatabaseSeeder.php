<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rekening;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name'     => 'Nanang',
            'email'    => 'nanang@gmail.com',
            'password' => bcrypt('nanang123'),
        ]);
        
        User::create([
            'name'     => 'Mecca',
            'email'    => 'mecca@gmail.com',
            'password' => bcrypt('mecca123'),
        ]);
        
        Rekening::create([
            'namaRekening' => 'Kas',
            'saldoAwal'    => 100000,
        ]);
        
        Rekening::create([
            'namaRekening' => 'Bank',
            'saldoAwal'    => 100000,
        ]);
        
    }
}
