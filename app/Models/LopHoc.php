<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LopHoc extends Model
{
  use HasFactory;
  use SoftDeletes;
  protected $table = 'lop_hoc';
  protected $dates = ['deleted_at'];
  protected $fillable = [
    'id',
    'tenlop',
    'ngaytao',
    'siso',
    'trangthai',
    'ghichu',
    'khoa_hoc_id',
    'giao_vien_id',
  ];

  public function soBuoiDaHoc()
  {
    $sobuoidahoc = $this->dsBuoiHoc->where('trangthai', 'Đã kết thúc')->count();
    return $sobuoidahoc;
  }

  public function getNgaybatdauAttribute($value)
  {
    $date = strtotime($value);
    return date('d/m/Y', $date);
  }

  public function getNgayketthucAttribute($value)
  {
    $date = strtotime($value);
    return date('d/m/Y', $date);
  }

  public function khoaHoc()
  {
    return $this->belongsTo(khoaHoc::class);
  }

  public function dsHocCu()
  {
    return $this->hasMany(HocCu::class);
  }

  public function giaoVien()
  {
    return $this->belongsTo(GiaoVien::class);
  }

  public function dsKhoanThu()
  {
    return $this->hasMany(KhoanThu::class);
  }

  public function dsBuoiHoc()
  {
    return $this->hasMany(BuoiHoc::class);
  }

  public function lichHoc()
  {
    return $this->hasMany(ThoiGianHoc::class);
  }

  public function dsLopHoc()
  {
    return $this->hasMany(PhanLop::class);
  }
}
