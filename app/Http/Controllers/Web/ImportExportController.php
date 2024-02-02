<?php
namespace Vanguard\Http\Controllers\Web;

use Vanguard\Http\Controllers\Controller;
use Vanguard\User;


use Illuminate\Http\Request;
use App\Exports\BulkExport;
use App\Imports\BulkImport;
use Maatwebsite\Excel\Facades\Excel;


class ImportExportController extends Controller
{
    /**
    * 
    */
    
    public function importExportView()
    {
         // Fetch users from database
         $users = User::join('sessions', 'users.id', '=', 'sessions.user_id')
         ->select('users.*')
         ->distinct()
         ->get();
       return view('upload-file',compact('users'));
       
    }
    public function import() 
    {
        Excel::import(new BulkImport,request()->file('file'));
        
           
        return back();
    }
}
