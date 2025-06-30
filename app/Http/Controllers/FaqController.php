<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faq = [
            ['q' => 'Bagaimana saya melaporkan kehilangan barang ?', 'a' => 'Klik tombol "Lapor" pada side bar , pilih "Lapor Kehilangan Barang" , isi dan lengkapi formulir lalu submit'],
            ['q' => 'Bagaimana saya melaporkan penemuan barang ?', 'a' => 'Klik tombol "Lapor" pada side bar , pilih "Lapor penemuan Barang" , isi dan lengkapi formulir lalu submit'],
            ['q' => 'Bagaimana saya mengkalim barang hilang saya ?', 'a' => 'Hubungi kontak yang tersedia pada halaman detail barang'],
            ['q' => 'Bagaimana saya mengajukan pertanyaan dan melaporkan bug atau keluhan terkait aplikasi ?', 'a' => 'Klik tombol "komplain" pada sidebar , isi dan lengkapi form lalu submit'],
            ['q' => 'Bagaimana saya mengubah profil akun saya ? ', 'a' => 'Klik gambar profil di kanan atas halaman lalu ubah detail akun dan save'],
        ];

        return view('faq.faq', compact('faq'));
    }
}
