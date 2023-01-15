<?php

namespace App\Http\Controllers;

use App\Category;
use App\product;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\File;

class CategoryController extends Controller {
    public function createCategory() {
        $parentCategories = Category::where('publicationStatus', 1)
                ->where('parent', 1)
                ->get();
        return view('admino.category.createCategory', ['parentCategories' => $parentCategories]);
    }

    public function storeCategory(Request $request) {

        $validate_array = [
            'categoryName' => 'required',
            'categoryDescription' => 'required',
            'publicationStatus' => 'required|not_in:0',
            'type' => 'required|not_in:0',
        ];

        if ($request->type == 1) {
            for ($x = 1; $x <= 3; $x++) {
                $validate_array['categoryImage' . $x] = 'required';
            }
            $this->validate($request, $validate_array);

            $ImageURLs = array();

            for ($x = 1; $x <= 3; $x++) {

                $currentDateTime = date('m-d-y H:i:s');
                $currentDateTime = str_replace(":","", $currentDateTime);
              
                $image = $request->file('categoryImage' . $x);
                $ImageName = $currentDateTime.' '.$image->getClientOriginalName();

                $img_interventionForMenu = Image::make($image->getRealPath());

                $img_interventionMain = Image::make($image->getRealPath());

                $resizeImageMain = $img_interventionMain->resize(730, 365)->stream();
                $resizeImageForMenu = $img_interventionMain->resize(304, 238)->stream();

                /*print_r($resizeImageForMenu);
                exit();*/
                Storage::disk('myOwnDisk')->put('/categoryImage ' . $x . '/' . $ImageName, $resizeImageMain);
                Storage::disk('myOwnDisk')->put('/categoryImage ' . $x . '/' . $ImageName.'.jpg', $resizeImageForMenu);

                $ImageURLs[$x] = 'productImages/categoryImage ' . $x . '/' . $ImageName;

            }

            $this->saveCategory($request, $ImageURLs, null);
            return redirect('/category/add')->withSuccess('Category Added Successfully!!');
        } else {

            $validate_array['subCategoryImage'] = 'required';
            $validate_array['parentId'] = 'required|not_in:0';

            $this->validate($request, $validate_array);

            $currentDateTime = date('m-d-y H:i:s');
            $currentDateTime = str_replace(":","", $currentDateTime);
            
            $image = $request->file('subCategoryImage');
            $ImageName = $currentDateTime.' '.$image->getClientOriginalName();

            $img_intervention = Image::make($image->getRealPath());
            $resizeImage = $img_intervention->resize(730, 365)->stream();
            Storage::disk('myOwnDisk')->put('/subCategoryImage/' . $ImageName, $resizeImage);
            $ImageURL = 'productImages/subCategoryImage/' . $ImageName;

            $this->saveCategory($request, null, $ImageURL);
            return redirect('/category/add')->withSuccess('Sub-Category Added Successfully!!');
        }
    }

    public function saveCategory($request, $ImageURLs, $ImageURL) {

        $category = new Category();

        $category->categoryName = $request->categoryName;
        $category->type = $request->type;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;
        if ($request->type == 1) {
            for ($i = 1; $i <= 3; $i++) {
                $a = 'Image' . $i;
                $category->$a = $ImageURLs[$i];
                
                $category->parent = 1;
                $category->child = 0;
                $category->parentId = 0;
            }
        } else {
            $category->subCategoryImage = $ImageURL;
            $category->parentId = $request->parentId;
            $category->parent = 0;
            $category->child = 1;
        }
        $category->save();
    }

    public function manageCategory() {
//        $categories = Category::all()->where('publication_status',1);
        $categories = Category::where('deletionStatus', 0)->where('publicationStatus', 1)->get();

        return view('admino.category.manageCategory', ['categories' => $categories]);
    }

    public function editCategory($id) {
        $parentCategories = Category::where('publicationStatus', 1)
                ->where('parent', 1)
                ->get();
        $categoryById = Category::where('id', $id)->first();

        return view('admino.category.editCategory', ['categoryById' => $categoryById, 'parentCategories' => $parentCategories]);
    }

