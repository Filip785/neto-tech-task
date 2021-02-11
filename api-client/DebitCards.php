<?php

namespace DebitCardsAPI;

class DebitCards extends APIClient
{
    public function get_card(int $id)
    {
        return $this->get('cards/' . $id);
    }

    public function get_pin(int $id)
    {
        return $this->get('cards/' . $id . '/pin');
    }

    public function get_balance(int $id)
    {
        return $this->get('cards/' . $id . '/balance');
    }

    public function create_card(array $params)
    {
        return $this->post('cards/create', [
            'json' => $params
        ]);
    }
}
