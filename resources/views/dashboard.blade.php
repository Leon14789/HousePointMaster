<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('RANKING DAS TURMAS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Ranking -->
                    <div class="ranking-container">
                        @foreach($rooms as $index => $room)
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
                                    <div class="bar" style="width: {{ $maxPoints > 0 ? ($room->point / $maxPoints) * 100 : 0 }}%;"></div>
                                </div>

                                <!-- Pontuação -->
                                <div class="ranking-points">
                                    <p>{{ $room->point }} pontos</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .ranking-container {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .ranking-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem;
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem;
        background-color: #f9fafb;
    }

    .ranking-item.bg-gold {
        background-color:rgb(255, 255, 6);
        border-color:rgb(202, 202, 16);
    }

    .ranking-item.bg-silver {
        background-color: #C0C0C0;  
        border-color: #a8a8a8;
    }

    .ranking-item.bg-bronze {
        background-color: #FF8C00;
        border-color: #FF8C00;
    }

    .ranking-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .ranking-image img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .ranking-name h3 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: bold;
    }

    .ranking-bar {
        flex-grow: 1;
        height: 10px;
        background-color: #e5e7eb;
        border-radius: 5px;
        margin: 0 1rem;
        overflow: hidden;
    }

    .ranking-bar .bar {
        height: 100%;
        background-color: #3b82f6; /* Cor da barra */
        border-radius: 5px;
    }

    .ranking-points p {
        margin: 0;
        font-size: 1rem;
        font-weight: bold;
        color: #6b7280;
    }
</style>