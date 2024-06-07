<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Exception;
use App\Models\Director;
use App\Services\CurlService;
use Illuminate\Support\Facades\Storage;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = Director::all();

        foreach ($directors as $director) {
            $director->image = url($director->image);
        }
        
        return response()->json(['message' => 'Director get successfully', 'directors' => $directors], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
            }

            $director = new Director();
            $director->name = $request->input('name');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $request->input('name');
                $imageName = str_replace(' ', '_', $imageName);
                // $imageName = $imageName . '.' . $image->getClientOriginalExtension();

                $curlService = new CurlService();
                $response = $curlService->getWebpImage($image, $imageName);
  
                if(!$response['success']){
                    return response()->json(['message' => "Can't convert image to webp", 'response' => $response], 400);
                }
                
                $image = file_get_contents($response['optimized_image_url']);
                $imagePath = 'img/director_images/' . $imageName . '.webp';
                
                Storage::disk('public')->put($imagePath, $image);
                
                $director->image = 'assets/' . $imagePath;
            }

            $director->save();

            return response()->json(['message' => 'Director created successfully', 'director' => $director], 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'DirectorController >> store >> Failed to create director: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Director $director)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Director $director)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        try {
            $director->delete();

            return response()->json(['message' => 'Director deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['message' => 'DirectorController >> destroy >> Failed to delete director: ' . $e->getMessage()], 500);
        }
    }
}