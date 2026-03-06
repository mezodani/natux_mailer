<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NatuxMail extends Model
{
    protected $table = "natux_mails";
    protected $fillable = ["email"];
}
