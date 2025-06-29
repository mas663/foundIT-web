<?php

namespace App\Http\Controllers;

// Pastikan semua model dan facade yang dibutuhkan sudah di-import
use App\Models\User;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use Illuminate\Routing\Controller as BaseController;

class ComplaintController extends BaseController
{
    /**
     * Middleware untuk memastikan hanya user yang sudah login yang bisa mengakses.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan halaman formulir komplain.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('complaint.create');
    }

    /**
     * Menyimpan data komplain baru dari formulir.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'screenshot' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return redirect()->route('complaint.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $screenshotPath = null;
        if ($request->hasFile('screenshot')) {
            $screenshotPath = $request->file('screenshot')->store('screenshots', 'public');
        }

        $user = Auth::user();

        Complaint::create([
            'subject' => $request->subject,
            'message' => $request->message,
            'screenshot' => $screenshotPath,
            'user_id' => $user->id,
            'email' => $user->email,
            'status' => 'pending',
        ]);

        return redirect()->route('complaint.create')
                         ->with('success', 'Saran berhasil dikirim!');
    }
}
