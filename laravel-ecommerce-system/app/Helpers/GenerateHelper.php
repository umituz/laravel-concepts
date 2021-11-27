<?php

namespace App\Helpers;

class GenerateHelper
{
    /**
     * @return string
     */
    public static function randomInvoiceId(): string
    {
        return time() . rand(1000,9999);
    }
}
