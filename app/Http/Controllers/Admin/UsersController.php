<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin/users/index', ['users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */    
    public function show(User $user)
    {
        return view('admin/users/show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin/users/edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required|string|email|max:255|unique:users, email',
            'job' => 'nullable|string|max:191',
            'address' => 'nullable|string|max:191',
            'postal_code' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:191',
            'phone' => 'nullable|numeric|min:10|max:10',
        ]);

        $user->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'job' => $request->input('job'),
            'address' => $request->input('address'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('admin.users.edit', $user)
            ->with('success', 'Votre profil a bien été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'L\'utilisateur a bien été supprimé.');
    }

    //activate a user 
    public function setActive(User $user)
    {
        if (Auth::user()->id !== $user->id) {
            if ($user->is_active) {

                $user->update([
                    'is_active' => false
                ]);

                return redirect()->route('admin.users.index')
                ->with('success', 'Vous avez désactivé '. $user->fullname());                
            }

            $user->update([
                'is_active' => true
            ]);

            return redirect()->route('admin.users.index')
                ->with('success', 'Vous avez activé '. $user->fullname());
        }

        return redirect()->route('admin.users.index')
            ->with('error', 'Vous ne pouvez pas vous désactivé vous-même.');
    }

    // set a user as admin
    public function setAdmin(User $user)
    {
        if (Auth::user()->id !== $user->id) {

            if ($user->is_admin) {

                $user->update([
                    'is_admin' => false
                ]);

                return redirect()->route('admin.users.show', $user)
                    ->with('success', 'Vous avez enlevé les droits d\'administration à : '. $user->email);     
            }

            $user->update([
                'is_admin' => true
            ]);

            return redirect()->route('admin.users.show', $user)
                ->with('success', 'Vous avez donné les droits d\'administration à : '. $user->email);
        }

        return redirect()->route('admin.users.show', $user)
            ->with('error', 'Vous ne pouvez pas vous enlever les droits d\'administration.');
    }

}
