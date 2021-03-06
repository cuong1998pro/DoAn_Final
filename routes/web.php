<?php

use App\Http\Controllers\Administrators\ChamCongController;
use App\Http\Controllers\Administrators\PhanLopController;
use App\Http\Controllers\Administrators\ThongKeCheckInController;
use App\Http\Controllers\Administrators\ThongKeCongNoController;
use App\Http\Controllers\Administrators\ThongKeDoanhThuController;
use App\Http\Controllers\Administrators\ThongKeNhanVienController;
use App\Http\Controllers\Administrators\TinhLuongController as AdministratorsTinhLuongController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\Contacts\FeedBackController;
use App\Http\Controllers\Contacts\HocPhiController;
use App\Http\Controllers\Contacts\PDFController;
use App\Http\Controllers\TrangCaNhanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\Teachers\BaiTapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\students\XemNhanXetController;
use App\Http\Controllers\Teachers\BaoCaoController;
use App\Http\Controllers\Teachers\BaoCaoLopHocController;
use App\Http\Controllers\Teachers\BaoCaoLopHocControllerc;
use App\Http\Controllers\Teachers\NhanXetHocSinhController;
use PhpOffice\PhpSpreadsheet\RichText\Run;
use App\Models\LopHoc;

use App\Http\Controllers\Contacts\AjaxController;
use App\Http\Controllers\RestoreController;

Route::get('/', function () {
  return redirect()->route('login');
  return view('frontend.trangchu');
});

