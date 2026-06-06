<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'tasks_tabel';

        protected $fillable = ['name'];
    public $timestamps = false;
}
