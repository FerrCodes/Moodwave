@extends('layouts.app')

@section('title', 'Arsip Soundtrack')

@section('content')
    <h1>🎵 Arsip Soundtrack</h1>
    <div style="display:flex; gap:8px; margin-bottom:16px;">
        <a href="?filter=all" style="background:#1E293B; padding:8px 16px; border-radius:20px; color:#fff; text-decoration:none;">Semua</a>
        <a href="?filter=happy" style="background:#1E293B; padding:8px 16px; border-radius:20px; color:#fff; text-decoration:none;">Senang</a>
        <a href="?filter=sad" style="background:#1E293B; padding:8px 16px; border-radius:20px; color:#fff; text-decoration:none;">Sedih</a>
        <a href="?filter=calm" style="background:#1E293B; padding:8px 16px; border-radius:20px; color:#fff; text-decoration:none;">Tenang</a>
    </div>
    @forelse ($notes as $note)
        <div style="background:#1E293B; padding:16px; border-radius:8px; margin-bottom:12px; display:flex; justify-content:space-between; align-items:center;">
            <div>
                <strong style="color:#fff;">{{ $note->song_title }}</strong>
                <span style="color:#94A3B8;"> - {{ $note->artist }}</span>
                <span style="margin-left:12px;">
                    @if ($note->mood == 'happy') 😊
                    @elseif ($note->mood == 'sad') 😢
                    @elseif ($note->mood == 'angry') 😡
                    @elseif ($note->mood == 'calm') 😌
                    @else ❤️
                    @endif
                </span>
            </div>
            <div style="color:#64748B; font-size:14px;">{{ $note->entry_date }}</div>
        </div>
    @empty
        <div style="color:#94A3B8;">Belum ada catatan. Yuk tambahkan!</div>
    @endforelse
@endsection