/* -------------------------------------------------------------------------- */
/*                                Administrator                               */
/* -------------------------------------------------------------------------- */
//prettier-ignore
Route::middleware(['auth', 'web'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index']);
  Route::prefix('/administrators')->group(function () {
    Route::post('users/import', 'Administrators\UserController@import')->name('user_import');
    Route::get('users/export/', 'Administrators\UserController@export')->name('user_export');
    Route::resource('users', 'Administrators\UserController');
    Route::resource('courses', "Administrators\KhoaHocController");
    Route::resource('staffs', "Administrators\NhanVienController");
    Route::resource('teachers', "Administrators\TeacherController");
    Route::resource('allclass', "Administrators\LopHocController");
    Route::resource('baigiang', "Administrators\BaiGiangController");
    Route::resource('baitap', "Administrators\BaiTapController");
    Route::resource('phanlop', 'Administrators\PhanLopController');
    Route::resource('calendar', 'Administrators\LichController');
    Route::resource('classroom', 'Administrators\PhongHocController');
    Route::resource('admin-chucvu', 'Administrators\ChucVuController');
    Route::resource('admin-loaigiaovien', 'Administrators\LoaiGiaoVienController');
    Route::resource('loaikhoahoc', 'Administrators\LoaiKhoaHocController');
    Route::resource('admin-hoccu', 'Administrators\HocCuController');
    Route::resource('admin-hoccu-plus', 'Administrators\PlusHocCuController');
    Route::resource('role', 'Administrators\PhanQuyenController');
    Route::resource('admin-chuyenlop', 'Administrators\ChuyenLopController');
     Route::resource('backup', 'BackUpController');
    Route::get('restore/{filename}', [RestoreController::class, 'restore']);
    Route::post('restore-from-file', [RestoreController::class, 'restoreFromFile'])->name('restore-from-file');
    Route::get('pdf/preview', [PDFController::class, 'preview'])->name('pdf.preview');
    Route::get('pdf/generate', [PDFController::class, 'generatePDF'])->name('pdf.generate');
    Route::get('allclass/linhvuc/all/{classid}', [AjaxController::class, 'getLinhVucAll']);
    Route::get('allclass/linhvuc/{loaikhoahoc}/{classid}', [AjaxController::class, 'getLinhVuc']);

    /* -------------------------------------------------------------------------- */
    /*                                  Chấm công                                 */
    /* -------------------------------------------------------------------------- */

    Route::get('attendance/report', [ChamCongController::class, 'report']);
    Route::get('attendance/showreport/{doituong}/{thang}', [ChamCongController::class, 'showreport']);
    Route::get('attendance/giaovien', [ChamCongController::class, 'giaovien']);
    Route::get('attendance/nhanvien', [ChamCongController::class, 'nhanvien']);
    Route::get('attendance/filter/{doituong}/{ngaycham}', [ChamCongController::class, 'filter']);
    Route::get('attendance/confirm/{attendance}', [ChamCongController::class, 'confirm'])->name('confirm');
    Route::get('attendance/cancel/{attendance}', [ChamCongController::class, 'cancel'])->name('cancel');
    Route::resource('attendance', 'Administrators\ChamCongController');

    /* -------------------------------------------------------------------------- */
    /*                                 Tính lương                                 */
    /* -------------------------------------------------------------------------- */
    Route::get('/bangluong', function(){
      return view('backend.administrators.tongluong.tongluong');
    });

    Route::get('payroll/tongluong/nhanvien/print/{thang}', [AdministratorsTinhLuongController::class, 'printluongnhanvien']);
    Route::get('payroll/tongluong/{doituong}/{thang}', [AdministratorsTinhLuongController::class, 'tongluong']);
    Route::get('payroll/print/{id}', [AdministratorsTinhLuongController::class, 'print'])->name('print_luong');
    Route::get('payroll/thanhtoan/{id}', [AdministratorsTinhLuongController::class, 'thanhtoan']);
    Route::get('payroll/filter/{doituong}/{thang}', [AdministratorsTinhLuongController::class, 'filter']);
    Route::resource('payroll', 'Administrators\TinhLuongController');

    /* -------------------------------------------------------------------------- */
    /*                              Bao cao thong ke                              */
    /* -------------------------------------------------------------------------- */

    Route::get('thongkenhansu', [ThongKeNhanVienController::class, 'index']);
    Route::get('thongkenhansu/content/{bophan}/{gioitinh}', [ThongKeNhanVienController::class, 'content']);
    Route::get('thongkecheckin', [ThongKeCheckInController::class, 'index']);
    Route::get('thongkethuchi', [ThongKeDoanhThuController::class, 'index']);
    Route::get('thongkecongno', [ThongKeCongNoController::class, 'index']);

    /* -------------------------------------------------------------------------- */
    /*                                  Giao vien                                 */
    /* -------------------------------------------------------------------------- */
  });
  Route::prefix('teachers')->group(function () {
    Route::resource('classes', 'Teachers\LopHocController');
    Route::resource('lessons', 'Teachers\BuoiHocController');
    Route::resource('checkin', 'Lessons\CheckInController');
    Route::resource('diemdanh', 'Lessons\DiemDanhController');
    Route::resource('danhsachbaitap', 'Lessons\DanhSachBaiTapController');
    Route::resource('calendar', 'Teachers\LichController');
    Route::resource('nhanxethocsinh', 'Teachers\NhanXetHocSinhController');
    Route::resource('sanphamcuoikhoa', 'Teachers\SanPhamCuoiKhoaController');
    Route::resource('baocao', 'Teachers\BaoCaoController');
    Route::resource('canhbao', 'Teachers\CanhBaoController');
    Route::get('/baocaolophoc/{idkhoahoc}/{ngay?}', [BaoCaoLopHocController::class, 'BaoCaoLopHoc'])->name('baocaolophoc');
    Route::get('/dulieulophoc', [BaoCaoLopHocController::class, 'LopHoc']);
    Route::post('/baocaolophoc/timkiem', [BaoCaoLopHocController::class, 'TimKiem']);
    Route::get('/nhanxet/{hocsinhid}/{buoihocid}/{lophocid}/{khoahocid}', [NhanXetHocSinhController::class, 'NhanXet']);
    Route::get('/xemnhanxet/{hocsinhid}/{buoihocid}/{lophocid}/{khoahocid}', [NhanXetHocSinhController::class, 'XemNhanXet']);
    Route::get(
      '/nhanxetmodal/{hocsinhid}/{buoihocid}/{lophocid}/{khoahocid}',
      function ($hocsinhid, $buoihocid, $lophocid, $khoahocid) {
        return view('backend.teachers.classes.nhanxet-modal', [
          'hocsinhid' => $hocsinhid,
          'buoihocid' => $buoihocid,
          'lophocid' => $lophocid,
          'khoahocid' => $khoahocid,
        ]);
      }
    );
    Route::resource('check-test', 'Teachers\BaiTapController');
    Route::get('/xembaitap/{hocsinhid}/{buoihocid}', [BaiTapController::class, 'xembaitap']);
    Route::get('comment', [NhanXetHocSinhController::class, 'index']);
    // Route::get('items', function () {
    //   return view('backend.teachers.items');
    // });
  });

  Route::get('/news-feed', function () {
    return view('backend.bantin');
  });

  /* -------------------------------------------------------------------------- */
  /*                                   Contact                                  */
  /* -------------------------------------------------------------------------- */

  Route::prefix('/contacts')->group(function () {
    Route::resource('students', "Contacts\StudentController");
    Route::resource('hocphis', "Contacts\HocPhiController");
    Route::resource('feedbacks', "Contacts\FeedBackController");
    Route::resource('lichtrainghiem', "Contacts\LichTraiNghiemController");
    Route::resource('list-teachers', "Contacts\GiangVienController");
    Route::resource('phanlop', 'Administrators\PhanLopController');
    Route::get('nhanxetgiaovien/{id}', [FeedBackController::class, 'nhanxetgiaovien']);
    Route::get('checkin-teachers', function () {
      return view('backend.contact.checkIn');
    });
    Route::get('phanlop/{class}', [PhanLopController::class, 'index']);
    Route::get('tinhhocphi', [HocPhiController::class, 'tinhhocphi'])->name('tinhhocphi');
    Route::resource('phieuthu', 'Contacts\PhieuThuController');
    Route::get('print/{id}', [PrintController::class, 'printPhieuThu']);
    Route::get('printphieuchi/{id}', [PrintController::class, 'printPhieuChi']);
    Route::resource('phieuchi', 'Contacts\PhieuChiController');
    Route::resource('khoanthu', 'Contacts\KhoanThuController');
    Route::get('/week/{numberweek}', [AjaxController::class, 'getTuanSau']);
    Route::get('/day/{day}', [AjaxController::class, 'getNgay']);
    Route::get('/hocphi/{nowdate}', [AjaxController::class, 'getHocPhi']);
    Route::get('/date/{date}', [AjaxController::class, 'getDeadline']);
    Route::get('/trangthai/{trangthai}', [AjaxController::class, 'getTrangThai']);
    Route::get('/hocphi/status/{trangthai}', [AjaxController::class, 'getNo']);
  });

  /* -------------------------------------------------------------------------- */
  /*                                  Hoc sinh                                  */
  /* -------------------------------------------------------------------------- */

  Route::prefix('/student')->group(function () {
    Route::resource('class', "Students\MyClassController");
    Route::resource('allcourses', 'Students\KhoaHocController');
    Route::resource('home-work', 'Students\BaiTapVeNhaController');
    Route::resource('lessons', 'Students\BuoiHocController');
    Route::resource('calendar', 'Students\LichController');
    Route::resource('my-comment', 'Students\NhanXetGiaoVienController');
    Route::resource('review-khoahoc', 'Students\NhanXetKhoahocController');
    Route::resource('review-giaovien', 'Students\NhanXetGiaoVienController');
    Route::resource('dashboard', "Students\DashboardController");
    Route::get('review', function () {
      return view('backend.students.review');
    });
    Route::get('/xemnhanxet/{idbuoihoc}/{idlophoc}/{idkhoahoc}', [XemNhanXetController::class, 'showNhanXet']);
    Route::get('review', function () {
      return view('backend.students.review');
    });
  });

  Route::resource('phucap', 'PhuCapController');
});

/* -------------------------------------------------------------------------- */
/*                    Dang nhap + tin nhan + trang ca nhan                    */
/* -------------------------------------------------------------------------- */

Route::get('/chat', [ChatsController::class, 'index']);
Route::get('/messages/{id}', [ChatsController::class, 'getMessage'])->name('messages');
Route::post('/messages', [ChatsController::class, 'sendMessage']);
Route::get('/trangcanhan/{id?}', [TrangCaNhanController::class, 'show'])->name('trangcanhan');
Route::get('/notifications', function () {
  return view('backend.notification');
});

Route::post('/doimatkhau', [TrangCaNhanController::class, 'doimatkhau'])->name('doimatkhau');

Auth::routes();

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

/* -------------------------------------------------------------------------- */
/*                                    Test                                    */
/* -------------------------------------------------------------------------- */

Route::get('/test', function () {
  return view('backend.test');
});

Route::post('/test', function () {
  return request()->all();
});
Route::get('/error', function () {
  return view('backend.error');
});

Route::get('/abc', [BaoCaoLopHocController::class, 'LopHoc']);
Route::get('/inbaocao/pdf', [BaoCaoLopHocController::class, 'createPDF']);
