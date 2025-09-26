<?php

namespace App\Helpers;

use App\Models\Ticket\Ticket;
use Illuminate\Support\Str;

class GenerateFolioHelper
{
    public static function generateFolio(string $prefix = 'TCK'): string
    {
        $date_prefix = date('y') . date('m');
        $random = strtoupper(Str::random(6));
        $folio = $prefix . "-" . $date_prefix . "-" . $random;
        $exists = Ticket::where('folio', $folio)->exists();
        if ($exists) {
            return self::generateFolio();
        }
        return $folio;
    }
}
