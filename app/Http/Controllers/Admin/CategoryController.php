<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.category.index', [
            'categories' => Category::orderBy('created_at', 'desc')->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("admin.category.create", [
            'category' => new Category(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $category = Category::create($request->validated());

        return redirect()->route('admin.category.show', $category)->with("success", "La catégorie a été créée avec succès.");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View
    {
        return view("admin.category.show", ['category' => Category::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        return view("admin.category.edit", [
            'category' => Category::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        return redirect()->route('admin.category.show', $category)->with("success", "La catégorie a été modifiée avec succès.");
    }

    

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete(int $id): View
    {
        $category = Category::findOrFail($id);

        return view('admin.category.delete', [
            'category' => $category,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        
        return redirect()->route('admin.category.index')->with("success", "La catégorie a été supprimée avec succès.");
    }
}
