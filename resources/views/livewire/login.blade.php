<div>
    <div class="row m-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header  bg-light">
                    <h4 class="text-center">LOGIN</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submit">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">Email</label>
                                <input type="email" class="form-control" wire:model.lazy="form.email">
                                @error('form.email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Password</label>
                                <input type="password" class="form-control" wire:model.lazy="form.password">
                                @error('form.password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn text-white btn-block mt-3"
                            style="background-color: #64869f;">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
