<?php

namespace App\Http\Controllers;

use App\Coin;
use Illuminate\Http\Request;

class CoinController extends Controller
{

    public function showAll()
    {
        return response()->json(Coin::all());
    }

    public function showOne($id)
    {
        return response()->json(Coin::find($id));
    }

    public function create(Request $request)
    {
      $this->validate($request, [
            'name' => 'required',
            'price' => 'required'
        ]);

        $Coin = Coin::create($request->all());

        return response()->json($Coin, 201);
    }

    public function update($id, Request $request)
    {
        $Coin = Coin::findOrFail($id);
        $Coin->update($request->all());

        return response()->json($Coin, 200);
    }

    public function delete($id)
    {
        Coin::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
