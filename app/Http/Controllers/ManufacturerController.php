<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use DB;

class ManufacturerController extends Controller {

    public function createManufacturer() {
        return view('admino.manufacturer.createManufacturer');
    }

    public function storeManufacturer(Request $request) {
        $this->validate($request, [
            'manufacturerName' => 'required',
            'manufacturerDescription' => 'required',
            'publicationStatus' => 'required|not_in:0',
        ]);
        
//        dd($request->all());
//        return $request->all();
//        $category = new Category();
//        $category->category_name= $request->category_name;
//        $category->category_description= $request->category_description;
//        $category->publication_status= $request->publication_status;
//        $category->save();
//        return 'Save Successfully';
        DB::table('manufacturers')->insert([
            'manufacturerName'=> $request->manufacturerName,
            'manufacturerDescription'=> $request->manufacturerDescription,
            'publicationStatus'=> $request->publicationStatus,
        ]);
//        Manufacturer::create($request->all());

        return redirect('/manufacturer/add')->withSuccess('Save Successfully');
    }

    public function manageManufacturer() {
//        $categories = Category::all()->where('publicationStatus',1);
        $manufacturers = Manufacturer::all();

        return view('admino.manufacturer.manageManufacturer', ['manufacturers' => $manufacturers]);
    }

    public function editManufacturer($id) {

        $manufacturerById = Manufacturer::where('id', $id)->first();

        return view('admino.manufacturer.editManufacturer', ['manufacturerById' => $manufacturerById]);
    }

    public function updateManufacturer(Request $request) {
//    using query builder
//        $manufacturer = Manufacturer::find($request->id);
//        $manufacturer->manufacturerName= $request->manufacturerName;
//        $manufacturer->manufacturerDescription= $request->manufacturerDescription;
//        $manufacturer->publicationStatus= $request->publicationStatus;
//        $manufacturer->save();
//        return redirect('/manufacturer/manage')->withSuccess('Update Successfully');

        $newData = $request->all();
        $manufacturer = Manufacturer::find($request->id);
        $manufacturer->update($newData);
        return redirect('/manufacturer/manage')->withSuccess('Update Successfully');
    }

    public function deleteManufacturer($id) {

        $Manufacturer = Manufacturer::find($id);
        $Manufacturer->delete();
        return redirect('/manufacturer/manage')->withSuccess('Delete Successfully');
    }

}
