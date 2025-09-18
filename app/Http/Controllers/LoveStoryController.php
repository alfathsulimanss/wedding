<?php

namespace App\Http\Controllers;

use App\Models\WeddingLoveStory;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DataTables;

class LoveStoryController extends Controller
{
    public function getLoveStories($weddingId)
    {
        $loveStories = WeddingLoveStory::where('wedding_id', $weddingId)
                                      ->orderBy('order')
                                      ->get();
        
        return DataTables::of($loveStories)
            ->addIndexColumn()
            ->addColumn('image_preview', function($story) {
                if ($story->image_path) {
                    return '<img src="' . $story->image_url . '" class="img-thumbnail" style="max-width: 60px; max-height: 40px; object-fit: cover; border-radius: 4px;">';
                }
                return '<span class="text-muted">No Image</span>';
            })
            ->editColumn('date', function($story) {
                return $story->date; // Keep raw date for editing
            })
            ->addColumn('formatted_date', function($story) {
                return $story->date->format('d F Y');
            })
            ->addColumn('action', function($story) {
                return '
                    <button class="btn btn-sm btn-outline-primary" id="edit_love_story" style="padding-bottom: 1px;"><i class="fe-edit"></i> Edit</button>
                    <button class="btn btn-sm btn-outline-danger" id="delete_love_story" style="padding-bottom: 1px;"><i class="fe-trash"></i> Delete</button>
                ';
            })
            ->rawColumns(['image_preview', 'action'])
            ->make(true);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'wedding_id' => 'required|exists:wedding,id',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer|min:0'
        ]);
        
        $data = $request->only(['wedding_id', 'title', 'date', 'description', 'order']);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('love_stories', 'public');
            $data['image_path'] = $imagePath;
        }
        
        $loveStory = WeddingLoveStory::create($data);
        
        return response()->json(['success' => 'Love story created successfully!']);
    }
    
    public function update(Request $request, $id)
    {
        $loveStory = WeddingLoveStory::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer|min:0'
        ]);
        
        $data = $request->only(['title', 'date', 'description', 'order']);
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($loveStory->image_path && Storage::exists($loveStory->image_path)) {
                Storage::delete($loveStory->image_path);
            }
            
            $image = $request->file('image');
            $imagePath = $image->store('love_stories', 'public');
            $data['image_path'] = $imagePath;
        }
        
        $loveStory->update($data);
        
        return response()->json(['success' => 'Love story updated successfully!']);
    }
    
    public function destroy($id)
    {
        $loveStory = WeddingLoveStory::findOrFail($id);
        $loveStory->delete();
        
        return response()->json(['success' => 'Love story deleted successfully!']);
    }
}