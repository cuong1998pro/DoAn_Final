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
                  <div class="col-sm-4">
                    <h5>Danh sách đóng học phí của học sinh</h5>
                  </div>
                  <div class="col-sm-8">
                    <a href="{{ route('tinhhocphi') }}" class="btn btn-primary btn-round float-right">Làm mới</a>
                    <button class="btn btn-warning btn-round waves-effect waves-light"
                      style="margin-right: 15px; float: right" id="deadline-btn">Deadline</button>
                    <input type="text" value="{{\Carbon\Carbon::now()->toDateString()}}" hidden id="deadline">
                    <input type="date" id="nowDay" style="float: right; margin-right: 15px; margin-top: 10px">
                    <div class="form-group row" style="float: right; margin-right: 10px;margin-top: 10px">
                      <div class="col-sm-auto">
                        <select name="trangthai" class="form-control form-control-inverse" style="padding: 3px 10px" id="status">
                          <option value="Còn nợ" selected>Còn nợ</option>
                          <option value="Đã hoàn thành">Đã hoàn thành</option>
                          <option value="Đã quá hạn">Đã quá hạn</option>
                        </select>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="card-block">
                {{-- <div class="dt-buttons"><a class="btn buttons-collection btn-info btn-round btn-sm" tabindex="0" aria-controls="datatable" href="#"><span><i class="fa fa-caret-down" aria-hidden="true"></i> Chức năng khác</span></a></div> --}}

                <div class="table-responsive">
                  <table class="table table-hover m-b-0" id="datatable">
                    <thead>
                      <tr>
                        <th>Mã HĐ</th>
                        <th>Học sinh</th>
                        <th>Số tiền nợ</th>
                        <th style="text-align: center">Deadline</th>
                        <th style="text-align: center">Cập nhật</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($hocphi as $key => $hp)
                        @if($hp->conno != 0 and $hp->trangthai == 'Còn nợ')
                      <tr>
                        <td>{{$key + 1}}</td>
                        <td>
                          <div class="d-inline-block align-middle">
                            <div class="d-inline-block">
                              {{-- <a href="{{route('trangcanhan', $hp->hocsinh->user->id)}}"> --}}
                              <h6 class="name_link_green">{{$hp->hocsinh->hodem .' '. $hp->hocsinh->ten}}</h6>
                              {{-- </a> --}}
                              <p class=" m-t-0 text-muted" style="margin-bottom: 5px">Phụ huynh:
                                {{$hp->hocsinh->hotenchame}}</p>
                              <p class=" m-b-0 text-muted">SĐT: {{$hp->hocsinh->sodienthoai}}</p>
                              {{-- <p class="m-t-2 m-b-0 text-muted">Giáo viên: Học viện TEKY</p> --}}
                            </div>
                          </div>
                        </td>
                        <td>{{number_format($hp->conno). ' đ'}}</td>
                        <td style="text-align: center"><label class="badge badge-warning">{{$hp->deadline}}</label></td>
                        <td>
                          <div>
                            <button data-id="{{$hp->id}}" class="btn waves-effect waves-light btn-round my_edit"
                              data-toggle="modal" data-target="#edit-Modal"
                              style="border: none; background-color: transparent;width:5px">
                              <i class="fa fa-edit text-c-green" style="font-weight: bold; font-size: 20px"></i>
                            </button>
                            <button data-id="{{$hp->id}}" class="btn waves-effect waves-light btn-round histories"
                              data-toggle="modal" data-target="#history-Modal"
                              style="border: none; background-color: transparent;width:5px">
                              <i class="fa fa-list-alt text-c-blue" style="font-weight: bold; font-size: 20px"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="modal fade show" id="edit-Modal" tabindex="-1" role="dialog"
                  style="z-index: 1050;display: none; padding-right: 17px;"></div>
                <div class="modal fade show" id="history-Modal" tabindex="-1" role="dialog"
                  style="z-index: 1050;display: none; padding-right: 17px;"></div>
                <div class="modal md-effect-1 md-show" id="phieuthu-Modal" data-backdrop="false" tabindex="-1"
                  role="dialog" style="z-index: 1050;display: none; padding-right: 17px;">
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
<script src="{{ asset('assets/js/printThis.js') }}"></script>
<script>
  $(document).
  ready(function () {
    $('.my_edit').click(function (e) {
      id = $(this).data('id')
      $('#edit-Modal').load("/contacts/hocphis/" + id + '/edit');
      $('#edit-Modal').show();
      $('body').addClass('modal-open');
      $('.modal-backdrop').show();
    });
    $('.histories').click(function () {
      id = $(this).data('id')
      $('#history-Modal').load("/contacts/hocphis/" + id);
      $('#history-Modal').show();
      $('body').addClass('modal-open');
      $('.modal-backdrop').show();
    });
  });

  function myReset2() {
    $('#phieuthu-Modal').hide();
    $('body').removeClass('modal-open');
  }

</script>
<script>
  $(document).ready(function () {
    $("#deadline-btn").click(function () {
      var deadline = $('#deadline').val();
      // alert(deadline);
      $.get("/contacts/hocphi/" + deadline, function (data) {
        $("#datatable").html(data);
      });
    })
  })

</script>
<script>
  $(document).ready(function () {
    $("#nowDay").change(function () {
      var deadline = $(this).val();
      $.get("/contacts/date/" + deadline, function (data) {
        $("#datatable").html(data);
      });
    })
  })

</script>
<script>
  $(document).ready(function (){
    $("#status").change(function (){
      var status = $(this).val();
      $.get("/contacts/hocphi/status/"+ status,function (data){
        $("#datatable").html(data);
      });
    })
  })
</script>

@endsection
