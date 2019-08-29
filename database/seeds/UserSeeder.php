<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            'id'=>'1',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('pass1'),
            'nama'=>'Admin',
            'nik'=>'A0001',
            'jabatan'=>'admin',
            'role'=>'admin',
        ));

        DB::table('users')->insert(array(
            'id'=>'2',
            'email'=>'kepala@gmail.com',
            'password'=>bcrypt('pass2'),
            'nama'=>'M. Sufraday',
            'nik'=>'T354767',
            'jabatan'=>'General Manager',
            'role'=>'kepala',
        ));

        DB::table('users')->insert(array(
            'id'=>'3',
            'email'=>'safiravanillia@gmail.com',
            'password'=>bcrypt('pass3'),
            'nama'=>'Safira Vanillia Putri',
            'nik'=>'T444767',
            'jabatan'=>'Staff TI',
            'role'=>'pekerja',
        ));
    }
}
