@extends('layouts.app')

@section('title', 'Tambah Catatan')

@section('content')
    <h1>✏️ Tambah Gelombang Baru</h1>
    <form action="{{ route('notes.store') }}" method="POST" style="max-width:600px;">
        @csrf
        <div style="margin-bottom:16px;">
            <label style="color:#94A3B8;">Bagaimana Perasaanmu?</label>
            <div style="display:flex; gap:12px; margin-top:8px;">
                @foreach (['happy' => '😊', 'sad' => '😢', 'angry' => '😡', 'calm' => '😌', 'love' => '❤️'] as $value => $emoji)
                    <label style="background:#1E293B; padding:10px 16px; border-radius:8px; cursor:pointer;">
                        <input type="radio" name="mood" value="{{ $value }}" required> {{ $emoji }}
                    </label>
                @endforeach
            </div>
        </div>
        <div style="margin-bottom:16px;">
            <label style="color:#94A3B8;">Ceritamu...</label>
            <textarea name="story" rows="4" style="width:100%; background:#1E293B; color:#fff; border:1px solid #334155; border-radius:8px; padding:12px; margin-top:8px;" placeholder="Tulis ceritamu hari ini..." required></textarea>
        </div>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
            <div>
                <label style="color:#94A3B8;">Judul Lagu</label>
                <input type="text" name="song_title" style="width:100%; background:#1E293B; color:#fff; border:1px solid #334155; border-radius:8px; padding:12px; margin-top:8px;" placeholder="Judul lagu..." required>
            </div>
            <div>
                <label style="color:#94A3B8;">Nama Artis</label>
                <input type="text" name="artist" style="width:100%; background:#1E293B; color:#fff; border:1px solid #334155; border-radius:8px; padding:12px; margin-top:8px;" placeholder="Nama artis..." required>
            </div>
        </div>
        <button type="submit" style="background: linear-gradient(90deg, #06B6D4, #8B5CF6); padding:12px 24px; border-radius:8px; color:#fff; border:none; font-weight:bold; cursor:pointer;">Simpan Gelombang</button>
    </form>
@endsection