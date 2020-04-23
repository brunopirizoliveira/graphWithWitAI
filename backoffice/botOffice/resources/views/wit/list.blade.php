@extends('layout')

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="jumbotron">
            <h5><strong>Sentences</strong></h5>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{ route('form_create_sentence') }}" class="btn btn-info mb-2">Adicionar</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Intent</th>
                            <th>Entity(es)</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listSentences as $sentence)
                        <tr>
                            <td>{{$sentence->title}}</td>
                            <td>{{$sentence->intent}}</td>
                            <td>{{$sentence->entities}}</td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-warning"
                                    id="editar"
                                    name="editar"
                                    onclick="window.location='{{ route('form_update_setence', ['id' => $sentence->id]) }}'">
                                        Editar
                                </button>
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    id="remover"
                                    name="remover"
                                    onclick="window.location='{{ route('form_remove_setence', ['id' => $sentence->id]) }}'">
                                        Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

@endsection
