@extends('backend.layout.index')
@section('content')
<style>
  :root {
    --sang: #a8ee06;
    --chieu: #EADE06;
    --toi: #FF611B;
  }

</style>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">
          <div class="card-header">
            <h5>Lịch trình</h5>
          </div>
          <div class="card-block table-border-style">
            <div class="table-responsive">
              <table class="table table-bordered" id="our_table">
                <thead>
                  <tr>
                    <th>THỨ</th>
                    @php
                    Carbon\Carbon::setLocale('vi');
                    $start = Carbon\Carbon::today()->startOfWeek();
                    @endphp
                    @for($i = 0; $i<7 ; $i++) @if($i !=6) <th style="text-align: center">THỨ {{$i+2}}
                      <p class=" m-b-0 text-muted">{{$start->format('d/m/Y')}}</p>
                      </th>
                      @else
                      <th style="text-align: center">CHỦ NHẬT
                        <p class=" m-b-0 text-muted">{{$start->format('d/m/Y')}}</p>
                      </th>
                      @endif
                      @php
                      $start->addDays(1);
                      @endphp
                      @endfor
                  </tr>
                </thead>
                <tbody>
                  @for($j=1; $j < 4; $j++) <tr>
                    @switch($j)
                    @case(1)
                    <th scope="row" style="background-color: var(--sang); vertical-align: middle">SÁNG</th>
                    @break
                    @case(2)
                    <th scope="row" style="background-color: var(--chieu); vertical-align: middle">CHIỀU</th>
                    @break
                    @case(3)
                    <th scope="row" style="background-color: var(--toi); vertical-align: middle">TỐI</th>
                    @break
                    @default
                    @endswitch
                    @for($i=0 ; $i<7; $i++) @php $temp=$dsLopHoc->filter(function($query) use ($i, $j) {

                      return $query->lichHoc->where('caHoc.buoi' , $j)->where('thu' , $i+2)->count() > 0;

                      });

                      // $dsLopHoc->where('lichHoc.thu' , $i+2)->where('lichHoc.caHoc.buoi' , $j);
                      @endphp

                      @if(count($temp)>0)
                      <td style="padding: 0">
                        <div class="event" draggable="true" id={{random_int(0,10000000000000)}}>
                          <table>
                            @foreach ($temp as $item)
                            <tr>
                              <td style="white-space: normal; background-color: #{{str_pad(dechex(mt_rand(0xAA  , 0xFF)), 2, '0', STR_PAD_LEFT).
                            str_pad(dechex(mt_rand(0xAA  , 0xFF)), 2, '0', STR_PAD_LEFT).
                            str_pad(dechex(mt_rand(0xAA  , 0xFF)), 2, '0', STR_PAD_LEFT)}}; font-weight: 600">
                                <a href="{{ route('allclass.show', $item->id) }}">
                                  {{$item->tenlop}}
                                  <p class=" m-b-0 text-muted">Thời gian: {{$item->lichhoc[0]->caHoc->thoigianbatdau}} - {{$item->lichhoc[0]->caHoc->thoigianketthuc}} </p>
                                  <p class=" m-b-0 text-muted">Khóa học: {{$item->khoaHoc->tenkhoahoc}}</p>
                                  <p class=" m-b-0 text-muted">Bài học : {{$item->sobuoidahoc}}/{{$item->sobuoi}}</p>
                                  <p class=" m-b-0 text-muted">Phòng học: {{$item->lichhoc[0]->phonghoc->tenphong}}</p>
                                </a>
                              </td>
                            </tr>
                            @endforeach
                          </table>
                        </div>
                      </td>
                      @else
                      <td style="padding:0">

                      </td>
                      @endif
                      @endfor </tr> @endfor
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@if(auth()->user()->role_id ==1 == 1)
@section('script')
<script>
  $(document).ready(function() {
    $('.event').on("dragstart", function(event) {
      var dt = event.originalEvent.dataTransfer;
      dt.setData('Text', $(this).attr('id'));
    });
    $('#our_table td').on("dragenter dragover drop", function(event) {
      event.preventDefault();
      if (event.type === 'drop') {
        var data = event.originalEvent.dataTransfer.getData('Text', $(this).attr('id'));

        de = $('#' + data).detach();
        if (event.originalEvent.target.tagName === "DIV") {
          de.insertBefore($(event.originalEvent.target));
        } else {
          de.appendTo($(this));
        }
      };
    });
  });

</script>

@endsection

@endif
