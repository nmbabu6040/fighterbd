<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('sort_order', 'asc')->latest()->paginate(10);

        return view('admin.team.index', compact('teams'));
    }


    public function create()
    {
        return view('admin.team.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:3072',
            'description' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'facebook' => 'nullable|string|max:500',
            'twitter' => 'nullable|string|max:500',
            'linkedin' => 'nullable|string|max:500',
            'instagram' => 'nullable|string|max:500',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->except('image');
        $uploadPath = public_path('uploads/team');

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

        Team::create($data);

        return redirect()->route('admin.team')->with('success', 'Team member created successfully.');
    }


    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }


    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:3072',
            'description' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'facebook' => 'nullable|string|max:500',
            'twitter' => 'nullable|string|max:500',
            'linkedin' => 'nullable|string|max:500',
            'instagram' => 'nullable|string|max:500',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->except('image');
        $uploadPath = public_path('uploads/team');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        if ($request->hasFile('image')) {

            if (
                $team->image &&
                file_exists($uploadPath . '/' . $team->image)
            ) {
                unlink($uploadPath . '/' . $team->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($uploadPath, $imageName);
            $data['image'] = $imageName;
        }

        $data['status'] = $request->status ?? 0;
        $data['sort_order'] = $request->sort_order ?? 0;
        $team->update($data);
        return redirect()->route('admin.team')->with('success', 'Team member updated successfully.');
    }


    public function destroy(Team $team)
    {
        $uploadPath = public_path('uploads/team');

        if (
            $team->image &&
            file_exists($uploadPath . '/' . $team->image)
        ) {
            unlink($uploadPath . '/' . $team->image);
        }

        $team->delete();
        return redirect()->route('admin.team')->with('success', 'Team member deleted successfully.');
    }
}
