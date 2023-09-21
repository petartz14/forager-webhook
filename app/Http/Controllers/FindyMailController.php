<?php

namespace App\Http\Controllers;

use App\Models\WebhookLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FindyMailController extends Controller
{
    public function __invoke()
    {
        WebhookLog::create(['name' => 'Findymail-1', 'data' => ['name' => 'test']]);

        $request = file_get_contents('php://input');

        WebhookLog::create(['name' => 'Findymail', 'data' => ['data' => $request]]);

        $payload = json_decode($request, true);

        WebhookLog::create(['name' => 'Findymail', 'data' => $payload]);
    }
}
