<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('isdelete',0)->get();

        return view('products.index',compact('products'));
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
            'code' => 'required',
            'quantity' => 'required',

            ]);

            $input = $request->all();
            $Product = Product::create($input);
            $flasher->addSuccess('تم اضافه البضاعه بنجاح');

            return redirect()->route('products.index');

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
            'code' => 'required',
            'quantity' => 'required',
            ]);

            $input = $request->all();
            $Product = Product::where('id',$request->product_id)->where('isdelete',0)->first();
            $Product->update([
                'name'=>$request->name,
                'code'=>$request->code,
                'quantity'=>$request->quantity,
            ]);

            $flasher->addInfo('تم تعديل البضاعه بنجاح');
            return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id,FlasherInterface $flasher)
    {
        $Product = Product::where('id',$request->product_id)->where('isdelete',0)->first();
        $Product->isdelete=1;
        $Product->save();
        $flasher->addError('تم حذف البضاعه بنجاح');
        return redirect()->route('products.index');
    }
}
