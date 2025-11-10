<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;
use App\Invoice;

class PaymentController extends Controller
{
    private function setInvoiceNumber(){
    	$next_invoice = Invoice::count() == 0 ? 1 : Invoice::count() + 1;
        $numlength = strlen((string)$next_invoice);
    	$invoice_number = '01';
       
        for ($i = 3; $i <= (10 - $numlength); $i++) {
            $invoice_number .= '0';
        }
        $invoice_number .= $next_invoice;
    	return $invoice_number;
    }
    public function applicationFee($student_id){
        $application_fee_paid_status = 0;

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'Application fee',
                        ],
                        'unit_amount'  => 10000, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('parent.update-student-status',[$application_fee_paid_status,$student_id]),
            'cancel_url'  => route('parent.create.student'),
        ]);
        // Invoice::insert([
        //     'invoice_number' => $this->setInvoiceNumber,
        //     'user_email' => auth()->email,
        //     'price' => 10000,
        //     'VAT_number' => ,
        //     'name' => auth()->name ,
        //     'created_at' => Carbon::now() ,
        //     'surname' => ,
        //     'street' => ,
        //     'street_number' => ,
        //     'city' => ,
        //     'ZIPcode' => ,
        //     'company_name' => ,
        //     'order_id' => ,
        // ]);
        return redirect()->away($session->url);
    }

    public function enrollmentFee($student_id,$plan_id,$payment_type){

        $enrollment_fee = 30000;
        $plan = Plan::find($plan_id);
        $plan_price = $payment_type == 0 ? $plan->price_per_month : $plan->price_per_year;
        $period = $payment_type == 0 ? 'per month' : 'per year';
        $amount = $plan_price + $enrollment_fee;
        $enrollment_fee_status = 2;
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'Enrollment fee and '.$plan->name. ' package ('. $period .')',
                        ],
                        'unit_amount'  => $amount, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('parent.update-student-status',[$enrollment_fee_status,$student_id,$payment_type]),
            'cancel_url'  => route('parent.student.profile',$plan_id),
        ]);
        
        return redirect()->away($session->url);
    }

   

}
