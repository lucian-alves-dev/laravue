<?php

namespace App\Models;

use App\Utils\Formatter;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'cellphone', 'photo'
    ];

    protected $hidden = [
        'password',
    ];

    public static function search($form)
    {
        $query = User::query();
        if(! empty($form['name'])) $query->where('name', 'LIKE', '%'. $form['name'] .'%');
        if(! empty($form['email'])) $query->where('email', 'LIKE', '%'. $form['email'] .'%');
        if(! empty($form['cellphone'])) $query->where('cellphone', 'LIKE', '%'. Formatter::onlyNumbers($form['cellphone']).'%');
        return $query;
    }
}
