<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

use App\Http\Requests\PortRequest;

use App\Models\Port;
use App\Models\Service;

class PortController extends Controller
{

    public function index()
    {
        $ports = Port::all();
        return view('port.index')->with('ports', $ports);
    }

    public function create()
    {
        $services = Service::all();

        return view('port.create')->with('services', $services);
    }

    public function store(PortRequest $request)
    {
        try {
            $port = Port::create($request->all());
            $port->services()->sync($request->services);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $path = 'images/ports/';
                $name = time().'.'.$image->getClientOriginalExtension();
                $request->file('image')->move($path, $name);
                $port['image'] = $path.$name;
            }

            return redirect('/port')->with('message', 'Puerto agregado correctamente');
        }
        catch(\Exception $exception) {
            return redirect('/port')->with('message', 'Error al registrar puerto'.$exception);
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $port = Port::find($id);
        $services = Service::all();

        return view('port.edit')->with('port', $port)->with('services', $services);
    }

    public function update(PortRequest $request, $id)
    {
        try {
            $port = Port::find($id);
            $port->update($request->all());
            if($request->hasFile('image')){
                if(File::exists(public_path($port->image))){
                    File::delete(public_path($port->image));
                }
                $image = $request->file('image');
                $path = 'images/ports/';
                $name = time().'.'.$image->getClientOriginalExtension();
                $request->file('image')->move($path, $name);
                $port['image'] = $path.$name;
            }
            $port->save();
            $port->services()->sync($request->services);

            return redirect('/port')->with('message', 'Puerto editado correctamente');
        }
        catch(\Exception $exception) {
            return redirect('/port')->with('message', 'Error al editar puerto'.$exception);
        }
    }

    public function destroy($id)
    {
        $port = Port::find($id);
        if(File::exists(public_path($port->image))){
            File::delete(public_path($port->image));
        }
        $port->delete();

        return redirect('/port');
    }
}
