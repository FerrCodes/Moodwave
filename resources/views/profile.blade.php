@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <h1>👤 Profil Saya</h1>
    <div style="display:grid; grid-template-columns: 1fr 2fr; gap:32px;">
        <div style="background:#1E293B; padding:24px; border-radius:12px; text-align:center;">
            <div style="width:120px; height:120px; background:#334155; border-radius:50%; margin:0 auto 16px; display:flex; align-items:center; justify-content:center; font-size:48px;">😊</div>
            <h3 style="color:#fff;">{{ Auth::user()->name }}</h3>
            <p style="color:#94A3B8;">{{ Auth::user()->email }}</p>
            <p style="color:#64748B; font-size:14px; margin-top:8px;">Akun dibuat: {{ Auth::user()->created_at->format('d M Y') }}</p>
        </div>
        <div>
            <h3 style="color:#fff; margin-bottom:16px;">🎧 Playlist Favoritku</h3>
            @php
                $favorites = Auth::user()->notes()->orderBy('created_at', 'desc')->limit(3)->get();
            @endphp
            @forelse ($favorites as $note)
                <div style="background:#1E293B; padding:16px; border-radius:8px; margin-bottom:12px; display:flex; justify-content:space-between; align-items:center;">
                    <div>
                        <span style="font-size:20px;">
                            @if ($note->mood == 'happy') 😊
                            @elseif ($note->mood == 'sad') 😢
                            @elseif ($note->mood == 'angry') 😡
                            @elseif ($note->mood == 'calm') 😌
                            @else ❤️
                            @endif
                        </span>
                        <strong style="color:#fff;">{{ $note->song_title }}</strong>
                        <span style="color:#94A3B8;"> - {{ $note->artist }}</span>
                    </div>
                    <span style="color:#64748B; font-size:14px;">{{ $note->entry_date }}</span>
                </div>
            @empty
                <div style="color:#94A3B8; padding:20px; background:#1E293B; border-radius:8px; text-align:center;">
                    Belum ada lagu favorit.
                </div>
            @endforelse
            <div style="margin-top:24px;">
                <a href="{{ route('notes.index') }}" class="btn-primary" style="margin-right:12px;">📂 Lihat Semua</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:#F43F5E; padding:12px 24px; border-radius:8px; color:#fff; text-decoration:none; font-weight:bold; border:none; cursor:pointer;">🚪 Keluar</button>
                </form>
            </div>
        </div>
    </div>
@endsection