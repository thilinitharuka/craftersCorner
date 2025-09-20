<?php

namespace App\Http\Controllers;

use App\Mail\ImageApprovedMail;
use App\Models\GeneratedImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GeneratedImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|string',
        ]);

        // Save image in DB
        $image = GeneratedImage::create([
            'image_base64' => $request->img,
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Image saved successfully',
            'data' => $image,
        ]);
    }

    public function index()
    {
        return GeneratedImage::latest()->get();
    }

    public function userImages()
    {
        $images = \App\Models\GeneratedImage::with('user')->latest()->get();

        return view('admin.generated-images.index', compact('images'));
    }

    public function approve(Request $request,$id)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
        ]);
        $image = \App\Models\GeneratedImage::with('user')->findOrFail($id);

        $image->update(['is_approved' => true,'price' => $request->price]);

        // Send email to image owner
        if ($image->user) {
            Mail::to($image->user->email)->send(new ImageApprovedMail($image));
        }
//        dd($image);
        return redirect()->back()->with('success', 'Image approved successfully!');
    }
}
