<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);

        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:3072',
            'description' => 'required|string',
            'status' => 'boolean',
        ]);

        $testimonial = new Testimonial();

        $testimonial->name = $request->name;
        $testimonial->description = $request->description;
        $testimonial->status = $request->status ?? 0;

        /*
        |--------------------------------------------------------------------------
        | Image Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $uploadPath = public_path('uploads/testimonial');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' .
                $image->getClientOriginalExtension();

            $image->move($uploadPath, $imageName);

            $testimonial->image = $imageName;
        }

        $testimonial->save();

        return redirect()
            ->route('admin.testimonial')
            ->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:3072',
            'description' => 'required|string',
            'status' => 'boolean',
        ]);

        $testimonial->name = $request->name;
        $testimonial->description = $request->description;
        $testimonial->status = $request->status ?? 0;

        /*
        |--------------------------------------------------------------------------
        | Image Update
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $uploadPath = public_path('uploads/testimonial');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Delete old image
            if (
                $testimonial->image &&
                file_exists($uploadPath . '/' . $testimonial->image)
            ) {
                unlink($uploadPath . '/' . $testimonial->image);
            }

            // Upload new image
            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' .
                $image->getClientOriginalExtension();

            $image->move($uploadPath, $imageName);

            $testimonial->image = $imageName;
        }

        $testimonial->save();

        return redirect()
            ->route('admin.testimonial')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        // Delete image
        if ($testimonial->image) {

            $imagePath = public_path(
                'uploads/testimonial/' . $testimonial->image
            );

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete database record
        $testimonial->delete();

        return redirect()
            ->route('admin.testimonial')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
