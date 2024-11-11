<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Option;
use App\Models\Vote;

class Poll extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function options()
{
    return $this->hasMany(Option::class);
}

public function votes()
{
    return $this->hasMany(Vote::class);
}

}