    public function updateCategory(Request $request) {

        $category = Category::where('id', $request->id)->first();
        $oldImageUrl = $category->subCategoryImage;

        $validate_array = [
            'categoryName' => 'required',
            'categoryDescription' => 'required',
            'publicationStatus' => 'required|not_in:0',
            'type' => 'required|not_in:0',
        ];
        if ($request->type == 1) {
            for ($x = 1; $x <= 3; $x++) {
                $img = 'image' . $x;
                if ($category->$img == null) {
                    $validate_array['categoryImage' . $x] = 'required';
                }
            }
        } else {
            if ($oldImageUrl == '') {
                $validate_array['subCategoryImage'] = 'required';
            }else{
                $validate_array['parentId'] = 'required|not_in:0';
            }
        }
        $this->validate($request, $validate_array);
//        echo '<pre>';
//        print_r($validate_array);
//        exit();

        if ($request->type == 1) {

            $ImageURLs = array();
            for ($i = 1; $i <= 3; $i++) {
                $image = 'categoryImage' . $i;
                $categoryImage = $request->file($image);
                $ImageURLs[$i] = $this->imageExistStatus($categoryImage, $request->id, $i);
            }
            $this->update($request, $ImageURLs, null);
            return redirect('/category/manage')->withSuccess('Update Successfully');
        } else {

            $currentDateTime = date('m-d-y H:i:s');
            $currentDateTime = str_replace(":","", $currentDateTime);

            $image = 'subCategoryImage';
            $subCategoryImage = $request->file($image);

//            $category = Category::where('id', $request->id)->first();
//            $oldImageUrl = $category->subCategoryImage;
            if ($subCategoryImage) {
                $ImageName = $currentDateTime.' '.$subCategoryImage->getClientOriginalName();

                $img_intervention = Image::make($subCategoryImage->getRealPath());
                $resizeImage = $img_intervention->resize(730, 365)->stream();
                Storage::disk('myOwnDisk')->put('/subCategoryImage/' . $ImageName, $resizeImage);
                $ImageURL = 'productImages/subCategoryImage/' . $ImageName;
                if (!empty($oldImageUrl)) {
                    unlink($oldImageUrl);
                }
            } else {
                $ImageURL = $oldImageUrl;
            }
            $this->update($request, null, $ImageURL);
            return redirect('/category/manage')->withSuccess('Update Successfully');
        }
    }

    private function update($request, $ImageURLs, $ImageURL) {
        $category = Category::find($request->id);
        $category->categoryName = $request->categoryName;
        $category->type = $request->type;
        
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;

        if ($request->type == 1) {
            $i = 1;
            foreach ($ImageURLs as $img) {
                 $category->parent = 1;
                 $category->child = 0;
                 $category->parentId = 0;
                $a = 'image' . $i;
                $category->$a = $img;
                $i++;
            }
        } else {
            $category->subCategoryImage = $ImageURL;
            $category->child = 1;
            $category->parent = 0;
            $category->parentId = $request->parentId;
        }

        $category->save();
    }

    private function imageExistStatus($categoryImage, $cId, $i) {
        $r = 'image' . $i;
        $category = Category::where('id', $cId)->first();
        $oldImageURL = $category->$r;
        if ($categoryImage) {
            $currentDateTime = date('m-d-y H:i:s');
            $currentDateTime = str_replace(":","", $currentDateTime);

            $ImageName = $currentDateTime.' '.$categoryImage->getClientOriginalName();
            $img_intervention = Image::make($categoryImage->getRealPath());
            $img_interventionForMenu = Image::make($categoryImage->getRealPath());
            $resizeImage = $img_intervention->resize(730, 365)->stream();
            $resizeImageForMenu = $img_intervention->resize(304, 238)->stream();
            Storage::disk('myOwnDisk')->put('/categoryImage ' . $i . '/' . $ImageName.'.jpg', $resizeImageForMenu);

            Storage::disk('myOwnDisk')->put('/categoryImage ' . $i . '/' . $ImageName, $resizeImage);
            $imageURL = 'productImages/categoryImage ' . $i . '/' . $ImageName;
//            File::delete($oldImageURL);
            if (!empty($oldImageURL)) {
                unlink($oldImageURL);
            }
        } else {
            $imageURL = $oldImageURL;
        }
        return $imageURL;
    }

    public function deleteCategory($id) {
           $category = Category::find($id);
           $errors=[];
           if ($category->type==1) {
            $haveChild = Category::where('parentId',$id)->get()->count();
            $haveProduct = $this->categoryExistsProduct($id);
            if ($haveChild!=0) {
                $errors[]= $haveChild." Sub-Category exists. Please delete them first.";
            }
            if ($haveProduct!=0) {
                $errors[]=$haveProduct." Products exists. Delete them first.";
            }

    }else if($category->type==2){
        $haveProduct = $this->categoryExistsProduct($id);
        if ($haveProduct!=0) {
            $errors[]= $haveProduct." Products exists. Delete them first.";
        }
}else{
    $errors[]='Wrong Category Type.';
}

if (empty($errors)) {
    Category::where('id',$id)->update(['deletionStatus' => 1]);
    return redirect('/category/manage')->withSuccess('Delete Successfully');
}else {
    return redirect('/category/manage')->with('errors',$errors);
}

}

    public function categoryExistsProduct($id){
        $haveProduct = product::where('categoryId',$id)->get()->count();
        return $haveProduct;
    }

}
