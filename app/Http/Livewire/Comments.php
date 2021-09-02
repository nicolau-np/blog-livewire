<?php

namespace App\Http\Livewire;

use App\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $comment;
    public $image;


    public function store()
    {
        if (!Auth::check()) {
            return back()->with(['message' => "Deve fazer login para publicar"]);
        }

        $this->validate([
            'comment' => ['required', 'string', 'min:10'],
        ]);

        $path = null;
        if ($this->image) {
            $this->validate([
                'image' => ['required', 'image', 'mimes:jpg,png', 'max:5000']
            ]);
            $path = $this->image->store('comments');
        }

        $data = [
            'id_user' => Auth::user()->id,
            'body' => $this->comment,
            'image' => $path,
        ];
        Comment::create($data);

        $this->comment = "";
        $this->image = "";
        session()->flash('message', "Comentário adicionado com  sucesso 😇");
    }


    public function delete($commentID)
    {
        $comment = Comment::find($commentID);
        if ($comment->image != "" && file_exists($comment->image)) {
            unlink($comment->image);
        }
        $comment->delete();

        session()->flash('message', "Comentário eliminado com  sucesso 🤭");
    }

    public function render()
    {
        $comments = Comment::orderBy('id', 'desc')->paginate(2);
        $data = [
            'comments' => $comments
        ];
        return view('livewire.comments', $data);
    }
}