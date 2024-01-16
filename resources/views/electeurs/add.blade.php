<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter Electeurs') }}
            <a href="/dashboard" class="btn btn-primary">Home</a>
            <a class="btn btn-primary" href="{{route('electeur.index')}}">Liste</a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

     <form action="{{ route('programme') }}" method="POST">

        @csrf <!-- Ceci est nécessaire pour protéger votre formulaire contre les attaques CSRF -->

        <div class="form-group">
            <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prénom </label>
            <input type="text" name="Prenom" id="prenom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="form-group">
            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom </label>
            <input type="text" name="Prenom" id="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="form-group">
            <label for="adresse" class="block text-gray-700 text-sm font-bold mb-2">Adresse :</label>
            <input type="text" name="adresse" id="adresse" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"required>
        </div>

        <div class="form-group">
            <label for="cni" class="block text-gray-700 text-sm font-bold mb-2">CNI :</label>
            <input type="text" name="CNI" id="cni" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"required>
        </div>

        <div class="form-group">
            <button   class="btn btn-primary" required>Enregistrer</button>
        </div>
    </form>
    </div>
</div>
</div>


</x-app-layout>
