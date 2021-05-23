<?php
/*
 * Group 1 Milestone 6
 * ProfileRestController.php Version 1
 * CST-256
 * 5/22/2021
 * This is a Profile Rest Controller that provides a User Profile as JSON
 */
namespace App\Http\Controllers;

use App\Models\DTOModel;
use App\Services\Business\ProfileService;

class ProfileRestController extends Controller
{


    /**
     * Display the requested User profile as JSON data
     *
     * @param  int  $id
     */
    public function show($id)
    {
        // Retrieve user profile
        $profile = ProfileService::getProfileByUserID($id);

        // If profile returned
        if(isset($profile))
        {
            // Create new DTO with data
            $profileDTO = new DTOModel(0,'No Errors', $profile);
        }
        else
        {
            // Return error message
            $profileDTO = new DTOModel(2,'Unable to Find the User by Profile', $profile);
        }

        // Encode data as JSON and return
        return json_encode($profileDTO);
    }



}
