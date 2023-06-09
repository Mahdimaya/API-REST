<?php

namespace App\Http\Controllers;

use app\http\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commande = Order::all();
        return response(["commande" => $commande], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = $request->validate([
            'id' => ['required','int'],
            'status' => ['required','string'],
            'date' => ['required' , 'date']
        ]);

       $validorder = Order::create($validator);
       return response($validorder);
    }


    public function update(Request $request)
        {

            $validatedcommande = $request->validate([
            'id' =>['required','int'],
            'status' => ['string'],
            'date' => ['date']
            ]);
            $order = Order::find($request->id);
            if($order->id != $validatedcommande['id'])
            {
            return response(['message' => 'Impossible de terminer loperation!'],403);
            }
            $order->status= $request['status'];
            $order->date= $request['date'];
            $order->save();

            return response( ['Commande mise a jour!'], 200);
        }

        public function destroy(Request $request)
    {
        $Deletedcommande = Order::find($request->id);
        $Deletedcommande->delete();
            return response('Commandes supprimé!', 200);
    }
}
