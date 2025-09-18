<?php

namespace App\Http\Controllers;

use App\Models\InvitationList;
use App\Models\Wedding;
use App\Models\WeddingBanner;
use App\Models\WeddingGallery;
use App\Models\WeddingLoveStory;
use App\Models\RsvpResponse;
use App\Models\Congratulations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LandingController extends Controller
{
    public function index($slug, $wedding_id, $invited_id, $invited_name){
        $wedding = Wedding::where('id', $wedding_id)->first();
        $banners = WeddingBanner::where('wedding_id', $wedding_id)->get();
        $stories = WeddingLoveStory::where('wedding_id', $wedding_id)->get();
        $galleries = WeddingGallery::where('wedding_id', $wedding_id)->get();
        $invitation = InvitationList::where('id', $invited_id)->first();
        return view('landing.index', [
            'wedding' => $wedding,
            'banners' => $banners,
            'stories' => $stories,
            'galleries' => $galleries,
            'invitation' => $invitation,
        ]);
    }
    
    public function submitRsvp(Request $request)
    {
        try {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'wedding_id' => 'required|exists:weddings,id',
                'invited_id' => 'required|exists:invitation_lists,id',
                'name' => 'required|string|max:255',
                'attendance' => 'required|in:yes,no',
                'guest_count' => 'nullable|integer|min:1|max:10',
                'attending_event' => 'nullable|string|max:255'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ], 422);
            }
            
            $weddingId = $request->wedding_id;
            $invitedId = $request->invited_id;
            
            // Verify the invitation belongs to this wedding
            $invitation = InvitationList::where('id', $invitedId)
                ->where('wedding_id', $weddingId)
                ->first();
                
            if (!$invitation) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid invitation'
                ], 400);
            }
            
            DB::beginTransaction();
            
            // Check if RSVP already exists
            $existingRsvp = RsvpResponse::where('wedding_id', $weddingId)
                ->where('invited_id', $invitedId)
                ->first();
            
            $wedding = Wedding::find($weddingId);
            
            // If updating existing RSVP, adjust counters
            if ($existingRsvp) {
                // Decrement old counter
                if ($existingRsvp->attendance === 'yes') {
                    $wedding->decrement('present_counter');
                } else {
                    $wedding->decrement('not_present_counter');
                }
                
                // Update existing RSVP
                $existingRsvp->update([
                    'name' => $request->name,
                    'attendance' => $request->attendance,
                    'guest_count' => $request->guest_count,
                    'attending_event' => $request->attending_event
                ]);
            } else {
                // Create new RSVP
                RsvpResponse::create([
                    'wedding_id' => $weddingId,
                    'invited_id' => $invitedId,
                    'name' => $request->name,
                    'attendance' => $request->attendance,
                    'guest_count' => $request->guest_count,
                    'attending_event' => $request->attending_event
                ]);
            }
            
            // Increment new counter
            if ($request->attendance === 'yes') {
                $wedding->increment('present_counter');
            } else {
                $wedding->increment('not_present_counter');
            }
            
            // Update invitation RSVP status
            $invitation->update(['rsvp_status' => $request->attendance === 'yes' ? 'present' : 'not_present']);
            
            DB::commit();
            
            // Get updated counters
            $wedding->refresh();
            
            return response()->json([
                'success' => true,
                'message' => 'RSVP submitted successfully!',
                'present_counter' => $wedding->present_counter ?? 0,
                'not_present_counter' => $wedding->not_present_counter ?? 0
            ]);
            
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Server error occurred. Please try again later.'
            ], 500);
        }
    }
    
    public function submitCongratulations(Request $request)
    {
        try {
            $request->validate([
                'wedding_id' => 'required|exists:wedding,id',
                'invited_id' => 'required|exists:invitation_list,id',
                'name' => 'required|string|max:255',
                'message' => 'required|string|max:1000',
            ]);
    
            // Check if invitation belongs to the wedding
            $invitation = InvitationList::where('id', $request->invited_id)
                ->where('wedding_id', $request->wedding_id)
                ->first();
    
            if (!$invitation) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid invitation.'
                ], 400);
            }
    
            // Check if congratulations already exists
            $existingCongratulations = Congratulations::where('wedding_id', $request->wedding_id)
                ->where('invited_id', $request->invited_id)
                ->first();
    
            if ($existingCongratulations) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have already sent congratulations for this wedding.'
                ], 400);
            }
    
            // Create congratulations
            Congratulations::create([
                'wedding_id' => $request->wedding_id,
                'invited_id' => $request->invited_id,
                'name' => $request->name,
                'message' => $request->message
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Congratulations sent successfully!'
            ]);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while sending congratulations.'
            ], 500);
        }
    }
    
    public function getCongratulationsMessages(Wedding $wedding)
    {
        try {
            $messages = Congratulations::where('wedding_id', $wedding->id)
                ->orderBy('created_at', 'desc')
                ->limit(20)
                ->get(['name', 'message', 'created_at']);
    
            return response()->json([
                'success' => true,
                'messages' => $messages
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while loading messages.'
            ], 500);
        }
    }
}
