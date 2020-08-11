<?php

namespace App\Jobs;

use App\Wallet;

class CreditWalletJob extends Job
{

    /**
     * The number of seconds the job can run before timing out
     * @var int
     */
    public $timeout = 120;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function handle()
    {
        $wallet = $this->getAllUserWallet();
        foreach ($wallet as $wallet_account) {
            // array_push($response, "$key");
            $wallet_account->account_balance += $this->generateRandomAmount();

            // array_push($response, $balances);
            $wallet_account->save();
        }
    }

    /**
     * Fetch all User's Wallet
     */
    protected function getAllUserWallet()
    {
        $wallet = Wallet::all();
        return $wallet;
    }

    protected function generateRandomAmount(){
       $randAmount = rand(1000, 50000);
       return $randAmount;
     }
}
