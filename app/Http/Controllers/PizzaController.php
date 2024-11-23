<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::all();
        return view('admin.pizzas.index', compact('pizzas'));
    }

    public function create()
    {
        return view('admin.pizzas.create');
    }

    public function store(Request $request)
    {
        $pizza = new Pizza();
        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->price = $request->price;
        $pizza->save();

        return redirect()->route('pizzas.index')->with('success', 'Pizza criada com sucesso.');
    }

    public function edit($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('admin.pizzas.edit', compact('pizza'));
    }

    public function update(Request $request, $id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->price = $request->price;
        $pizza->save();

        return redirect()->route('pizzas.index')->with('success', 'Pizza atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect()->route('pizzas.index')->with('success', 'Pizza deletada com sucesso.');
    }
}

