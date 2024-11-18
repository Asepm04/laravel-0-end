<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;


class Profile extends Model
{
    use HasFactory,SoftDeletes;

    protected $table      ="profiles";
    protected $primaryKey = "id";
    protected $keyType    = "integer";
    public    $incrementing = false;
    public    $timestamps   = true;

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,"user_id","id");
    }

    protected $fillable = ["job"];
}
