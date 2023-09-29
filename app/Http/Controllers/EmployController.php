<?php

namespace App\Http\Controllers;

use App\Models\Employ;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class EmployController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employs = Employ::where('isdelete',0)->get();

        return view('employs.index',compact('employs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,FlasherInterface $flasher)
    {

         $this->validate($request, [
    'name' => 'required',
    'phone' => 'required',

    ]);
    $input = $request->all();
    $Employ = Employ::create($input);
    $flasher->addSuccess('تم اضافه العميل بنجاح');
    return redirect()->route('employs.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,FlasherInterface $flasher)
    {

$this->validate($request, [
    'name' => 'required',
    'phone' => 'required'
    ]);
    $input = $request->all();

    $Employ = Employ::where('id',$request->employ_id)->where('isdelete',0)->first();
    $Employ->update([
        'name'=>$request->name,
        'phone'=>$request->phone,
    ]);

    $flasher->addInfo('تم تعديل العميل بنجاح');

    return redirect()->route('employs.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id,FlasherInterface $flasher)
    {
        $Employ = Employ::where('id',$request->employ_id)->where('isdelete',0)->first();
        $Employ->isdelete=1;
        $Employ->save();
        $flasher->addError('تم حذف العميل بنجاح');
        return redirect()->route('employs.index');
    }
}
