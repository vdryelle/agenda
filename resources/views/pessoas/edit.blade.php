@extends('template.app')

@section('content')
<div class="col-md-12">
        <h3>Editar contato</h3>
    </div>

   <div class="col-md-6 well">
        <form class="col-md-12" action="{{ url('/pessoas/update') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group col-md-12">
                <label class="control-label">Nome</label>
                <input name="nome" value="{{ $pessoa->nome }}" class="col-md-12 form-control" placeholder="Nome">
            </div>
            <div class="col-md-12">
                <button style="margin-top: 5px; float: right" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>

@endsection