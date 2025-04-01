<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listar Turmas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('RegisterClass') }}" class="btn btn-success">
                        Criar Turma
                    </a>
                    @if(isset($Classes) && $Classes->isNotEmpty())
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Imagem</th>
                                    <th>Nome</th>
                                    <th>Pontos</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Classes as $Class)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $Class->image) }}" alt="Imagem" class="img-thumbnail" style="width: 35vh; height: 25vh; object-fit: cover;">
                                    </td>
                                    <td> {{$Class->class}} </td>
                                    <td> {{$Class->point}} </td>
                                    <td class="d-flex">
                                        <!-- Botão para abrir o modal de edição -->
                                        <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#UpdateClass{{ $Class->id }}">
                                            EDITAR
                                        </button>

                                        <!-- Formulário de exclusão -->
                                        <form action="{{ route('DestroyClass', ['room' => $Class->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-large">Deletar</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal de Edição (dentro do loop) -->
                                <x-dialogue id="UpdateClass{{ $Class->id }}" title="EDITAR TURMA">
                                    <form method="POST" action="{{ route('UpdateClass', ['room' => $Class->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!-- Nome da Turma -->
                                        <div class="mb-3">
                                            <label for="class" class="form-label">Nome da Turma</label>
                                            <input type="text" value="{{ $Class->class }}" class="form-control" id="class" name="class">
                                        </div>

                                        <!-- Imagem da Turma -->
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Imagem da Turma</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                            <small class="text-muted">Deixe em branco para manter a imagem atual.</small>
                                        </div>

                                        <!-- Pontos -->
                                        <div class="mb-3">
                                            <label for="point" class="form-label">Pontos</label>
                                            <input type="number" value="{{ $Class->point }}" class="form-control" id="point" name="point">
                                        </div>

                                        <!-- Botão de Enviar -->
                                        <button type="submit" class="btn btn-success w-100">Enviar</button>
                                    </form>
                                </x-dialogue>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <h2 class="mt-5">Nenhuma Turma Cadastrada</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>