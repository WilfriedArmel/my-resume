<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // Récuperer toutes les tâches disponibles
        $tasks = Task::all();
        return view('test.welcome', compact('tasks'));
    }

    public function create()
    {
        // Recuperer l'ensemble de mes auteurs
        $auteurs = User::all();
        // Recuperer l'ensemble de mes catégories
        $categories = Category::all();

        return view('test.create', compact('auteurs', 'categories'));
        /* return view('test.create', [
            'auteurs' => $auteurs,
            'categories' => $categories
        ]); */
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom' => 'required|min:3',
            'description' => 'required',
            'auteur' => 'required',
            'categories' => 'required',
        ]);

        // Enregistrement de notre tâche
        $task = Task::create([
            'code' => random_int(0, 255),
            'nom' => $request->nom,
            'description' => $request->description,
            'auteur' => $request->auteur
        ]);

        // Ajouter les catégories à notre tâche
        $task->categories()->attach($request->categories);

        return $this->index();
    }
    /*public function edit ($id){
        //Recupère la tâche à partir de son identifiant
        $tache = Task::find($id);
        $categoriesName=[];
        foreach($tache->categories as $category){
            $categoriesName[] = $category->nom
        }*/

        //Recupère l'ensemble de mes auteurs
        $auteurs = User::all();
        //Recupère l'ensemble de mes catégories
        $categories = Category::all();

        return view('test.edit', compact('tache','auteurs','categories', 'categoriesName'));
    }
}
