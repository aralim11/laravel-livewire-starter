<?php

namespace App\Traits;

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

trait Notifications
{
    public function showNotification($title, $message, $type = 'info', $position = 'top-end')
    {
        LivewireAlert::title($title)
            ->text($message)
            ->{$type}()
            ->toast()
            ->position($position)
            ->show();
    }
}
