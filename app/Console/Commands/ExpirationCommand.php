<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ExpirationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //code refactoring , run only 1 sql
         User::where('expired', '=', 0)
         ->update(['expired' => 1]);
        // //get all users with expired = 0
        // $users = User::where('expired', '=', 0)->get();
        // // update each expired = 0 to expired =1 (as inactive)
        // foreach($users as $user) {
        //     $user->update([
        //         'expired' => 1,
        //     ]);
        // }
    }
}
