<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Business\ProfileService;
use App\Services\Business\UserService;
use Illuminate\Http\Request;
use App\Models\ProfileModel;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('setupprofile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = session('userID');
        $gender = $request->input('selector');
        $age = $request->input('age');
        $phone = $request->input('phoneNum');
        $bio = $request->input('bio');
        $city = $request->input('city');
        $state = $request->input('state');

        $newProfile = new ProfileModel($user_id, $phone, $age, $gender, $city, $state, $bio);

        $profileService = new ProfileService();

        if ($profileService->addProfile($newProfile))
        {
            $userService = new UserService();
            $userService->updateProfileComplete($user_id, 1);
            return redirect('/');
        }
        else{
            return view('profiles.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $user = UserService::getUserById($id);

        $profileModel = ProfileService::getProfileByUserID($id);

        return view('displayProfile')->with('profile', $profileModel)->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
