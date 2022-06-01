<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable; //ソートパッケージを呼び出す

class Sake extends Model
{
    use HasFactory;
    use Sortable;

    //テーブル名
    protected $table = 'sakes';

    //可変項目
    protected $fillable =
    [
        'user_id',
        'sakename',
        'prefecturename',
        'scent',
        'acidity',
        'taste',
        'sweetness',
        'score'
    ];

    public $sortable = ['sakename','prefecturename','scent','acidity','taste','sweetness','score'];
}
