<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Vouchers extends Model
{
    use HasFactory,HasUuids,SoftDeletes;

    protected $table = "voucher";
    protected $primariKey = "id";
    protected $keyType = "string";
    public $incrementing = false;
    public $timestamps = true;

    protected $attributes = [
        "name_voucher" => "voucher"
    ];

        protected $fillable = ['name_voucher'];
}
