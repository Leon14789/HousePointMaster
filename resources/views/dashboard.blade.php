<link rel="stylesheet" href="assets/css/ranking.css">

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
                    <!-- Exibe mensagens de sucesso -->
                    <x-mensage-success type="success" :message="session('success')" />

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

