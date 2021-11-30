<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $new = new User();
        return view('profile.show', compact('user')) ;
    }
    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        // abort_if($user->isNot(current_user()), 404);
        return view('profile.edit', ['user'=>$user]);
    }
    public function update(User $user, Request $request)
    {
        $data=$request->validate([
            'name'=> ['required','string', 'max:255'],
            'username'=>['required','string','alpha_dash', Rule::unique('users', 'username')->ignore($user->id)],
            'avater'=>['file','nullable'],
            'email'=>['required','email',],
            'password'=>['confirmed','required','min:8','max:255',Rule::unique('users', 'email')->ignore($user->id)],
        ]);
        $data['password']= bcrypt($request->password);
        if ($request->hasFile('avater')) {
            $data['avater']=$request->avater->store('avaters');
        }
        $user->update($data);
        return redirect('/profile/'.$user->username);
    }
}
