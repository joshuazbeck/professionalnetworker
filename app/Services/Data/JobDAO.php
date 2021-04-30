<?php
/*
 * Group 1 Milestone 2
 * SecurityService.php Version 2
 * CST-256
 * 4/24/2021
 * This class is a data access object designed to handle database transactions concerning Users.
 */
namespace App\Services\Data;

use App\Models\UserModel;
use Illuminate\Support\Facades\DB;
use App\Models\JobModel;

class JobDAO
{
    // Function for returning an array of all Users.
    public static function getAllJobs(): ?array
    {
//         // Connect to database
//         $connection = DatabaseConfig::getConnection();

//         // Prepare SQL String and bind parameters
//         $sql_query = "SELECT * FROM users";
//         $stmt = $connection->prepare($sql_query);

//         // Execute statement and get results.
//         $stmt->execute();
//         $result = $stmt->get_result();

//         // If no results return null.
//         if ($result->num_rows == 0) {

//             return null;
//         }
//         // Retrieve user data and verify password
//         else
//         {
//             // Array to hold results
//             $user_array = array();

//             // Step through results and create new UserModel
//             while ($user = $result->fetch_assoc())
//             {
//                 $returnedUser = new UserModel($user["FIRST_NAME"], $user["LAST_NAME"], $user["EMAIL"], $user["PASSWORD"]);
//                 $returnedUser->setUserID($user['USER_ID']);
//                 $returnedUser->setSuspended($user['SUSPENDED']);
//                 $returnedUser->setUserRole($user['ROLE_ID']);
//                 $returnedUser->setProfileComplete($user['PROFILE_COMPLETE']);

//                 array_push($user_array, $returnedUser);
//             }

//             return $user_array;
//         }

//@todo: Need to implement

    $job1 = new JobModel(1, "CEO", "Programming", "GCU", "10", 1, "This would be fun");
    return [$job1, $job1];
    }

}
