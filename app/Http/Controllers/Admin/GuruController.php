<?php   
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Guru, User};
use App\Http\Requests\StoreGuruRequest;
use Illuminate\Support\Facades\{DB, Hash};

class GuruController extends Controller
{
        public function index()
        {
            $guru = Guru::with('user')->latest()->paginate(15);
            return view('admin.guru.index', compact('guru'));
        }

        public function create()
        {
            return view('admin.guru.create');
        }
        public function store(StoreGuruRequest $request)
        {
            DB::transaction(function () use ($request) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => 'guru',
                    'is_active' => true,
                ]);
                Guru::create(array_merge(
                    $request->only(['nip', 
                    'nama_lengkap', 
                    'jenis_kelamin', 
                    'tanggal_lahir', 
                    'no_hp', 
                    'pendidikan_terakhir']),
                    ['user_id' => $user->id]
                ));
            });

            return redirect()->route('admin.guru.index')
                ->with('success', 'Guru berhasil ditambahkan.');
        }

        public function destroy(Guru $guru)
        {
            $guru->delete();
            return back()->with('success', 'Guru berhasil dihapus.');
        }
}