<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DanaController extends Controller
{
    // public function kampung()
    // {
    // 	return view('danasosial/kampung/kampung');
    // }
    // public function koramil()
    // {
    // 	return view('danasosial/koramil/koramil');
    // }
    // public function masjid()
    // {
    // 	return view('danasosial/masjid/masjid');
    // }
    // public function polsek()
    // {
    // 	return view('danasosial/polsek/polsek');
    // }
    // public function sumbangan()
    // {
    // 	return view('danasosial/sumbangan/sumbangan');
    // }
    public function danasosial()
    {
     return view('danasosial/danasosial');
    }
}
