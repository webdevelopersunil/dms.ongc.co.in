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
        abort(500);
        return view('reports.total.index');
    }

    public function countTotal( Request $request ){

        $request->validate([
            'date_from' => 'required',
            'date_to' => 'required',
        ]);

        
        // $categories = DB::table('documents')->select('category', DB::raw('count(*) as total'))
        //                                     ->where('D_DateIN', '>=', $request->date_from)
        //                                     ->where('D_DateOUT', '<=', $request->date_to)
        //                                     ->orWhere('D_DateOUT', null)
        //                                     ->groupBy('category_id')->get();

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

        $params = '';
        $audits = \OwenIt\Auditing\Models\Audit::with('user')
            ->orderBy('created_at', 'desc')->paginate(10);

        return view('reports.audit.index', compact('audits', 'params'));
    }

    public function auditFilterbyDate($start, $end) {

        $params = "Showing results from $start to $end";

        $audits = \OwenIt\Auditing\Models\Audit::with('user')
            ->where('created_at', '>=', $start )
            ->where('created_at', '<=', $end )
            ->get();

        return view('reports.audit.index', compact('audits', 'params'));
    }

    public function auditFilterbyDiary($diary) {

        $params = "Showing results for diary no. $diary";

        $audits = \OwenIt\Auditing\Models\Audit::with('user')
                    ->where('auditable_id', $diary)->get();

        return view('reports.audit.index', compact('audits', 'params'));
    }

}
