<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GenerateUrl extends Model
{
    protected $fillable = ['id', 'url'];

    public function checkUrl($url)
    {
        return $this->where('url', $url)->firstOrFail();
    }

    static function deleteUrl($url)
    {
        return GenerateUrl::where('url', $url)->delete();
    }
}
