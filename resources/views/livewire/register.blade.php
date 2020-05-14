<div>
    <div class="row m-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header  bg-light" >
                    <h4 class="text-center">REGISTER</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submit">
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="">Name</label>
                            <input type="text" class="form-control" wire:model.lazy="form.name">
                            @error('form.name') <small class="text-danger">{{ $message }}</small> @enderror
                          </div>
                          <div class="form-group col-md-12">
                            <label for="">Email</label>
                            <input type="email" class="form-control" wire:model.lazy="form.email">
                            @error('form.email') <small class="text-danger">{{ $message }}</small> @enderror
                          </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Password</label>
                                <input type="password" class="form-control" wire:model.lazy="form.password">
                                @error('form.password') <small class="text-danger">{{ $message }}</small> @enderror
                              </div>
                              <div class="form-group col-md-6">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control" wire:model.lazy="form.password_confirmation">
                              </div>
                        </div>
                        
                        <button type="submit" class="btn text-white btn-block mt-3"  style="background-color: #64869f;">Register</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
