@extends('backend.layout.index')
@section('content')
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="row">
          <div class="col-xl-4 col-md-6">
            <div class="card prod-p-card card-red">
              <div class="card-body">
                <div class="row align-items-center m-b-30">
                  <div class="col">
                    <h6 class="m-b-5 text-white">Tổng tiền thu trong tháng</h6>
                    <h3 class="m-b-0 f-w-700 text-white">{{ number_format(auth()->user()->tongThuThang(now())) }} VNĐ</h3>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="card prod-p-card card-success">
              <div class="card-body">
                <div class="row align-items-center m-b-30">
                  <div class="col">
                    <h6 class="m-b-5 text-white">Tổng tiền chi trong tháng </h6>
                    <h3 class="m-b-0 f-w-700 text-white">{{ number_format(auth()->user()->tongChiThang(now())) }} VNĐ</h3>

                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar text-c-blue f-18"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="card prod-p-card card-yellow">
              <div class="card-body">
                <div class="row align-items-center m-b-30">
                  <div class="col">
                    <h6 class="m-b-5 text-white">Số học sinh mới trong tháng</h6>
                    <h3 class="m-b-0 f-w-700 text-white">{{ \App\Models\HocSinh::whereMonth('created_at', now()->month)->count() }}</h3>
                  </div>
                  <div class="col-auto">
                    <i class="fa fa-user text-c-green f-18"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          {{-- GroupBar chart      --}}
          <div class="col-md-12 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5>Biểu đồ học sinh trong năm</h5>
              </div>
              <div class="card-block">
                <iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                <canvas id="bar-chart-grouped" width="284" height="284" style="display: block; width: 284px; height: 284px;"></canvas>
              </div>
            </div>
          </div>
          {{-- Line chart        --}}
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5>Biểu đồ thu chi</h5>
              </div>
              <div class="card-block">
                <canvas id="chart1" width="360px" height="360px"></canvas>
              </div>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="card col-sm-12">
            <div class="card-header">
              <h5>DANH SÁCH KHÓA HỌC</h5>
            </div>
            <div class="card-block table-border-style">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>TÊN KHÓA HỌC</th>
                      <th>ĐỘ TUỔI</th>
                      <th>SỐ LƯỢNG LỚP HỌC</th>
                      <th>SỐ LƯỢNG HỌC SINH</th>
                      <th>SỐ LƯỢNG GIẢNG VIÊN</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($khoahocs as $kh)
                    <tr>
                      <th scope="row" style="text-align: center">{{$kh->id}}</th>
                      <td style="white-space: normal">{{$kh->tenkhoahoc}}</td>
                      <td>{{$kh->dotuoi}}</td>
                      <td style="text-align: center">{{$kh->dsLopHoc->count()}}</td>
                      @php
                      $sohocsinh = $kh->dsLopHoc()->with('dslophoc')->get()->pluck('dslophoc')->collapse()->count();
                      $sogiaovien = $kh->dsLopHoc()->with('giaovien')->get()->count();
                      @endphp
                      <td style="text-align: center">{{$sohocsinh}}</td>
                      <td style="text-align: center">{{$sogiaovien}}</td>
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

@php $thuchi = auth()->user()->thongKeChiTieuNam(now());
$sohocsinh = auth()->user()->thongKeHocSinh();

@endphp

<script type="text/javascript" src="{{asset('assets/js/chart.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/chartjs-plugin-colorschemes.min.js')}}"></script>


<script>
  var data1 = {
    labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
    , datasets: [{
        label: "Tổng thu"
        , data: @json($thuchi['thu'])
      }
      , {
        label: "Tổng chi"
        , data: @json($thuchi['chi'])

      }
    ]
  };
  var bar = document.getElementById("chart1").getContext("2d");
  var myBarChart = new Chart(bar, {
    type: "bar"
    , data: data1
    , options: {
      barValueSpacing: 20
      , plugins: {
        colorschemes: {
          scheme: 'brewer.DarkTwo5'
        }
      }
      , scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });

</script>
{{-- groupedbar chart--}}
<script>
  new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar'
    , data: {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"]
      , datasets: [{
          label: "Số lương học sinh đang tư vấn"
          , backgroundColor: "#3e95cd"
          , data: @json($sohocsinh['dangtuvan'])
        }
        , {
          label: "Số lượng học sinh học thử"
          , backgroundColor: "#8e5ea2"
          , data: @json($sohocsinh['hocthu'])

        }
        , {
          label: "Số lượng học sinh bảo lưu"
          , backgroundColor: "#6e696e"
          , data: @json($sohocsinh['chinhthuc'])

        }
      ]
    }
    , options: {
      title: {
        display: true
        , text: 'Biểu đồ: Số lượng học sinh trong năm 2020'
      }
    }
  });

</script>
{{-- line chart--}}
{{-- <script>
  new Chart(document.getElementById("line-chart"), {
    type: 'line'
    , data: {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"]
      , datasets: [{
        data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478]
        , label: "Chi"
        , borderColor: "#3e95cd"
        , fill: false
      }, {
        data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267]
        , label: "Thu"
        , borderColor: "#8e5ea2"
        , fill: false
      }, ]
    }
    , options: {
      title: {
        display: true
        , text: 'Thu chi trong năm 2020'
      }
    }
  });

</script> --}}

@endsection
