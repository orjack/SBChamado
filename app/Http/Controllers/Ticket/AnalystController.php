<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Cliente;
use App\Models\User;

class AnalystController extends Controller
{
    public function index() {

        $analyst = Ticket::orderBy('date', 'desc')->get();
        $count = $analyst->where('id_user', 2)->count();
        
        $empresa = Cliente::orderBy('id', 'asc')->get();
        
        return view('site.analyst.index', compact('analyst', 'empresa', 'count'));
      }
  
    public function add() {
        $ticket = Ticket::all();
        $empresa = Cliente::orderBy('id', 'asc')->get();
        $user = User::all();
        return view('site.analyst.add', compact('ticket', 'empresa', 'user'));
    }

    public function save(Request $request) {
        $ticket = new Ticket();
        if($request['id'] == $ticket->id ) {
            return "Codigo ja existe";
        }
        else {
            $ticket->id = $request['id'];
            $ticket->id_client = $request['id_client'];
            $ticket->id_user = $request['id_user'];
            $ticket->date = $request['date'];
            $ticket->situation = $request['situation'];
            $ticket->save();
            return redirect()->route('analyst');
        }  
    }

    public function edit($id) {
        $ticket = Ticket::find($id);
        $empresa = Cliente::orderBy('id', 'asc')->get();
        $user = User::orderBy('id', 'asc')->get();
        return view('site.analyst.edit', compact('ticket', 'empresa', 'user'));
    }

    public function update(Request $req, $id) {
    $ticket = $req->all(); 
    
    Ticket::find($id)->update($ticket);
    
    return redirect()->route('analyst');
    }

    public function delete($id) {
        Ticket::find($id)->delete();
        return redirect()->route('analyst');
    }
}
