<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Requests\TeamRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = User::orderBy('role','ASC')->get();

        return view('backoffice.settings.team', compact('teams'));
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
    public function store(TeamRequest $request)
    {
        User::create($request->all());

        return redirect()->back()->with('success','New member added successfully.');
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
        return $id;
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
        dd($request->all());

        // $request->validate([
        //     'name'      =>  'required',
        //     'email'     =>  'required|email|unique:users,email,'.$id,
        // ]);

        $user = User::find($id);

        dd($user);

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->role     = $request->role;
        $user->status   = $request->status;

        if($request->password != null) {
            // $user->name     = $request->name;
            // $user->email    = $request->email;
            $user->password = Hash::make($request->password);
            // $user->role     = $request->role;
            // $user->status   = $request->status;

        }

        $user->save();
        return redirect()->back()->with('success', 'User information update successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'A team member delete successfully.');
    }
}
