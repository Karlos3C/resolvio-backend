<?php

namespace App\Helpers;

use Carbon\Carbon;

class FormDateHelper
{
    public static function formatLongDate(string $date): string
    {
        //Example: martes, 25 de abril de 2023 14:30:00
        Carbon::setLocale('es');
        $carbonDate = Carbon::parse($date);
        return $carbonDate->translatedFormat('l, d \d\e F \d\e Y');
    }
}
