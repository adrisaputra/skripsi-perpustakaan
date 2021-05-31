<?php

namespace App\Http\Controllers;

use App\Models\Buku;   //nama model
use App\Models\Anggota;   //nama model
use App\Models\user;   //nama model
use App\Models\Slider;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
		$buku = Buku::count();
		$anggota = Anggota::count();
		$user = user::count();
		$slider = Slider::get();
        return view('admin.beranda', compact('buku','anggota','user','slider'));
    }
}
