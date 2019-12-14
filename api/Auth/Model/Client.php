<?php


namespace Api\Auth\Model;


use ApiPicker\Concern\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes,Uuid;
    protected $fillable = [
        'name',
        'version',
        'type',
        'agent',
        'ip'
    ];
}
