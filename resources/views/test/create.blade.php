@extends('test.layout')
@section('content')
    <form action="/test/add" method="post">
        @csrf
        <p><label for="nom">Le nom de votre tâche</label>
            <input type="text" name="nom" id="nom">
        </p>
        <p><label for="description">La description de votre tâche</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </p>
        <p><label for="auteur">Choisir l'auteur</label>
            <select name="auteur" id="auteur">
                @foreach ($auteurs as $auteur)
                    <option value="{{ $auteur->id }}">{{ $auteur->name }}</option>
                @endforeach
            </select>
        </p>
        <p><label for="categories">Choisir des categories</label>
            <select name="categories[]" id="categories" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nom }}</option>
                @endforeach
            </select>
        </p>
        <p><input type="submit" value="Soumettre"></p>
    </form>
@endsection
