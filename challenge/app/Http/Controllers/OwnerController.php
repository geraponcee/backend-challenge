<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

use App\Models\Owner;

use App\Http\Requests\OwnerRequest;

class OwnerController extends Controller
{
   
    public function index()
    {
        $owners = Owner::all();
       
        return view('owner.index')->with('owners', $owners);
    }

    public function create()
    {
        return view('owner.create');
    }

    public function store(OwnerRequest $request)
    {
        try {
            $owner = $request->all();
            if($request->hasFile('image')){
                $image = $request->file('image');
                $path = 'images/owners/';
                $name = time().'.'.$image->getClientOriginalExtension();
                $request->file('image')->move($path, $name);
                $owner['image'] = $path.$name;
            }
            Owner::create($owner);

            return redirect('/owner')->with('message', 'Propietario agregado correctamente');
        }
        catch(\Exception $exception) {
            return redirect('/owner')->with('message', 'Error al registrar propietario'.$exception);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $owner = Owner::find($id);

        return view('owner.edit')->with('owner', $owner);
    }

    public function update(OwnerRequest $request, $id)
    {
        try {
            $owner = Owner::find($id);
            $owner->update($request->all());
            if($request->hasFile('image')){
                if(File::exists(public_path($owner->image))){
                    File::delete(public_path($owner->image));
                }
                $image = $request->file('image');
                $path = 'images/owners/';
                $name = time().'.'.$image->getClientOriginalExtension();
                $request->file('image')->move($path, $name);
                $owner['image'] = $path.$name;
            }
            $owner->save();

            return redirect('/owner')->with('message', 'Propietario editado correctamente');
        }
        catch(\Exception $exception) {
            return redirect('/owner')->with('message', 'Error al editar propietario'.$exception);
        }
    }

    public function destroy($id)
    {
        $owner = Owner::find($id);
        if(File::exists(public_path($owner->image))){
            File::delete(public_path($owner->image));
        }
        $owner->delete();

        return redirect('/owner');
    }
}
