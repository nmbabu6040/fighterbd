<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;

class HeroSliderController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::where('status', 1)->paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'status' => 'boolean',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text_1' => 'nullable|string',
            'button_link_1' => 'nullable|string',
            'button_text_2' => 'nullable|string',
            'button_link_2' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,ico,tiff,tga,jxl|max:3072',
            'subtitle' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/slider'), $imageName);
            $data['image'] = $imageName;
        }

        $data = HeroSlider::create($data);
        return back()->with('success', 'Slider created successfully');
    }

    public function edit(HeroSlider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, HeroSlider $slider)
    {
        $data = $request->validate([
            'status' => 'boolean',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text_1' => 'nullable|string',
            'button_link_1' => 'nullable|string',
            'button_text_2' => 'nullable|string',
            'button_link_2' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,ico,tiff,tga,jxl|max:3072',
            'subtitle' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/slider'), $imageName);
            $data['image'] = $imageName;
        }

        $slider->update($data);
        return back()->with('success', 'Slider updated successfully');
    }

    public function destroy(HeroSlider $slider)
    {
        $slider->delete();
        return back()->with('success', 'Slider deleted successfully');
    }
}
