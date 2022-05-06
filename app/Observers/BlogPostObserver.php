<?php

namespace App\Observers;

//use App\Models\Models\BlogPost;
use App\Models\BlogPost;
use Carbon\Carbon;

class BlogPostObserver
{
    /**
     * Handle the BlogPost "created" event.
     *
     * @param  \App\Models\Models\BlogPost  $blogPost
     * @return void
     */
    public function creating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }

    /**
     * Handle the BlogPost "updated" event.
     *
     * @param  \App\Models\Models\BlogPost  $blogPost
     * @return void
     */
    public function updating(BlogPost $blogPost)
    {
        $test[] = $blogPost->isDirty();
        $test[] = $blogPost->isDirty('is_published');
        $test[] = $blogPost->isDirty('user_id');
        $test[] = $blogPost->getAttribute('is_published');
        $test[] = $blogPost->is_published;
        $test[] = $blogPost->getOriginal('is_published');
        $this->setPublishedAt($blogPost);

        $this->setSlug($blogPost);
    }

    protected function setPublishedAt(BlogPost $blogPost)
    {
        if (empty($blogPost->published_at) && $blogPost->is_published)
        {
            $blogPost->published_at = Carbon::now();
        }
    }
    protected function setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost->slug))
        {
            $blogPost->slug = \Str::slug($blogPost->title);
        }
    }
    protected function setHtml(BlogPost $blogPost)
    {
        if ($blogPost->isDirty('content_raw'))
        {
            $blogPost->content_html = $blogPost->content_raw;
        }
    }
    protected function setUser(BlogPost $blogPost)
    {
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }

    /**
     * Handle the BlogPost "deleted" event.
     *
     * @param  \App\Models\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleting(BlogPost $blogPost)
    {
        //return false;
        //dd(__METHOD__, $blogPost);
    }
    public function deleted(BlogPost $blogPost)
    {
       //dd(__METHOD__, $blogPost);
    }

    /**
     * Handle the BlogPost "restored" event.
     *
     * @param  \App\Models\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "force deleted" event.
     *
     * @param  \App\Models\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
}
