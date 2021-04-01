<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * 
     * get home page data
     */
    public function home() {

        // get collections, ignoring pagination
        $users = User::all();
        $groups = UserGroup::all();

        return view('home', compact('users', 'groups'));
    }

    /**
     * 
     * get user assets
     */
    public function userAssets(Request $request, $id) {

        // NB: inored user auth

        // get collections, ignoring pagination
        $user = User::find($id);
        $assets = $user ? $user->assets : null;

        return view('assets.user', compact('user', 'assets'));
    }

    /**
     * 
     * get user assets
     */
    public function groupAssets(Request $request, $id) {

        // NB: inored user auth

        // get collections, ignoring pagination
        $group = UserGroup::find($id);
        $assets = $group ? $group->assets : null;

        return view('assets.group', compact('group', 'assets'));
    }

}
