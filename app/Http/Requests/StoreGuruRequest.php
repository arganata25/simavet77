<?php      
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreGuruRequest extends FormRequest{
    public function authorize(): bool{
        return Auth::check() && Auth::user()->role === 'admin';
    }
    public function rules(): array{
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'nip' => 'required|string|unique:guru,nip',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:15',
            'pendidikan_terakhir' => 'required|string|max:20',
        ];
    }
    public function messages(): array{
        return [
           'email.unique' => 'Email sudah digunakan.',
           'nip.unique' => 'NIP sudah digunakan.',
           'password.min' => 'Password minimal 8 karakter.',
        ];
    }
}