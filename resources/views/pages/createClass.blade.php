<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Turma') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Formulário com método POST -->
                    <form action="{{ route('RegisterClass') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Token CSRF para proteção -->

                       
                        <div class="mb-3">
                            <label for="class" class="form-label">Nome da Turma</label>
                            <input type="text" class="form-control" id="class" name="class" required>
                        </div>

                       
                        <div class="mb-3">
                            <label for="image" class="form-label">Image da Turma</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                      
                        <div class="mb-3">
                            <label for="point" class="form-label">Pontos</label>
                            <input type="number" class="form-control" id="point" name="point" required>
                        </div>

                        <!-- Botão de Enviar -->
                        <button type="submit" class="btn btn-success w-100">Enviar</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>