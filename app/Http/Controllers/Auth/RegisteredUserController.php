<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role' => ['required', 'in:admin,guru,siswa,kepala_sekolah'],
    ]);

    DB::beginTransaction();

    try {
        // 1. Buat user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'is_active' => true,
        ]);

        // 2. BUAT RELASI SESUAI ROLE

        if ($user->role === 'siswa') {
            Siswa::create([
                'user_id' => $user->id,
                'nama_lengkap' => $request->name,
                'nisn' => rand(1000000000, 9999999999),
                'jenis_kelamin' => 'Laki-laki',
                'status' => 'aktif',
            ]);
        }

        if ($user->role === 'guru') {
            Guru::create([
                'user_id' => $user->id,
                'nama_lengkap' => $request->name,
                'nip' => rand(10000, 99999),
                'jenis_kelamin' => 'Laki-laki',
            ]);
        }

        if ($user->role === 'kepala_sekolah') {
            Guru::create([
                'user_id' => $user->id,
                'nama_lengkap' => $request->name,
                'nip' => 'KS' . rand(1000, 9999),
                'jenis_kelamin' => 'Laki-laki',
            ]);
        }

        // ❗ ADMIN TIDAK MASUK SISWA / GURU

        DB::commit();

        event(new Registered($user));
        Auth::login($user);

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'guru' => redirect()->route('guru.dashboard'),
            'siswa' => redirect()->route('siswa.dashboard'),
            'kepala_sekolah' => redirect()->route('kepala_sekolah.dashboard'),
        };

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withInput()->with('error', $e->getMessage());
    }
}
}