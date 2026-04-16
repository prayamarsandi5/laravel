<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil.
     */
    public function index()
    {
        return view('profile');
    }

    /**
     * Memperbarui data profil user.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // 1. Validasi Input (Pastikan semua field divalidasi)
        $request->validate([
            'name'      => 'required|string|max:255',
            'gender'    => 'nullable|string',
            'city'      => 'nullable|string|max:100',
            'phone'     => 'nullable|string|max:20',
            'day'       => 'nullable|numeric|between:1,31',
            'month'     => 'nullable|string',
            'year'      => 'nullable|numeric|digits:4',
        ], [
            'name.required' => 'Nama lengkap tidak boleh kosong.',
        ]);

        // 2. Update Data di Database
        $user->name   = $request->name;
        $user->gender = $request->gender;
        $user->city   = $request->city;
        $user->phone  = $request->phone;

        // Logika untuk menggabungkan Tanggal Lahir (YYYY-MM-DD)
        if ($request->day && $request->month && $request->year) {
            // Kita asumsikan bulan dikirim dalam angka atau disesuaikan
            $user->birthdate = $request->year . '-' . $request->month . '-' . $request->day;
        }
        
        // Simpan perubahan ke Database (NULL akan berubah jadi data asli)
        $user->save();

        // 3. Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Profil kamu berhasil diperbarui!');
    }
}