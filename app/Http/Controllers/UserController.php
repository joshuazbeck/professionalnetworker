<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\ProfileService;
use App\Services\Business\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $userArray = UserService::getAllUsers();

        return view('displayUsers')->with('userArray', $userArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        // Retrieve all user form inputs and clean against SQL injection.
        $firstname = $this->clean_input($request->input('firstName'));
        $lastname = $this->clean_input($request->input('lastName'));
        $email = $this->clean_input($request->input('email'));
        $password = $this->clean_input($request->input('password'));

        // Check database for duplicate email address and return boolean.
        $checkEmail = UserService::findEmail($email);

        if ($checkEmail) {
            // Do something if invalid
            echo "Email address already registered";
        } // Attempt to register user
        else {
            // Hash the password
            $hash = password_hash(trim($password), PASSWORD_DEFAULT);
            // Create a new UserModel with form data
            $user = new UserModel($firstname, $lastname, $email, $hash);
            // Register user with UserService addUser Method. Returns boolean.
            $registeredUser = UserService::addUser($user);

            // Check if registration was valid
            if ($registeredUser) {
                // Do something if valid.
               return redirect('login');
            } else {
                // Do something if invalid
                echo "There was a problem registering users";
            }
        }
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
     */
    public function edit($id)
    {
        if(session('userRole') != 3 && session('userID') != $id)
        {
            return redirect('/');
        }
        else
        {
            $user = UserService::getUserById($id);
            return view('updateUser')->with('user', $user);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        // Retrieve all user form inputs and clean against SQL injection.
        $userID = $this->clean_input($id);
        $firstname = $this->clean_input($request->input('firstName'));
        $lastname = $this->clean_input($request->input('lastName'));
        $email = $this->clean_input($request->input('email'));
        $role = $this->clean_input($request->input('selector'));
        $suspended = $this->clean_input($request->input('suspended'));
        $password = "";

        if(session('userRole') != 3)
        {
            $user = UserService::getUserById($id);
            $role = $user->getUserRole();
            $suspended = $user->getSuspended();
        }

        $userModel = new UserModel($firstname, $lastname, $email, $password);
        $userModel->setUserRole($role);
        $userModel->setSuspended($suspended);
        $userModel->setUserID($userID);

        if(UserService::updateUser($userModel))
        {
            if(session('userRole') != 3)
            {
                return redirect('userinfo/'.session('userID'));
            }
            else
            {
                return redirect('users');
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
     */
    public function destroy($id)
    {
       UserService::deleteUser($id);

       return redirect('/users');
    }

    public function userInfo($id)
    {
        if(session('userRole') != 3 && session('userID') != $id)
        {
            return redirect('/');
        }
        else
        {
            $user = UserService::getUserById($id);

            $profileModel = ProfileService::getProfileByUserID($id);

            return view('displayUserInfo')->with('profile', $profileModel)->with('user', $user);
        }
    }

    // Function for clearing user inputs against SQL injection
    function clean_input($inputData): string
    {
        $inputData = trim($inputData);
        $inputData = stripslashes($inputData);
        $inputData = htmlspecialchars($inputData);
        return $inputData;
    }
}
