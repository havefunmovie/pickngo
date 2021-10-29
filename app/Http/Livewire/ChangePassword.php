<?php


namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePassword
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'family' => 'required',
            'mobile' => 'required|unique:users|numeric',
            'username' => 'sometimes|unique:users',
            'unit' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        $validated['address'] = 'apt'.$validated['unit'].','.$validated['address'];
        User::where('id' , auth()->user()->id)->update([
            'name' => $validated['name'],
            'family' => $validated['family'],
            'mobile' => $validated['mobile'],
            'username' => $validated['username'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'province' => $validated['province'],
            'postal' => $validated['postal'],
            'password' => Hash::make($validated['password']),
            ]);
        return redirect('/');
    }
}