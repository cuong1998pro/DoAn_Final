@extends('backend.layout.index')
@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    <div class="col-lg-8">
      <div class="page-header-title">
        <i class="feather icon-clipboard bg-c-blue"></i>
        <div class="d-inline">
          <h5>Basic Form Inputs</h5>
          <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="page-header-breadcrumb">
        <ul class=" breadcrumb breadcrumb-title">
          <li class="breadcrumb-item">
            <a href="index.html"><i class="feather icon-home"></i></a>
          </li>
          <li class="breadcrumb-item"><a href="#!">Form Components</a>
          </li>
          <li class="breadcrumb-item">
            <a href="#!">Basic Form Inputs</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>THÊM NHẬN XÉT</h5>
                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
              </div>
              <div class="card-block">
                <h4 class="sub-title">THÔNG TIN NHẬN XÉT</h4>
                <form>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Simple Input</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Placeholder</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Type your title in Placeholder">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" placeholder="Password input">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Read only</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="You can't change me" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Disable Input</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Disabled text" disabled="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Predefine
                      Input</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="Enter yout content after me">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Select Box</label>
                    <div class="col-sm-10">
                      <select name="select" class="form-control">
                        <option value="opt1">Select One Value Only</option>
                        <option value="opt2">Type 2</option>
                        <option value="opt3">Type 3</option>
                        <option value="opt4">Type 4</option>
                        <option value="opt5">Type 5</option>
                        <option value="opt6">Type 6</option>
                        <option value="opt7">Type 7</option>
                        <option value="opt8">Type 8</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Round Input</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-round" placeholder=".form-control-round">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Maximum
                      Length</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Content must be in 6 characters"
                        maxlength="6">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Disable
                      Autocomplete</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Autocomplete Off" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Static Text</label>
                    <div class="col-sm-10">
                      <div class="form-control-static">Hello !... This is
                        static text
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Color</label>
                    <div class="col-sm-10">
                      <input type="color" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload File</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Textarea</label>
                    <div class="col-sm-10">
                      <textarea rows="5" cols="5" class="form-control" placeholder="Default textarea"></textarea>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection