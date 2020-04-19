@extends('layout')

@section('conteudo')

<div class="row">
    <div class="col-12">
        <h5><strong>Sentences</strong></h5>
        <ul class="list-group list-group-flush mb-2">
            @foreach($listSentences as $sentence)
                <li class="list-group-item">
                    {{$sentence->title}}
                </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection
