<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('sort_order', 'asc')
            ->latest()
            ->paginate(10);

        return view('admin.gallery.index', compact('galleries'));
    }


    public function create()
    {
        return view('admin.gallery.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => ['required', 'string', 'max:100', 'regex:/^[a-z0-9-]+$/'],
            'category_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:3072',
            'link' => 'nullable|string|max:1000',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->except('image');
        $uploadPath = public_path('uploads/gallery');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($uploadPath, $imageName);
            $data['image'] = $imageName;
        }

        $data['status'] = $request->status ?? 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        Gallery::create($data);

        return redirect()->route('admin.gallery')->with('success', 'Gallery item created successfully.');
    }


    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }


    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => ['required', 'string', 'max:100', 'regex:/^[a-z0-9-]+$/'],
            'category_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:3072',
            'link' => 'nullable|string|max:1000',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->except('image');

        $uploadPath = public_path('uploads/gallery');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        if ($request->hasFile('image')) {

            // Delete old image
            if (
                $gallery->image &&
                file_exists($uploadPath . '/' . $gallery->image)
            ) {
                unlink($uploadPath . '/' . $gallery->image);
            }

            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($uploadPath, $imageName);
            $data['image'] = $imageName;
        }

        $data['status'] = $request->status ?? 0;
        $data['sort_order'] = $request->sort_order ?? 0;
        $gallery->update($data);

        return redirect()->route('admin.gallery')->with('success', 'Gallery item updated successfully.');
    }


    public function destroy(Gallery $gallery)
    {
        $uploadPath = public_path('uploads/gallery');

        if (
            $gallery->image &&
            file_exists($uploadPath . '/' . $gallery->image)
        ) {
            unlink($uploadPath . '/' . $gallery->image);
        }

        $gallery->delete();

        return back()->with('success', 'Gallery item deleted successfully.');
    }
}
