<?php

namespace App\Http\Controllers;

use App\Http\Requests\GangasRequest;
use App\Models\Ganga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GangasController extends Controller
{
    public function index()
    {
        $gangas = Ganga::orderBy('id', 'desc')->get();
        return view('gangas.index', ['gangas' => $gangas]);
    }

    public function show($id)
    {
        $ganga = Ganga::findorFail($id);
        return view('gangas.show', compact('ganga'));
    }

    public function create()
    {
        return view('gangas.create');
    }

    public function store(GangasRequest $request)
    {
        $gangaID = Ganga::latest()->first()->id + 1;
        $filename = $gangaID . "-ganga-severa.jpg";
        $request->file('url')->storeAs('public/img', $filename);

        Ganga::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $filename,
            'category' => $request->category,
            'likes' => 0,
            'unlikes' => 0,
            'price' => $request->price,
            'price_sale' => $request->price_sale,
            'available' => true,
            'user_id' => Auth::user()->id,
        ]);



        return redirect(route('gangas.index'));
    }

    public function edit($id)
    {
        $ganga = Ganga::findOrFail($id);
        return view('gangas.edit', compact('ganga'));
    }

    public function update(GangasRequest $request, $id)
    {
        $ganga = Ganga::findOrFail($id);
        Ganga::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'category' => $request->category,
            'likes' => $ganga->likes,
            'unlikes' => $ganga->unlikes,
            'price' => $request->price,
            'price_sale' => $request->price_sale,
            'available' => $ganga->available,
            'user_id' => $ganga->user_id,
        ]);
        return redirect(route('gangas.index'));
    }

    public function destroy($id)
    {
        $ganga = Ganga::findOrFail($id);
        var_dump($ganga);
        Ganga::destroy($id);
        return redirect()->route('gangas.index');
    }

    public function me()
    {
        $gangas = Ganga::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('gangas.index', ['gangas' => $gangas]);
    }

    public function new()
    {
        $gangas = Ganga::latest()->take(10)->get();
        return view('gangas.index', ['gangas' => $gangas]);
    }

    public function best()
    {
        $gangas = Ganga::orderBy('likes', 'desc')->take(10)->get();
        return view('gangas.index', ['gangas' => $gangas]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('gangas.index');
    }

    private function storeImage($request)
    {
        $newImageName = uniqid() . "-" . $request->title . "." . $request->image->extension();
        return $request->image->move(public_path('images'), $newImageName);
    }
}
