<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = DB::table('newsletter')->orderBy('id', 'asc')->get();
        return view('newsletter', ['newsletters' => $newsletters]); 
    }

    public function create()
    {
        return view('admin.addnewsletter');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:5120', 
        ]);
    

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName(); 
            $file->move(public_path('newsletters'), $fileName); 
    
       
            Newsletter::create([
                'title' => $request->title,
                'filename' => $fileName,
            ]);
    

            return redirect()->route('admin.add-newsletter')->with('status', 'Newsletter added successfully!');
        }
    
        return redirect()->route('admin.add-newsletter')->with('status', 'File upload failed.');
    }
}
