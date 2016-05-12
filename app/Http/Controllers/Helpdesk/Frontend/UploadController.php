<?php

namespace App\Http\Controllers\Helpdesk\Frontend;

use Illuminate\Http\Request;
use App\Service\UploadWorker;
use App\Http\Requests;
use Storage;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function __construct( UploadWorker $upload )
    {
        $this->upload = $upload;
    }

    public function uploadImage(Request $request)
    {
        $files = $this->upload->upload( $request->file('file') , 'tickets/uploads');

        if($files)
        {
            $array = array(
                'filelink' => url('tickets/uploads/'.$files['name']),
                'filename' => $files['name']
            );

            return response()->json($array);
        }

        return false;
    }

    public function uploadFile(Request $request)
    {
        $files = $this->upload->upload( $request->file('file') , 'tickets/files' );

        if($files)
        {
            $array = array(
                'filelink' => 'tickets/files/'.$files['name'],
                'filename' => $files['name']
            );

            return response()->json($array);
        }

        return false;
    }

    public function uploadJson()
    {
        $data  = [];
        $files = Storage::disk('ticketsupload')->files();

        if(!empty($files))
        {
            foreach($files as $file)
            {
                if($file != '.DS_Store')
                {
                    $data[] = ['image' => url('tickets/uploads/'.$file), 'thumb' => url('tickets/uploads/'.$file), 'title' => $file];
                }
            }
        }

        return response()->json($data);
    }

    public function fileJson()
    {
        $files = Storage::disk('ticketsfiles')->files();
        $data  = [];
        if(!empty($files))
        {
            foreach($files as $file)
            {
                $data[] = ['name' => $file, 'link' => url('tickets/files/'.$file), 'title' => $file];
            }
        }

        return response()->json($data);
    }

}
