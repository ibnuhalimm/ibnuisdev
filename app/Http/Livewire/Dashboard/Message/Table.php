<?php

namespace App\Http\Livewire\Dashboard\Message;

use App\Models\Message;
use App\View\Components\Alert;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $datetime;
    public $body;

    public $is_view_modal_open = 0;

    public function markAsRepliedMessage($message_id)
    {
        try {
            Message::where('id', $message_id)
                ->update([
                    'is_replied' => 1,
                ]);
        } catch (\Throwable $th) {
            session()->flash('alert-status', 'red');
            session()->flash('alert-title', 'Error');
            session()->flash('alert-body', 'Something went wrong');
        }
    }

    public function markAsUnReplyMessage($message_id)
    {
        try {
            Message::where('id', $message_id)
                ->update([
                    'is_replied' => 0,
                ]);
        } catch (\Throwable $th) {
            session()->flash('alert-status', 'red');
            session()->flash('alert-title', 'Error');
            session()->flash('alert-body', 'Something went wrong');
        }
    }

    public function viewMessage($message_id)
    {
        $message = Message::findOrFail($message_id);

        $this->name = $message->name;
        $this->email = $message->email;
        $this->datetime = $message->created_at;
        $this->body = $message->message;

        $this->is_view_modal_open = 1;
    }

    public function closeViewModal()
    {
        $this->is_view_modal_open = 0;
        $this->reset('name', 'email', 'datetime', 'body');
    }

    /**
     * Override pagination view to custom view.
     *
     * @return string
     */
    public function paginationView()
    {
        return 'livewire.pagination-tailwindcss';
    }

    public function render()
    {
        $data = [
            'messages' => Message::latest()->paginate(10),
        ];

        return view('livewire.dashboard.message.table', $data);
    }
}
