<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\user\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * List of users
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $item = $request->item;
        $search = $request->search;
        $state = $request->state;

        $users = User::filterAdvance($item, $search, $state)->orderby("id", "desc")->get();

        return response()->json(
            UserCollection::make($users),
            200
        );
    }
}
