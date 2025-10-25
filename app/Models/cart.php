<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public function obat()
{
    return $this->belongsTo(Obat::class);
}

}
