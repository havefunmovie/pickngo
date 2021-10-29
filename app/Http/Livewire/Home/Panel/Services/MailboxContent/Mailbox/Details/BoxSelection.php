<?php

namespace App\Http\Livewire\Home\Panel\Services\MailboxContent\Mailbox\Details;

use App\Models\Mailboxes;
use Livewire\Component;
use Livewire\WithPagination;

class BoxSelection extends Component
{
    use WithPagination;
    public $mailboxes;
    public $data;
    public $price;
    public $type;
    public $perPage = 10;

    protected $listeners = [
        'list_boxes' => 'listBoxes'
    ];

    public function listBoxes($data) {
        $this->data = $data;
        $this->price = $this->data['price'] = $data['price'];
        $this->type = $this->data['type'] = $data['type'];
    }

    public function select($id) {
        $this->data['box_id'] = $id;
        $this->emit('next_step', $this->data);
    }

    public function render()
    {
        return view('livewire.home.panel.services.mailbox-content.mailbox.details.box-selection',[
            'boxes' => Mailboxes::where('agent_id', $this->data['agent'] ?? '')->where('is_temp', 0)->where('is_empty', 1)
                ->paginate($this->perPage),
        ]);
    }
}
