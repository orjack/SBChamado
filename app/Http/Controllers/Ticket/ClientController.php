<?php namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Validator;

class ClientController extends Controller
{
    
    private $cliente;
    
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    
    
    public function index()
    {
        $empresa = Cliente::orderBy('id', 'asc')->get();
        return view('site.client.index', compact('empresa'));
    }
    
    public function add()
    {
        return view('site.client.add');
    }
    
    public function save(Request $request)
    {
        
        $this->validate($request, $this->cliente->rules, $this->cliente->messages);
        
        $empresa = $request->all();
        Cliente::create($empresa);
        return redirect()->route('client');
    }
    
    public function edit($id)
    {
        $empresa = Cliente::find($id);
        return view('site.client.edit', compact('empresa'));
    }
    
    public function update(Request $req, $id)
    {
        $empresa = $req->all();
        Cliente::find($id)->update($empresa);
        return redirect()->route('client');
    }
    
    public function delete($id)
    {
        Cliente::find($id)->delete();
        return redirect()->route('client');
    }
}
