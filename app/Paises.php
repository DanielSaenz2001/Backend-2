<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    public $timestamps = false;
    protected $guarded = ["id"];
}
class Departamentos extends Model
{
    public $timestamps = false;
    protected $guarded = ["id"];
}
class Provincia extends Model
{
    public $timestamps = false;
    protected $guarded = ["id"];
}
