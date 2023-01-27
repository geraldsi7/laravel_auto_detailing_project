<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\PasswordReset; 

class CleanPasswordReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:resetpassword';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean Reset Passwords after 2 hours';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $datetime = \Carbon\Carbon::now()->subHours(2)->format("Y-m-d H:i:s");

            $check = PasswordReset::all();

        if (count($check) >= 1) {
         PasswordReset::where('created_at', '<=', $datetime)->delete();
     } 
     else {
        PasswordReset::truncate();
    }
    }
}
