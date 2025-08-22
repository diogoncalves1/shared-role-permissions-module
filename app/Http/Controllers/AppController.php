<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthenticationException;

class AppController
{
    protected function allowedAction($permission)
    {
        if (auth()->user()->hasPermission($permission)) {
            throw new AuthenticationException('This action is unauthorized');
        }
    }
}
