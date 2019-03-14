<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function a_3bottomline()
    {
    	return view('keuangan/a_3bottomline/a_3bottomline');
    }
    public function a_cashflow()
    {
    	return view('keuangan/a_cashflow/a_cashflow');
    }
    public function a_commonsize()
    {
    	return view('keuangan/a_commonsize/a_commonsize');
    }
    public function a_net()
    {
    	return view('keuangan/a_net/a_net');
    }
    public function a_pertumbuhanaset()
    {
    	return view('keuangan/a_pertumbuhanaset/a_pertumbuhanaset');
    }
    public function a_progress()
    {
    	return view('keuangan/a_progress/a_progress');
    }
    public function a_rasiokeuangan()
    {
    	return view('keuangan/a_rasiokeuangan/a_rasiokeuangan');
    }
    public function a_roe()
    {
    	return view('keuangan/a_roe/a_roe');
    }
    public function laporaninputtransaksi()
    {
    	return view('keuangan/laporaninputtransaksi/laporaninputtransaksi');
    }
    public function laporankeuangan()
    {
    	return view('keuangan/laporankeuangan/laporankeuangan');
    }
    public function inputtransaksikas()
    {
    	return view('keuangan/prosesinputtransaksi/inputtransaksikas');
    }
    public function inputtransaksibank()
    {
        return view('keuangan/prosesinputtransaksi/inputtransaksibank');
    }
    public function inputtransaksimemorial()
    {
        return view('keuangan/prosesinputtransaksi/inputtransaksimemorial');
    }        
    public function pilih_prosesinputtransaksi()
    {
        return view('keuangan/prosesinputtransaksi/pilih_prosesinputtransaksi');
    }    
    public function analisa()
    {
        return view('keuangan/analisa/analisa');
    }
    public function jurnal()
    {
        return view('modul_keuangan.laporan.jurnal.index');
    }    
    public function buku_besar()
    {
        return view('modul_keuangan.laporan.buku_besar.index');
    }    
    public function neraca_saldo()
    {
        return view('modul_keuangan.laporan.neraca_saldo.index');
    }    
    public function neraca()
    {
        return view('modul_keuangan.laporan.neraca.index');
    }    
    public function laba_rugi()
    {
        return view('modul_keuangan.laporan.laba_rugi.index');
    }    
    public function arus_kas()
    {
        return view('modul_keuangan.laporan.arus_kas.index');
    }    

    public function net_profit_ocf()
    {
        return view('modul_keuangan.analisa.net_profit_ocf.index');
    }  
    public function hutang_piutang()
    {
        return view('modul_keuangan.analisa.hutang_piutang.index');
    }  
    public function pertumbuhan_aset()
    {
        return view('modul_keuangan.analisa.pertumbuhan_aset.index');
    }  
    public function aset_ekuitas()
    {
        return view('modul_keuangan.analisa.aset_ekuitas.index');
    }              

}
