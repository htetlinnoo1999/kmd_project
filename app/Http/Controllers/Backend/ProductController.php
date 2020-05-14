<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\Contracts\BrandContract;
use App\Repositories\Contracts\CategoryContract;
use App\Repositories\Contracts\ProductContract;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var BrandContract
     */
    private $brandContract;
    /**
     * @var CategoryContract
     */
    private $categoryContract;
    /**
     * @var ProductContract
     */
    private $productContract;

    public function __construct(BrandContract $brandContract, CategoryContract $categoryContract, ProductContract $productContract)
    {
        $this->brandContract = $brandContract;
        $this->categoryContract = $categoryContract;
        $this->productContract = $productContract;
        $this->middleware('role:Super Admin|Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $records = $this->productContract->withRelations(['brand','category'])->paginate(10);
        return view('backend.product.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $brands = $this->brandContract->all()->pluck('name', 'id');
        $categories = $this->categoryContract->all()->pluck('name', 'id');
        return view('backend.product.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        //
        $this->productContract->create($request->all());
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //
        $record = $this->productContract->getById($id);
        $brands = $this->brandContract->all()->pluck('name', 'id');
        $categories = $this->categoryContract->all()->pluck('name', 'id');
        return view('backend.product.edit', compact('record','brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->productContract->updateById($id, $request->all());
        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        $this->productContract->deleteById($id);
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
    }
}
