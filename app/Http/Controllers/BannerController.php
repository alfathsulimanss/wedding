<?php

namespace App\Http\Controllers;

use App\Models\WeddingBanner;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DataTables;

class BannerController extends Controller
{
    public function getBanners($weddingId)
    {
        $banners = WeddingBanner::where('wedding_id', $weddingId)
                                ->orderBy('sort_order')
                                ->get();
        
        return DataTables::of($banners)
            ->addIndexColumn()
            ->addColumn('image_preview', function($banner) {
                return '<img src="' . $banner->image_url . '" class="img-thumbnail" style="max-width: 100px; max-height: 60px;">';
            })
            ->addColumn('action', function($banner) {
                return '
                    <button class="btn btn-sm btn-outline-danger" id="delete_banner" style="padding-bottom: 1px;"><i class="fe-trash"></i> Delete</button>
                ';
            })
            ->rawColumns(['image_preview', 'status', 'action'])
            ->make(true);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'wedding_id' => 'required|exists:wedding,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0'
        ]);
        
        $imagePath = $request->file('image')->store('wedding-banners', 'public');
        
        WeddingBanner::create([
            'wedding_id' => $request->wedding_id,
            'image_path' => $imagePath,
            'sort_order' => $request->sort_order ?? 0,
        ]);
        
        return response()->json(['success' => 'Banner uploaded successfully']);
    }
    
    public function update(Request $request, $id)
    {
        $banner = WeddingBanner::findOrFail($id);
        
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0'
        ]);
        
        $data = [
            'sort_order' => $request->sort_order ?? $banner->sort_order,
        ];
        
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($banner->image_path);
            // Store new image
            $data['image_path'] = $request->file('image')->store('wedding-banners', 'public');
        }
        
        $banner->update($data);
        
        return response()->json(['success' => 'Banner updated successfully']);
    }
    
    public function destroy($id)
    {
        $banner = WeddingBanner::findOrFail($id);
        
        // Delete image file
        Storage::disk('public')->delete($banner->image_path);
        
        $banner->delete();
        
        return response()->json(['success' => 'Banner deleted successfully']);
    }
}