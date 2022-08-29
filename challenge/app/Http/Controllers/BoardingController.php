<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

use App\Models\Boarding;
use App\Models\BoardingType;
use App\Models\BoardingFeature;
use App\Models\Owner;

use App\Http\Requests\BoardingRequest;

class BoardingController extends Controller
{

    public function index()
    {
        $boardings = Boarding::all();
       
        return view('boarding.index')->with('boardings', $boardings);
    }

    public function create()
    {   
        $types = BoardingType::all()->sortBy('description');
        $owners = Owner::all()->sortBy('last_name');
        return view('boarding.create')->with('types', $types)->with('owners', $owners);
    }

    public function store(BoardingRequest $request)
    {
        try {
            $boarding = new Boarding();
            $boarding->registration = $request->registration;
            $boarding->name = $request->name;
            $boarding->type_id = $request->type;
            $boarding->owner_id = $request->owner;
            $feature = BoardingFeature::create([
                'color' => $request->color,
                'length' => $request->length,
                'width' => $request->width,
                'max_weight' => $request->max_weight
            ]);
            $boarding->feature_id = $feature->id;
            if($request->hasFile('image')){
                $image = $request->file('image');
                $path = 'images/boardings/';
                $name = time().'.'.$image->getClientOriginalExtension();
                $request->file('image')->move($path, $name);
                $boarding['image'] = $path.$name;
            }
            $boarding->save();

            return redirect('/boarding')->with('message', 'Embarcación agregada correctamente');
        }
        catch(\Exception $exception) {
            return redirect('/boarding')->with('message', 'Error al registrar embarcación'.$exception);
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $boarding = Boarding::find($id);
        $types = BoardingType::all()->sortBy('description');
        $owners = Owner::all()->sortBy('last_name');
        $feature = BoardingFeature::find($boarding->feature_id);
        return view('boarding.edit')->with('boarding', $boarding)
                    ->with('types', $types)
                    ->with('owners', $owners)
                    ->with('feature', $feature);
    }

    public function update(BoardingRequest $request, $id)
    {
        try{
            $boarding = Boarding::find($id);
            $boarding->registration = $request->registration;
            $boarding->name = $request->name;
            $boarding->type_id = $request->type;
            $boarding->owner_id = $request->owner;
            $boarding->feature()->update([
                'color' => $request->color,
                'length' => $request->length,
                'width' => $request->width,
                'max_weight' => $request->max_weight
            ]);
            if($request->hasFile('image')){
                if(File::exists(public_path($boarding->image))){
                    File::delete(public_path($boarding->image));
                }
                $image = $request->file('image');
                $path = 'images/boardings/';
                $name = time().'.'.$image->getClientOriginalExtension();
                $request->file('image')->move($path, $name);
                $boarding['image'] = $path.$name;
            }
            $boarding->save();

            return redirect('/boarding')->with('message', 'Embarcación editada correctamente');
        }
        catch(\Exception $exception) {
            return redirect('/boarding')->with('message', 'Error al editar embarcación'.$exception);
        }
    }

    public function destroy($id)
    {
        $boarding = Boarding::find($id);
        if(File::exists(public_path($boarding->image))){
            File::delete(public_path($boarding->image));
        }
        $feature = BoardingFeature::find($boarding->feature_id);
        $boarding->delete();
        $feature->delete();
        return redirect('/boarding');
    }
}
