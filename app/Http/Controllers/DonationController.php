<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Menampilkan halaman donasi.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('donation.index');
    }
}
