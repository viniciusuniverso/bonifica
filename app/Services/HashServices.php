<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class HashServices 
{
    public function GerarHash(string $texto){        
        $key = "";
        $inicio ="";
        $retorno = "";
        $quantidadeTentetivas = 0;
        while($inicio!=="0000"){
            $key = rand(0, 99999999);
            $retorno = md5($texto.$key);
            $inicio = substr($retorno,0,4);           
            $quantidadeTentetivas++;
        }                                                                                                                                      
        $this->InserirInformacoes($texto, $key, $retorno, $quantidadeTentetivas);

        return $retorno;
    }

    public function InserirInformacoes($stringEntrada, $chave, $hash, $tentativas){             
        
        DB::insert('insert into hash (data, string_entrada,chave,hash_gerado,tentativas) values (?,?,?,?,?)', [ date("Y-m-d H:i:s"), $stringEntrada,$chave,$hash, $tentativas]);
    
    }

    public function BuscarDados(){
        return DB::table('hash')->simplePaginate(20);
    }

    public function BuscarDadosFiltro($numeroTentativas){
        return DB::table('hash')->where('tentativas', '<',$numeroTentativas)->simplePaginate(20)->withQueryString();        
    }

    
}
