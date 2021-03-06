@extends('backend.layout.index')
@section('content')
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-block tab-icon">
                <div class="row">
                  <div class="col-lg-12">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active show" data-toggle="tab" href="#home7" role="tab" aria-selected="true" style="font-size: 14px; font-weight: bold;">
                          <i class="fa fa-info-circle"></i>Chi tiết lớp học</a>
                        <div class="slide"></div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#messages7" role="tab" aria-selected="false" style="font-size: 14px; font-weight: bold;">
                          <i class="fa fa-fort-awesome"></i>Theo dõi bài tập về nhà</a>
                        <div class="slide"></div>
                      </li>
                    </ul>
                    <div class="tab-content card-block">
                      {{-- Thông tin khóa học    --}}
                      <div class="tab-pane active show" id="home7" role="tabpanel">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="card">
                              <div class="card-header">
                                <h6 style="color: #2ce00c; font-size: 14px; font-weight: bold" ;>Lớp học:
                                  {{$class->khoaHoc->tenkhoahoc}}</h6>
                              </div>
                              <div class="card-block">
                                <div class="row ui-sortable" id="draggablePanelList">
                                  <div class="col-lg-12 col-xl-6 ui-sortable-handle">
                                    <div class="card-sub">
                                      <div class="card-block" style="margin-top: -25px">
                                        <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0"><i class="fa fa-code"></i>Mã lớp học :</h6>
                                        <h6 class="card-title">
                                          <b>{{$class->tenlop}}</b></h6>
                                      </div>
                                      <div class="card-block" style="margin-top: -40px">
                                        <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0"><i class="fa fa-calendar"></i>Thời gian học :</h6>
                                        <h6 class="card-title">
                                          <b>{{$class->ngaybatdau}} đến {{$class->ngayketthuc}}</b></h6>
                                      </div>
                                      @php
                                      $lichhoc = $class->lichHoc[0];
                                      @endphp
                                      <div class="card-block" style="margin-top: -40px">
                                        <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0"><i class="fa fa-clock-o"></i>Lịch học :</h6>
                                        <h6 class="card-title">
                                          <b>{{$lichhoc->caHoc->thoigianbatdau}}-{{$lichhoc->caHoc->thoigianketthuc}}
                                            @foreach($class->lichHoc as $key=> $lichhoc)
                                            @if($lichhoc->thu == 8)
                                            Chủ nhật
                                            @else
                                            Thứ {{ $lichhoc->thu }}
                                            @endif
                                            @if($key != count($class->lichhoc)-1)
                                            @endif
                                            @endforeach
                                          </b></h6>
                                      </div>
                                      <div class="card-block" style="margin-top: -40px">
                                        <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0"><i class="fa fa-graduation-cap"></i>Giảng viên :</h6>
                                        <h6 class="card-title"><b>
                                            {{$class->giaoVien->hodem. ' ' . $class->giaoVien->ten}}</b></h6>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-12 col-xl-6 ui-sortable-handle">
                                    <div class="card-sub">
                                      <div class="card-block" style="margin-top: -25px">
                                        <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0"><i class="fa fa-bars"></i>Khóa học: </h6>
                                        <h6 class="card-title">
                                          <b>{{$class->khoaHoc->tenkhoahoc}}</b></h6>
                                      </div>
                                      <div class="card-block" style="margin-top: -40px">
                                        <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0"><i class="fa fa-book"></i>Bài học :</h6>
                                        <h6 class="card-title">
                                          <b>{{$class->sobuoidahoc}}/{{$class->sobuoi}}</b></h6>
                                      </div>
                                      <div class="card-block" style="margin-top: -40px">
                                        <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0"><i class="fa fa-bank"></i>Loại lớp học :</h6>
                                        <h6 class="card-title"><b>Group
                                            Class</b></h6>
                                      </div>
                                      <div class="card-block" style="margin-top: -40px">
                                        <h6 class="card-title col-sm-auto" style="float: left; margin:0px 10px 0px 0px; padding: 0"><i class="fa fa-building-o"></i>Trung tâm :</h6>
                                        <h6 class="card-title"> TEKY - Center: 104 Lương Khánh Thiện - HP</h6>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        {{-- Thông tin buổi học --}}
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="card">
                              <div class="card-header">
                                <div class="card-header-left">
                                  <h6>Lộ trình khóa học : {{$class->khoaHoc->tenkhoahoc}}</h6>
                                </div>
                              </div>

                              @php
                              $dsBuoiHoc = $class->dsBuoiHoc;
                              @endphp
                              <div class="card-block">
                                <ul>
                                  @php $select_id = optional($dsBuoiHoc->firstWhere('trangthai', '!=', 'Đã kết thúc'))->id @endphp
                                  @foreach($dsBuoiHoc as $key=>$buoiHoc)
                                  <li style="text-align: center; margin-left: 18px; float: left">
                                    <span>---</span>
                                    <button class="btn waves-effect waves-light buoihoc
                                    @if($buoiHoc->trangthai == 'Đã kết thúc') btn-success
                                    @else
                                      @if($buoiHoc->trangthai == 'Đang diễn ra' ) btn-warning
                                      @endif
                                      @endif" style="border-radius: 50%; padding: 5px 10px" @if($buoiHoc->trangthai == 'Chưa kết thúc' && $buoiHoc->id != $select_id)
                                      disabled
                                      @endif data-id="{{$buoiHoc->id}}" id="buoihoc{{$buoiHoc->id}}">{{$key+1}}</button>

                                    <span>---</span>
                                    <div class="sub-text">{{$buoiHoc->ngayhoc}}</div>
                                    @if($buoiHoc->checkin)
                                    <div class="sub-title">
                                      {!! $buoiHoc->checkin->giocheckin !!}-
                                      {!! $buoiHoc->checkin->giocheckout !!}</div>
                                    @else
                                    ... - ...
                                    @endif
                                  </li>
                                  @endforeach
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="buoihoc"></div>
                        {{-- @include('backend.teachers.classes.buoihoc') --}}
                      </div>


                      {{-- Danh sách dự án của học sinh --}}
                      <div class="tab-pane" id="messages7" role="tabpanel">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card table-card">
                              <div class="card-header">
                                <div class="row">
                                  <div class="col-xs-12 col-sm-12 col-md-6">
                                    <h6>Danh sách theo dõi quá trình làm bài tập về nhà</h6>
                                  </div>
                                </div>
                              </div>
                              <div class="card-block">
                                <div class="table-responsive">
                                  <table class="table table-hover m-b-0">
                                    <thead>
                                      <tr>
                                        <th>HỌ VÀ TÊN</th>
                                        @for($i = 1 ; $i<=$class->dsBuoihoc->count() ; $i++) <th>LESSON {{$i}}</th>
                                          @endfor
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($class->dslophoc as $phanlop)
                                      <tr>
                                        <td>
                                          <div class="d-inline-block align-middle">
                                            <div class="d-inline-block">
                                              <h6>{{$phanlop->hocsinh->hodem. ' '. $phanlop->hocsinh->ten}}</h6>
                                            </div>
                                          </div>
                                        </td>
                                        @foreach($class->dsbuoihoc as $buoihoc)

                                        @php
                                        $socau = App\Models\BuoiHoc::sobaitap($phanlop->hoc_sinh_id, $buoihoc->id);
                                        $socaudung = App\Models\BuoiHoc::socaudung($phanlop->hoc_sinh_id, $buoihoc->id);
                                        if($socau != 0) $diem = round($socaudung/$socau,2)*10;
                                        else $diem = -1;
                                        @endphp

                                        <td style="text-align: center">{{$diem != -1 ? "$diem/10" : '-'}}</td>

                                        @endforeach
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
  $(document).ready(function() {

    $('.buoihoc').click(function() {
      $('#buoihoc').load('/teachers/lessons/' + $(this).data('id'));
    });
    $("#buoihoc{{ $select_id }}").click();
    $("#buoihoc{{ $select_id }}").focus();


  });

</script>
@endsection
