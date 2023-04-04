<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayList extends Model
{
    use HasFactory;

    //region model config
    protected $table   = 'playlist';
    protected $guarded = [];
    //endregion model config

    //region relations
    public function videos()
    {
        return $this->belongsToMany(Video::class, 'playlists_videos');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //endregion relations

    public function toArray()
    {
        $data          = parent::toArray();
        $data['count'] = $this->videos()->count();

        return $data;
    }
}
