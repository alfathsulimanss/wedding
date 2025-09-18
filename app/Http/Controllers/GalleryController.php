<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use App\Models\WeddingGallery;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{
    /**
     * Get gallery images for DataTables.
     */
    public function getGalleries(Request $request): JsonResponse
    {
        $weddingId = $request->get('wedding_id');
        
        $galleries = WeddingGallery::where('wedding_id', $weddingId)
            ->orderBy('order', 'asc')
            ->get();

        return DataTables::of($galleries)
            ->addIndexColumn()
            ->addColumn('image_path', function ($gallery) {
                return '<img src="' . $gallery->image_url . '" style="width: 100px; height: 60px; object-fit: cover; border-radius: 4px;">';
            })
            ->addColumn('action', function ($gallery) {
                return '
                    <button type="button" class="btn btn-sm btn-danger delete-gallery" data-id="' . $gallery->id . '">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                ';
            })
            ->rawColumns(['image_path', 'action'])
            ->make(true);
    }

    /**
     * Store multiple gallery images.
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'wedding_id' => 'required|exists:wedding,id',
            'images' => 'required|array|min:1|max:10',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max per image
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $weddingId = $request->wedding_id;
            $images = $request->file('images');
            
            // Get the current maximum order
            $maxOrder = WeddingGallery::where('wedding_id', $weddingId)->max('order') ?? 0;
            
            $uploadedImages = [];
            
            foreach ($images as $index => $image) {
                // Store the image
                $imagePath = $image->store('wedding-galleries', 'public');
                
                // Create gallery record
                $gallery = WeddingGallery::create([
                    'wedding_id' => $weddingId,
                    'image_path' => $imagePath,
                    'order' => $maxOrder + $index + 1,
                ]);
                
                $uploadedImages[] = $gallery;
            }

            return response()->json([
                'success' => true,
                'message' => count($uploadedImages) . ' images uploaded successfully',
                'data' => $uploadedImages
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload images: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a gallery image.
     */
    public function destroy($id): JsonResponse
    {
        try {
            $gallery = WeddingGallery::findOrFail($id);
            
            // Delete the image file
            if (Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }
            
            // Delete the record
            $gallery->delete();

            return response()->json([
                'success' => true,
                'message' => 'Gallery image deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete gallery image: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update gallery images order.
     */
    public function updateOrder(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'items' => 'required|array',
            'items.*.id' => 'required|exists:wedding_galleries,id',
            'items.*.order' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            foreach ($request->items as $item) {
                WeddingGallery::where('id', $item['id'])
                    ->update(['order' => $item['order']]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Gallery order updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update gallery order: ' . $e->getMessage()
            ], 500);
        }
    }
}