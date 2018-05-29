<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\Telefone;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    private $telefonesController;
    private $pessoa;

    public function __construct(TelefonesController $telefones_controller)
    {
        $this->telefonesController = $telefones_controller;
        $this->pessoa = new Pessoa();
    }
    

    public function index() {
        
        $list_pessoas = Pessoa::all();
        return view('pessoas.index', [
            'pessoas' => $list_pessoas
        ]);
    }

    public function novoView() {
        
        return view('pessoas.create');
    }

    public function store(Request $request) {

        $pessoa = Pessoa::create($request->all());
        if($request->ddd && $request->telefone) {
            $telefone = new Telefone();
            $telefone->ddd = $request->ddd;
            $telefone->telefone = $request->telefone;
            $telefone->pessoa_id = $pessoa->id;
            $this->telefonesController->store($telefone);
        }
        return redirect("/pessoas")->with("message", "Pessoa criada com sucesso.");
    }

    public function editarView($id)
    {
        return view('pessoas.edit', [
        'pessoa' => $this->getPessoa($id)
        ]);
    }

    protected function getPessoa($id)
    {
        return $this->pessoa->find($id);
    }
}
