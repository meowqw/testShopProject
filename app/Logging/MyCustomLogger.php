<?php

namespace App\Logging;


use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;

class MyCustomLogger extends Log
{
    public function alert(string $message, $context=[]): void
    {
        // что то
    }
}
