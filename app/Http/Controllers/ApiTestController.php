<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiTestController extends Controller
{
    public function validateUser(Request $request, User $user)
    {
        if ($user instanceof User) {
            $result = Http::post('http://node:3000/validate/email', ['email' => $user->email, 'user' => ['email' => $user->email, 'name' => $user->name]]);
            $jsonResponse = $result->json();
            dd($jsonResponse['isValid']);
        }

    }
}
