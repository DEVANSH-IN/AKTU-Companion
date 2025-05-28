<?php

namespace App\Http\Controllers;
use Cloudinary\Cloudinary;
use App\Models\Quantum;
// use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class QuantumController extends Controller
{
    public function showQuantum()
    {
        $quantums = Quantum::all();
        return view('quantum.quantumTable', compact('quantums'));
    }
    public function listQuantumFiles()
    {
        // This returns an array of all object keys under 'quantum/'
        $files = Storage::disk('s3')->files('quantum');
        \Log::info("Quantum Files:", $files);
        return response()->json($files);
    }
    public function addQuantum(Request $request)
    {

        try {
            $validated = Validator::make($request->all(), [
                'course' => 'required|string',
                'subject' => 'required|string',
                'year' => 'required|numeric',
                'file' => 'required|mimes:pdf,jpg,docx,pub,jpeg',
            ]);

            if ($validated->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validated->errors()
                ], 422);
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
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension(); // e.g., pdf

                $publicId =  $originalName;
                // Create Cloudinary instance


                // Upload options
                $uploadOptions = [
                    'folder' => 'quantum',
                    'resource_type' => 'auto',
                    'public_id' => $publicId,
                    'format'=>$extension, // auto-detect image/video/raw
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

                Quantum::create([
                    'course' => $request->course,
                    'subject' => $request->subject,
                    'year' => $request->year,
                    'location' => $url,
                    'public_id' => $publicId,
                ]);

                return response()->json([
                    'success' => true,
                    'data' => 'File uploaded via Cloudinary API successfully!',
                    'url' => $url
                ]);
            }

            return response()->json([
                'success' => false,
                'data' => "No file was uploaded!!"
            ]);

        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json([
                'success' => false,
                'data' => "An error occurred: " . $e->getMessage()
            ], 500);
        }
    }
    public function editQuantums(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'course' => 'required|string',
            'subject' => 'required|string',
            'year' => 'required|numeric',
            'file' => 'required|mimes:pdf,jpg,docx,pub,jpeg'
        ]);
        if ($validated->fails()) {
            dd($validated->errors());
        }
        $quantum = Quantum::where('id', $request->id)->first();
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
        $cloudinary->adminApi()->deleteAssets($quantum->public_id);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension(); // e.g., pdf

            $publicId = $originalName;
            // Create Cloudinary instance


            // Upload options
            $uploadOptions = [
                'folder' => 'quantum',
                'resource_type' => 'auto',
                'format'=>$extension,
                'public_id' => $publicId, // auto-detect image/video/raw
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

            Quantum::where('id', $request->id)->update([
                'course' => $request->course,
                'subject' => $request->subject,
                'year' => $request->year,
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
    public function deleteQuantum($id)
    {
        try {
            $quantum = Quantum::findOrFail($id);

            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ]
            ]);

            // Delete from Cloudinary
            $result = $cloudinary->adminApi()->deleteAssets($quantum->public_id);

            // Check if deletion was successful
            if ($result['deleted'][$quantum->public_id] === 'deleted') {
                $quantum->delete(); // Delete from database
                return response()->json(['success' => true]);
            }

            return response()->json(['error' => 'Deletion failed'], 500);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}