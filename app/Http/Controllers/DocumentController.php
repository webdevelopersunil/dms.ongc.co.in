<?php

namespace App\Http\Controllers;

use App\User;
use App\Document;
use Carbon\Carbon;
use App\Events\UserEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{

    public function index()
    {
        
    }

    public function empty( )
    {
        return 'no category provided!';
    }

    public function create( $category, $subcategory = null )
    {
        if($category == 'undefined') {
            return redirect('/home')->with('error', 'Select a category to continue');
        }

        if( User::where('category', $category )->where('working_on', 'Create')->count() > 0 ) {
            return redirect('/home')->with('error', 'Someone else is creating a document with the same category');
        }

        event(new UserEvent( Auth::user() , 'Create', $category ));

        $diary = DB::table('auto_increment')->where('category', $category)->first()->counter + 1;

        return view('document.create', compact('category', 'subcategory', 'diary') );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'subcategory' => 'nullable',
            'diary_no' => 'required',
            'date_in' => 'required',
            'file_no' => 'required',
            'file_date' => 'required',
            'received_from' => 'required',
            'subject' => 'required',
            'dealing_officer' => 'nullable',
            'sender_diary_no' => 'nullable',
        ]);

        // $document = Document::create($request->all());
        $document = Document::create($validatedData);

        if( $document->file_date != null ) {
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $document->file_date);
            if( $document->category == 'cmd_office_correspondence' ){
                // $subcategory = isset($this->subcategories[$document->subcategory]) ? $this->subcategories[$document->subcategory] : 'CMD00';
                // $url = "uploads/" . $document->category . "/$subcategory/$date->year/$date->englishMonth/" . $document->file_no . ".pdf";
                $subfolder = $document->subcategory == '' ? 'misc' : $document->subcategory;
                $url = "uploads/" . $document->category . "/$subfolder/$date->year/$date->englishMonth/" . $document->file_no . ".pdf";
                $document->file_url = $url;
            } else {
                if( $document->category != '' ) {
                    $url = "uploads/" . $document->category . "/$date->year/$date->englishMonth/" . $document->file_no . ".pdf";
                    $document->file_url = $url;
                }
            }
            $document->save();
        }

        // $date = Carbon::now();
        // $folder =  $date->year . "/" . $date->englishMonth . "/" . $document->diary_no;
        // if( $request->hasFile('file_url') ){
        //     $document_name = Carbon::now()->format('YmdHis') . "_" . $request->file('file_url')->getClientOriginalName();
        //     $document_path = $request->file('file_url')->storeAs("public/uploads/$folder", $document_name);
        //     $document->file_url = explode( "/", $document_path, 2 )[1];
        //     $document->save();
        // }

        DB::table('auto_increment')->where('category', $request->category )->increment('counter');

        return redirect("/document/view/$document->id")->with('success', 'Document has been created successfully' );
    }  


    public function show($id)
    {
        $document = Document::findOrFail($id);

        event(new UserEvent( Auth::user() , 'View' ));

        $references = Document::where( 'diary_no', $document->diary_no )
                              ->where('reference_of', $document->id )
                              ->orderBy('reference_of')
                              ->get();

        // if selected document is a reference document
        // should return all other references plus the main document
        if( $document->reference_of != -1 ) {
            
            $references = Document::where([
                [ 'reference_of', $document->reference_of ],
                [ 'id', '!=', $document->id ]
            ])->get();

            $main = Document::find($document->reference_of);

            $references = $references->push($main);
        }

        

        return view('document.show', compact( 'document', 'references' ) );
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'subcategory' => 'nullable',
            'diary_no' => 'required',
            'date_in' => 'required',
            'file_no' => 'required',
            'file_date' => 'required',
            'received_from' => 'required',
            'subject' => 'required',
        ]);

        $document = Document::find($id);
        $document->marked_to = $request->marked_to;
        $document->copy_to = $request->copy_to;
        $document->date_out = $request->date_out;
        $document->marked_by = $request->marked_by;
        $document->remarks = $request->remarks;
        $document->dealing_officer = $request->dealing_officer;

        $document->file_no = $request->file_no;

        $date = Carbon::now();
        $folder =  $date->year . "/" . $date->englishMonth . "/" . $document->diary_no;

        if( $request->hasFile('file_url') ){
            $document_name = Carbon::now()->format('YmdHis') . "_" . $request->file('file_url')->getClientOriginalName();
            $document_path = $request->file('file_url')->storeAs("public/uploads/$folder", $document_name);
            $document->file_url = explode( "/", $document_path, 2 )[1];
            $document->save();
        }

        $document->save();

        return redirect()->back()->with('success', 'Document updated succesfully' );

    }


    public function destroy($id)
    {
        //
    }

    public function search(Request $request) {

        event(new UserEvent( Auth::user() , 'Search' ));

        $collection = collect($request);

        $filtered = $collection->filter(function($value, $key){
            return $value != null;
        });

        $conditions = [];

        foreach( $filtered->keys() as $key ){

            switch ($key) {
                case '_token':
                    break;
                case 'date_from':
                    $condition = [ 'file_date' , '>=', $filtered[$key] ];
                    break;
                case 'date_to':
                    $condition = [ 'file_date' , '<=', $filtered[$key] ];
                    break;
                case 'date_in_from':
                    $condition = [ 'date_in' , '>=', $filtered[$key] ];
                    break;
                case 'date_in_to':
                    $condition = [ 'date_in' , '<=', $filtered[$key] ];
                    break;
                case 'date_out_from':
                    $condition = [ 'date_out' , '>=', $filtered[$key] ];
                    break;
                case 'date_out_to':
                    $condition = [ 'date_out' , '<=', $filtered[$key] ];
                    break; 
                default:
                    if($filtered[$key] != null ) {
                        $condition = [ $key , 'like', '%' . $filtered[$key] . '%'  ];
                    }
                    break;
            }

            if( isset($condition) ){
                array_push( $conditions, $condition );
            }
            
        }

        if( empty($conditions)) {
            return redirect('/document/search')->with('error', 'Selected fields cant be blank');
        }

        $documents = DB::table('documents')
                ->where(
                    $conditions
                )
                ->orderBy('date_out', 'asc' )
                ->get();

        if($documents->count() > 1000){
            return redirect('/document/search')->with('error', 'Too many results! Please narrow down your search');
        }
        // $documents = Document::where('diary_no', $request->diary_no)->get();

        return view('document.search')->with([
            'documents' => $documents
        ]);
    }

}
