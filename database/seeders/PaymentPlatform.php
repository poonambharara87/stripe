<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\payment_platform;

class PaymentPlatform extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentPlatforms =   
        [
            [
                'name' => 'Paypal',
                'image' => 'img/payment-platform/paypal.jpg'
            ],
            [
                'name' => 'Stripe',
                'image' => 'img/payment-platform/stripe.jpg'
            ]
            ];
        payment_platform::create($paymentPlatforms);
    }   
}
