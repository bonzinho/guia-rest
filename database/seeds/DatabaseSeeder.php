<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'email' => 'bonzinho@fe.up.pt',
            'password' => app('hash')->make('secret')
        ]);
    }
}
