<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GenerateUrl extends Model
{
    protected $table = 'generate_urls';

    protected $fillable = ['id', 'url'];

    public function deleteOldUrl()
    {
        $records = $this->where('created_at',  '<', Carbon::today()->toDateString())->get();
        $count = $records->count();
        foreach ($records as $record) {
         $record->delete();
        }
    }

    public function addGenerateUrl($url)
    {
        $this->url = $url;
        return $this->firstOrNew(['url' => $url])->save();
    }

    public function checkUrl($url)
    {
        return $this->where('url', $url)->firstOrFail();
    }

    static function deleteUrl($url)
    {
        return GenerateUrl::where('url', $url)->delete();
    }
}
