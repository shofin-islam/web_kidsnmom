<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use DB;
use App\Classes\UserProjectInfo;

class ManufacturerController extends Controller {

    public function index() 
    {
        $projectInfo = new UserProjectInfo;

            $manufacturers = Manufacturer::select(
                'manufacturers.*',
                'projects.name as projectName'
            )
            ->join('projects', 'manufacturers.projectId', '=', 'projects.id')
            ->whereIn('projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
            ->where('publicationStatus', 1)
            ->where('deletionStatus', 0)
            ->get();

            return view('manufacturer.index',compact('manufacturers'));
    }

    public function create() 
    {
        $projectInfo = new UserProjectInfo;
        return view('manufacturer.create',['Projects'=>$projectInfo->getUserProjectName()]);
    }

    public function store(Request $request) 
    {
        request()->validate([
            'name' => 'required',
            'projectId' => 'required|not_in:0',
            'details'=> 'required',
            'publicationStatus' => 'required|not_in:0',
        ]);

        // Product::create($request->all());
        $manufacturer = new Manufacturer();

        $manufacturer->name = $request->name;
        $manufacturer->projectId = $request->projectId;
        $manufacturer->details = $request->details;
        $manufacturer->publicationStatus = $request->publicationStatus;
        $manufacturer->save();
        
        return redirect()->route('manufacturer')->with('success','Manufacturer created successfully.');
    
    }


    public function edit($id) {

        $projectInfo = new UserProjectInfo;
    
        $manufacturerById = Manufacturer::where('id',$id)->first();
        // dd($manufacturerById->projectId);

        return view('manufacturer.edit',['manufacturer' => $manufacturerById, 'Projects'=>$projectInfo->getUserProjectName()]);

    }

    public function update(Request $request, $id) {
        request()->validate([
            'name' => 'required',
            'projectId' => 'required|not_in:0',
            'details'=> 'required',
            'publicationStatus' => 'required|not_in:0',
        ]);

        // dd($id);
        $manufacturer =  Manufacturer::where('id',$id)->first();

        $manufacturer->name = $request->name;
        $manufacturer->projectId = $request->projectId;
        $manufacturer->details = $request->details;
        $manufacturer->publicationStatus = $request->publicationStatus;
        $manufacturer->save();
        
        return redirect()->route('manufacturer')->with('success','Manufacturer Info Updated Successfully.');
    }

    public function destroy($id) {

        $Manufacturer = Manufacturer::find($id);
        $Manufacturer->deletionStatus=1;
        $Manufacturer->save();
        return redirect()->route('manufacturer')->withSuccess('Delete Successfully');
    }

}
