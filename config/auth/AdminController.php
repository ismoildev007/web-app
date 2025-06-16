<?php

namespace config\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin');
    }

    public function index()
    {
        $admins = User::where('role', 1)->get();
        return view('pages.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('pages.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'required|numeric',
        ]);

        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1, // admin roli
            'phone' => $request->phone,
            'status' => $request->status,
            'region' => $request->region,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin created successfully.');
    }

    public function edit(User $admin)
    {
        return view('pages.admins.edit', compact('admin'));
    }

    public function update(Request $request, User $admin)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'phone' => 'required|numeric',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $admin->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
            'region' => $request->region,
        ]);

        // Only update password if provided
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }

        return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
    }
    public function destroy(User $admin){
        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
    }
}
