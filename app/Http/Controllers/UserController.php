<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchUser = $request->input('search');
        if ($searchUser) {
            /**
             * If input field is not empty we'll perform search on out user table
             */
            $users = User::where('name', 'like', '%' . $searchUser . '%')->orWhere('email', 'like', '%' . $searchUser . '%')->paginate();
        } else {
            $users = User::paginate(20);
        }
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('user.index'))->with('danger', 'User ' . $user->name . ' moved to <a href="' . route('user.index') . '"> trash </a>.');
    }
    /**
     * Search Database for $request and return as JSON.
     */
    public function autocomplete(Request $request)
    {
        $usersList = User::where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->get();
        $data = '<div class="list-group">';
        if (count($usersList) > 0) {
            foreach ($usersList as $row) {
                $data .= '<a href="#" class="list-group-item list-group-item-action auto-suggest-list">' . $row->name . '</a>';
            }
        } else {
            $data .= '<a href="#" class="list-group-item list-group-item-action active" aria-current="true">No data found</a>';
        }
        $data .= '</div>';
        return $data;
    }
}
