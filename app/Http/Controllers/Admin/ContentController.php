<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryPhoto;
use App\Models\HeroCarouselPhoto;
use App\Models\SiteContent;
use App\Models\TimelineEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function edit()
    {
        return view('admin.content.edit', [
            'content' => SiteContent::current(),
            'timelineEntries' => TimelineEntry::orderBy('sort_order')->get(),
            'galleryPhotos' => GalleryPhoto::orderBy('sort_order')->get(),
            'heroCarouselPhotos' => HeroCarouselPhoto::orderBy('sort_order')->get(),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'groom_name' => 'required|string|max:255',
            'groom_parents' => 'required|string|max:255',
            'bride_name' => 'required|string|max:255',
            'bride_parents' => 'required|string|max:255',
            'groom_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'bride_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'wedding_date' => 'required|string|max:255',
            'hero_image_mobile' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'hero_image_desktop' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'intro_text' => 'required|string',

            'akad_date' => 'required|string|max:255',
            'akad_time' => 'required|string|max:255',
            'akad_venue_label' => 'required|string|max:255',
            'akad_address' => 'required|string|max:255',
            'resepsi_date' => 'required|string|max:255',
            'resepsi_time' => 'required|string|max:255',
            'resepsi_venue_label' => 'required|string|max:255',
            'resepsi_address' => 'required|string|max:255',
            'maps_embed_url' => 'nullable|string',
            'maps_link_url' => 'nullable|string|max:255',

            'bank_name' => 'required|string|max:255',
            'bank_account_number' => 'required|string|max:255',
            'bank_account_owner' => 'required|string|max:255',
            'gift_address' => 'required|string|max:255',
            'gift_address_owner' => 'required|string|max:255',

            'verse_text' => 'required|string',
            'verse_reference' => 'required|string|max:255',

            'footer_greeting' => 'required|string|max:255',
            'footer_bg_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $content = SiteContent::current();

        foreach (['groom_photo', 'bride_photo', 'hero_image_mobile', 'hero_image_desktop', 'footer_bg_image'] as $field) {
            if ($request->hasFile($field)) {
                $this->deleteUploadedImage($content->$field);
                $validated[$field] = $request->file($field)->store('wedding-content', 'public');
            } else {
                unset($validated[$field]);
            }
        }

        $content->update($validated);

        return redirect()->route('admin.content.edit')->with('status', 'Konten berhasil disimpan.');
    }

    public function storeTimelineEntry(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $validated['sort_order'] = (int) TimelineEntry::max('sort_order') + 1;

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('wedding-content', 'public');
        }

        TimelineEntry::create($validated);

        return redirect()->route('admin.content.edit')->with('status', 'Tahun perjalanan berhasil ditambahkan.');
    }

    public function updateTimelineEntry(Request $request, TimelineEntry $entry)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        if ($request->hasFile('photo')) {
            $this->deleteUploadedImage($entry->photo);
            $validated['photo'] = $request->file('photo')->store('wedding-content', 'public');
        } else {
            unset($validated['photo']);
        }

        $entry->update($validated);

        return redirect()->route('admin.content.edit')->with('status', 'Tahun perjalanan berhasil diperbarui.');
    }

    public function destroyTimelineEntry(TimelineEntry $entry)
    {
        $this->deleteUploadedImage($entry->photo);
        $entry->delete();

        return redirect()->route('admin.content.edit')->with('status', 'Tahun perjalanan berhasil dihapus.');
    }

    public function storeGalleryPhoto(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        GalleryPhoto::create([
            'path' => $request->file('photo')->store('wedding-content', 'public'),
            'sort_order' => (int) GalleryPhoto::max('sort_order') + 1,
        ]);

        return redirect()->route('admin.content.edit')->with('status', 'Foto galeri berhasil ditambahkan.');
    }

    public function destroyGalleryPhoto(GalleryPhoto $photo)
    {
        $this->deleteUploadedImage($photo->path);
        $photo->delete();

        return redirect()->route('admin.content.edit')->with('status', 'Foto galeri berhasil dihapus.');
    }

    public function storeHeroCarouselPhoto(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        HeroCarouselPhoto::create([
            'path' => $request->file('photo')->store('wedding-content', 'public'),
            'sort_order' => (int) HeroCarouselPhoto::max('sort_order') + 1,
        ]);

        return redirect()->route('admin.content.edit')->with('status', 'Foto hero berhasil ditambahkan.');
    }

    public function destroyHeroCarouselPhoto(HeroCarouselPhoto $photo)
    {
        $this->deleteUploadedImage($photo->path);
        $photo->delete();

        return redirect()->route('admin.content.edit')->with('status', 'Foto hero berhasil dihapus.');
    }

    protected function deleteUploadedImage(?string $path): void
    {
        if ($path && str_starts_with($path, 'wedding-content/') && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
