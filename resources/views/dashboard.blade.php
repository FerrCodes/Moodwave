@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>📅 Kalender Mood</h1>
    <div style="display:grid; grid-template-columns: repeat(7,1fr); gap:12px; margin-bottom:24px;">
        @php
            $days = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
            $emojis = ['😊', '😢', '😡', '😌', '❤️', '😊', '😌'];
        @endphp
        @foreach ($days as $index => $day)
            <div style="background:#1E293B; padding:12px; border-radius:8px; text-align:center;">
                <div style="font-weight:bold;color:#fff;">{{ $day }}</div>
                <div style="color:#94A3B8;">{{ $index + 12 }}</div>
                <div style="font-size:24px;">{{ $emojis[$index] }}</div>
            </div>
        @endforeach
    </div>
    <div style="display:grid; grid-template-columns: repeat(3,1fr); gap:16px;">
        <div class="card"><strong>Total Catatan:</strong> {{ $totalNotes ?? 0 }}</div>
        <div class="card"><strong>Mood Terbanyak:</strong> {{ $favoriteMood ?? '-' }}</div>
        <div class="card"><strong>Lagu Favorit:</strong> {{ $favoriteSong ?? '-' }}</div>
    </div>
    <a href="{{ route('notes.create') }}" style="display:inline-block; margin-top:24px; background: linear-gradient(90deg, #06B6D4, #8B5CF6); padding:12px 24px; border-radius:25px; color:#fff; text-decoration:none; font-weight:bold;">+ Catatan Baru</a>
@endsection