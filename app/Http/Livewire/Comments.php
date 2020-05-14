<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Comment;
use Livewire\WithPagination;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Comments extends Component
{
    use WithPagination;

    public $newComment;
    public $image;
    public $ticketId;

    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
        'ticketSelected',
    ];


    public function ticketSelected($ticketId)
    {
        $this->ticketId = $ticketId;
    }
    
    public function updated($field)
    {
        $this->validateOnly($field, [
            'newComment' => 'required|max:255',
        ]);
    }

    public function addComment() 
    {
        $this->validate([
            'newComment' => 'required|max:255',
        ]);

        $image = $this->storeImage();

        $createdComment = Comment::create([
            'body' => $this->newComment,
            'user_id' => 1,
            'support_ticket_id' => $this->ticketId,
            'image' => $image
        ]);

        $this->newComment = "";
        $this->image = "";

        session()->flash('message', 'Comment Added Successfully.');
    }

    public function storeImage()
    {
        if(!$this->image) {
            return null;
        }

        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function remove($commentId) {
        $comment = Comment::find($commentId);
        Storage::disk('public')->delete($comment->image);
        $comment->delete();

        session()->flash('message', 'Comment Deleted Successfully.😄');
    }

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->where('support_ticket_id',$this->ticketId)->paginate(3)
        ]);
    }
}
