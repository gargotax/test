<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getName(User $user)
    {
        return $user;
    }

    public function setName(Request $request, User $user)
    {
        $name = $request->input('name');

        if(!$name)
            return 'name not specified';

        $user->name = $name;
        $user->save();

        return $user;
    }


}
