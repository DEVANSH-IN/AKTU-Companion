<?php

namespace App\Http\Controllers;
use Cloudinary\Cloudinary;
use App\Models\PYQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PYQController extends Controller
{
    public function showPYQ(){
        $pyqs = PYQ::all();
        return view('pyqs.pyqsTable',compact('pyqs'));
    }
    public function editPYQs(Request $request){
        $id = $request->id;
        $pyq = PYQ::where('id',$id)->first();
        $validator = Validator::make($request->all(),[
            'course'=>'required|string',
            'subject'=>'required|string',
            'course_year'=>'required|numeric',
            'examination_year'=>'required|numeric'
        ]);
        if ($validator->fails()){
            return response()->json([
                'success'=>'false',
                'data'=>$validator
            ]);
        }
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
            'url' => [
                'secure' => true // Force HTTPS
            ]
        ]);
        $cloudinary->adminApi()->deleteAssets($pyq->public_id);
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Create Cloudinary instance


            // Upload options
            $uploadOptions = [
                'folder' => 'pyq',
                'resource_type' => 'auto', // auto-detect image/video/raw
                'overwrite' => true,
                'invalidate' => true
            ];

            // Upload file
            $uploadResult = $cloudinary->uploadApi()->upload(
                $file->getRealPath(),
                $uploadOptions
            );

            // Get URL
            $url = $uploadResult['secure_url'];
            $publicId = $uploadResult['public_id'];

            \Log::info("Cloudinary Public ID: " . $publicId);
            \Log::info("Secure URL: $url");

            PYQ::where('id', $request->id)->update([
                'course' => $request->course,
                'subject' => $request->subject,
                'course_year' => $request->course_year,
                'examination_year' => $request->examination_year,
                'location' => $url,
                'public_id' => $publicId,
            ]);

            return response()->json([
                'success' => true,
                'data' => 'File uploaded via Cloudinary API successfully!',
                'url' => $url
            ]);
        }
    }
    public function addPYQ(Request $request){
        $validator = Validator::make($request->all(),[
            'course'=>'required|string',
            'subject'=>'required|string',
            'course_year'=>'required|numeric',
            'examination_year'=>'required|numeric'
        ]);
        if ($validator->fails()){
            return response()->json([
                'success'=>'false',
                'data'=>$validator
            ]);
        }
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
            'url' => [
                'secure' => true // Force HTTPS
            ]
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // Upload options
            $uploadOptions = [
                'folder' => 'pyq',
                'resource_type' => 'auto', // auto-detect image/video/raw
                'overwrite' => true,
                'invalidate' => true
            ];

            // Upload file
            $uploadResult = $cloudinary->uploadApi()->upload(
                $file->getRealPath(),
                $uploadOptions
            );

            // Get URL
            $url = $uploadResult['secure_url'];
            $publicId = $uploadResult['public_id'];

            \Log::info("Cloudinary Public ID: " . $publicId);
            \Log::info("Secure URL: $url");

            PYQ::create([
                'course' => $request->course,
                'subject' => $request->subject,
                'course_year' => $request->course_year,
                'examination_year' => $request->examination_year,
                'location' => $url,
                'public_id' => $publicId,
            ]);

            return response()->json([
                'success' => true,
                'data' => 'File uploaded via Cloudinary API successfully!',
                'url' => $url
            ]);
        }
    }
    public function deletePYQ(Request $request){
        $pyq = PYQ::where('id',$request->id)->first();
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
            'url' => [
                'secure' => true // Force HTTPS
            ]
        ]);
        $cloudinary->adminApi()->deleteAssets($pyq->public_id);
        PYQ::where('id',$request->id)->delete();
        return response()->json([
            'success'=>'true',
            'data'=>'File deleted successfully.'
        ]);
    }
}
