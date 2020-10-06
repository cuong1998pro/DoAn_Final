@extends('backend.layout.index')
@section('content')
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
                    <h5>Danh sách khóa học</h5>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div id="dom-table_filter" class="dataTables_filter" style="margin-left: -145px;">
                      <label style="display: flex">Tìm kiếm:<input type="search" class="form-control input-sm" placeholder="" aria-controls="dom-table" style="width: 250px; height: 25px;margin-top: 0px;margin-left: 10px;">
                        <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#large-Modal" style="height: 26px; align-content: center; padding: 0px 10px;">Thêm khóa học</button>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="card-header-right">
                  <ul class="list-unstyled card-option">
                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-minus minimize-card"></i></li>
                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                    <li><i class="feather icon-trash close-card"></i></li>
                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                  </ul>
                </div>
              </div>
              <div class="card-block">
                <div class="table-responsive">
                  <table class="table table-hover m-b-0" id="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên khóa học</th>
                        <th>Độ tuổi</th>
                        <th>Sĩ số tối đa</th>
                        <th>Cấp độ</th>
                        <th>Nội dung</th>
                        <th>Điều kiện học</th>
                        <th>Học phí</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- @foreach($courses as $course)--}}
                      {{-- <tr>--}}
                      {{-- <td>--}}
                      {{-- <div class="d-inline-block align-middle">--}}
                      {{-- <div class="d-inline-block">--}}
                      {{-- <h6>{{$course->id}}</h6>--}}
                      {{-- <p class="text-muted m-b-0">Sales executive , NY</p>--}}
                      {{-- </div>--}}
                      {{-- </div>--}}
                      {{-- </td>--}}
                      {{-- <td>{{$course->tenkhoahoc}}</td>--}}
                      {{-- <td>{{$course->dotuoi}}</td>--}}
                      {{-- <td>{{$course->sisotoida}}</td>--}}
                      {{-- <td>{{$course->capdo}}</td>--}}
                      {{-- <td>{{$course->noidung}}</td>--}}
                      {{-- <td>{{$course->dieukienhoc}}</td>--}}
                      {{-- <td>{{$course->hocphi}}</td>--}}
                      {{-- <td>--}}
                      {{-- <label class="badge badge-inverse-primary">Sketch</label>--}}
                      {{-- <label class="badge badge-inverse-primary">Ui</label>--}}
                      {{-- </td>--}}
                      {{-- <td><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>--}}
                      {{-- </tr>--}}
                      {{-- @endforeach --}}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
  <form id="main" method="post" action="https://colorlib.com/" onsubmit="return false" novalidate="">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thêm khóa học</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên khóa học</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên khóa học">
              <span class="messages"></span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">độ tuổi</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="password" name="password" placeholder="Nhập độ tuổi">
              <span class="messages"></span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sĩ số tối đa</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="repeat-password" name="repeat-password" placeholder="Nhập sĩ số tối đa">
              <span class="messages"></span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Cấp độ</label>
            <div class="col-sm-10">
              <select name="select" class="form-control fill">
                <option value="opt1">Chọn cấp độ</option>
                <option value="opt2">Level 1</option>
                <option value="opt3">Level 2</option>
                <option value="opt4">Level 3</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nội dung khóa học</label>
            <div class="col-sm-10">
              <textarea rows="5" cols="5" class="form-control" placeholder="Default textarea"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Điều kiện học</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" id="name" placeholder="Nhập đi">
              <span class="messages"></span>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Radio Buttons</label>
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="gender" id="gender-1" value="option1"> Male
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="gender" id="gender-2" value="option2"> Female
                </label>
              </div>
              <span class="messages"></span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary m-b-0 waves-effect waves-light ">Save changes</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('assets/js/form-validation.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/validate.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/underscore-min.js')}}"></script>
<script>
  $(document).ready(function() {
    $("#table").load('localhost::8000/test');
    console.log('ok')
  })

</script>
@endsection
