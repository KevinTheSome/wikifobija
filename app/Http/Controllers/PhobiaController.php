<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pin;
use App\Models\Phobia;
use Inertia\Inertia;

class PhobiaController extends Controller
{
    public function Create(Request $request){
        $request->validate([
            'md' => 'required|string|min:0',
            'title' => 'required|string|min:0'
        ]);

        $phobia = Phobia::create([
            'md' => $request->md,
            'title' => $request->title

        ]);

        return redirect()->route('phobia.show', $phobia->id);
        
    }

    public function Make(Request $request){
        return Inertia::render('Phobia/Create');
    }

    public function search(Request $request)
    {
        $phobia = Phobia::where('title', 'like', "%{$request->input('search')}%")->get();
        return Inertia::render('Phobia/Index', ['phobias' => $phobia ?? Property::all()]);
    }

    public function Index(Request $request){

        return Inertia::render('Phobia/Index', ['phobias' => Phobia::all()]);
        
    }

    public function Show(Request $request,$id){
        return Inertia::render('Phobia/Show', ['phobia' => Phobia::find($id),'cantPin' => Pin::where('Phobia_id', $id)->where('User_id', $request->user()->id)->exists()]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'md' => 'required|string|min:0',
            'title' => 'required|string|min:0'
        ]);

        $phobia = Phobia::find($id);
        $phobia->md = $request->md;
        $phobia->title = $request->title;
        $phobia->save();

        return redirect()->route('phobia.show', $phobia->id);
    }

    public function edit($id){
        return Inertia::render('Phobia/Edit', ['phobia' => Phobia::find($id)]);
    }

    public function delete($id){
        $phobia = Phobia::find($id);
        $phobia->delete();
        return redirect()->route('phobias');
    }

    public static function getPhobiaCount(){
        return Phobia::count();
    }
}
