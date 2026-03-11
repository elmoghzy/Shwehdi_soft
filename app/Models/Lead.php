<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    public const STATUS_NEW = 'new';
    public const STATUS_CONTACTED = 'contacted';
    public const STATUS_SOLD = 'sold';

    protected $fillable = [
        'client_name',
        'phone',
        'interested_in',
        'status',
        'notes',
    ];

    public static function statusOptions(): array
    {
        return [
            self::STATUS_NEW => 'جديد',
            self::STATUS_CONTACTED => 'تم التواصل',
            self::STATUS_SOLD => 'تم البيع',
        ];
    }
}
