<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Flysystem\Filesystem;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
    	$filename = $request->file('file')->store("", "google");
        $dir = '/';
        $recursive = false;
        $contents = collect(\Storage::cloud()->listContents($dir, $recursive));
        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
            ->first();

        $service = \Storage::cloud()->getAdapter()->getService();
        $permission = new \Google_Service_Drive_Permission();
        $permission->setRole('writer'); // owner    ----->  writer   ----->  reader
        $permission->setType('anyone'); // user     ----->  anyone
        $permission->setAllowFileDiscovery(false);
        
        $permissions = $service->permissions->create($file['basename'], $permission);
        
        $success = \Storage::cloud()->url($file['path']);
        
        return view('welcome', compact('success'));
    }

    public function getFiles()
    {
    	
            $client = new \Google_Client;
            $client->setClientId(env('GOOGLE_CLIENT_ID'));
            $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
            $client->refreshToken(env('GOOGLE_REFRESH_TOKEN'));
            $service = new \Google_Service_Drive($client);
            $adapter = new GoogleDriveAdapter($service, env('GOOGLE_DRIVE_FOLDER_ID'));
            //dd($adapter);
            $filesystem = new Filesystem($adapter);
            $contents = $filesystem->listContents();
            //dd($contents);

            return view('list', compact('contents'));
    }

    public function showFile($filename)
    {
        //dd($filename);
        $service = \Storage::cloud()->getAdapter()->getService();
        $permission = new \Google_Service_Drive_Permission();
        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(\Storage::cloud()->listContents($dir, $recursive));
        
        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
            ->first();        

        $permissions = $service->permissions->listPermissions($file['basename']);
        
        if(($permissions->permissions[0])->getRole() != "writer"){
            
            $permission->setRole('writer'); // owner    ----->  writer   ----->  reader
            $permission->setType('anyone'); // user     ----->  anyone
            $permission->setAllowFileDiscovery(false);

            $permissions = $service->permissions->create($file['basename'], $permission);

        }

        return view('oficio', compact('file'));
    }
}
