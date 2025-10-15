<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Newsletter;
use App\Subscriber;
use App\NewsletterSubscriber;

use App\Mail\NewsletterEmail;

class NewsletterSendController extends Controller
{
    public function send(){
        $newsetter_receivers = NewsletterSubscriber::take(50)->get();    
        
        foreach($newsetter_receivers as $receiver){
         
            $newsletter = Newsletter::with('sections')->find($receiver->newsletter_id);
            $subscriber = Subscriber::find($receiver->subscriber_id);
            $newsletter->receiver = $subscriber;
            if($subscriber->is_active == 1){
                try{
                    Mail::to($subscriber->email)->send(new NewsletterEmail($newsletter));
                }
                catch(\Exception $e){
                    info("Not sended to: ".$subscriber->email);
                    info($e->getMessage());
                    
                }
            }
           
            NewsletterSubscriber::where('newsletter_id', $newsletter->id)
                 ->where('subscriber_id',$subscriber->id)
                 ->delete();
        }
    }
}
