<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q'));

        $guests = Guest::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.guests.index', [
            'guests' => $guests,
            'search' => $search,
            'totalGuests' => Guest::count(),
            'visitedGuests' => Guest::whereNotNull('visited_at')->count(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
        ]);

        Guest::create([
            'name' => $validated['name'],
            'slug' => Guest::makeUniqueSlug($validated['name']),
            'category' => $validated['category'] ?? null,
        ]);

        return redirect()->route('admin.guests.index')->with('status', 'Tamu berhasil ditambahkan.');
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();

        return redirect()->route('admin.guests.index')->with('status', 'Tamu berhasil dihapus.');
    }
}
