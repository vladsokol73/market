<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{

    use HasFactory;

    protected $fillable =[
        "slug",
        "title",
        "price",
        "description",
        "user_id",
        "image",
        'on_home_page',
        'on_catalog_page',
        'sorting'
    ];

    public function scopeHomePage(Builder $query) {
        $query->where('on_home_page', true)
            ->orderBy('sorting')
            ->limit(6);
    }

    public function scopeCatalogPage(Builder $query) {
        $query->where('on_catalog_page', true)
            ->orderBy('sorting');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Product $product) {
            $product->slug = $product->slug ?? str($product->title)->slug();
        });
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function baskets(): BelongsToMany
    {
        return $this->belongsToMany(Basket::class);
    }
}
