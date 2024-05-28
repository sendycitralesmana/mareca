<?php

namespace App\Http\Controllers\BackOffice;

use Svg\Tag\Rect;
use App\Models\Blog;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\Auth\VerifyMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $qUsers = User::query();
        $sRole = $request->searchRole;
        
        if ($sRole) {
            $qUsers->where('role_id', $sRole);
            $rolee = Role::where('id', $sRole)->first();
        } else {
            $rolee = '';
        }

        $users = $qUsers->get();
        $roles = Role::where('id', '!=', 1)->get();

        return view('back-office.user-data.user.index', compact('users', 'roles', 'sRole', 'rolee'));
    }

    public function createAction(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => 'required|min:8|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'email.unique' => 'Email sudah terdaftar',
            'role.required' => 'Peran harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.regex' => 'Password harus terdiri dari huruf kecil, huruf besar, dan angka',
        ]);

        $password = $request->password;

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(40);
        $user->role_id = $request->role;
        $user->save();

        Mail::to($user->email)->send(new VerifyMail($user, $password));
        return redirect('/back-office/user-data/user')->with('success', 'Data pengguna telah ditambahkan, beritahu ' . $user->name . ' untuk melakukan verifikasi akun');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->role_id = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Peran pengguna telah diubah');
    }

    public function profile($id)
    {
        // $nama = "hello admin";
        // $initials = Str::of($nama)->explode(' ')->map(fn ($name) => $name[0])->join('');
        // dd($initials);

        $user = User::find($id);
        return view('back-office.user-data.user.profile', compact('user'));
    }

    public function editData($id)
    {
        $user = User::find($id);
        return view('back-office.user-data.user.edit-data', compact('user'));
    }

    public function updateData(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->place_birth = $request->place_birth;
        $user->date_birth = $request->date_birth;
        $user->address = $request->address;
        $user->no_hp = $request->no_hp;
        if ($request->file('foto')) {
            if ($user->foto) {
                Storage::disk('s3')->delete($user->foto);
            }
            $file = $request->file('foto');
            $path = Storage::disk('s3')->put('user', $file);
            $user->foto = $path;
        }
        $user->save();

        return redirect()->back()->with('success', 'Data profil telah diubah');
    }

    public function editPassword($id)
    {
        $user = User::find($id);
        return view('back-office.user-data.user.edit-password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {        
        $request->validate([
            'password_sekarang' => 'required',
            'password_baru' => 'required|min:8|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
            'konfirmasi_password' => 'required|min:8|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/|same:password_baru',
        ], [
            'password_sekarang.required' => 'Password sekarang harus diisi',
            'password_baru.required' => 'Password baru harus diisi',
            'password_baru.min' => 'Password baru minimal 8 karakter',
            'password_baru.regex' => 'Password baru harus terdiri dari huruf kecil, huruf besar, dan angka',
            'konfirmasi_password.required' => 'Konfirmasi password harus diisi',
            'konfirmasi_password.regex' => 'Password harus terdiri dari huruf kecil, huruf besar, dan angka',
            'konfirmasi_password.min' => 'Password minimal 8 karakter',
            'konfirmasi_password.same' => 'Password baru dan konfirmasi password tidak sama',
        ]);

        $user = User::find($id);
        // check if password sekarang != $user->password
        if (!Hash::check($request->password_sekarang, $user->password)) {
            return redirect()->back()->with('error', 'Password sekarang tidak sesuai');
        }

        $user = User::find($id);
        $user->password = Hash::make($request->password_baru);
        $user->save();
        
        return redirect('/back-office/user-data/user')->with('success', 'Password telah diubah');
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user->foto) {
            Storage::disk('s3')->delete($user->foto);
        }
        $blogs = Blog::where('user_id', $user->id)->get();
        foreach ($blogs as $blog) {
            $blog->user_id = null;
            $blog->save();
        }
        $user->delete();
        return redirect('/back-office/user-data/user')->with('success', 'Data pengguna telah dihapus');
    }

}
