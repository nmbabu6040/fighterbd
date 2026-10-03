<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::withCount('users')
            ->latest()
            ->paginate(10);

        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                'alpha_dash',
                'unique:roles,name',
            ],
            'display_name' => [
                'required',
                'string',
                'max:150',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'status' => [
                'required',
                'boolean',
            ],
        ]);

        Role::create($validated);

        return redirect()
            ->route('admin.role')
            ->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::where('status', 1)
            ->orderBy('module')
            ->orderBy('display_name')
            ->get()
            ->groupBy('module');

        $rolePermissionIds = $role->permissions()
            ->pluck('permissions.id')
            ->toArray();

        return view('admin.role.edit', compact(
            'role',
            'permissions',
            'rolePermissionIds'
        ));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                'alpha_dash',
                Rule::unique('roles', 'name')->ignore($role->id),
            ],
            'display_name' => [
                'required',
                'string',
                'max:150',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'status' => [
                'required',
                'boolean',
            ],
            'permissions' => [
                'nullable',
                'array',
            ],
            'permissions.*' => [
                'exists:permissions,id',
            ],
        ]);

        $role->update([
            'name' => $validated['name'],
            'display_name' => $validated['display_name'],
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'],
        ]);

        $role->permissions()->sync(
            $validated['permissions'] ?? []
        );

        return redirect()
            ->route('admin.role')
            ->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        if ($role->name === 'super-admin') {
            return back()->with(
                'error',
                'Super Admin role cannot be deleted.'
            );
        }

        $role->permissions()->detach();
        $role->users()->detach();
        $role->delete();

        return redirect()
            ->route('admin.role')
            ->with('success', 'Role deleted successfully.');
    }
}
