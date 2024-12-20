<?php

namespace App\Models;

use App\Observers\BlogObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(BlogObserver::class)]
class Blog extends Model
{
    use HasFactory;
    protected $fillable=['title','description','slug','category_id'];

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
