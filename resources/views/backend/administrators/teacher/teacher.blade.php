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
                    <h5>Danh sách giáo viên</h5>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    @include('backend.administrators.teacher.add_teacher')
                  </div>
                </div>
              </div>
              <div class="card-block">
                <div class="table-responsive">
                  <table class="table table-hover m-b-0" id="datatable">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Giới tính</th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Tình trạng</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($teachers as $teacher)
                      <tr>
                        <td>{{$teacher->id}}</td>
                        <td>{{$teacher->hodem .' '.$teacher->ten}}</td>
                        <td>{{$teacher->gioitinh}}</td>
                        <td>{{$teacher->sodienthoai}}</td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->diachi}}</td>
                        <td>{{$teacher->tinhtrang}}</td>
                        <td style="display: flex; width: 64px;">
                          <div>
                            {{-- Xem chi tiết nhân viên --}}
                            <button data-id="{{$teacher->id}}" type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#show-Modal" style="background-color: white; border: none; padding: 0;">
                              <i class="fa fa-eye f-w-600 f-16 m-r-15 text-c-green"></i>
                            </button>
                            <div class="modal fade show" id="show-Modal" tabindex="-1" role="dialog" style="z-index: 1050;display: none; padding-right: 17px;">
                            </div>
                          </div>
                          <!-- Modal Sua -->
                          <div>
                            <button class="my_edit" data-id="{{$teacher->id}}" data-toggle="modal" data-target="#edit-Modal" style="border: none; background-color: transparent">
                              <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
                            </button>
                            <div class="modal fade show" id="edit-Modal" tabindex="-1" role="dialog" style="z-index: 1050;display: none; padding-right: 17px;">
                            </div>
                          </div>
                          {{-- Xóa giáo viên --}}
                          <div>
                            <form action="{{route('teachers.destroy', $teacher->id)}}" method="post">
                              @method('DELETE')
                              @csrf
                              <button style="border: none; padding:0px; margin: -1px 0px 0px -15px; background-color: transparent" onclick="return confirm ('Bạn có muốn xóa không')">
                                <i class="feather icon-trash-2 f-w-600 f-16 m-r-15 text-c-red" style="margin:0;">
                                </i>
                              </button>
                            </form>
                          </div>
                        </td>
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
@endsection
@section('script')
<script>
  function myReset() {
    document.getElementById('main').reset();
  };

</script>

<script>
  $(document).
  ready(function() {
    $('.btn.btn-primary').click(function(e) {
      id = $(this).data('id');
      $('#show-Modal').load("/administrators/teachers/" + id);
      $('#show-Modal').show();
      $('body').addClass('modal-open');


      $('.modal-backdrop').show();
    });
    $('.my_edit').click(function(e) {
      id = $(this).data('id')
      $('#edit-Modal').load("/administrators/teachers/" + id + '/edit');
      $('#edit-Modal').show();
      $('body').addClass('modal-open');


      $('.modal-backdrop').show();

    })
  });

</script>

@endsection
