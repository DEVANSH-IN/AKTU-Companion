<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        // dd('hello');
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();
        $courses = $this->getCourseEnumValues();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['success' => false, 'data' => 'Invalid Credentials']);
        } else {
            Auth::login($user);
            if (Auth::user()->role == 'admin') {
                return view('admin.dashboard', compact('courses'));
            } else {
                return view('user.dashboard');
            }
        }
    }
    public function logout(Request $request)
    {
        $user = User::where('id', $request->id);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
            'success' => true,
            'data' => 'User logged out successfully.'
        ]);
    }
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|password|min:8'
        ]);
        if ($validated->fails()) {
            return response($validated->errors());
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return view('admin.dashboard');
    }
    function getCourseEnumValues()
    {
        $dbName = config('database.connections.mysql.database');
        

        $enumRaw = DB::select("
            SELECT COLUMN_TYPE 
            FROM information_schema.COLUMNS 
            WHERE TABLE_NAME = 'quantum' 
              AND COLUMN_NAME = 'course' 
              AND TABLE_SCHEMA = ?
        ", [$dbName]);

         // Check what is returned

        $enumType = $enumRaw[0]->COLUMN_TYPE ?? null;

        $enumValues = [];

        if ($enumType && preg_match('/^enum\((.*)\)$/', $enumType, $matches)) {
            $enumValues = array_map(fn($val) => trim($val, "'"), explode(',', $matches[1]));
        }

        return $enumValues;
    }


}
