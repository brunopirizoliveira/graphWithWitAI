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

        return redirect()->route('index');
    }

    public function list()
    {
        $listSentences = Sentence::query()->orderBy('title')->get();
        return view('wit.list', compact('listSentences'));
    }
}
