<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\VerifyUser;

class VerificationCleaner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:verification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean Verifications after 2 hours';

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

        $check = VerifyUser::all();

        if (count($check) >= 1) {
         VerifyUser::where('created_at', '<=', $datetime)->delete();
     } 
     else {
        VerifyUser::truncate();
    }

}
}
