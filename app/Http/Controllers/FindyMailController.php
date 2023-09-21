<?php

namespace App\Http\Controllers;

use App\Models\WebhookLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FindyMailController extends Controller
{
    public function __invoke()
    {
        $request = file_get_contents('php://input');
        $payload = json_decode($request, true);

        WebhookLog::create(['name' => 'Findymail', 'data' => $payload]);
    }
}
