<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuoiHoc extends Model
{
  use HasFactory;
  use SoftDeletes;
  protected $table = 'buoi_hoc';
  protected $dates = ['deleted_at'];
  protected $fillable = [
    'ngayhoc',
    'noidungbuoihoc',
    'trangthai',
    'ghichu',
    'giocheckin',
    'giocheckout',
    'lop_hoc_id',
    'bai_giang_id',
    'phong_hoc_id',
    'giao_vien_id',
  ];

  public function dsBaiTap()
  {
    return $this->hasMany(DanhSachBaiTap::class, 'buoi_hoc_id', 'id');
  }

  public function getNgayhocAttribute($value)
  {
    return date('d-m-Y', strtotime($value));
  }

  public function lopHoc()
  {
    return $this->belongsTo(LopHoc::class);
  }

  public function dsNhanXetHocSinh()
  {
    return $this->hasMany(NhanXetHocSinh::class);
  }

  public function checkIn()
  {
    return $this->hasOne(CheckIn::class);
  }

  public function baiGiang()
  {
    return $this->belongsTo(BaiGiang::class);
  }

  public function phongHoc()
  {
    return $this->belongsTo(PhongHoc::class);
  }

  public function giaoVien()
  {
    return $this->belongsTo(GiaoVien::class);
  }

  public function dsDiemDanh()
  {
    return $this->hasMany(DiemDanh::class);
  }

  public function dsNghiPhep()
  {
    return $this->hasMany(NghiPhep::class);
  }
}