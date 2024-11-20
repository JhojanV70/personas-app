<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Departamento') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('departamentos.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">Code</label>
                            <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
                                   disabled="disabled">
                            <div id="idHelp" class="form-text">Departamento code</div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Departamento</label>
                            <input type="text" required class="form-control" id="name" aria-describedby="nameHelp" name="name"
                                   placeholder="Name departamento">
                        </div>
                        <label for="pais">Pais:</label>
                        <select class="form-select" id="pais" name="code" required>
                            <option selected disabled value="">Choose One...</option>
                            @foreach ($pais as $pais)
                                <option value="{{ $pais->pais_codi }}">{{ $pais->pais_nomb }}</option>
                            @endforeach
                        </select>
                        <div class="mt-3">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                            <a href="{{ route('departamentos.index') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>