<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Identification;
use App\Models\Idtype;
use App\Models\Wishlist;

class PostsController extends Controller
{
    protected $rules = [
        'keyword.required' => 'Please enter your name or ID number to search for'
    ];

    public function index(){
       return view('posts');
    }

    public function search(Request $request){
        
        $keyword = $request->keyword;
        $idtype = $request->idtype;
        

        if(isset($keyword)){
        $request->validate([
            'keyword' => 'required|string|max:255'
        ]);
        }

        if(isset($idtype)){
         $identifications = Identification::join('idtypes', 'identifications.idtype_id', 'idtypes.id')
         ->where('idtypes.id', $idtype)
         ->where('status', '0')
         ->where('owner_name', $keyword)
         ->orWhere('id_number', $keyword)
         ->select('identifications.*', 'idtypes.id_type')
         ->get();
        }
        else{
         $identifications = Identification::join('idtypes', 'identifications.idtype_id', 'idtypes.id')
         ->where('owner_name', $keyword)
         ->where('status', '0')
         ->orWhere('id_number', $keyword)
         ->select('identifications.*', 'idtypes.id_type')
         ->get();
        }

        $id = Idtype::find($idtype) ?? '';
        $idtypes = Idtype::orderBy('id_type', 'ASC')->get();
        
        return view('search', compact('identifications', 'idtype', 'keyword', 'id', 'idtypes'));
     }

     public function details($id){
        $idno = $id;
        return view('id-details', compact('idno'));
     }

     public function cleam($id){
        $identification = Identification::join('idtypes', 'identifications.idtype_id', 'idtypes.id')
        ->select('identifications.*', 'idtypes.id_type')
        ->first();
        return redirect()->back()->with('cleamSuccess', 'Your ID has been cleamed successfully');
     }
    
}
