<?php
namespace App\Http\Controllers;

/*
 * Group 1 Milestone 1
 * LoginController.php Version 1
 * CST-256
 * 4/16/2021
 * This is a Login Controller class for handling login requests.
 */
use App\Services\Business\SecurityService;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\LoginModel;

class AdminController extends Controller
{

    public function presentAdminView(){
        session_start();
        if (isset($_SESSION['userRole']) && UserModel::isUserAdmin($_SESSION['userRole'])){
            return view('admin');
        } else {
            echo "<h1>You are not authorized to view this page</h1>";
        }
    }
    public function presentEditUserView(){
        session_start();
        if (isset($_SESSION['userRole']) && UserModel::isUserAdmin($_SESSION['userRole'])){
            return view('edit_users');
        } else {
            echo "<h1>You are not authorized to view this page</h1>";
        }
    }
    public function populateList(){
        //@todo implement code to access a list of $userModels
        //@todo this hardset array needs to be erased but is currently used for testing
        //@todo ensure that the user is authenticated
        $users = [
            
            new UserModel("Josh", "Beck", "macmanjb@gmail.com", "abc123", "2544052253", 19, true, "Waco", "TX"),
            new UserModel("Josh", "Beck", "macmanjb@gmail.com", "abc123", "2544052253", 19, true, "Waco", "TX"),
            new UserModel("Josh", "Beck", "macmanjb@gmail.com", "abc123", "2544052253", 19, true, "Waco", "TX"),
            new UserModel("Josh", "Beck", "macmanjb@gmail.com", "abc123", "2544052253", 19, true, "Waco", "TX"),
            new UserModel("Josh", "Beck", "macmanjb@gmail.com", "abc123", "2544052253", 19, true, "Waco", "TX"),
            new UserModel("Josh", "Beck", "macmanjb@gmail.com", "abc123", "2544052253", 19, true, "Waco", "TX"),
            new UserModel("Josh", "Beck", "macmanjb@gmail.com", "abc123", "2544052253", 19, true, "Waco", "TX"),
            new UserModel("Josh", "Beck", "macmanjb@gmail.com", "abc123", "2544052253", 19, true, "Waco", "TX")
        ];
        foreach ($users as $user){
            $name = $user->getFirstName()." ".$user->getLastName();
            $email = $user->getEmail();
            
            //@todo Need to set the ID to $user->getUserID(); however, as we are hardwiring the data, there is no id currently.  Once database is updated this should be changed
            $id = 1;
            
            /**@todo need to update UserModel to contain these elements
             * 
             * $role = $user->getRole();
             * $job = $user->getJob(); 
             * 
            */
            
            //@todo needs to be replaced
            $role = 'Admin';
            $job = 'Computer Programmer'; 

            
            echo '
            <div class="row"
            	style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
            	<div class="col" style="border-style: none;">
            		<div class="card"
            			style="border-radius: 10px; background: var(- -dark); border-style: none; border-top-width: 49px;">
            			<div class="card-header">
            				<h5 class="mb-0" style="color: var(- -light); text-align: left;">'.$name.'</h5>
            			</div>
            			<div class="card-body d-sm-flex flex-row justify-content-sm-center">
            				<div class="btn-toolbar"></div>
            				<div style="width: 75%; height: auto;">
            					<p
            						style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Email:
            						'.$email.'</p>
            					<p
            						style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Role:
            					   '.$role.'</p>
            					<p
            						style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Job:
            						'.$job.'</p>
            				</div>
            				<div
            					class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
            					role="group"
            					style="padding-right: 0px; margin-left: 0px; width: auto;">
            	
                                <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="deleteUser/1" style="opacity: 0.5;pointer-events: none; margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Update</a></li>
            					<a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="deleteUser/'.$id.'" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Delete</a></li>
            					
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
        ';
        }
        
    }
    
    //@todo Need to implement deleting the user
    public function deleteUser($id){
        
        //PSUEDOCODE
        //@todo ensure that the user is an admin user
        //@todo delete the user
        //@todo Go back to the previous page
        
        //@todo REMOVE
        echo "DELETED USER ".$id."?  I SURE HOPE SO!!";
        
        
    }
    
    //@todo Need to implement an update user?
}


