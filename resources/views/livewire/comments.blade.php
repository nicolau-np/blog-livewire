<div class="painel">
    <form wire:submit.prevent="store">
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
        </div>
        <div class="col-md-12">
            <div wire:loading wire:target="store">
            <img src="{{asset('assets/img/loading.gif')}}" style="height:53px; width:53px;" />
            </div>
        </div>

        <div class="col-md-12">
        <input type="file" name="image" id="image"  wire:model="image" />
        @error('image')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <br/><br/>
        <div class="col-md-8">
            <textarea type="text" name="comment" wire:model="comment" class="form-control" cols=8 rows=2 placeholder="Em que está pensando">

            </textarea>
            @error('comment')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>

    </div>
</form>
    <br/>
    <div class="row">
        @foreach ($comments as $comment)
        <div class="col-md-12">
            <div class="card">
                @if ($comment->image)
                    <img src="{{asset($comment->image)}}" class="card-img-top" alt="image" style="height: 200px;" />
                @endif

                <div class="card-body">
                  <h5 class="card-title">{{$comment->user->name}}</h5>
                  <p class="card-text">{{$comment->body}}</p>
                  <p class="card-text"><small class="text-muted">{{$comment->created_at->diffForHumans()}}</small></p>
                </div>

              </div>
              @if (Auth::user()->acesso=="admin")
              <div class="card-footer">
                <small class="text-muted">
                    <i class="fas fa-trash text-danger" wire:click="delete({{$comment->id}})"></i>
                    &nbsp;&nbsp;
                    <i class="fas fa-edit text-primary"></i>
                </small>
              </div>
            @endif
              <br/>
        </div>
        <br/>
        @endforeach

        {{$comments->links()}}
    </div>

</div>

