<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Contracts\CategoryContract;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * @var CategoryContract
     */
    private $categoryContract;

    public function __construct(CategoryContract $categoryInterface)
    {

        $this->categoryContract = $categoryInterface;
        $this->middleware(['role:Super Admin|Admin|Data Entry Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoryContract->withRelations()->paginate(10);
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $parent_categories = $this->categoryContract->parentCategories();
        return view('backend.category.create', compact('parent_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryContract->create($request->all());
        return redirect()->route('admin.category.index')->with('success', "New Category is created successfully!");
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = $this->categoryContract->getById($id);
        return view('backend.category.edit', compact('category'));
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
        $this->categoryContract->updateById($id, $request->all());
        return redirect()->route('admin.category.index')->with('success', 'Category is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->categoryContract->deleteById($id);
        return redirect()->route('admin.category.index')->with('success', 'Category is deleted successfully!');
    }
}
