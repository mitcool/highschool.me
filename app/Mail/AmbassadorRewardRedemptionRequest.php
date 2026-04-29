<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AmbassadorRewardRedemptionRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $rewardItems;
    public $pointsRequired;
    public $pointsBalance;
    public $adminName;
    public $adminPortalUrl;

    public function __construct($order, $rewardItems, $pointsRequired, $pointsBalance, $adminName = 'Admin')
    {
        $this->order = $order;
        $this->rewardItems = $rewardItems;
        $this->pointsRequired = $pointsRequired;
        $this->pointsBalance = $pointsBalance;
        $this->adminName = $adminName;
        $this->adminPortalUrl = route('login');
    }

    public function build()
    {
        return $this->view('email.ambassador-reward-redemption-request')
            ->subject('Ambassador Reward Redemption Request - ' . $this->order->user->name . ' ' . $this->order->user->surname . ' - Action Required');
    }
}
