<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return inertia('Admin/Brand/Show',compact('brands'));
    }

    public function create()
    {
        return inertia('Admin/Brand/Create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png'
        ]);
        $brand = new Brand();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/brand'), $imageName);
            $brand->image = 'images/brand/'.$imageName;
        }
        $brand->name = $request->name;
        $brand->save();
        return redirect()->route('brand.show');

    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return inertia('Admin/Brand/Edit',compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        if ($request->hasFile('image')) {
            $previousImagePath = public_path($brand->image);
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/brand'), $imageName);
            $brand->image = 'images/brand/'.$imageName;
        }
        $brand->name = $request->name;
        $brand->status = $request->status;
        $brand->save();
        return redirect()->route('brand.show');
    }


    public function delete($id)
    {
        $brand = Brand::find($id);
        $imagePath = public_path($brand->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $brand->delete();
        return redirect()->route('brand.show');
    }
}
