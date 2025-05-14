<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use App\Services\HashServices;
use Illuminate\Support\Facades\DB;

class HashController extends Controller
{
    public function GerarHash(string $texto){        
        $hashService = new HashServices();
        return $hashService->GerarHash($texto);
    }

    public function ListarHash(){
        $hashService = new HashServices();
        if(isset($_GET["num_tentativas"])){
            $hashs = $hashService->BuscarDadosFiltro($_GET["num_tentativas"]);
        }
        else{
            $hashs = $hashService->BuscarDados();
        }
        
        
        return view('hash.index',['hashs' => $hashs]);
    }
}
