<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Post extends Model
{


    /**
     * CODE AGOLIA SEARCH
     */

//    DISABLED IN DEVELOPMENT MODE

//    use Searchable;
//
//    public function toSearchableArray()
//    {
//        $record = $this->toArray();
//
//        unset($record['post_content'], $record['created_at'], $record['updated_at']);
//
//        return $record;
//    }

    /**
     * END
     */

}
