<?php

namespace App\Library;

use Illuminate\Http\Request;
use Spatie\HttpLogger\LogProfile;

class LogAllRequests implements LogProfile
{
    public function shouldLogRequest(Request $request): bool
    {
        // return in_array(strtolower($request->method()), ['post', 'put', 'patch', 'delete']);
        return env('APP_DEBUG', false);
    }
}
