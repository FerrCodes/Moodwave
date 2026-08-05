<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = auth()->user()->notes()->latest()->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mood' => 'required|in:happy,sad,angry,calm,love',
            'story' => 'required|min:5',
            'song_title' => 'required|max:255',
            'artist' => 'required|max:255',
        ]);

        auth()->user()->notes()->create([
            ...$validated,
            'entry_date' => now()->toDateString(),
        ]);

        return redirect()->route('notes.index')->with('success', 'Gelombang berhasil ditambahkan!');
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'mood' => 'required|in:happy,sad,angry,calm,love',
            'story' => 'required|min:5',
            'song_title' => 'required|max:255',
            'artist' => 'required|max:255',
        ]);

        $note->update($validated);
        return redirect()->route('notes.index')->with('success', 'Catatan berhasil diupdate!');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Catatan berhasil dihapus!');
    }
}