<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index()
    {
        $counters = Counter::latest()->paginate(10);
        return view('admin.counter.index', compact('counters'));
    }

    public function create()
    {
        return view('admin.counter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'span_title' => 'required|string|max:255',
            'count' => 'required|integer|min:0',
        ]);

        $counter = new Counter();
        $counter->title = $request->title;
        $counter->span_title = $request->span_title;
        $counter->count = $request->count;
        $counter->save();

        return redirect()->route('admin.counter')->with('success', 'Counter created successfully.');
    }

    public function edit(Counter $counter)
    {
        return view('admin.counter.edit', compact('counter'));
    }

    public function update(Request $request, Counter $counter)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'span_title' => 'required|string|max:255',
            'count' => 'required|integer',
        ]);

        $counter->title = $request->title;
        $counter->span_title = $request->span_title;
        $counter->count = $request->count;
        $counter->save();

        return redirect()->route('admin.counter')->with('success', 'Counter updated successfully.');
    }

    public function destroy(Counter $counter)
    {
        $counter->delete();
        return redirect()->route('admin.counter')->with('success', 'Counter deleted successfully.');
    }
}
