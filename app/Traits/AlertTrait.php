<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait AlertTrait
{

    function alert( $message = null, $icon = 'success', $title = 'Success')
    {
        $this->dispatch('alert', [
            'message' => $message,
            'icon' => $icon,
            'title' => $title,
        ]);


    }
}
