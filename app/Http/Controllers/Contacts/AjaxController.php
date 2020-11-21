<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Models\DiemDanh;
use App\Models\HocPhi;
use App\Models\KhoanThu;
use App\Models\LichTraiNghiem;
use Carbon\Carbon;
class AjaxController extends Controller
{
    public function getTuanSau($numberweek){
        $data = LichTraiNghiem::all();
        $lichtrainghiems = $data->filter(
          function($item) use($numberweek){
            $time = new Carbon($item->thoigian);
            return $time->weekOfYear == $numberweek;
          }
        );
        return view('backend.contact.lichtrainghiem.week',compact('lichtrainghiems'));
    }
    public function getNgay($date)
    {
      $data = LichTraiNghiem::all();
      $lichtrainghiems = $data->filter(
        function ($item) use ($date) {
          $time = new Carbon($item->thoigian);
          return $time->toDateString() == $date;
        }
      );
      return view('backend.contact.lichtrainghiem.week', compact('lichtrainghiems'));
    }
      public function getHocPhi($deadline){
        foreach (HocPhi::all() as $hocphi) {
          $hocphi->updateHocPhi();
        }
        $data = HocPhi::all();
        $khoanthu = KhoanThu::all();
        $hocphi = $data->filter(function ($item) use ($deadline){
          if($item->trangthai != 'Đã quá hạn') {
            $time = new Carbon($item->deadline);
            return $time->diffInDays($deadline) <= 7;
            }
        });
        return view(
          'backend.contact.hocphi.fillter',
          compact('khoanthu', 'hocphi')
        );
      }
      public function getDeadline($date){
        foreach (HocPhi::all() as $hocphi) {
          $hocphi->updateHocPhi();
        }
        $data = HocPhi::all();
        $khoanthu = KhoanThu::all();
        $hocphi = $data->filter(function ($item) use ($date){
          if($item->trangthai != 'Đã quá hạn') {
            $time = new Carbon($item->deadline);
            return $time->toDateString() == $date;
          }
        });
        return view(
          'backend.contact.hocphi.fillter',
          compact('khoanthu', 'hocphi')
        );
    }
}