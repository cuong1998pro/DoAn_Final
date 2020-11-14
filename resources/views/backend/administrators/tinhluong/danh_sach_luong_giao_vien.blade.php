<div class="row">
  <div class="col-md-12">
    <div class="card table-card">
      <div class="card-header">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
            <h5>Danh sách lương giáo viên tháng {{ $thang }}</h5>
          </div>

        </div>
      </div>
      <div class="card-block">
        <div class="table-responsive">
          <table class="table table-hover m-b-0" id="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Giáo viên</th>
                <th>Số điện thoại</th>
                <th>Thực lĩnh</th>
                <th>Trạng thái</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach(\App\Models\GiaoVien::all() as $giaovien)
              <tr>
                <td>{{ $giaovien->id }}</td>
                <td>{{ $giaovien->hodem . ' ' . $giaovien->ten }}</td>
                <td>{{ $giaovien->sodienthoai }}</td>
                @php
                $luong = $giaovien->layLuongThang($thang);
                @endphp
                <td>{{ isset($luong) ? number_format($luong->thuclinh).' đ' : '0' }}</td>
                <td>{!! !isset($luong) ? '<label for="" class="badge badge-warning">Chưa tạo</label>'
                  : ($luong->trangthai == 'Chưa thanh toán'
                  ? '<label for="" class="badge badge-primary">Chưa thanh toán</label>'
                  : '<label for="" class="badge badge-success">Đã thanh toán</label>') !!}</td>

                <td>
                  <button class="btn btn-sm btn-round btn-secondary f-w-600 w-75 f-s" data-toggle="modal" data-target="#large-Modal{{ $giaovien->id }}">

                    @if(!isset($luong)) Tạo mới @elseif($luong->trangthai == 'Chưa thanh toán') Thanh toán @else Chi tiết @endif
                  </button>

                  <div class="modal fade show" id="large-Modal{{ $giaovien->id }}" tabindex="-1" role="dialog" style="z-index: 1050;display: none; padding-right: 17px;">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">{{ isset($luong)? 'Chi tiết' : 'Tạo'}} phiếu lương</h4>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body p-t-0  ">
                          <form method="post" action="{{route('payroll.store')}}" novalidate="">

                            <div class="modal-body">
                              @csrf
                              <div class="card table-card">
                                <div class="card-header">
                                  <h5>Giáo viên</h5>
                                </div>

                                <div class="card-block">
                                  <div class="row ui-sortable" id="draggablePanelList">
                                    <div class="col-lg-12 col-xl-6 ui-sortable-handle">
                                      <div class="card-sub">
                                        <div class="card-block" style="margin-top: -20px">
                                          <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0">Họ tên</h6>
                                          <h6 class="card-title">
                                            <b> {{$giaovien->hodem .' '.$giaovien->ten}}</b></h6>
                                        </div>
                                        <div class="card-block" style="margin-top: -40px">
                                          <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0">
                                            Ngày sinh:</h6>
                                          <h6 class="card-title">
                                            <b>{{$giaovien->ngaysinh}}</b></h6>
                                        </div>
                                        <div class="card-block" style="margin-top: -40px; padding-bottom:0">
                                          <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0">
                                            Điện thoại:</h6>
                                          <h6 class="card-title">
                                            <b>{{$giaovien->sodienthoai}}</b></h6>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6 ui-sortable-handle">
                                      <div class="card-sub">
                                        <div class="card-block" style="margin-top: -20px">
                                          <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0">
                                            Địa chỉ:</h6>
                                          <h6 class="card-title" style="display: inline-block;width: 260px;">
                                            <b>{{$giaovien->diachi}}</b></h6>
                                        </div>
                                        <div class="card-block" style="margin-top: -40px">
                                          <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0">
                                            Username:</h6>
                                          <h6 class="card-title">
                                            <b>{{$giaovien->user->name}}</b></h6>
                                        </div>

                                        <div class="card-block" style="margin-top: -40px; padding-bottom:0">
                                          <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0">
                                            Email:</h6>
                                          <h6 class="card-title">
                                            <b>{{$giaovien->email}}</b></h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </div>

                              <div class="card table-card">
                                <div class="card-header">
                                  <h5>Phiếu lương</h5>
                                </div>

                                <div class="card-block pt-0">
                                  <div class="table-responsive pt-0">

                                    <input type="hidden" value="{{ $thang }}-1" name="thang">
                                    <table class="table table-hover m-b-0">
                                      <thead>
                                        <tr>
                                          <th>Tổng số giờ làm</th>
                                          <th style="text-indent: 10px">Số tiền 1 giờ</th>
                                          <th style="text-indent: 10px">Thực lĩnh</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @if($giaovien->tongGioLam($thang) > 0)
                                        <tr>
                                          <td style="text-indent: 10px">{{round( $giaovien->tongGioLam($thang)/60 ,1)}}</td>
                                          <td style="text-indent: 10px">100,000 đ</td>
                                          <td style="text-indent: 10px">{{ number_format($giaovien->tongGioLam($thang)/60 * 100000). ' đ' }}</td>
                                          <input type="hidden" name="thuclinh" value="{{( $giaovien->tongGioLam($thang)/60 * 100000) }}">
                                          <input type="hidden" name="giao_vien_id" value="{{ $giaovien->id }}">
                                          <input type="hidden" name="doituong" value="giaovien">
                                          <input type="hidden" name="trangthai" value="Chưa thanh toán">
                                        </tr>

                                        @else
                                        <tr>
                                          <td colspan="5" class="font-italic">Chưa có dữ liệu chấm công</td>
                                        </tr>
                                        @endif
                                      </tbody>

                                    </table>
                                  </div>
                                </div>
                              </div>


                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default waves-effect " data-dismiss="modal" onclick="myReset()">Đóng</button>
                              @if(!isset($luong))
                              <input type="submit" class="btn btn-primary waves-effect waves-light" value="Tạo" />
                              @elseif($luong->trangthai == 'Chưa thanh toán')

                              <a class="btn btn-success" href="/administrators/payroll/thanhtoan/{{ $luong->id }}">Thanh toán</a>
                              @endif
                            </div>
                          </form>
                        </div>
                      </div>

                    </div>
                  </div>


                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{-- /* -------------------------------------------------------------------------- */
/*                              Modal them luong                              */
/* -------------------------------------------------------------------------- */ --}}


      </div>
    </div>
    <script>
      // $(document).ready(function() {
      //   $('#thang').change(function() {
      //     $('.thang-copy').val($('#thang').val());
      //   });
      //   $('.thang-copy').val($('#thang').val());
      // });

    </script>