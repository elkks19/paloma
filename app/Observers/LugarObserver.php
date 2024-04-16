<?php

namespace App\Observers;

use App\Models\Lugar;
use Illuminate\Support\Facades\Storage;

class LugarObserver
{
    /**
     * Handle the Lugar "created" event.
     */
    public function created(Lugar $lugar): void
    {
        Storage::makeDirectory('public/lugares/' . $lugar->nombre);
    }

    /**
     * Handle the Lugar "updated" event.
     */
    public function updated(Lugar $lugar): void
    {
        //
    }

    /**
     * Handle the Lugar "deleted" event.
     */
    public function deleted(Lugar $lugar): void
    {
        //
    }

    /**
     * Handle the Lugar "restored" event.
     */
    public function restored(Lugar $lugar): void
    {
        //
    }

    /**
     * Handle the Lugar "force deleted" event.
     */
    public function forceDeleted(Lugar $lugar): void
    {
        //
    }
}
