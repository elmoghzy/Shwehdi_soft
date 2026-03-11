<?php

namespace App\Models;

use App\Models\Concerns\ConvertsImagesToWebp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use ConvertsImagesToWebp, HasFactory;

    protected array $webpImageFields = ['image'];

    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
