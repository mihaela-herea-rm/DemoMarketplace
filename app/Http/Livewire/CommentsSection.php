<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use App\Models\Service;
use Livewire\Component;

class CommentsSection extends Component
{
    public $service;
    public $comment;
    public $successMessage = '';
    public $errorMessage = '';

    protected $rules = [
        'comment' =>'required',
        'service' => 'required'
    ];

    public function mount(Service $service)
    {
        $this->service = $service;
    }

    public function render()
    {
        return view('livewire.comments-section');
    }

    public function postComment()
    {
        $this->validate();

        if (auth()->id()) {
            Comments::create([
                'service_id' => $this->service->id,
                'body' => $this->comment,
                'user_id' => auth()->id()
            ]);

            $this->comment = '';
            $this->service = Service::find($this->service->id);

            $this->successMessage = 'Comment was posted!';
            $this->errorMessage = '';
        } else {
            $this->errorMessage = 'Please log in before posting a comment';
            $this->successMessage = '';
        }
    }
}
