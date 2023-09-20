<?php

namespace App\Http\Controllers;

use App\Models\WebhookLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FindyMailController extends Controller
{
    public function __invoke()
    {
        header('Content-Type: application/json');

        $request = file_get_contents('php://input');
        $payload = json_decode($request, true)['data'];

        Log::info('Received Findymail webhook.', $payload);

        WebhookLog::create(['name' => 'Findymail', 'data' => $request]);
    }
}
