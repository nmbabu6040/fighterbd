<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 1)->paginate(10);
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_title' => 'required|string|max:255',
            'service_title_highlight' => 'required|string|max:255',
            'service_des' => 'nullable|string|max:255',
            'service_name' => 'required|string|max:255',
            'service_icon' => 'required|string|max:255',
            'service_description' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        $service = new Service();
        $service->service_title = $request->service_title;
        $service->service_title_highlight = $request->service_title_highlight;
        $service->service_des = $request->service_des;
        $service->service_name = $request->service_name;
        $service->service_icon = $request->service_icon;
        $service->service_description = $request->service_description;
        $service->status = $request->status ?? 0;
        $service->save();

        return back()->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_title' => 'required|string|max:255',
            'service_title_highlight' => 'required|string|max:255',
            'service_des' => 'nullable|string|max:255',
            'service_name' => 'required|string|max:255',
            'service_icon' => 'required|string|max:255',
            'service_description' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        $service->service_title = $request->service_title;
        $service->service_title_highlight = $request->service_title_highlight;
        $service->service_des = $request->service_des;
        $service->service_name = $request->service_name;
        $service->service_icon = $request->service_icon;
        $service->service_description = $request->service_description;
        $service->status = $request->status ?? 0;
        $service->save();

        return back()->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Service deleted successfully.');
    }
}
