<?php

    namespace App\Http\Controllers\Ticket;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Ticket;
    use App\Models\Cliente;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;
    use Carbon\Carbon;

    class AnalystController extends Controller
    {
        private $ticket;

        public function __construct(Ticket $ticket)
        {
            $this->ticket = $ticket;
        }

        public function index()
        {
            $analyst = Ticket::orderBy('date', 'desc')->get();
            $empresa = Cliente::orderBy('id', 'asc')->get();

            $inicio = new Carbon('last sunday');
            $fim = new Carbon('now friday');
            $data = Ticket::select('date')->get();

            $count = $analyst->where('id_user', Auth::id())
                ->where('date', '>' ,$inicio)
                ->where('date', '<' ,$fim)
                ->count();

            $dateAtual = new Carbon( Carbon::now());
            $ano = $dateAtual->year;

            $total_aberto = Ticket::where('id_user', Auth::id())
            ->where('situation', 0)
            ->where('date', 'LIKE', "%{$ano}%")->count();

            $total_delta = Ticket::where('id_user', Auth::id())
            ->where('situation', 1)
            ->where('date', 'LIKE', "%{$ano}%")->count();

            $total_concluido = Ticket::where('id_user', Auth::id())
            ->where('situation', 2)
            ->where('date', 'LIKE', "%{$ano}%")->count();
            return view('site.analyst.index', compact('analyst', 'empresa', 'count', 'inicio', 'fim', 'data', 'total_aberto', 'total_delta', 'total_concluido'));
        }

        public function add()
        {
            $ticket = Ticket::all();
            $empresa = Cliente::orderBy('id', 'asc')->get();
            $user = User::all();
            return view('site.analyst.add', compact('ticket', 'empresa', 'user'));
        }

        public function save(Request $request)
        {
            $this->validate($request, $this->ticket->rules, $this->ticket->messages);
            $ticket = $request->all();
            Ticket::create($ticket);

            return redirect()->route('analyst');

        }

        public function edit($id)
        {
            $ticket = Ticket::find($id);
            $empresa = Cliente::orderBy('id', 'asc')->get();
            $user = User::orderBy('id', 'asc')->get();
            return view('site.analyst.edit', compact('ticket', 'empresa', 'user'));
        }

        public function update(Request $req, $id)
        {
            $ticket = $req->all();

            Ticket::find($id)->update($ticket);

            return redirect()->route('analyst');
        }

        public function delete($id)
        {
            Ticket::find($id)->delete();
            return redirect()->route('analyst');
        }
    }
