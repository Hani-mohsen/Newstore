<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductCouponRequest;
use App\Models\ProductCoupon;
use Illuminate\Http\Request;

class ProductCouponController extends Controller
{
    public function index()
    {

        $coupons = ProductCoupon::query()
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);
        return view('backend.product_coupons.index', compact('coupons'));
    }

    public function create()
    {

        return view('backend.product_coupons.create');
    }

    public function store(ProductCouponRequest $request)
    {


        ProductCoupon::create($request->validated());

        return redirect()->route('coupons.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function show($id)
    {

        return view('backend.product_coupons.show');
    }

    public function edit(ProductCoupon $productCoupon)
    {

        return view('backend.product_coupons.edit', compact('productCoupon'));
    }

    public function update(ProductCouponRequest $request, ProductCoupon $productCoupon)
    {


        $productCoupon->update($request->validated());

        return redirect()->route('coupons.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(ProductCoupon $productCoupon)
    {

        $productCoupon->delete();

        return redirect()->route('coupons.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
