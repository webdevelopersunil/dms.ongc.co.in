<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{

    public function index() {
        return view('reports.index');
    }

    public function total() {
        return view('reports.total.index');
    }

    public function countTotal( Request $request ){

        $request->validate([
            'date_from' => 'required',
            'date_to' => 'required',
        ]);

        
        $categories = DB::table('documents')->select('category', DB::raw('count(*) as total'))
                                            ->where('date_in', '>=', $request->date_from)
                                            ->where('date_out', '<=', $request->date_to)
                                            ->orWhere('date_out', null)
                                            ->groupBy('category')->get();

        $count = DB::table('documents')->where('date_in', '>=', $request->date_from)
                                        ->where('date_out', '<=', $request->date_to)
                                        ->orWhere('date_out', null)
                                        ->count();

        return view('reports.total.show')->with([
            'categories' => $categories,
            'count' => $count,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'documents' => collect([])
        ]);
    }

    public function showTotal( Request $request, $category ){
        // $documents =  Document::where('category', $request->selected )->get();
        $documents =  Document::where('category', $category )->get();

        return view('reports.total.show')->with([
            'categories' => json_decode($request->categories),
            'count' => $request->count,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'documents' => $documents
        ]);
    }

    public function audit() {
        $audits = \OwenIt\Auditing\Models\Audit::with('user')
            ->orderBy('created_at', 'desc')->get();

        return $audits;
    }

}
