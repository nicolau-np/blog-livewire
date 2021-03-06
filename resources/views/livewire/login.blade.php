<div class="form-register">
    <form wire:submit.prevent="logar">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
            </div>
            <div wire:loading wire:target="logar">
                <img src="{{asset('assets/img/loading.gif')}}" style="height:53px; width:53px;" />
            </div>

            <div class="col-md-12">
                <input type="email" name="email" wire:model="email" class="form-control" placeholder="Email"/>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <br/><br/>
            <div class="col-md-12">
                <input type="password" name="password" wire:model="password" class="form-control" placeholder="Password"/>
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <br/><br/>
            <div class="col-md-12">
                <button class="btn btn-primary">
                        Entrar
                </button>
            </div>
        </div>
    </form>
</div>

