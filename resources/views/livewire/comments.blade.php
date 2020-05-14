<div class="row">
    <div class="col-md-12">

        <h3 class="mb-3">Comments</h3>
        <div class="mt-1">
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="text-secondary">ADD COMMENT</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <input type="file" id="image" class="form-control" wire:change="$emit('fileChosen')">
                    </div>
                    <div class="col-md-4 offset-md-3">
                        @if($image)
                        <img src="{{ $image }}" height="100" width="100" class="img-thumbnail">
                        @endif
                    </div>
                </div>
        
                <form class="mt-1" wire:submit.prevent="addComment">
                    <div class="form-row align-items-center">
                        <div class="col-md-10 my-1">
                            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                            <input type="text" class="form-control" wire:model.debounce.500ms="newComment">
                        </div>
                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    @error('newComment') <small class="text-danger">{{ $message }}</small> @enderror
                </form>
            </div>
        </div>

        <div class="list-group mt-2 mb-2">
            @foreach ($comments as $comment)
            <a href="#" class="list-group-item list-group-item-action">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{$comment->imagePath }}" class="imag-responsive" height="100" width="100" alt="">
                </div>
                <div class="col-md-9">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $comment->creator->name }}</h5>
                            <small class="text-danger"><i class="fa fa-times"
                                    wire:click="remove({{ $comment->id }})"></i></small>
                        </div>
                        <p class="mb-1">{{ $comment->body }}</p>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{ $comments->links() }}
    </div>
</div>


<script>
    window.livewire.on('fileChosen', () => {
       let inputField = document.getElementById('image');
       let file = inputField.files[0];
       let reader = new FileReader();
       reader.onloadend = () => {
           window.livewire.emit('fileUpload', reader.result);
       }
       reader.readAsDataURL(file);
    });
</script>
