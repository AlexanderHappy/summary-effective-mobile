<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusList extends Model
{
    use HasFactory;

    protected $table = 'status_list';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
    ];

    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(StatusList::class);
    }
}
