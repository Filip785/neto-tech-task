<?php


namespace App\Http\Controllers;


use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function get(int $id)
    {
        return Card::findOrFail($id);
    }

    public function get_balance(int $id)
    {
        $card = Card::findOrFail($id);

        return response([
            'error' => false,
            'balance' => $card->balance
        ], 200);
    }

    public function get_pin(int $id)
    {
        $card = Card::findOrFail($id);

        return response([
            'error' => false,
            'balance' => $card->pin
        ], 200);
    }

    public function get_history(int $id)
    {
        dd('hit get_history', $id);
    }

    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'city' => 'required',
                'phone' => 'required',
                'currency' => 'required',
                'balance' => 'required|integer',
                'pin' => 'required|integer',
            ]
        );

        $card = Card::create($request->all());

        if (!$card->exists) {
           return response([
               'error' => true,
               'message' => 'Failed to save card.'
           ], 400);
        }

        return response([
            'error' => false,
            'card' => $card
        ], 200);
    }

    public function activate(int $id)
    {
        $card = Card::findOrFail($id);

        $card->update(['status' => 1]);

        return response([
            'error' => false,
            'card' => $card
        ], 200);
    }

    public function deactivate(int $id)
    {
        $card = Card::findOrFail($id);

        $card->update(['status' => 0]);

        return response([
            'error' => false,
            'card' => $card
        ], 200);
    }

    public function update_pin(int $id, Request $request)
    {
        $this->validate(
            $request,
            [
                'pin' => 'required|integer',
            ]
        );

        $card = Card::findOrFail($id);
        $card->update([
            'pin' => $request->input('pin')
        ]);

        return response([
            'error' => false,
            'card' => $card
        ], 200);
    }

    public function load_balance(int $id, Request $request)
    {
        $this->validate(
            $request,
            [
                'balance' => 'required|integer',
            ]
        );

        $card = Card::findOrFail($id);

        $newBalance = $card->balance + $request->input('balance');

        $card->update(['balance' => $newBalance]);

        return response([
            'error' => false,
            'card' => $card
        ], 200);
    }
}
