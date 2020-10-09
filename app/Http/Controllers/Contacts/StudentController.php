<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\PhuHuynh;
use App\Models\User;
use App\Models\HocSinh;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $students = HocSinh::orderBy('ten', 'ASC')->paginate(10);
        return view('backend.contact.listStudent',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        HocSinh::create($data);
        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hocsinh = HocSinh::findOrFail($id);
        return view('backend.contact.show_student_modal', ['hocsinh' => $hocsinh]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $hocsinh =  HocSinh::find($id);
        //  return $hocsinh;
        return view('backend.contact.edit_student_modal', ['hocsinh'=>$hocsinh] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hocsinh = HocSinh::findOrFail($id);
        $hocsinh->fill($request->all());
        $hocsinh->save();
        return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HocSinh::where('id', '=' , $id)->delete();
        return redirect(route('students.index'));
    }
}
