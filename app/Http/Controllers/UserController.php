<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('media');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->role) {
            $query->where('role', $request->role);
        }

        $users = $query->paginate(8)->withQueryString();

        return view('pages.user.index-user', compact('users'));
    }

    public function create()
    {
        return view('pages.user.form-user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'role'     => 'required',
            'password' => 'required|min:6|confirmed',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => bcrypt($request->password),
        ]);

        // foto (kalau ada)
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('media/users', 'public');

            Media::create([
                'ref_table'  => 'users',
                'ref_id'     => $user->id,
                'file_name'  => $path,
                'mime_type'  => $file->getClientMimeType(),
                'sort_order' => 0,
            ]);
        }

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        $user->load('media');
        return view('pages.user.form-user', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'role'     => 'required',
            'password' => 'nullable|min:6|confirmed',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ];

        // ✅ password hanya diupdate kalau diisi
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        // foto
        if ($request->hasFile('photo')) {
            if ($old = $user->photo()) {
                Storage::disk('public')->delete($old->file_name);
                $old->delete();
            }

            $file = $request->file('photo');
            $path = $file->store('media/users', 'public');

            Media::create([
                'ref_table'  => 'users',
                'ref_id'     => $user->id,
                'file_name'  => $path,
                'mime_type'  => $file->getClientMimeType(),
                'sort_order' => 0,
            ]);
        }

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user)
    {
        // hapus media
        foreach ($user->media as $m) {
            if (Storage::disk('public')->exists($m->file_name)) {
                Storage::disk('public')->delete($m->file_name);
            }
            $m->delete();
        }

        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus');
    }
}
