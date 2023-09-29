<?php

namespace App\Http\Controllers;

use App\Models\Employ;
use App\Models\Import;
use App\Models\Product;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imports = Import::get();
        $products = Product::where('isdelete',0)->get();
        $employs = Employ::where('isdelete',0)->get();

        return view('imports.index',compact('imports','products','employs'));
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
            'product_id' => 'required',
            'quantity' => 'required',
            'employ_id' => 'required',

            ]);
            $product = Product::where('id',$request->product_id)->where('isdelete',0)->first();
            if($request->quantity > $product->quantity ){
                $flasher->addError('الكميه غير متوافره');
                return redirect()->back();
            }
            $input = $request->all();
            $Import = Import::create($input);
            $product->quantity-=$request->quantity;
            $product->save();
            $flasher->addSuccess('تم التصدير بنجاح');
            return redirect()->route('imports.index');
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
            'product_id' => 'required',
            'quantity' => 'required',
            'employ_id' => 'required',

            ]);
            $product = Product::where('id',$request->product_id)->where('isdelete',0)->first();
            if($request->quantity > $product->quantity ){
                $flasher->addError('الكميه غير متوافره');
                return redirect()->back();
            }

            $Import = Import::find($request->id);
            $product->quantity+=$Import->quantity;
            $product->save();

            $Import->update([
                'product_id'=>$request->product_id,
                'quantity'=>$request->quantity,
                'employ_id'=>$request->employ_id,
            ]);

            $product->quantity-=$request->quantity;
            $product->save();
            $flasher->addInfo('تم تعديل الصادر بنجاح');
            return redirect()->route('imports.index')
            ->with('success','Import created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id,FlasherInterface $flasher)
    {
        $import = Import::find($request->id);

        $product = Product::where('id',$import->product_id)->where('isdelete',0)->first();
        $product->quantity+= $import->quantity;
        $product->save();
        $import->delete();
        $flasher->addError('تم حذف الصادر بنجاح');
        return redirect()->route('imports.index');
    }
}
