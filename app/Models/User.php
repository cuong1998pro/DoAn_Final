<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use HasFactory;
  use Notifiable, SoftDeletes;
  protected $table = 'users';

  protected $fillable = [
    'anhdaidien',
    'name',
    'password',
    'vaitro',
    'trangthai',
  ];
  protected $hidden = ['password'];
  protected $dates = ['deleted_at'];

  public function giaoVien()
  {
    return $this->hasOne(GiaoVien::class);
  }

  public function hocSinh()
  {
    return $this->hasOne(HocSinh::class);
  }

  public function nhanVien()
  {
    return $this->hasOne(NhanVien::class);
  }

  public function roles()
  {
    return $this->belongsToMany(Role::class);
  }
}