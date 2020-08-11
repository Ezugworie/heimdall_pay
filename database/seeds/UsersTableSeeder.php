<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run this database seeds
     *
     * @return void
     */
    public function run()
    {
        //create 1000 users with wallets each
        factory(App\User::class, 50000)->create()->each(function ($user){
            //seed the relation with one wallet
            $wallet = factory(App\Wallet::class)->make();
            $user->wallet()->save($wallet);
        });
    }
}
