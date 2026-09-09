<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Customers extends BaseController
{
    public function index()
    {
        $customers = [
            [
                'full_name' => 'Maria Santos',
                'email'     => 'maria.santos@example.com',
                'phone'     => '0917-123-4567',
            ],
            [
                'full_name' => 'Juan Dela Cruz',
                'email'     => 'juan.delacruz@example.com',
                'phone'     => '0918-234-5678',
            ],
            [
                'full_name' => 'Angela Reyes',
                'email'     => 'angela.reyes@example.com',
                'phone'     => '0919-345-6789',
            ],
            [
                'full_name' => 'Paolo Garcia',
                'email'     => 'paolo.garcia@example.com',
                'phone'     => '0920-456-7890',
            ],
            [
                'full_name' => 'Nicole Mendoza',
                'email'     => 'nicole.mendoza@example.com',
                'phone'     => '0921-567-8901',
            ],
        ];

        return view('customers', ['customers' => $customers]);
    }
}
