<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;
use App\Invoice;
use Carbon\Carbon;

class PaymentController extends Controller
{
    
    public function applicationFee($student_id){
        $application_fee_paid_status = 0;
        $invoice_description = 'Application fee';
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $amount = 10000;
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => $invoice_description,
                        ],
                        'unit_amount'  =>  $amount, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('parent.update-student-status',[$application_fee_paid_status,$student_id,$invoice_description,$amount]),
            'cancel_url'  => route('parent.create.student'),
        ]);
      
        return redirect()->away($session->url);
    }

    public function enrollmentFee($student_id,$plan_id,$payment_type){

        $enrollment_fee = 30000;
        $plan = Plan::find($plan_id);
        $plan_price = $payment_type == 0 ? $plan->price_per_month : $plan->price_per_year;
        $period = $payment_type == 0 ? 'per month' : 'per year';
        $amount = $plan_price + $enrollment_fee;
        $enrollment_fee_status = 2;
        $invoice_description = 'Enrollment fee and '.$plan->name. ' package ('. $period .')';
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => $invoice_description,
                        ],
                        'unit_amount'  => $amount, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('parent.update-student-status',[$enrollment_fee_status,$student_id,$invoice_description,$amount,$payment_type]),
            'cancel_url'  => route('parent.student.profile',$plan_id),
        ]);
        
        return redirect()->away($session->url);
    }

}
