<?php

namespace App\Http\Controllers;

use App\Models\GeneratedImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageGenerationController extends Controller
{
    /**
     * Display the sketch upload form
     */
    public function index()
    {
        return view('custom-craft-corner');
    }

    /**
     * Handle sketch upload and start image generation
     */
    public function generateImage(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'sketch' => 'required|image|mimes:jpeg,png,jpg|max:5120', // 5MB max
            'description' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Store the uploaded sketch
            $sketchPath = $this->storeSketch($request->file('sketch'));

            // Create database record
            $generatedImage = GeneratedImage::create([
                'user_id' => auth()->id() ?? null, // If user is logged in
                'original_sketch_path' => $sketchPath,
                'generated_image_path' => '', // Will be updated after generation
                'description' => $request->description,
                'prompt_used' => $this->createPrompt($request->description),
                'generation_status' => 'pending',
                'ip_address' => $request->ip(),
            ]);

            // Start the image generation process
            $this->processImageGeneration($generatedImage);

            return response()->json([
                'success' => true,
                'message' => 'Image generation started',
                'id' => $generatedImage->id,
                'status' => 'pending'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error starting image generation: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Check the status of image generation
     */
    public function checkStatus($id)
    {
        $generatedImage = GeneratedImage::findOrFail($id);

        return response()->json([
            'id' => $generatedImage->id,
            'status' => $generatedImage->generation_status,
            'generated_image_url' => $generatedImage->generated_image_path ?
                asset($generatedImage->generated_image_path) : null,
            'original_sketch_url' => asset($generatedImage->original_sketch_path),
            'description' => $generatedImage->description,
            'generation_time' => $generatedImage->generation_time,
            'created_at' => $generatedImage->created_at->format('Y-m-d H:i:s')
        ]);
    }

    /**
     * Store uploaded sketch file
     */
    private function storeSketch($file)
    {
        $filename = time() . '_sketch_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('uploads/sketches', $filename, 'public');
        return 'storage/' . $path;
    }

    /**
     * Create AI prompt from description
     */
    private function createPrompt($description)
    {
        return $description . ', high quality, detailed, photorealistic, professional photography';
    }

    /**
     * Process image generation (integrate with your AI service)
     */
    private function processImageGeneration($generatedImage)
    {
        // This is where you'll integrate with your Fooocus API
        // For now, let's simulate the process

        try {
            $startTime = microtime(true);

            // Here you would call your Fooocus API
            // $generatedImagePath = $this->callFoocusAPI($generatedImage);

            // For demonstration, let's simulate a delay and success
            // In reality, you might want to use queues for this
            sleep(2); // Simulate processing time

            $endTime = microtime(true);
            $generationTime = round($endTime - $startTime);

            // Simulate successful generation
            $generatedImagePath = $this->simulateImageGeneration();

            // Update the database record
            $generatedImage->update([
                'generated_image_path' => $generatedImagePath,
                'generation_status' => 'completed',
                'generation_time' => $generationTime,
                'file_size' => rand(500000, 2000000), // Simulate file size
                'image_width' => 1024,
                'image_height' => 1024,
            ]);

        } catch (\Exception $e) {
            // Mark as failed if something goes wrong
            $generatedImage->update([
                'generation_status' => 'failed'
            ]);
        }
    }

    /**
     * Simulate image generation (replace with actual Fooocus API call)
     */
    private function simulateImageGeneration()
    {
        // This is just for testing - replace with actual image generation
        return 'storage/uploads/generated/sample_generated_image.png';
    }

    /**
     * Admin: View all generated images
     */
    public function adminIndex()
    {
        $images = GeneratedImage::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.generated-images.index', compact('images'));
    }

    /**
     * Admin: Get generation statistics
     */
    public function getStats()
    {
        $stats = [
            'total' => GeneratedImage::count(),
            'completed' => GeneratedImage::where('generation_status', 'completed')->count(),
            'pending' => GeneratedImage::where('generation_status', 'pending')->count(),
            'failed' => GeneratedImage::where('generation_status', 'failed')->count(),
            'avg_generation_time' => GeneratedImage::where('generation_status', 'completed')
                ->whereNotNull('generation_time')
                ->avg('generation_time'),
            'total_file_size' => GeneratedImage::where('generation_status', 'completed')
                ->sum('file_size'),
        ];

        return response()->json($stats);
    }

    /**
     * Admin: Delete generated image
     */
    public function destroy($id)
    {
        $generatedImage = GeneratedImage::findOrFail($id);

        // Delete files from storage
        if ($generatedImage->original_sketch_path) {
            Storage::disk('public')->delete(str_replace('storage/', '', $generatedImage->original_sketch_path));
        }

        if ($generatedImage->generated_image_path) {
            Storage::disk('public')->delete(str_replace('storage/', '', $generatedImage->generated_image_path));
        }

        // Delete database record
        $generatedImage->delete();

        return response()->json([
            'success' => true,
            'message' => 'Image deleted successfully'
        ]);
    }
}
