<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'published'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getLikes()
    {
        return $this->likes()->count();
    }

    public function triggerLike($user)
    {
        if(!$this->isLiked($user)){
            $this->like($user);
        }else{
            $this->unlike($user);
        }
    }

    public function like($user)
    {
        $this->likes()->create([
            'user_id' => $user->id
        ]);
    }

    public function unlike($user)
    {
        $this->likes()->where('user_id', $user->id)->delete();
    }

    public function isLiked($user)
    {
        return (bool) $this->likes()->where('user_id', $user->id)->count();
    }

    public function addTags($tags)
    {
        if(!$tags){
            return;
        }

        foreach($tags as $tag){
            $find = Tag::firstOrCreate(['name' => $tag]);

            $this->tags()->attach($find);
        }
    }

    public function setPublished($published)
    {
        $this->published = $published;
        $this->save();
    }

    public static function getPostByStatus($status)
    {
        $posts = Post::where('published', $status);

        return $posts;
    }
}
