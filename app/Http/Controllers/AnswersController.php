<?php

namespace App\Http\Controllers;

use App\Repositories\AnswerRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAnswerRequest;

class AnswersController extends Controller
{
    protected $answer;

    public function __construct(AnswerRepository $answer)
    {
        $this->answer = $answer;
    }

    public function store(StoreAnswerRequest $request, $question)
    {
        $answer = $this->answer->create([
            'question_id' => $question,
            'user_id' => Auth::id(),
            'body' => $request->body
        ]);

        $answer->question()->increment('answers_count');

        return back();
    }
}
