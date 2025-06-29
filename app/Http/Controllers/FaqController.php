<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faq = [
            ['q' => 'How to report a lost item?', 'a' => 'Click on the "Lapor" tab and fill out the form.'],
            ['q' => 'How to edit my profile?', 'a' => 'Go to the profile page from the top-right icon.'],
            ['q' => 'Can I message item finders?', 'a' => 'Yes, you can send messages using the "Pesan" menu.'],
        ];

        return view('faq.faq', compact('faq'));
    }
}
