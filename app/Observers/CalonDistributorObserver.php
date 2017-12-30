<?php

namespace App\Observers;

use App\Entities\CalonDistributor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CalonDistributorObserver
{
    public function creating(CalonDistributor $distributor)
    {
        $distributor->pegawai_id = Auth::user()->id;
    }
}
