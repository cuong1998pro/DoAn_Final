<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\HocSinh;
use Illuminate\Http\Request;

class LichController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $dsLopHoc = auth()
      ->user()
      ->hocSinh->dslophoc()
      ->with('lophoc')
      ->get()
      ->pluck('lophoc');
    // return $dsLopHoc;
    return view('backend.teachers.calendar', compact('dsLopHoc'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\HocSinh  $hocSinh
   * @return \Illuminate\Http\Response
   */
  public function show(HocSinh $hocSinh)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\HocSinh  $hocSinh
   * @return \Illuminate\Http\Response
   */
  public function edit(HocSinh $hocSinh)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\HocSinh  $hocSinh
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, HocSinh $hocSinh)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\HocSinh  $hocSinh
   * @return \Illuminate\Http\Response
   */
  public function destroy(HocSinh $hocSinh)
  {
    //
  }
}
