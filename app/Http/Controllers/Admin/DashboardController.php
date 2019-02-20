<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\User;
use App\Place;
use App\Reference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //display dashboard on index
    public function index()
    {
        $users = User::count();
        $places = Place::count();
        $references = Reference::count();
        $contacts = Contact::where('is_read', false)->count();

        return view('admin/dashboard', [
            'users' => $users,
            'places' => $places,
            'contacts' => $contacts,
            'references' => $references
        ]);
    }
}
