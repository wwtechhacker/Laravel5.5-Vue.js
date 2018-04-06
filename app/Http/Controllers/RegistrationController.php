<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function submit(Request $request) {
        $this->validate($request, [
            //enter required fields
        ]);

        dd($request->all());

        return 'SUCCESS';
    }
}
