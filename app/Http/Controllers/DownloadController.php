<?php
/*
 * Group 1 Milestone 5
 * DownloadController.php Version 1
 * CST-256
 * 5/12/2021
 * This is a Download Controller that provides the ability to download a file from the public resumes folder.
 */
namespace App\Http\Controllers;


class DownloadController
{
    // Method for downloading resumes from the public/resumes folder
    public function download($file_name)
    {
        // Create file path for download with filename
        $filePath = public_path('/resumes/'.$file_name);

        // Download file
        return response()->download($filePath);
    }
}
