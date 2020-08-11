<?php

namespace App\Http\Controllers;

use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Jobs\DebitWalletJob;
use App\Jobs\CreditWalletJob;
use Illuminate\Queue\Queue;

class WalletController extends Controller
{


    public function index(){
        return Wallet::paginate();
    }


    /**
     * Credit all User's Wallet with random amount for each
     */
    public function creditWallet()
    {
            set_time_limit(0);
            dispatch(new CreditWalletJob());
    }

    /**
     * Debit all User's Wallet with random amount for each
     */
    public function debitWallet()
    {

        set_time_limit(0);
        dispatch(new DebitWalletJob());
    }


}
