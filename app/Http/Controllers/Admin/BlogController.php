<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);

        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:3072',
            'icon_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'description' => 'nullable|string',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'status' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $blog = new Blog();

        $blog->title = $request->title;
        $blog->slug = $request->slug
            ? Str::slug($request->slug)
            : Str::slug($request->title);

        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->author = $request->author ?? 'Admin';
        $blog->status = $request->status ?? 0;
        $blog->published_at = $request->published_at;

        $uploadPath = public_path('uploads/blog');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Main image
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' .
                $image->getClientOriginalExtension();

            $image->move($uploadPath, $imageName);

            $blog->image = $imageName;
        }

        // Icon
        if ($request->hasFile('icon_image')) {
            $icon = $request->file('icon_image');

            $iconName = time() . '_icon_image_' . uniqid() . '.' .
                $icon->getClientOriginalExtension();

            $icon->move($uploadPath, $iconName);

            $blog->icon_image = $iconName;
        }

        $blog->save();

        return redirect()
            ->route('admin.blog')
            ->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:3072',
            'icon_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'description' => 'nullable|string',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'status' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $blog->title = $request->title;

        $blog->slug = $request->slug
            ? Str::slug($request->slug)
            : Str::slug($request->title);

        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->author = $request->author ?? 'Admin';
        $blog->status = $request->status ?? 0;
        $blog->published_at = $request->published_at;

        $uploadPath = public_path('uploads/blog');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Main image
        if ($request->hasFile('image')) {

            if (
                $blog->image &&
                file_exists($uploadPath . '/' . $blog->image)
            ) {
                unlink($uploadPath . '/' . $blog->image);
            }

            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' .
                $image->getClientOriginalExtension();

            $image->move($uploadPath, $imageName);

            $blog->image = $imageName;
        }

        // Icon
        if ($request->hasFile('icon_image')) {

            if (
                $blog->icon &&
                file_exists($uploadPath . '/' . $blog->icon)
            ) {
                unlink($uploadPath . '/' . $blog->icon);
            }

            $icon = $request->file('icon_image');

            $iconName = time() . '_icon_image_' . uniqid() . '.' .
                $icon->getClientOriginalExtension();

            $icon->move($uploadPath, $iconName);

            $blog->icon_image = $iconName;
        }

        $blog->save();

        return redirect()
            ->route('admin.blog')
            ->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $uploadPath = public_path('uploads/blog');

        if (
            $blog->image &&
            file_exists($uploadPath . '/' . $blog->image)
        ) {
            unlink($uploadPath . '/' . $blog->image);
        }

        if (
            $blog->icon_image &&
            file_exists($uploadPath . '/' . $blog->icon_image)
        ) {
            unlink($uploadPath . '/' . $blog->icon_image);
        }

        $blog->delete();

        return redirect()
            ->route('admin.blog')
            ->with('success', 'Blog deleted successfully.');
    }
}
