<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

class ConsumirApiController extends Controller
{
    public function getPhotos(Request $request){
        //Utilizo Guzzle, que es un cliente PHP HTTP que facilita el envío de solicitudes HTTP y simplifica la integración con los servicios web.
        $clientPhotos = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com/',
            'headers' => [
                'Content-type' => 'application/json; charset=UTF-8',
                'Accept' => 'application/json',
            ],
        ]);

        //hacemos el request
        $responsePhotos = $clientPhotos->request('GET', 'photoss', ['http_errors' => false]);

        //consultamos por el status del request, si es 200 guardamos los datos, sino devolvemos mensaje de error
        if($responsePhotos->getStatusCode() == 200){
            $respuestaPhotos = json_decode($responsePhotos->getBody()->getContents(), true);
            //recoremos los datos obtenidos y los almacenamos en la base de datos
            foreach($respuestaPhotos as $item){
                DB::table('photos')->insert([
                    [
                        'albumId' => $item['albumId'],
                        'id' => $item['id'],
                        'title' => $item['title'],
                        'url' => $item['url'],
                        'thumbnailUrl' => $item['thumbnailUrl']
                    ]
                ]);
            }
            //devolvemos ensaje de exito
            return response()->json([
                'res' => true,
                'message' => 'Registros guardados correctamente'
            ], 200);
        }
        else{
            //devolvemos mensaje de error
            return response()->json([
                'res' => true,
                'message' => 'Error al obtener los datos'
            ], 200);
        }  
    }
}
