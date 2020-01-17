<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(5);
        $response = [
            'pagination' => [
                'total' => $user->total(),
                'per_page' => $user->perPage(),
                'current_page' => $user->currentPage(),
                'last_page' => $user->lastPage(),
                'from' => $user->firstItem(),
                'to' => $user->lastItem()
            ],
            'user' => $user,
        ];

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'email' => 'required|min:7|max:255|unique:users',
            'bio' => 'required|min:2',
            'pass' => 'required|min:2|max:255',
        ]);

        $data_user = [
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
            'password' => Hash::make($request->pass)
        ];

        $user = User::create($data_user);

        return response()->json([
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'email' => 'required|min:7|max:255|unique:users',
            'bio' => 'required|min:2',
            'pass' => 'required|min:2|max:255',
        ]);

        $user = User::find($id);

        $data_user = [
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
            'password' => Hash::make($request->pass)
        ];

        $user->update($data_user);

        return response()->json([
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();

        return response()->json([
            'success' => 'delete success'
        ]);
    }
}
