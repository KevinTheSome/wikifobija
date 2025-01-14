<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Phobia;
use App\Models\Pin;
use Inertia\Inertia;

class PinController extends Controller
{
    public function newPin(Request $request){

        $request->validate([
            'phobia' => 'required|integer|min:0',
        ]);

        if(Pin::where('Phobia_id', $request->phobia)->where('User_id', $request->user()->id)->exists()){
            return Inertia::share("error" , "Pin already exists");
        }

        $pin = Pin::create([
            'Phobia_id' => $request->phobia,
            'User_id' => $request->user()->id
        ]);

        return Inertia::share(json_encode(["error" => ""]));
    }

    public function Index(Request $request){
        $phobias = DB::table('pins')
                        ->join('phobias', 'pins.Phobia_id', '=', 'phobias.id')
                        ->where('pins.User_id', $request->user()->id)
                        ->select('phobias.*')
                        ->get();
                        
        return Inertia::render('Pin/Index', ['phobias' => $phobias]);
    }

    public function search(Request $request)
    {
        $phobias = DB::table('pins')
                        ->join('phobias', 'pins.Phobia_id', '=', 'phobias.id')
                        ->where('pins.User_id', $request->user()->id)
                        ->where('title', 'like', "%{$request->input('search')}%")
                        ->select('phobias.*')
                        ->get();

        $pinsAll = DB::table('pins')
                        ->join('phobias', 'pins.Phobia_id', '=', 'phobias.id')
                        ->where('pins.User_id', $request->user()->id)
                        ->select('phobias.*')
                        ->get();

        return Inertia::render('Pin/Index', ['phobias' => $phobias ?? $pinsAll]);
    }

    public function delete(Request $request){
        $request->validate([
            'phobia' => 'required|integer|min:0',
        ]);

        $pin = Pin::where('Phobia_id', $request->phobia)
                  ->where('User_id', $request->user()->id)
                  ->delete();

        return Inertia::share(json_encode(["error" => ""]));
    }
}