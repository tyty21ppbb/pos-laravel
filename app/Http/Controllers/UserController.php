<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = [
            [
                'id'        => 1,
                'username'  => 'admin',
                'full_name' => 'Maloi Ricaldre',
                'role'      => 'Administrator',
            ],
            [
                'id'        => 2,
                'username'  => 'cashier01',
                'full_name' => 'JL Torreliza',
                'role'      => 'Cashier',
            ],
            [
                'id'        => 3,
                'username'  => 'cashier02',
                'full_name' => 'Akira Morishita',
                'role'      => 'Cashier',
            ],
            [
                'id'        => 4,
                'username'  => 'manager01',
                'full_name' => 'Joy Barcoma',
                'role'      => 'Manager',
            ],
            [
                'id'        => 5,
                'username'  => 'stock01',
                'full_name' => 'Baus Rufo',
                'role'      => 'Stock Clerk',
            ],
        ];

        return view('users', [
            'title' => 'User Accounts',
            'users' => $users,
        ]);
    }
}