<?php

namespace App\Http\Controllers;

use App\Category;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ReportsController extends Controller
{

    public function index() {
        return view('reports.index');
    }

    public function total() {
        // abort(500);
        return view('reports.total.index');
    }

    public function countTotal( Request $request ){

        $request->validate([
            'date_from' => 'required',
            'date_to' => 'required',
        ]);

        
        $categories = DB::table('documents')->select('category_id', DB::raw('count(*) as total'))
                                            ->where('D_DateIN', '>=', $request->date_from)
                                            ->where('D_DateOUT', '<=', $request->date_to)
                                            // ->orWhere('D_DateOUT', null)
                                            ->groupBy('category_id')->get();

        $count = DB::table('documents')->where('D_DateIN', '>=', $request->date_from)
                                        ->where('D_DateOut', '<=', $request->date_to)
                                        // ->orWhere('D_DateIN', null)
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
        
        $documents =  Document::where([
            [ 'category_id', $category ],
            [ 'D_DateIN', '>=', $request->date_from],
            [ 'D_DateOut', '<=', $request->date_to],
        ])->orderBy('D_DATE', 'desc')->paginate(100);

        session(['categories' => $request->categories]);
        session(['selected' => $category]);
        session(['count' => $request->count]);
        session(['date_from' => $request->date_from]);
        session(['date_to' => $request->date_to]);

        return view('reports.total.show')->with([
            'categories' => json_decode($request->categories),
            'count' => $request->count,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'documents' => $documents
        ]);
    }

    public function export() {

        if(session('selected') && session('date_from') && session('date_to')) {
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=documents.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );
            $documents = Document::where([
                [ 'category_id', session('selected') ],
                [ 'D_DateIN', '>=', session('date_from') ],
                [ 'D_DateOut', '<=', session('date_to') ]
            ])->get();

            $columns = array('DiaryNo', 'LetterNo', 'DATE', 'DateIN', 'DateOut', 'Subject', 'FileNo', 'MarkedBy', 'MarkedTo', 'CopyTo', 'Remarks', 'Received From');
            $callback = function () use ($documents, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                foreach ($documents as $document) {
                    $line = array( 
                        $document->D_diaryNo, 
                        $document->D_LetterNo, 
                        $document->D_DATE, 
                        $document->D_DateIN, 
                        $document->D_DateOut, 
                        $document->D_Subject, 
                        $document->D_fileno, 
                        $document->D_MarkedBy, 
                        $document->D_MarkedTo, 
                        $document->D_CopyTO, 
                        $document->D_Remarks, 
						$document->D_SendersName 
                    );
                    fputcsv($file, $line);
                }
                fclose($file);
            };
            return Response::stream($callback, 200, $headers);
        }

        abort(500, 'Something went wrong!');
    }

    public function showPaginate(Request $request, $category) {

        $documents =  Document::where('category_id', $category )->orderBy('D_DATE', 'desc')->paginate(100);

        $categories = session('categories');
        $count = session('count');
        $date_from = session('date_from');
        $date_to = session('date_to');

        if(!session('categories') || !session('count')) {
            abort(500, 'Error getting session variables');
        }

        return view('reports.total.show')->with([
            'categories' => json_decode($categories),
            'count' => $count,
            'date_from' => $date_from,
            'date_to' => $date_to,
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

        $document = Document::where('D_diaryNo', $diary)->get()->last();

        $audits = \OwenIt\Auditing\Models\Audit::with('user')
                    ->where('auditable_id', $document->id)->get();

        return view('reports.audit.index', compact('audits', 'params'));
    }

}
