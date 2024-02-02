<?php

namespace Vanguard\Http\Controllers\Web;
use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\User;
use App\Models\DocumentUpload;
use Illuminate\Support\Facades\Storage;

class DocumentUploadController extends Controller
{
    public function index()
    {
        $documentUploads = DocumentUpload::all();
    
        return view('user.document-upload', compact('documentUploads'));
    }

    public function downloadFile($doc_id)
{
    // Find the document upload based on doc_id
    $documentUpload = DocumentUpload::where('doc_id', $doc_id)->first();

    if (!$documentUpload) {
        return back()->with('error', 'File not found.');
    }

    // Handle file download logic here
    // You can return a file download response using the file path

    // For example, if it's a PDF file:
    $filePath = storage_path('app/' . $documentUpload->doc_file);
    return response()->download($filePath, $documentUpload->doc_name);
}

public function deleteFile($doc_id)
{
    // Find the document upload based on doc_id
    $documentUpload = DocumentUpload::where('doc_id', $doc_id)->first();

    if (!$documentUpload) {
        return back()->with('error', 'File not found.');
    }

    // Delete the file using the Storage facade
    $filePath = 'documents/' . $documentUpload->doc_file; // Adjust the path if needed

    if (Storage::exists($filePath)) {
        Storage::delete($filePath);
    }

    $documentUpload->delete();

    return back()->with('success', 'File deleted successfully.');
}


public function uploadData(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'doc_name' => 'required',
        'file' => 'required|mimes:pdf,docx,doc,xlsx,csv,jpg,png', // Define allowed file types
        'doc_format' => 'required', // Ensure "doc_format" is required
    ]);

    // Get the uploaded file
    $file = $request->file('file');
    $user = auth()->user(); // Assuming you are using Laravel's built-in authentication

    // Store the file in the storage/app/documents directory
    $filePath = $file->store('documents');

    // Create a new DocumentUpload entry with the format included
    DocumentUpload::create([
        'userid' => $user->email,
        'doc_id' => $request->input('doc_id'),
        'doc_name' => $request->input('doc_name'),
        'doc_file' => $filePath,
        'doc_format' => $request->input('doc_format'), // Retrieve the format from the request
    ]);

    // Redirect back with success message
    return back()->with('success', 'Document uploaded successfully.');
}



}