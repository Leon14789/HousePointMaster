@extends('layouts.base')
@section('title', 'Dashboard')
<link rel="stylesheet" href="assets/css/ranking.css">
<link rel="stylesheet" href="assets/css/main.css">
@section('content')

<div class="p-4 rounded background">

<!-- Ranking -->
<div class="ranking-container">
    @foreach($data['rooms'] as $index => $room)
    <div class="ranking-item 
                                @if($index == 0) bg-gold @endif
                                @if($index == 1) bg-silver @endif
                                @if($index == 2) bg-bronze @endif">
        <!-- Foto e Nome -->
        <div class="ranking-info">
            <div class="ranking-image">
                <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->class }}" class="ranking-img">
            </div>
            <div class="ranking-name">
                <h3>{{ $room->class }}</h3>
            </div>
        </div>

        <!-- Barra de Pontuação -->
        <div class="ranking-bar">
            <div class="bar" style="width: {{ $data['maxPoints'] > 0 ? ($room->point / $data['maxPoints']) * 100 : 0 }}%;"></div>
        </div>

    </div>
    @endforeach
</div>
</div>
@endsection