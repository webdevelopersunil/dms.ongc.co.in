<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{

    public function index()
    {
        
    }

    public function empty( )
    {
        return 'no category provided!';
    }

    public function create( $category, $subcategory )
    {
        return view('document.create', compact('category', 'subcategory') );
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
            'diary_no' => 'required',
            'date_in' => 'required',
            'file_no' => 'required',
            'file_date' => 'required',
            'received_from' => 'required',
            'subject' => 'required',
        ]);

        $document = Document::create($request->all());

        return redirect()->back()->with('success', 'Document has been created successfully' );
    }  


    public function show($id)
    {
        $document = Document::find($id);

        $main = Document::where( 'diary_no', $document->diary_no )
                        ->where('is_reference', false )
                        ->get();

        $references = Document::where( 'diary_no', $document->diary_no )
                              ->where('is_reference', true)
                              ->where('id', '!=', $id )
                              ->get();

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
            'subcategory' => 'required',
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

        $document->save();

        return redirect()->back()->with('success', 'Document updated succesfully' );

    }


    public function destroy($id)
    {
        //
    }

    public function search(Request $request) {

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
                    $condition = [ $key , 'like', '%' . $filtered[$key] . '%'  ];
                    break;
            }

            if( isset($condition) ){
                array_push( $conditions, $condition );
            }
            
        }


        $documents = DB::table('documents')
                ->whereColumn(
                    $conditions
                )
                ->orderBy('date_out', 'asc' )
                ->get();

        // $documents = Document::where('diary_no', $request->diary_no)->get();

        return view('document.search')->with([
            'documents' => $documents
        ]);
    }

}
