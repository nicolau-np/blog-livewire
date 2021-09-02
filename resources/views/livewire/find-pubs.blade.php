<div class="findPubs">

<div class="row">
    @if ($pubs)
    <hr/>
        <div class="col-md-12">
            <div class="profile">
                <b style="color:blue">{{$pubs->name}}</b><br/>
                {{$pubs->email}}<br/>
                {{$pubs->acesso}}<br/>
            </div>

        </div>
    <hr/>
    @foreach ($pubs->comment as $comment)
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                  <p class="card-text">{{$comment->body}}</p>
                  <p class="card-text"><small class="text-muted">{{$comment->created_at->diffForHumans()}}</small></p>
                </div>

              </div>

        </div>
        <br/>
    @endforeach
    @endif
</div>

</div>
