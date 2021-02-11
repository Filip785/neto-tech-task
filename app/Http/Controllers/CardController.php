<?php


namespace App\Http\Controllers;


use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CardController extends Controller
{
    public function get(int $id): Response
    {
        return response([
            'error' => false,
            'card' => Card::with('country')->findOrFail($id)
        ], 200);
    }

    public function get_balance(int $id): Response
    {
        $card = Card::findOrFail($id);

        return response([
            'error' => false,
            'balance' => $card->balance
        ], 200);
    }

    public function get_pin(int $id): Response
    {
        $card = Card::findOrFail($id);

        return response([
            'error' => false,
            'pin' => $card->pin
        ], 200);
    }

    public function get_history(int $id)
    {
        dd('hit get_history', $id);
    }

    public function create(Request $request): Response
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

    public function activate(int $id): Response
    {
        $card = Card::findOrFail($id);

        $card->update(['status' => 1]);

        return response([
            'error' => false,
            'card' => $card
        ], 200);
    }

    public function deactivate(int $id): Response
    {
        $card = Card::findOrFail($id);

        $card->update(['status' => 0]);

        return response([
            'error' => false,
            'card' => $card
        ], 200);
    }

    public function update_pin(int $id, Request $request): Response
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

    public function load_balance(int $id, Request $request): Response
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
