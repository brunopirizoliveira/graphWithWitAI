@extends('layout')

@section('conteudo')

<div class="row">
    <div class="col-12">
        <form method="post" action="{{ route('update_setence') }}">
            @csrf
            <div class="form-group">
                <input type="hidden" name="id" value="{{$sentence->id}}">
                <div class="row mb-3">
                    <div class="col-12">
                        <label id="nome">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$sentence->title}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <label id="intent">Intent</label>
                        <input type="text" name="intent" id="intent" class="form-control" value="{{$sentence->intent}}">
                    </div>
                    <div class="col-6">
                        <label id="entities">Entities</label>
                        <input type="text" name="entities" id="entities" class="form-control" value="{{$sentence->entities}}">
                    </div>
                </div>

            </div>
            <button class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>

@endsection
