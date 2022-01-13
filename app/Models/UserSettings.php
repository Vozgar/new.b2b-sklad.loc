<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    use HasFactory;

    public static function getLocale()
    {
        $user = auth()->user();
        $record = UserSettings::where(['customer_id' => $user->customer_code])->firstOrCreate();
        $locale = $record->language;
        return $locale;
    }
}