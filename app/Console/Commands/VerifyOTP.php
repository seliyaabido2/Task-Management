<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VerifyOTP extends Command
{
    protected $signature = 'verifyotp:cron';

    protected $description = 'OTP valid only 1 minute after generate.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        DB::beginTransaction();

        try {
            Log::info('Run VerifyOTP cron');

            $dateTime = Carbon::now()->toDateTimeString();
            $users = User::where('status',1)->where('otp_date_time','!=',null)->get();

            if(count($users) > 0)
            {

                foreach($users as $user){

                    $otp_date_time = $user->otp_date_time;
                    $newtime = date('Y-m-d H:i', strtotime('+2 minutes', strtotime($otp_date_time)));
                    
                    $dateTime = date('Y-m-d H:i', strtotime($dateTime));

                    Log::info($newtime);
                    Log::info($dateTime);
                    if($newtime == $dateTime){

                        Log::info('Run VerifyOTP cron inside');

                        $user = User::where('id',$user->id)->update([
                            'otp_date_time' => null,
                            'otp' => null,
                        ]);
                    }
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info('OTP Remove failed'. $e->getMessage());
        }

    }
}
