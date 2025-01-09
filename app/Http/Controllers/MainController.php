<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    private $app_data;

    public function __construct()
    {
        // carregamento dos dados para o controller
        $this->app_data = require(app_path('app_data.php'));
    }

    public function startGame(): View
    {
        return view('home');
    }

    public function prepareGame(Request $request)
    {
        // validate request
        $request->validate(
            [
                'total_questions' => ['required', 'integer', 'min:3', 'max:30']
            ],
            [
                'total_questions.required' => 'O número de questões é obrigatório',
                'total_questions.integer' => 'O valor deve ser um número inteiro',
                'total_questions.min' => 'Escolha no mínimo :min questões',
                'total_questions.max' => 'Escolha no máximo :max questões'
            ]
        );

        // get total questions
        $total_questions = intval($request->total_questions);

        echo "ok - $total_questions";    
    }
}
