<?php

namespace App\Interfaces;
use App\Enums\ParserEnum;

interface ParserInterface {
    
    public function parse(ParserEnum $parserEnum, array $args);

}