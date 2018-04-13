<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Tag extends Model
{


    /**
     * CODE VAN AGOLIA SEARCH
     */

    use Searchable;

    public function toSearchableArray()
    {
        $record = $this->toArray();

        unset($record['created_at'], $record['updated_at']);

        return $record;
    }

    /**
     * END
     */

}