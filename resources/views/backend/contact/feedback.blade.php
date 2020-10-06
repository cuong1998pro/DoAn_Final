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
                      <h5>DANH SÁCH NHẬN XÉT</h5>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                      <div id="dom-table_filter" class="dataTables_filter" style="margin-left: -50px;">
                        <label style="display: flex">Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="dom-table" style="width: 250px; height: 25px;margin-top: 0px;margin-left: 10px;"></label>
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
                    <table class="table table-hover m-b-0" id="example">
                      <thead>
                      <tr>
                        <th>STT</th>
                        <th>Username</th>
                        <th>Thời gian</th>
                        <th>Nội dung</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($feedback as $fb)
                      <tr>
                        <td>{{$fb->id}}</td>
                        <td>{{$fb->user->username}}</td>
                        <td>{{$fb->thoigian}}</td>
                        <td>{{$fb->nhanxet}}</td>
                        <td>
                          <button type="button" class="btn btn-primary waves-effect"
                                  data-toggle="modal" data-target="#large-Modal"
                                  style="background-color: white; border: none; padding: 0" id="{{$fb->id}}">
                            <i class="fa fa-eye f-w-600 f-16 m-r-15 text-c-green"></i></button>
                      </tr>
                      @endforeach
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
  <div class="modal fade show" id="large-Modal" tabindex="-1" role="dialog" style="z-index: 1050;display: none; padding-right: 17px;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Chi tiết nhận xét</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="main" method="post" action="https://colorlib.com/" novalidate="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">User Name: </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="user_name" id="feedback_id" placeholder="UserName">
                <span class="messages"></span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Đối tượng nhận xét</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="password" name="doituongnhanxet_id" placeholder="Đối tượng nhận xét">
                <span class="messages"></span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Thời gian</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="repeat-password" name="thoigian" placeholder="Thời gian nhận xét">
                <span class="messages"></span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nội dung nhận xét</label>
              <div class="col-sm-10">
                <textarea rows="5" cols="5" class="form-control" placeholder="Default textarea" name="nhanxet"></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect " data-dismiss="modal" onclick="myReset()">Đóng</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script>

  </script>
@endsection
