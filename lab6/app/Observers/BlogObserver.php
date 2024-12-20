<?php

namespace App\Observers;

use App\Models\Blog;
use Illuminate\Support\Str;

class BlogObserver
{
    public function creating(Blog $blog): void{
        if (!$blog->slug) {
            $blog->slug=Str::slug($blog->title);
        }
    }
    /**
     * Handle the Blog "created" event.
     */
    public function created(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "updated" event.
     */
    public function updated(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "deleted" event.
     */
    public function deleted(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "restored" event.
     */
    public function restored(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "force deleted" event.
     */
    public function forceDeleted(Blog $blog): void
    {
        //
    }
}
