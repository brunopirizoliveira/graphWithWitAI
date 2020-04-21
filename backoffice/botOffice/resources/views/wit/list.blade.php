@extends('layout')

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif

<div class="row">
    <div class="col-12">
        <h5><strong>Sentences</strong></h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Intent</th>
                    <th>Entity(es)</th>
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
                            id="editar"
                            name="editar"
                            onclick="window.location='{{ route('form_update_setence', ['id' => $sentence->id]) }}'">
                                Editar
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
