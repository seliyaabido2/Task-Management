<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $template;
    public $data;
    public $subject;
    public $type;


    public function __construct($template,$data,$subject,$type)
    {
        $this->template = $template;
        $this->data     = $data;
        $this->subject  = $subject;
        $this->type     = $type;
    }
    public function handle()
    {
        $template = $this->template;
        $data = $this->data;
        $subject = $this->subject;

        if($this->type == 'api_user_register')
        {
            Mail::send($template, ['data' => $data], function ($m) use ($data,$subject){

                $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

                $m->to($data['user']['email'], $data['user']['f_name'])->subject($subject);
            });

        }
        elseif ($this->type = 'api_forgot_password')
        {
            Mail::send($template, ['data' => $data], function ($m) use ($data,$subject) {

                $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

                $m->to($data['user']['email'], $data['user']['f_name'])->subject($subject);
            });
        }
    }
}
