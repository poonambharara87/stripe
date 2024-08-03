<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class Curruncies extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $currencies = [
            'usd',
            'eur',
            'gbp'
        ];

        foreach($currencies as $currency)
        {
            Currency::create([
                'iso' => $currencies
            ]);
        }
        
    }
}
