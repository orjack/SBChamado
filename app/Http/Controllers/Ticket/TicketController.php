<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Cliente;
use App\Models\User;

class TicketController extends Controller
{
    public function index() {
        $ticket = Ticket::orderBy('date', 'desc')->get();
        $empresa = Cliente::orderBy('id', 'asc')->get();
        $user = User::orderBy('id', 'asc')->get();
        
        return view('site.ticket.index', compact('ticket', 'empresa', 'user'));
      }
  
      public function add() {
          $ticket = Ticket::all();
          $empresa = Cliente::orderBy('id', 'asc')->get();
          $user = User::all();
          return view('site.ticket.add', compact('ticket', 'empresa', 'user'));
      }
  
  
      public function save(Request $request) {
        $ticket = new Ticket();
        $ticket->id = $request['id'];
        $ticket->id_client = $request['id_client'];
        $ticket->id_user = $request['id_user'];
        $ticket->date = $request['date'];
        $ticket->situation = $request['situation'];
        
  
        $ticket->save();
        
        return redirect()->route('ticket');
      }
  
      public function edit($id) {
          $ticket = Ticket::find($id);
          $empresa = Cliente::orderBy('id', 'asc')->get();
          $user = User::orderBy('id', 'asc')->get();
          return view('site.ticket.edit', compact('ticket', 'empresa', 'user'));
      }
  
      public function update(Request $req, $id) {
        //dd($req['situation']);
        $ticket = $req->all(); 
        
        Ticket::find($id)->update($ticket);
        
        return redirect()->route('ticket');
      }
  
      public function delete($id) {
          Ticket::find($id)->delete();
          return redirect()->route('ticket');
    }
}
