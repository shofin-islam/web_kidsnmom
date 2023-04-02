<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFileRequest;
use App\Classes\UserProjectInfo;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectInfo = new UserProjectInfo;

        $files = File::select('*')
        ->whereIn('projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
        ->get();

        return view('reports.file_index', [
            'files' => $files
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectInfo = new UserProjectInfo;

        return view('reports.file_create',['Projects'=>$projectInfo->getUserProjectName()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request )
    {

        request()->validate([

            'file' => 'required',
            'projectId' => 'required|not_in:0'
        ]);

        
        $projectId = $request->projectId;

        $year = date('Y');

        $basePath='file/invoice/'. $year;
        // Set the path to the directory where files will be uploaded
        $uploadPath = public_path($basePath);

        // Check if the directory already exists
        if (!file_exists($uploadPath)) {
            // If the directory does not exist, create it
            mkdir($uploadPath, 0777, true);
        }

        $parts = explode('.', $request->file->getClientOriginalName());
        $fileNameWithoutLastExt = implode('.', array_slice($parts, 0, -1));

        $fileName = $fileNameWithoutLastExt. '_' . time() . '.'. $request->file->extension();  

        // dd($fileName);

        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();

        $request->file->move($uploadPath, $fileName);

        File::create([
            'user_id' => auth()->id(),
            'projectId' => $projectId,
            'name' => $request->file->getClientOriginalName(),
            'path' => $basePath.'/'.$fileName,
            'type' => $type,
            'size' => $size
        ]);

        return redirect()->route('files.index')->withSuccess(__('File added successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);
        // dd($file);
        $filePath =  public_path($file->path);
        $filePath = str_replace('\\', '/', $filePath);
        // dd($filePath);
        return response()->download($filePath);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
