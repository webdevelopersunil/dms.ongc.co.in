<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Document;
use Carbon\Carbon;
use App\Subcategory;
use App\Events\UserEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DocumentController extends Controller
{

    public function index()
    { }

    public function empty()
    {
        return 'no category provided!';
    }

    public function create(Request $request)
    {

        $category = $request->input('category');
        $subcategory = $request->input('subcategory');

        if (!$category) {
            return redirect('/home')->with('error', 'Select a category to continue');
        }

        if ($category == 2 && $subcategory == null) {
            return redirect('/home')->with('error', 'Select a subcategory to continue');
        }

        $category = Category::find($category);
        $subcategory = Subcategory::find($subcategory);

        if($category->cm_IsInUse) {
            return redirect('/home')->with('error', "Category is being used by $category->cm_UsedBy");
        }

        $category->cm_IsInUse = true;
        $category->cm_UsedBy = Auth::user()->name;
        $category->save();

        // if (User::where('category', $category)->where('working_on', 'Create')->count() > 0) {
        //     return redirect('/home')->with('error', 'Someone else is creating a document with the same category');
        // }

        // event(new UserEvent(Auth::user(), 'Create', $category));

        $today = Carbon::now()->toDateString();
        // $diary = DB::table('auto_increment')->where('category', $category->id)->first()->counter;
        $diary = $category->cm_diaryno;

        return view('document.create', compact('category', 'subcategory', 'diary', 'today'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'category_id' => 'required',
            'D_LetterNo' => 'required',
            'D_DATE' => 'required',
            'D_Subject' => 'required',
        ]);

        $document = Document::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'D_diaryNo' => $request->D_diaryNo,
            'D_DateIN' => $request->D_DateIN,
            'D_LetterNo' => $request->D_LetterNo,
            'D_DATE' => $request->D_DATE,
            'D_SendersName' => $request->D_SendersName,
            'D_SenderDYNo' => $request->D_SenderDYNo,
            'D_Subject' => $request->D_Subject,
            'dealing_officer' => $request->dealing_officer,
            'D_MarkedTo' => $request->D_MarkedTo,
            'D_CopyTO' => $request->D_CopyTO,
            'D_DateOut' => $request->D_DateOut,
            'D_MarkedBy' => $request->D_MarkedBy,
            'D_fileno' => $request->D_fileno,
            'D_Remarks' => $request->D_Remarks,
            'D_LetteraddressedTo' => $request->D_LetteraddressedTo,
            'D_LetterSignedBy' => $request->D_LetterSignedBy,
        ]);

        // TO INCORPORATE FILE SCAN DURING CREATE TIME
        // BY DEFAULT FILE SCAN HAPPENS DURING EDITING
        // if( $document->file_date != null ) {
        //     $date = Carbon::createFromFormat('Y-m-d', $document->file_date);
        //     if( $document->category == 'cmd_office_correspondence' ){
        //         // $subcategory = isset($this->subcategories[$document->subcategory]) ? $this->subcategories[$document->subcategory] : 'CMD00';
        //         // $url = "uploads/" . $document->category . "/$subcategory/$date->year/$date->englishMonth/" . $document->file_no . ".pdf";
        //         $subfolder = $document->subcategory == '' ? 'misc' : $document->subcategory;
        //         $url = "uploads/" . $document->category . "/$subfolder/$date->year/$date->englishMonth/" . $document->file_no . ".pdf";
        //         $document->file_url = $url;
        //     } else {
        //         if( $document->category != '' ) {
        //             $url = "uploads/" . $document->category . "/$date->year/$date->englishMonth/" . $document->file_no . ".pdf";
        //             $document->file_url = $url;
        //         }
        //     }
        //     $document->save();
        // }

        // $date = Carbon::now();
        // $folder =  $date->year . "/" . $date->englishMonth . "/" . $document->diary_no;
        // if( $request->hasFile('file_url') ){
        //     $document_name = Carbon::now()->format('YmdHis') . "_" . $request->file('file_url')->getClientOriginalName();
        //     $document_path = $request->file('file_url')->storeAs("public/uploads/$folder", $document_name);
        //     $document->file_url = explode( "/", $document_path, 2 )[1];
        //     $document->save();
        // }

        // DB::table('auto_increment')->where('category', $request->category)->update(['counter' => $document->diary_no + 1]);
        $category = Category::find($request->category_id);
        $category->cm_diaryno = $document->D_diaryNo + 1;
        $category->cm_IsInUse = false;
        $category->cm_UsedBy = '';
        $category->save();

        $redirectUrl = "/document/create?category=$category->id&subcategory=$request->subcategory_id";
        return redirect($redirectUrl)->with('success', 'Document has been created successfully');
        // return redirect("/document/view/$document->id")->with('success', 'Document has been created successfully');
    }


    public function show($id)
    {
        $document = Document::findOrFail($id);

        // event(new UserEvent(Auth::user(), 'View'));

        // $references = Document::where('diary_no', $document->diary_no)
        //     ->where('reference_of', $document->id)
        //     ->orderBy('reference_of')
        //     ->get();

        // if selected document is a reference document
        // should return all other references plus the main document
        // if ($document->reference_of != -1) {

        //     $references = Document::where([
        //         ['reference_of', $document->reference_of],
        //         ['id', '!=', $document->id]
        //     ])->get();

        //     $main = Document::find($document->reference_of);

        //     $references = $references->push($main);
        // }

        $date = Carbon::create($document->D_DATE);

        if ($document->category_id == 2) {
            $subfolder = $document->subcategory ? $document->subcategory->scm_foldername : '';
            $url = "http://dms.ongc.co.in/storage/uploads/" . $document->category->cm_folder . "/$subfolder/$date->year/$date->englishMonth/" . $document->D_fileno . ".pdf";
        } else {
            if ($document->category != '') {
                $url = "http://dms.ongc.co.in/storage/uploads/" . $document->category->cm_folder . "/$date->year/$date->englishMonth/" . $document->D_fileno . ".pdf";
            }
        }

        return view('document.show', compact('document', 'url'));
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            // 'D_DateOut' => 'required',
            // 'D_DATE' => 'required',
            // 'D_Subject' => 'required',
        ]);

        $document = Document::find($id);
        $document->D_LetterNo = $request->D_LetterNo;
        $document->D_DATE = $request->D_DATE;
        $document->D_SendersName = $request->D_SendersName;
        $document->D_Subject = $request->D_Subject;
        $document->D_diaryNo = $request->D_diaryNo;
        $document->D_LetterFromGovt = $request->D_LetterFromGovt;
        $document->D_fileno = $request->D_fileno;
        $document->D_MarkedTo = $request->D_MarkedTo;
        $document->D_CopyTO = $request->D_CopyTO;
        $document->D_DateIN = $request->D_DateIN;
        $document->D_DateOut = $request->D_DateOut;
        $document->D_MarkedBy = $request->D_MarkedBy;
        $document->D_Remarks = $request->D_Remarks;
        $document->D_LetteraddressedTo = $request->D_LetteraddressedTo;
        $document->D_LetterSignedBy = $request->D_LetterSignedBy;
        $document->D_SenderDYNo = $request->D_SenderDYNo;
        $document->dealing_officer = $request->dealing_officer;

        // $date = Carbon::now();
        // if ($document->category == 'cmd_office_correspondence') {
        //     $subfolder = $document->subcategory == '' ? 'misc' : $document->subcategory;
        //     $url = "uploads/" . $document->category . "/$subfolder/$date->year/$date->englishMonth/" . $document->file_no . ".pdf";
        //     $document->file_url = $url;
        // } else {
        //     if ($document->category != '') {
        //         $url = "uploads/" . $document->category . "/$date->year/$date->englishMonth/" . $document->file_no . ".pdf";
        //         $document->file_url = $url;
        //     }
        // }

        $document->save();

        // FOR FILE UPLOAD FROM BROWSER
        // if( $request->hasFile('file_url') ){
        //     $document_name = Carbon::now()->format('YmdHis') . "_" . $request->file('file_url')->getClientOriginalName();
        //     $document_path = $request->file('file_url')->storeAs("public/uploads/$folder", $document_name);
        //     $document->file_url = explode( "/", $document_path, 2 )[1];
        //     $document->save();
        // }

        $category = Category::find($document->category_id);
        $category->cm_IsInUse = false;
        $category->cm_UsedBy = '';
        $category->save();

        // $redirectUrl = "/document/create?category=$document->category_id&subcategory=$document->subcategory_id";
        // return redirect($redirectUrl)->with('success', 'Document has been created successfully');

        $redirectUrl = "/document/view/$document->id?hyperlink";
        return redirect($redirectUrl)->with('success', 'Document updated succesfully');
    }


    public function destroy($id)
    {
        //
    }

    public function resetForm(Request $request)
    {
        $remember = new Document;
        
        session(['conditions' => null]);
        session(['remember' => $remember]);

        $category = $request->input('category') ?? '';
        $subcategory = $request->input('subcategory') ?? '';
        $limitSearch = false;
        return view('document.search', compact('category', 'subcategory', 'limitSearch', 'remember'));
    }

    public function sort(Request $request) {

        if(session('conditions') && session('remember')) {

            if($request->input('column')) {
                $column = $request->input('column') ?? 'D_diaryNo';
                session(['sortBy' => $column ]);
            } else {
                $column = session('sortBy');
            }
            
            $order = $request->input('order') ?? 'asc';
            $conditions = session('conditions');
            $remember = session('remember');

            $documents = Document::with(['category', 'subcategory'])->where($conditions)->orderBy($column, $order)->paginate(200);
            $count = Document::with(['category', 'subcategory'])->where($conditions)->count();

            return view('document.search')->with([
                'documents' => $documents,
                'selected' => '',
                'conditions' => $conditions,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'limitSearch' => ($documents->count() == 50000),
                'remember' => $remember,
                'count' => $count
            ]);
        }

        abort(500, 'Session error while sorting data!');
    }

    public function searchForm(Request $request)
    {

        if(session('conditions') && session('remember')) {

            $conditions = session('conditions');
            $remember = session('remember');
            $documents = Document::with(['category', 'subcategory'])->where($conditions)->orderBy('D_diaryNo', 'asc')->paginate(200);
            $count = Document::with(['category', 'subcategory'])->where($conditions)->count();

            return view('document.search')->with([
                'documents' => $documents,
                'selected' => '',
                'conditions' => $conditions,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'limitSearch' => ($documents->count() == 50000),
                'remember' => $remember,
                'count' => $count
            ]);
        }

        // return Document::with(['category', 'subcategory'])->find(201238);
        $remember = new Document;
        $category = $request->input('category') ?? '';
        $subcategory = $request->input('subcategory') ?? '';
        $limitSearch = false;
        return view('document.search', compact('category', 'subcategory', 'limitSearch', 'remember'));
    }

    public function search(Request $request)
    {

        $collection = collect($request);

        $filtered = $collection->filter(function ($value, $key) {
            return $value != null;
        });

        $conditions = [];
        $remember = new Document;

        foreach ($filtered->keys() as $key) {

            switch ($key) {
                case '_token':
                    break;
                case 'category':
                    if ($filtered[$key] != 'All')
                        $condition = ['category_id', '=', $filtered[$key]];
                        $remember->category_id = $filtered[$key];
                    break;
                case 'subcategory':
                    if ($filtered[$key] != 'NA')
                        $condition = ['subcategory_id', '=', $filtered[$key]];
                        $remember->subcategory_id = $filtered[$key];
                    break;
                case 'date_from':
                    $condition = ['D_DATE', '>=', $filtered[$key]];
                    $remember->D_DATE_from = $filtered[$key];
                    break;
                case 'date_to':
                    $condition = ['D_DATE', '<=', $filtered[$key]];
                    $remember->D_DATE_to = $filtered[$key];
                    break;
                case 'date_in_from':
                    $condition = ['D_DateIN', '>=', $filtered[$key]];
                    $remember->D_DateIN_from = $filtered[$key];
                    break;
                case 'date_in_to':
                    $condition = ['D_DateIN', '<=', $filtered[$key]];
                    $remember->D_DateIN_to = $filtered[$key];
                    break;
                case 'date_out_from':
                    $condition = ['D_DateOut', '>=', $filtered[$key]];
                    $remember->D_DateOut_from = $filtered[$key];
                    break;
                case 'date_out_to':
                    $condition = ['D_DateOut', '<=', $filtered[$key]];
                    $remember->D_DateOut_to = $filtered[$key];
                    break;
                case 'diary_no':
                    $condition = ['D_diaryNo', '=', $filtered[$key]];
                    $remember->D_diaryNo = $filtered[$key];
                    break;
                case 'subject':
                    $condition = ['D_Subject', 'like', '%' . $filtered[$key] . '%'];
                    $remember->D_Subject = $filtered[$key];
                    break;
                default:
                    if ($filtered[$key] != null) {
                        $condition = [$key, 'like', '%' . $filtered[$key] . '%'];
                        $remember->$key = $filtered[$key];
                    }
                    break;
            }

            if (isset($condition)) {
                array_push($conditions, $condition);
            }
        }

        if (empty($conditions)) {
            return redirect('/document/search')->with('error', 'Selected fields cant be blank');
        }

        // $documents = DB::table('documents')
        //     ->where(
        //         $conditions
        //     )
        //     ->limit(100)
        //     ->orderBy('D_DateIN', 'desc')
        //     ->get();

        // PROD
        $documents = Document::with(['category', 'subcategory'])->where($conditions)->orderBy('D_diaryNo', 'desc')->paginate(200);
        $count = Document::with(['category', 'subcategory'])->where($conditions)->count();

        // $documents = Document::cursor()->where('category_id',1)->where('D_diaryno', '<', 100)->all();

        // if($documents->count() > 1000){
        //     return redirect('/document/search')->with('error', 'Too many results! Please narrow down your search');
        // }
        // $documents = Document::where('diary_no', $request->diary_no)->get();

        session(['conditions' => $conditions]);
        session(['remember' => $remember]);

        return view('document.search')->with([
            'documents' => $documents,
            'selected' => '',
            'conditions' => $conditions,
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'limitSearch' => ($documents->count() == 50000),
            'remember' => $remember,
            'count' => $count
        ]);
    }

    public function print($id)
    {
        $document = Document::find($id);
        return view('document.print', compact('document'));
    }

    public function showFile($id)
    {
        $document = Document::find($id);
        $date = Carbon::create($document->D_DATE);

        if ($document->category_id == 2) {
            $subfolder = $document->subcategory ? $document->subcategory->scm_foldername : '';
            $url = "uploads/" . $document->category->cm_folder . "/$subfolder/$date->year/$date->englishMonth/" . $document->D_fileno . ".pdf";
        } else {
            if ($document->category != '') {
                $url = "uploads/" . $document->category->cm_folder . "/$date->year/$date->englishMonth/" . $document->D_fileno . ".pdf";
            }
        }

        return redirect("http://dms.ongc.co.in/storage/$url");
    }

    public function test() {
        // return DataTables::of(Document::where('id', '<', 100))->make(true);

        return Document::paginate(100);
    }
}
