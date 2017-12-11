<?php

namespace App\Observers;

use App\Entities\CalonDaerahPemasaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CalonDaerahObserver
{
    public function creating(CalonDaerahPemasaran $pesanan)
    {
        $pesanan->pegawai_id = Auth::user()->id;
    }
}
