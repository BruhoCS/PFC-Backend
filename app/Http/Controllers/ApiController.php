<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function chatEntreno()
    {
        $client = new Client();

        $response = $client->request('POST', 'https://chatgpt-42.p.rapidapi.com/o3mini', [
            'body' => '{"messages":[{"role":"user","content":"Indica una rutina para gimnasio con pesas"}],"web_access":false}',
            'headers' => [
                'Content-Type' => 'application/json',
                'x-rapidapi-host' => 'chatgpt-42.p.rapidapi.com',
                'x-rapidapi-key' => '33776f2055msh7a9a0f9f967ad8cp16a06bjsne6904df90398',
            ],
        ]);

        $respuestas = json_decode($response->getBody());
        return view('chatEntreno', ['respuestas' => $respuestas]);
    }
}
