<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Import;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    public function index(){
        return view('reports.index');
    }

    public function datatables(Request $request)
    {
        $tasks = Import::leftJoin('products', 'products.id','=','imports.product_id')
            ->leftJoin('employs', 'employs.id','=','imports.employ_id')

            ->select([ 'imports.id','imports.quantity','products.name as product','products.code as code', 'employs.name as employ','imports.created_at',]);
        return Datatables::of($tasks)

            ->editColumn('created_at', function ($tasks) {
                return $tasks->created_at ? with(new Carbon($tasks->created_at))->format('Y-m-d') : '';
            })
            ->filter(function ($tasks) use ($request) {
                if ($request->has('searchImport') and $request->get('searchImport') != "") {
                    $tasks->where(function ($tasks) use ($request){
                            $tasks->where('imports.id', 'like', "%{$request->get('searchImport')}%")
                                ->orWhere('products.name', 'like', "%{$request->get('searchImport')}%")
                                ->orWhere('products.code', 'like', "%{$request->get('searchImport')}%")
                                ->orWhere('imports.quantity', 'like', "%{$request->get('searchImport')}%")
                                ->orWhere('employs.name', 'like', "%{$request->get('searchImport')}%")
                                ->orWhere('imports.created_at', 'like', "%{$request->get('searchImport')}%");
                        });
                }
                if ($request->has('monthId') and $request->get('monthId') != "") {
                    $tasks->whereMonth('imports.created_at', '=', "{$request->get('monthId')}");
                }
                if ($request->has('yearId') and $request->get('yearId') != "") {
                    $tasks->whereYear('imports.created_at', '=', "{$request->get('yearId')}");
                }
            })->make(true);
    }

}
