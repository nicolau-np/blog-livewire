<div class="form-register">
    <form wire:submit.prevent="submit">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
            </div>

            <div class="col-md-12">
                <input type="text" name="name" wire:model="name" class="form-control" placeholder="Name" />
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <br/><br/>
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
                <input type="confirmpassword" name="confirmpassword" wire:model="confirmpassword" class="form-control" placeholder="Confirm Password"/>
                @error('confirmpassword')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <br/><br/>
            <div class="col-md-12">
                <button class="btn btn-primary">
                        Salvar
                </button>
            </div>
        </div>
    </form>
</div>
