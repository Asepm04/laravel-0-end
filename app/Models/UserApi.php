<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ContactApi;


class UserApi extends Model
{
    use HasFactory;

    protected $table = "user_apis";
    protected $primaryKey = "id";
    protected $keyType ="integer";
    public $incrementing = true;
    public $timestamps = true;

    public function contact():hasMany
    {
        return $this->hasMany(ContactApi::class,"user_id","id");
    }

    protected $fillable = 
    [
        "username",
        "name",
        "password",
        "token"
    ];
}
