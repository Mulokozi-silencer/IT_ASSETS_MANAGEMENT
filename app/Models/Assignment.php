<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model {
  use HasFactory;
  protected $fillable = ['asset_id','user_id','assigned_date','return_date','status'];

  public function asset(){ return $this->belongsTo(Asset::class); }
  public function user(){ return $this->belongsTo(User::class); }
}
