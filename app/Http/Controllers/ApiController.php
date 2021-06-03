<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;


class ApiController extends Controller
{


    public function getMedia()
    {

        $allMedia = File::all();

        if (!$allMedia->isEmpty()) {

            return response()->json([
                "message" => "File Urls",
                "mediaPaths" => $allMedia
            ], 200);
        } else {

            return response()->json([
                "message" => "No Files uploaded",
            ], 204);
        }
    }

    public function uploadFile(Request $req)
    {

        if (!empty($req->file)) {

            if($this->checkUploadSize($req) > 1000000) {

                return response()->json([
                    "message" => "File too big!",
                ], 422);
            }

            $fileModel = new File;

            if ($req->file()) {
                
                $fileName = $req->file->getClientOriginalName();
                $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

                $fileModel->name = $req->file->getClientOriginalName();
                $fileModel->file_path = '/storage/' . $filePath;

                if ($fileModel->save()) {

                    return response()->json([
                        "message" => 'File Uploaded Sucessfully. Access File here ' . url('/') . '' . $fileModel->file_path . '',
                        "mediaPaths" => '' . url('/') . '' . $fileModel->file_path . ''
                    ], 200);
                }
            } 
        } else {

            return response()->json([
                "message" => "No file uploaded",
            ], 404);
            
        }
    }

    private function checkUploadSize($request)
    {

        return $request->file('file')->getSize();

    }
}
