<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\HashServices;


class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bnf:test {texto} {--requests=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $texto = $this->argument('texto'); 
        $requests = $this->option('requests');
            
        if (!$texto) {                     
            $this->error('Texto não informado!'); 
            return Command::FAILURE;  
        }
         if (!$requests) {                     
            $this->error('Quantidade de requisições não informado!'); 
            return Command::FAILURE;  
        }
        
        $hashService = new HashServices();

        while($requests>0){            
            $requests--;
            $texto = $hashService->GerarHash($texto);            
        }
    }

  
}