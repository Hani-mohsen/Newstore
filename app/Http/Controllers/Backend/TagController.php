<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {

        $tags = Tag::with('products')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);

        return view('backend.tag.index', compact('tags'));
    }

    public function create()
    {

        return view('backend.tag.create');
    }

    public function store(TagRequest $request)
    {

        // $input['name'] = $request->name;
        // $input['status'] = $request->status;


        Tag::create($request->validated());

        return redirect()->route('tag.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function show($id)
    {
        if (!auth()->user()->ability('admin', 'display_tags')) {
            return redirect('admin/index');
        }

        return view('backend.tags.show');
    }

    public function edit($id)
    {
   $tags=Tag::findOrFail($id);

        return view('backend.tag.edit', compact('tags'));
    }

    public function update(TagRequest $request,  $id)
    {

        $input['name'] = $request->name;
        $input['slug'] = null;
        $input['status'] = $request->status;

        $id->update($input);

        return redirect()->route('tag.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function delete($id)
    {
        $tags=Tag::findOrFail($id)->delete();

        return redirect()->route('tag.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
