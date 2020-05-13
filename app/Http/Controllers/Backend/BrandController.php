<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Repositories\Contracts\BrandContract;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    /**
     * @var BrandContract
     */
    private $brandContract;

    public function __construct(BrandContract $brandContract)
    {
        $this->brandContract = $brandContract;
        $this->middleware(['role:Super Admin|Admin|Data Entry Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //
        $records = $this->brandContract->withRelations()->paginate(10);
        return view('backend.brand.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BrandRequest $request)
    {
        //
        $this->brandContract->create($request->all());
        return redirect()->route('admin.brand.index')->with('success', 'Brand created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        //

        $record = $this->brandContract->getById($id);
        return view('backend.brand.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->brandContract->updateById($id, $request->all());
        return redirect()->route('admin.brand.index')->with('success', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        $this->brandContract->deleteById($id);
        return redirect()->route('admin.brand.index')->with('success', 'Brand deleted successfully');
    }
}
