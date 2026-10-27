<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $timestamp = now();

        DB::table('customers')->insert([
            [
                'full_name' => 'Alfea Zulueta',
                'email' => 'alfea@gmail.com',
                'phone' => '0917-111-1111',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'full_name' => 'Gwen Apuli',
                'email' => 'gwen@gmail.com',
                'phone' => '0917-222-2222',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'full_name' => 'Art Panulde',
                'email' => 'art@gmail.com',
                'phone' => '0917-333-3333',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'full_name' => 'Sheena Belarmino',
                'email' => 'sheena@gmail.com',
                'phone' => '0917-444-4444',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'full_name' => 'Aiah Arceta',
                'email' => 'aiah@gmail.com',
                'phone' => '0917-555-5555',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ]);

        DB::table('users')->insert([
            [
                'username' => 'admin',
                'full_name' => 'Maloi Ricalde',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'username' => 'cashier01',
                'full_name' => 'JL Torreliza',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'username' => 'cashier02',
                'full_name' => 'Akira Morishita',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'username' => 'manager01',
                'full_name' => 'Joy Barcoma',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'username' => 'stock01',
                'full_name' => 'Baus Rufo',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ]);
    }
}
