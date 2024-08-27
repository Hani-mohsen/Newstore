<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=ProductCategory::withCount('products') ->
        when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                    $query->whereStatus(\request()->status);
                })
                ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
                ->paginate(\request()->limit_by ?? 10);
        return view('backend.product-category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $main_categories =ProductCategory::whereNull('parent_id')->get(['id','name']);
        return view('backend.product-category.create',compact('main_categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {
        $input['name']=$request->name;
        $input['status']=$request->status;
        $input['parent_id']=$request->parent_id;
        if ($image = $request->file('cover')) {
            $file_name = Str::slug($request->name).".".$image->getClientOriginalExtension();
            $path = public_path('/assets/product_categories/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $input['cover'] = $file_name;
        }

        ProductCategory::create($input);

        return redirect()->route('pro.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        return view('backend.product-category.show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        $main_categories =ProductCategory::whereNull('parent_id')->get(['id','name']);

        return view('backend.product-category.edit',compact('main_categories','productCategory'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory )
    {
        $input['name'] = $request->name;
        $input['slug'] = null;
        $input['status'] = $request->status;
        $input['parent_id'] = $request->parent_id;

        if ($image = $request->file('cover')) {
            if ($productCategory->cover != null && File::exists('assets/product_categories/'. $productCategory->cover)){
                unlink('assets/product_categories/'. $productCategory->cover);
            }
            $file_name = Str::slug($request->name).".".$image->getClientOriginalExtension();
            $path = public_path('/assets/product_categories/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $input['cover'] = $file_name;
        }

        $productCategory->update($input);

        return redirect()->route('pro.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function delete(Request $request ,$id) {
        $category=ProductCategory::findOrFail($id);
        if(File::exists('assets/product_categories'.$category->cover)){
            unlink('assets/product_categories'.$category->cover);
            $category->cover=null;
            $category->save();
        }
        return true;
    }
}
