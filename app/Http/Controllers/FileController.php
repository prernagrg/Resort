<?php

namespace App\Http\Controllers;

use App\Models\file;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as Files;
use Illuminate\Http\Request;
use illuminate\support\Str;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $file = new file;
        $files = $file->paginate(10);
        return view('royal-master.Admin.File.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('royal-master.Admin.File.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = new file;
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:2248',
            'title' => 'required|max:100'
        ]);
        $fileName = Str::slug($request->title) . '-' . time() . '.' . $request->image->extension();

        $request->image->move(public_path('uploads/'), $fileName);
        $file->image = $fileName;
        $file->title = $request->title;

        $file->save();
        return redirect()->back()->with('success','Successfully uploaded');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $files = file::find($id);
        // $files = file::find($id);
        return view('royal-master.admin.File.show', compact('files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $files = file::query()->where('id', $id)->get()->first();
        // $files = file::find($id);
        return view('royal-master.admin.File.edit', compact('files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $filedata = new file;
        $filedata = $filedata->where('id', $id)->get()->first();
        // $filedata = file::find($id) this can replace 75 and 76 both
        Files::delete(public_path('uploads?/' . $request->image));

        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|max:100'
        ]);
        $fileName = Str::slug($request->title) . '-' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/'), $fileName);
        $filedata->image = $fileName;
        $filedata->title = $request->title;
        $filedata->update();
        return redirect('admin/file')->with('update', 'Successfuly Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $file = file::query()->where('id', $id)->get()->first();
        Files::delete(public_path('uploads/' . $file->image));
        $file->delete();
        return redirect('admin/file')->with('message', 'Succesfully deleted.');
    }
}
