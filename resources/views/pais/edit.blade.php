<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pais') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Edit Pais</h1>
                    <form method="POST" action="{{ route('pais.update', ['pais' => $pais->pais_codi]) }}">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">Code</label>
                            <input type="text" required class="form-control" maxlength="3" 
                                   style="text-transform:uppercase" id="id" name="id"
                                   disabled="disabled" value="{{ $pais->pais_codi }}">
                            <div id="idHelp" class="form-text">Pais code</div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Pais</label>
                            <input type="text" required class="form-control" id="name" name="name"
                                   placeholder="Name pais" value="{{ $pais->pais_nomb }}">
                        </div>
                        <label for="capital">Capital</label>
                        <select class="form-select" id="capital" name="code" required>
                            <option selected disabled value="">Choose One...</option>
                            @foreach ($municipios as $municipio)
                                @if ($municipio->muni_codi == $pais->pais_capi)
                                    <option selected value="{{ $municipio->muni_codi }}">{{ $municipio->muni_nomb }}</option>
                                @else
                                    <option value="{{ $municipio->muni_codi }}">{{ $municipio->muni_nomb }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="mt-3">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                            <a href="{{ route('pais.index') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
