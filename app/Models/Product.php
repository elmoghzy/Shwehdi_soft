<?php

namespace App\Models;

use App\Models\Concerns\ConvertsImagesToWebp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use ConvertsImagesToWebp, HasFactory;

    protected array $webpImageFields = ['main_image'];

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'description',
        'specs',
        'price',
        'is_in_stock',
        'main_image',
    ];

    protected function casts(): array
    {
        return [
            'specs' => 'array',
            'is_in_stock' => 'boolean',
            'price' => 'decimal:2',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function bundles(): BelongsToMany
    {
        return $this->belongsToMany(Bundle::class)
            ->withPivot('quantity');
    }
}
