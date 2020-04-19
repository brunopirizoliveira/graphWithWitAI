@extends('layout')

@section('conteudo')

<div class="row">
    <div class="col-12">
        <form method="post">
            @csrf
            <div class="form-group">

                <div class="row mb-3">
                    <div class="col-12">
                        <label id="nome">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <label id="intent">Intent</label>
                        <input type="text" name="intent" id="intent" class="form-control">
                    </div>
                    <div class="col-6">
                        <label id="entities">Entities</label>
                        <input type="text" name="entities" id="entities" class="form-control">
                    </div>
                </div>

            </div>
            <button class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>

@endsection
