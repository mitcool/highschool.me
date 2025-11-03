<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function applicationFee($student_id){
        $application_fee_paid_status = 1;

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
        return redirect()->away($session->url);
    }

    public function enrollmentFee($student_id){

        $enrollment_fee_status = 2;
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'Enrollment fee',
                        ],
                        'unit_amount'  => 30000, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
             'success_url' => route('parent.update-student-status',[$enrollment_fee_status,$student_id]),
            'cancel_url'  => route('parent.student.profile'),
        ]);
        return redirect()->away($session->url);
    }

}
