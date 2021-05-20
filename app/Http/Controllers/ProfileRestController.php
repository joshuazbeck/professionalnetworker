<?php

namespace App\Http\Controllers;

use App\Models\DTOModel;
use App\Services\Business\JobService;
use App\Services\Business\ProfileService;

class ProfileRestController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $profile = ProfileService::getProfileByUserID($id);

        if(isset($profile))
        {
            $profileDTO = new DTOModel(0,'No Errors', $profile);
        }
        else
        {
            $profileDTO = new DTOModel(2,'Unable to Find the User by Profile', $profile);
        }

        return json_encode($profileDTO);
    }
    


}
