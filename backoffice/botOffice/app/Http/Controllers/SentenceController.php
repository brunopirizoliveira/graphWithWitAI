<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sentence;

class SentenceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) {}

    public function create()
    {
        return view('wit.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

            $sentence = Sentence::create([
                'title' => $request->input('title'),
                'entities' => $request->input('entities'),
                'intent' => $request->input('intent')
            ]);
            DB::commit();
            DB::rollback();

        return redirect()->route('list_sentences');
    }

    public function update($id)
    {
        $sentence = $this->indexById($id);
        if($sentence)
        {
            return(view('wit.update', compact('sentence')));
        }
    }

    //Atualiza Sentença
    public function modify(Request $request)
    {
        $sentence = Sentence::find($request->id);
        $sentence->update([
            'title'     => $request->input('title'),
            'intent'    => $request->input('intent'),
            'entities'  => $request->input('entities')
        ]);

        $request->session()
            ->flash("mensagem", "Sentença {$sentence->id} - {$sentence->title} atualizada com sucesso");

        return redirect()->route('list_sentences');
    }

    //Remover uma sentença
    public function delete($id)
    {
        DB::beginTransaction();
        Sentence::destroy($id);
        DB::commit();

        return redirect()->route('list_sentences');
    }

    //Lista uma sentença
    public function indexById($id)
    {
        $sentence = Sentence::find($id);
        return $sentence;
    }

    public function list()
    {
        $listSentences = Sentence::query()->orderBy('title')->get();
        return view('wit.list', compact('listSentences'));
    }
}
