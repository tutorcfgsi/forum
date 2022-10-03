<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;

class ForumController extends Controller
{
    public function index(){
        $forums = Forum::with(['replies','posts'])->paginate(2);

        return view('forums.index',compact('forums'));
    }

    public function show(Forum $forum)  // Con esto estamos inyectando el Foro completo
	{
		$posts = $forum->posts()->with(['owner'])->paginate(2);

        return view('forums.detail', compact('forum','posts'));
	}

    public function store()
	{
        $this->validate(request(), [
            'name' => 'required|max:6|unique:forums', // forums es la tabla dónde debe ser único
            'description' => 'required|max:500',
        ],
        [
            'name.unique' => __("El campo NAME no puede estar repetido"),
            'name.max' => __("Has escrito demasiados caracteres")
        ]);

		Forum::create(request()->all());
		// La siguiente línea nos devuelve a la url anterior (si es que existe), o a la raíz
		// y manda un mensaje, mediante una sesión flash, de éxito
		return back()->with('message', ['success', __("Foro creado correctamente")]);
	}

}
