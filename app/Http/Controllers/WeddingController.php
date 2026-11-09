<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Remark;
use App\Models\GalleryPhoto;
use App\Models\HeroCarouselPhoto;
use App\Models\SiteContent;
use App\Models\TimelineEntry;

class WeddingController extends Controller
{
    // PAGE 1: Landing Page (The Cloud Page)
    public function index(string $name)
    {
        $guest = Guest::where('slug', $name)->firstOrFail();

        $guest->forceFill(['visited_at' => now()])->save();

        return view('wedding.invite', [
            'user' => $guest,
            'name' => $guest->slug,
            'content' => SiteContent::current(),
        ]);
    }

    // PAGE 2: Main Page (The Invitation)
    public function show(string $name)
    {
        $guest = Guest::where('slug', $name)->firstOrFail();

        // Fetch the wishes from the database
        $remarks = Remark::latest()->get();

        return view('wedding.invited', [
            'user' => $guest,
            'remarks' => $remarks,
            'name' => $guest->slug,
            'content' => SiteContent::current(),
            'timelineEntries' => TimelineEntry::orderBy('sort_order')->get(),
            'galleryPhotos' => GalleryPhoto::orderBy('sort_order')->get(),
            'heroCarouselPhotos' => HeroCarouselPhoto::orderBy('sort_order')->get(),
        ]);
    }

    // Function to save the Remark (Wishes)
    public function storeRemark(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'perusahaan' => 'nullable|string|max:255',
            'doa_pesan' => 'required|string',
        ]);

        Remark::create([
            'name' => $validated['nama'],
            'description' => $validated['perusahaan'],
            'remark' => $validated['doa_pesan']
        ]);

        return response()->json(['message' => 'Terima kasih atas doa dan ucapannya!']);
    }
}