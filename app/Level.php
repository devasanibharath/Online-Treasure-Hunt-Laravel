<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $primaryKey = 'level';

    protected $table = 'levels';

    protected $fillable = ['level','title' ,'difficulty', 'background', 'answer','placeholder','html_comment',
        'success_image','status'];
}
