<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $rules = array(
            'username' => 'required',
            'password' => 'required|min:5|confirmed'
        );

        $cek = Validator::make($request->all(), $rules);

        if ($cek->fails()) {
            return redirect('/register')->with('error', $cek->getMessageBag()->first());
        } else {
            $user = User::create([
                'username' => $request->username,
                'password' => bcrypt($request->password)
            ]);

            if ($user) {
                try {
                    $user->assignRole('user');
                    $role = 'user';
                } catch (\Exception $e) {
                    return response()->json([
                        'message' => $e->getMessage(),
                        'status' => 'Failed Registering Account'
                    ]);
                }
            }
        }

        $token = $user->createToken('regToken')->plainTextToken;
        return redirect('/')->with('success', 'Akun Berhasil dibuat Silahkan Login');

        return response()->json([
            'status'    => '200',
            'role'      => $role,
            'user'      => $user,
            'token'     => $token
        ]);
    }

    public function registerAdmin(Request $request)
    {
        $rules = array(
            'username' => 'required',
            'password' => 'required|confirmed'
        );

        $cek = Validator::make($request->all(), $rules);

        if ($cek->fails()) {
            return redirect('/register')->with('error', $cek->getMessageBag()->first());
        } else {
            $user = User::create([
                'username' => $request->username,
                'password' => bcrypt($request->password)
            ]);

            if ($user) {
                try {
                    $user->assignRole('admin');
                    $role = 'admin';
                } catch (\Exception $e) {
                    return response()->json([
                        'message' => $e->getMessage(),
                        'status' => 'Failed Registering Account'
                    ]);
                }
            }
        }

        $token = $user->createToken('regToken')->plainTextToken;
        return redirect('/')->with('success', 'Akun Berhasil dibuat Silahkan Login');

        return response()->json([
            'status'    => '200',
            'role'      => $role,
            'user'      => $user,
            'token'     => $token
        ]);
    }

    public function login(Request $request)
    {
        $rules = array(
            'username' => 'required',
            'password' => 'required',
        );

        $cek = Validator::make($request->all(), $rules);

        if ($cek->fails()) {
            return redirect('/')->with('error2', $cek->getMessageBag()->first());
        } else {
            $user = User::where('username', $request->username)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return redirect('/')->with('error2', 'Unauthorized');
            }

            $token = $user->createToken('user_access')->plainTextToken;
            $role = $user->getRoleNames();
            return redirect('dashboard');
        }
    }

    public function logout()
    {
        
    }
}
