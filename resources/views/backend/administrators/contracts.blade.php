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
                    <h5>Danh sách hợp đồng</h5>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div id="dom-table_filter" class="dataTables_filter" style="margin-left: -145px;">
                      <button class="btn btn-success btn-round waves-effect waves-light"
                              style="margin-top: -6px;height: 35px;line-height: 13px; float: right">Thêm hợp đồng</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-block">
                <div class="table-responsive">
                  <table class="table table-hover m-b-0" id="datatable">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Customer</th>
                        <th>Company</th>
                        <th>Lead Score</th>
                        <th>Date</th>
                        <th>Tags</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <div class="d-inline-block">
                              <h6>Shirley Hoe</h6>
                              <p class="text-muted m-b-0">Sales executive , NY</p>
                            </div>
                          </div>
                        </td>
                        <td>Pinterest</td>
                        <td>223</td>
                        <td>19-11-2018</td>
                        <td>19-11-2018</td>
                        <td>
                          <label class="badge badge-inverse-primary">Sketch</label>
                          <label class="badge badge-inverse-primary">Ui</label>
                        </td>
                        <td><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <div class="d-inline-block">
                              <h6>James Alexander</h6>
                              <p class="text-muted m-b-0">Sales executive , EL</p>
                            </div>
                          </div>
                        </td>
                        <td>Facebook</td>
                        <td>268</td>
                        <td>19-11-2018</td>
                        <td>19-11-2018</td>
                        <td>
                          <label class="badge badge-inverse-primary">Ux</label>
                          <label class="badge badge-inverse-danger">Ui</label>
                          <label class="badge badge-inverse-danger">php</label>
                        </td>
                        <td><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <div class="d-inline-block">
                              <h6>Shirley Hoe</h6>
                              <p class="text-muted m-b-0">Sales executive , NY</p>
                            </div>
                          </div>
                        </td>
                        <td>Twitter</td>
                        <td>293</td>
                        <td>16-03-2018</td>
                        <td>
                          <label class="badge badge-inverse-danger">Sketch</label>
                          <label class="badge badge-inverse-primary">Ui</label>
                        </td>
                        <td><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <div class="d-inline-block">
                              <h6>Shirley Hoe</h6>
                              <p class="text-muted m-b-0">Sales executive , NY</p>
                            </div>
                          </div>
                        </td>
                        <td>Pinterest</td>
                        <td>223</td>
                        <td>19-11-2018</td>
                        <td>
                          <label class="badge badge-inverse-primary">Ux</label>
                          <label class="badge badge-inverse-success">Ui</label>
                          <label class="badge badge-inverse-warning">php</label>
                        </td>
                        <td><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <div class="d-inline-block">
                              <h6>James Alexander</h6>
                              <p class="text-muted m-b-0">Sales executive , EL</p>
                            </div>
                          </div>
                        </td>
                        <td>Facebook</td>
                        <td>268</td>
                        <td>19-11-2018</td>
                        <td>
                          <label class="badge badge-inverse-primary">Sketch</label>
                          <label class="badge badge-inverse-primary">Ui</label>
                        </td>
                        <td><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <div class="d-inline-block">
                              <h6>Shirley Hoe</h6>
                              <p class="text-muted m-b-0">Sales executive , NY</p>
                            </div>
                          </div>
                        </td>
                        <td>Twitter</td>
                        <td>293</td>
                        <td>16-03-2018</td>
                        <td>
                          <label class="badge badge-inverse-danger">Sketch</label>
                          <label class="badge badge-inverse-primary">Ui</label>
                        </td>
                        <td><a href="#!"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="#!"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                      </tr>
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
