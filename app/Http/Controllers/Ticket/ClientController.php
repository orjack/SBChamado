<?php namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cliente;

class ClientController extends Controller
{
    public function index() {
        $empresa = Cliente::all();
        return view('site.client.index', compact('empresa'));
      }
    
      public function add() {
          return view('site.client.add');
      }
    
      public function save(Request $request) {
        $empresa = new Cliente();
        $empresa->id = $request['id'];
        $empresa->name = $request['name'];
        $empresa->save();
        return redirect()->route('client');
      }
    
      public function edit($id) {
        $empresa = Cliente::find($id);
        return view('site.client.edit', compact('empresa'));
      }
    
      public function update(Request $req, $id) {
        $empresa = $req->all();
        Cliente::find($id)->update($empresa);
        return redirect()->route('client');
      }
    
      public function delete($id) {
        Cliente::find($id)->delete();
        return redirect()->route('client');
      }
}
