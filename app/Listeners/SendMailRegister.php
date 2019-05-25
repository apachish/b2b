<?php

namespace App\Listeners;

use App\Mail\TemplateMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailRegister
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        $email = TemplateMail::where('email_section', 'Registration')->where('status', 1)->first();
        if ($email)
        {
            if($event->locale=='fa')
            {
                $subject = $email->subject_fa;
                $content = $email->content_fa;
            }else{
                $subject = $email->subject;
                $content = $email->content;
            }
            foreach ($event->data as $key=>$value){
                if(is_array($value)){
                    foreach ($value as $key_item=>$array_value){
                        $content = str_replace('{'.$key.'['.$key_item.']}',$array_value,$content);
                        $subject = str_replace('{'.$key.'['.$key_item.']}',$array_value,$subject);
                    }

                }else{
                    $content = str_replace('{'.$key.'}',$value,$content);
                    $subject = str_replace('{'.$key.'}',$value,$subject);
                }


            }

            Mail::to($event->user)->locale($event->locale)->subject($subject)
                ->send(new TemplateMail($content));
        }
    }
}
