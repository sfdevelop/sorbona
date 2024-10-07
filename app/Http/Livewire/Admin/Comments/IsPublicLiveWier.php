<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Models\Comment;
use Livewire\Component;

class IsPublicLiveWier extends Component
{
    public Comment $comment;

    public bool $public = false;

    public function mount()
    {
        $this->public = $this->comment->is_public;
    }

    public function updatedPublic()
    {
        $bool = $this->comment->is_public;

        $this->comment->update([
            'is_public' => ! $bool,
        ]);

        $this->dispatchBrowserEvent('alert',
            ['type' => 'success', 'message' => 'Дані збережено']);
    }

    public function render()
    {
        return view('livewire.admin.comments.is-public-live-wier');
    }
}
