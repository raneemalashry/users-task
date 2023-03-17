<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateReqest;
use App\Http\Resources\CertificateResource;
use App\Services\UploadFiles;

class CertificateController extends Controller
{
    public function upload(UploadFiles $uploadFiles,CertificateReqest $request){
        $certificate = $uploadFiles->upload($request->certificate_file, "users", ['title' => $request->certificate_title]);
        return response()->json(['message' => 'Certificate uploaded successfully', 'data' => new CertificateResource($certificate)], 201);
    }
}
