<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'boxes';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'box_id';

}
