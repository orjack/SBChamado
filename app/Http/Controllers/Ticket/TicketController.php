<?php

    namespace App\Http\Controllers\Ticket;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Ticket;
    use App\Models\Cliente;
    use App\Models\User;
    use Carbon\Carbon;

    class TicketController extends Controller
    {
        private $ticket;

        public function __construct(Ticket $ticket)
        {
            $this->ticket = $ticket;
        }

        public function index()
        {
            $ticket = Ticket::orderBy('date', 'desc', 'situation', 'asc')->paginate(50);
            $empresa = Cliente::orderBy('id', 'asc')->get();
            $user = User::orderBy('id', 'asc')->get();

            $dateAtual = new Carbon( Carbon::now());
            $ano = $dateAtual->year;
            $total_aberto = Ticket::where('situation', 0)
            ->where('date', 'LIKE', "%{$ano}%")->count();

            $total_delta = Ticket::where('situation', 1)
            ->where('date', 'LIKE', "%{$ano}%")->count();

            $total_concluido = Ticket::where('situation', 2)
            ->where('date', 'LIKE', "%{$ano}%")->count();

            return view('site.ticket.index', compact('ticket', 'empresa', 'user', 'total_aberto', 'total_delta', 'total_concluido'));
        }

        public function add()
        {
            $ticket = Ticket::all();
            $now = new Carbon();
            $empresa = Cliente::orderBy('id', 'asc')->get();
            $user = User::all();
            return view('site.ticket.add', compact('ticket', 'empresa', 'user', 'now'));
        }


        public function save(Request $request)
        {
	        $this->validate($request, $this->ticket->rules, $this->ticket->messages);
            $ticket = $request->all();
            Ticket::create($ticket);

            return redirect()->route('ticket');
        }

        public function edit($id)
        {
            $ticket = Ticket::find($id);
            $empresa = Cliente::orderBy('id', 'asc')->get();
            $user = User::orderBy('id', 'asc')->get();

            return view('site.ticket.edit', compact('ticket', 'empresa', 'user'));
        }

        public function update(Request $req, $id)
        {
            $ticket = $req->all();

            Ticket::find($id)->update($ticket);

            return redirect()->route('ticket');
        }

        public function delete($id)
        {
            Ticket::find($id)->delete();
            return redirect()->route('ticket');
        }
    }
