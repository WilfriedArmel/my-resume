@extends('test.layout')

@section('content')
    <nav>
        <ul>
            <li><a href="/test/add">Créer une tâche</a></li>
        </ul>
    </nav>
    @isset($tasks)
        <table>
            <thead>
                <td>Nom</td>
                <td>Description</td>
                <td>Auteur</td>
                <td>Catégories</td>
                <td>Actions</td>
            </thead>

            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->nom }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->author->name }}</td>
                        <td>
                            @foreach ($task->categories as $category)
                                {{ $category->nom }}
                            @endforeach
                        </td>
                        <td>
                            <a href="/test/edit/"> Modifier </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
@endsection
