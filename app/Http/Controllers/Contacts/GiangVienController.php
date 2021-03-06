<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Models\GiaoVien;
use Illuminate\Http\Request;

class GiangVienController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = GiaoVien::all();
    return view('backend.contact.giangvien.list_giangvien', [
      'teachers' => $data,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
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
   * @param  \App\Models\GiaoVien  $giaoVien
   * @return \Illuminate\Http\Response
   */
  public function show(GiaoVien $giaoVien)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\GiaoVien  $giaoVien
   * @return \Illuminate\Http\Response
   */
  public function edit(GiaoVien $giaoVien)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\GiaoVien  $giaoVien
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, GiaoVien $giaoVien)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\GiaoVien  $giaoVien
   * @return \Illuminate\Http\Response
   */
  public function destroy(GiaoVien $giaoVien)
  {
    //
  }
}
