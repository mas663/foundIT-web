<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faq = [
            ['q' => 'Bagaimana saya melaporkan kehilangan barang?', 'a' => 'Klik menu lapor pada side bar, kemudian pilih opsi "Lapor Kehilangan Barang", isi formulir dengan lengkap dan submit'],
            ['q' => 'Bagaimana saya melaporkan penemuan barang?', 'a' => 'Klik menu lapor pada side bar, kemudian pilih opsi "Lapor penemuan Barang", isi formulir dengan lengkap dan submit'],
            ['q' => 'Bagaimana saya mengklaim barang hilang saya?', 'a' => 'Hubungi kontak yang tersedia pada halaman detail barang'],
            ['q' => 'Bagaimana saya mengajukan pertanyaan dan melaporkan bug atau keluhan terkait aplikasi?', 'a' => 'Klik menu komplain pada sidebar, isi formulir dengan lengkap dan submit'],
            ['q' => 'Bagaimana saya mengubah profil akun saya? ', 'a' => 'Klik gambar profil di kanan atas halaman, kemudian ubah detail akun yang tersedia dan save'],
        ];

        return view('faq.faq', compact('faq'));
    }
}
