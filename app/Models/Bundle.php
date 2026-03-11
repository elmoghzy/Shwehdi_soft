<?php

namespace App\Models;

use App\Models\Concerns\ConvertsImagesToWebp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bundle extends Model
{
    use ConvertsImagesToWebp, HasFactory;

    protected array $webpImageFields = ['image'];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity');
    }
}
