<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model {
  use HasFactory;
  protected $fillable = ['asset_name','serial_number','category_id','status','purchase_date','condition','notes','location'];

  public function category(){ return $this->belongsTo(Category::class); }
  public function assignments(){ return $this->hasMany(Assignment::class); }
  public function maintenanceLogs(){ return $this->hasMany(MaintenanceLog::class); }
}
