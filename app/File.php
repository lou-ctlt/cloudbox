<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The table associated with the model
     * 
     * @var string
     */
    protected $table = "files";

    /**
     * The primary key associated with the table
     * 
     * @var string
     */
    protected $primaryKey = "file_id";
}
