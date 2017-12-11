<?php

namespace App\Observers;

use App\Entities\Pesanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PesananObserver
{
    public function creating(Pesanan $pesanan)
    {
        $pesanan->tanggal = Carbon::now();
        $pesanan->pegawai_id = Auth::user()->id;
    }
}
