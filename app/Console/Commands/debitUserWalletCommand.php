<?php

namespace App\Console\Commands;

use App\User;
use App\Wallet;
use Exception;
use Faker\Generator as Faker;
use Illuminate\Console\Command;

class debitUserWalletCommand extends Command
{
    /**
     * The console command name to debit user's wallet
     */
    protected $name = 'debit:user';

    /**
     * The console command description
     */
    protected $description = "Debit a random user's wallet account with a random amount";

    /**
     * Execute the console command
     */
    public function handle(Faker $faker)
    {
        try{
            $user_id = $faker->
            $userWallet = Wallet::findOrFail($user_id);

        }catch(Exception $e){

        }
    }
}
