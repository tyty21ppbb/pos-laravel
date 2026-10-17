<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = [
            [
                'id'        => 1,
                'full_name' => 'Alfea Zulueta',
                'email'     => 'alfea@gmail.com',
                'phone'     => '0917-111-1111',
            ],
            [
                'id'        => 2,
                'full_name' => 'Gwen Apuli',
                'email'     => 'gwen@gmail.com',
                'phone'     => '0917-222-2222',
            ],
            [
                'id'        => 3,
                'full_name' => 'Art Panulde',
                'email'     => 'art@gmail.com',
                'phone'     => '0917-333-3333',
            ],
            [
                'id'        => 4,
                'full_name' => 'Sheena Belarmino',
                'email'     => 'sheena@gmail.com',
                'phone'     => '0917-444-4444',
            ],
            [
                'id'        => 5,
                'full_name' => 'Aiah Arceta',
                'email'     => 'aiah@gmail.com',
                'phone'     => '0917-555-5555',
            ],
        ];

        return view('customers', [
            'title'     => 'Customer Accounts',
            'customers' => $customers,
        ]);
    }
}