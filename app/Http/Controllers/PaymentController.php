<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;
use App\Invoice;
use App\ParentStudent;

use Carbon\Carbon;
use App\Mail\StudentCreated;
use App\Mail\StudentCredentials;
use App\Mail\StudentCreatedAdmin;

use Mail;

class PaymentController extends Controller
{
    
   

    public function enrollmentFee($student_id,$plan_id,$payment_type){

        $enrollment_fee = 300;
        $plan = Plan::find($plan_id);
        $plan_price = $payment_type == 0 ? $plan->price_per_month : $plan->price_per_year;
        $period = $payment_type == 0 ? 'per month' : 'per year';
        $amount = $plan_price + $enrollment_fee;
        $enrollment_fee_status = 2;
        $invoice_description = 'Enrollment fee and '.$plan->name. ' package ('. $period .')';

        $student_data = [
            'student_id' => $student_id,
            'status' => $enrollment_fee_status,
            'plan_id' => $plan_id,
            'payment_type' => $payment_type //montly => 0 , yearly => 1
        ];
        $invoice_data = [
            'description' => $invoice_description,
            'amount' => $amount
        ];

        session()->put('student_data',$student_data);
        session()->put('invoice_data',$invoice_data);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => $invoice_description,
                        ],
                        'unit_amount'  => $amount*100, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('parent.update-student-status'),
            'cancel_url'  => route('parent.student.profile',$plan_id),
        ]);
        
        return redirect()->away($session->url);
    }

}
