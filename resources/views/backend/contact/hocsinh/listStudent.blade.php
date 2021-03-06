@extends('backend.layout.index')
@section('content')
<style>
  {
    table-layout: fixed;
  }
</style>
@section('css')
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}">
@endsection
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card table-card">
              <div class="card-header">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <h5>DANH SÁCH HỌC SINH</h5>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div id="dom-table_filter" class="dataTables_filter">

                      <button class="btn btn-success btn-round waves-effect waves-light" data-toggle="modal" data-target="#large-Modal" style="height: 35px;line-height: 13px;float: right; margin-right: 30px; ">Thêm mới</button>
                      <div class="modal fade show" id="large-Modal" tabindex="-1" role="dialog" style="z-index: 1050;display: none; padding-right: 17px;">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Thêm học sinh</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="{{route('students.store')}}" novalidate="" id="addform">
                                <div class="modal-body">
                                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                                  {{ csrf_field() }}
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Họ đệm</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" name="hodem" id="hodem" placeholder="Nhập vào họ đệm">
                                      <span class="messages"></span>
                                    </div>

                                    <label class="col-sm-1 col-form-label">Tên</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" name="ten" placeholder="Nhập vào tên">
                                      <span class="messages"></span>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ngày sinh</label>
                                    <div class="col-sm-9">
                                      <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" placeholder="">
                                      <span class="messages"></span>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-sm-3 col-form-label">Giới tính</label>
                                    <div class="col-sm-9">
                                      <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh" value="Nam"> Nam
                                        </label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh" value="Nữ"> Nữ
                                        </label>
                                      </div>
                                      <span class="messages"></span>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Trạng thái</label>
                                    <div class="col-sm-9">
                                      <select class="form-control" id="trangthai" name="trangthai" placeholder="Trạng thái">
                                        <option value="">-- Chọn trạng thái --</option>
                                        <option value="Đang tư vấn">Đang tư vấn</option>
                                        <option value="Chính thức">Chính thức</option>
                                        <span class="messages"></span>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Lĩnh vực quan tâm</label>
                                    <div class="col-sm-9">
                                      <select name="loai_khoa_hoc_id[]" class="selectpicker form-control form-control-primary fill" data-live-search="true" data-actions-box="true" title="-- Chọn lĩnh vực quan tâm --" multiple>
                                        @foreach($loaikhoahoc as $lkh)
                                          <option value="{{ $lkh->id }}">{{$lkh->tenloaikhoahoc}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Họ tên phụ huynh</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="hotenchame" name="hotenchame" placeholder="Nhập vào họ tên cha mẹ">
                                      <span class="messages"></span>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Số CMND</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="cmnd" name="cmnd" placeholder="Nhập vào số cmnd">
                                      <span class="messages"></span>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Số điện thoại</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="sodienthoai" name="sodienthoai" placeholder="Nhập vào số điện thoại">
                                      <span class="messages"></span>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                      <input type="email" class="form-control" id="email" name="email" placeholder="Nhập vào Email">
                                      <span class="messages"></span>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Địa chỉ</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Nhập vào quê quán">
                                      <span class="messages"></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default waves-effect " data-dismiss="modal" onclick="myReset()">Đóng</button>
                                  <input type="submit" class="btn btn-primary waves-effect waves-light" value="Thêm" />
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="card-block">
                  <div class="table-responsive">
                    <table class="table table-hover m-b-0 " id="datatable">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>HỌC SINH</th>
                          <th>PHỤ HUYNH</th>
                          <th>TRẠNG THÁI</th>
                          <th>TƯ VẤN</th>
                          <th>ACTIONS</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($students as $st)
                        <tr>
                          <td>{{$st->id}}</td>
                          <td>
                            <div class="d-inline-block align-middle">
                              <div class="d-inline-block">
                                @if($st->user)
                                <a href="{{route('trangcanhan', $st->user->id)}}">
                                  <h6 class="name_link_green">{{$st->hodem .' '. $st->ten}}</h6>
                                </a>
                                @else
                                  <i>Chưa cấp tài khoản</i>
                                @endif
                                <p class=" m-t-0 text-muted" style="margin-bottom: 5px"><i class="fa fa-calendar"></i> Ngày sinh: {{date('d/m/Y', strtotime($st->ngaysinh))}}</p>
                                <p class=" m-b-0 text-muted"><i class="fas fa-map-marker-alt"></i> Địa chỉ: {{$st->diachi}}</p>
                              </div>
                            </div>
                          </td>
                          <td style="white-space: normal">
                            <div class="d-inline-block align-middle">
                              <div class="d-inline-block">
                                <h6> {{$st->hotenchame}} </h6>
                                <p class=" m-t-0 text-muted" style="margin-bottom: 5px"><i class="fa fa-phone"></i> SĐT: {{$st->sodienthoai}}</p>
                                <p class=" m-b-0 text-muted"> <i class="fa fa-envelope-o"></i> Email: {{$st->email}}</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p style="margin-top:15px" class="badge p-1 badge-pill badge-{{$st->trangthai == 'Học thử'? 'primary' : 'success'}}">
                              {{$st->trangthai}}</p>
                          </td>
                          <td style="width:30px">
                            @if($st->dslichtrainghiem->count()==0)
                            <p style="width:170px; word-break:keep-all; white-space:normal" class="p-t-10 text-muted">
                              <i>Chưa có lịch hẹn</i>

                            </p>

                            @else
                            <p style="width:170px; word-break:keep-all; white-space:normal" class="p-t-10 text-muted"><i class="fa fa-history"></i> {{ $st->dslichtrainghiem->first()->noidung }}
                              <br> <i class="fa fa-clock-o"></i>
                              {{ $st->dslichtrainghiem->first()->thoigian }}
                              @if( $st->dslichtrainghiem->first()->ketqua != '' )
                              <br><span class="text-c-lite-green"> <i class="fa fa-info-circle"></i> Kết quả: {{ $st->dslichtrainghiem->first()->ketqua }}</span>
                              @endif
                            </p>
                            @endif
                          </td>
                          <td>
                            <div>
                              <div class="modal fade show" id="show-Modal" tabindex="-1" role="dialog" style="z-index: 1050;display: none; padding-right: 17px;">
                              </div>
                            </div>
                            <button class="my_edit" data-id="{{$st->id}}" data-toggle="modal" data-target="#edit-Modal" style="background-color: white; border: none; float: left;">
                              <i class="fa fa-edit f-w-600 f-16 m-r-15 text-c-green" style="margin-right: 3px;font-size: 25px"></i>
                            </button>
                            <!-- Modal Sua -->

                            <form action="{{route('students.destroy', $st->id)}}" method="post">
                              @method('DELETE')
                              @csrf
                              <button style="border: none; padding: 2px 0px; margin-top: -1px; background-color: white" onclick="return confirm ('Bạn có muốn xóa không')">
                                <i class="feather icon-trash-2 f-w-600 f-16 m-r-15 text-c-red" style="margin:0;font-size: 23px">
                                </i>
                              </button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="modal fade show" id="edit-Modal" tabindex="-1" role="dialog" style="z-index: 1050;display: none; padding-right: 17px;">
                    </div>
                    <div class="modal fade show" id="edit-Modal" tabindex="-1" role="dialog">
                    </div>
                    <div class="modal fade show" id="show-Modal" tabindex="-1" role="dialog" style="z-index: 1050;display: none; padding-right: 17px;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('script')
  <script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
  <script src="{{ asset('assets/js/my-script-2.js') }}"></script>
  <script>
    function myReset() {
      document.getElementById('main').reset();
    };
  </script>
  <script>
    $(document).
    ready(function() {
      $('.show-modal').click(function(e) {
        id = $(this).data('id');
        $('#show-Modal').load("/contacts/students/" + id);
        $('#show-Modal').show();
        $('body').addClass('modal-open');
        $('.modal-backdrop').show();
      });
      $('.my_edit').click(function(e) {
        id = $(this).data('id')
        $('#edit-Modal').load("/contacts/students/" + id + '/edit');
        $('#edit-Modal').show();
        $('body').addClass('modal-open');
        $('.modal-backdrop').show();
      });
    });
  </script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! $jsValidator->selector('#addform') !!}
  @endsection
