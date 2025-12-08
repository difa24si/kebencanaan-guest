<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // SEARCH (nama & email)
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        // FILTER role (admin/user)
        if ($request->role) {
            $query->where('role', $request->role);
        }

        // PAGINATION 8 user per halaman
        $users = $query->paginate(8)->withQueryString();

        return view('pages.user.index-user', compact('users'));
    }

    public function create()
    {
        return view('pages.user.form-user');
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'photo' => 'image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('photo')) {
        $validated['photo'] = $request->file('photo')->store('profile', 'public');
    }

    $validated['password'] = bcrypt($validated['password']);

    User::create($validated);

    return redirect()->route('user.index')->with('success', 'User berhasil dibuat');
}
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.form-user', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'photo' => 'image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // HAPUS FOTO LAMA JIKA ADA
    if ($request->hasFile('photo')) {

        if ($user->photo && file_exists(storage_path('app/public/' . $user->photo))) {
            unlink(storage_path('app/public/' . $user->photo));
        }

        $validated['photo'] = $request->file('photo')->store('profile', 'public');
    }

    $user->update($validated);

    return redirect()->route('user.index')->with('success', 'User berhasil diupdate');
}


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
