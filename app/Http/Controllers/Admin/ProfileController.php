<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin; // Make sure to import your Admin model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Menampilkan form untuk edit profil.
     */
    public function edit()
    {
        $admin = Auth::guard('admin')->user();
        // Alternative: Cast to ensure proper type
        // $admin = Admin::find(Auth::guard('admin')->id());
        return view('admin.profile.edit', compact('admin'));
    }

    /**
     * Memproses pembaruan profil.
     */
    public function update(Request $request)
    {
        /** @var Admin $admin */
        $admin = Auth::guard('admin')->user();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi foto
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Jika user mengupload foto profil baru
        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada
            if ($admin->profile_photo_path && Storage::disk('public')->exists($admin->profile_photo_path)) {
                Storage::disk('public')->delete($admin->profile_photo_path);
            }
            // Simpan foto baru dan dapatkan path-nya
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $updateData['profile_photo_path'] = $path;
        }
        
        // Jika user mengisi password baru
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $admin->update($updateData);

        return redirect()->route('admin.profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}