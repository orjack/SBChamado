<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Semanal
        $inicio = new Carbon('last sunday');
        $fim = new Carbon('now friday');

        $data_aberto = Ticket::
        where('situation', 0)
            ->where('date', '>=' ,$inicio)
            ->where('date', '<=' ,$fim)
            ->get();

        $data_delta = Ticket::
        where('situation', 1)
            ->where('date', '>=' ,$inicio)
            ->where('date', '<=' ,$fim)->get();

        $data_concluido = Ticket::
        where('situation', 2)
            ->where('date', '>=' ,$inicio)
            ->where('date', '<=' ,$fim)->get();


        $user = User::orderBy('id', 'asc')->get();
        $analyst = Ticket::groupBy('situation')
            ->get();
        $count = Ticket::all();
        $dateAtual = new Carbon( Carbon::now());
        $ano = $dateAtual->year;
        $ano_anterior = $dateAtual->year - 1;

        $ano = Ticket::where('date', 'LIKE',  "%{$ano}%")->get()->count();
        $ano_anterior = Ticket::where('date', 'LIKE',  "%{$ano_anterior}%")->get()->count();



    //----------------------------------------------------------------//

        //Semanal Anterior
        $inicio = new Carbon('last week monday');
        $fim = new Carbon('last week friday ');

        $semana_anterior_aberto = Ticket::
        where('situation', 0)
            ->where('date', '>=' ,$inicio)
            ->where('date', '<=' ,$fim)
            ->get();

        $semana_anterior_delta = Ticket::
        where('situation', 1)
            ->where('date', '>=' ,$inicio)
            ->where('date', '<=' ,$fim)->get();

        $semana_anterior_concluido = Ticket::
        where('situation', 2)
            ->where('date', '>=' ,$inicio)
            ->where('date', '<=' ,$fim)->get();
    //----------------------------------------------------------------//
        //Mensal
        $inicio = new Carbon('first day of september 2018');
        $fim = new Carbon('last day of september 2018');

        $mensal_aberto = Ticket::
        where('situation', 0)
            ->where('date', '>=' ,$inicio)
            ->where('date', '<=' ,$fim)
            ->get();

        $mensal_delta = Ticket::
        where('situation', 1)
            ->where('date', '>=' ,$inicio)
            ->where('date', '<=' ,$fim)->get();

        $mensal_concluido = Ticket::
        where('situation', 2)
            ->where('date', '>=' ,$inicio)
            ->where('date', '<=' ,$fim)->get();

    //----------------------------------------------------------------//

        return view('home', compact(
            'analyst', 'user','count',
            'data_aberto', 'data_delta', 'data_concluido',
            'semana_anterior_aberto', 'semana_anterior_delta', 'semana_anterior_concluido',
            'mensal_aberto', 'mensal_delta', 'mensal_concluido', 'ano' , 'ano_anterior'
        ));
    }

    public function modal() {
        return view('site.analyst.modal');
    }

}
