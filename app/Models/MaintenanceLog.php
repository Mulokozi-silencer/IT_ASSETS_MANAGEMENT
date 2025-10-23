<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceLog extends Model
{
    use HasFactory;

    // ✅ Define fillable fields
    protected $fillable = [
        'asset_id',
        'user_id',
        'description',
        'status',
        'scheduled_date',
        'cost',
        'notes',
    ];

    // ✅ Relationships
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
