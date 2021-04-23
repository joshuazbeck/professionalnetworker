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
        if(session('userRole') != 3 && session('userID') != $id)
        {
            return redirect('/');
        }
        else
        {
            $user = UserService::getUserById($id);

            $profileModel = ProfileService::getProfileByUserID($id);

            return view('displayProfile')->with('profile', $profileModel)->with('user', $user);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $user = UserService::getUserById($id);
        $profile = ProfileService::getProfileByUserID($id);

        return view('updateProfile')->with('user', $user)->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $user_id = $id;
        $profileID = $request->input('profileID');
        $gender = $request->input('gender');
        $age = $request->input('age');
        $phone = $request->input('phone');
        $bio = $request->input('bio');
        $city = $request->input('city');
        $state = $request->input('state');

        $newProfile = new ProfileModel($user_id, $phone, $age, $gender, $city, $state, $bio);
        $newProfile->setProfileID($profileID);

        if(ProfileService::updateProfile($newProfile))
        {
            if(session('userRole') != 3)
            {
                return redirect('userinfo/'.session('userID'));
            }
            else
            {
                return redirect('profiles/'.$id);
            }
        }
        else
        {
            return redirect('/');
        }

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
