<?php

namespace App\Models;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    // trait
    use Encryptable;

    protected $fillable = [
        'type', 'name', 'email', 'body', 'url'
    ];

    public static $types = [
        '記録と乗り越えについて', '仕事の依頼', 'その他'
    ];

    /**
      * Attributes that should be encryptable.
      * 暗号化するものを書く
      *
      * @var array
      */
    public $encryptable = [
        'email'
    ];
}
