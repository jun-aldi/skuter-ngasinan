<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable as Sortable;

class Agenda extends Model
{
    use HasFactory,SoftDeletes,Sortable;

    protected $fillable = [
        'tanggal_agenda',
        'isi',
        'tempat',
        'keterangan'

    ];

    protected $sortable = [
        'tanggal_agenda'
    ];
}
