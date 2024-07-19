<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Enums\ParserEnum;
use App\Interfaces\ParserInterface;

class Parser implements ParserInterface{
    
    public function parse(ParserEnum $parserEnum, array $args){
        
        return $response = Http::get(
            $parserEnum->value, 
            $parserEnum->getArgs($args)
        );
    }
}