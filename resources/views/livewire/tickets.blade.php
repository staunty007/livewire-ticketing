<div>
    <h3>Tickets</h3>
    <div class="mb-2"></div>
    @foreach ($tickets as $ticket)    
        <div class="card mb-3 {{ $active == $ticket->id ? 'bg-light border border-secondary' : '' }}" style="max-width: 540px;" wire:click="$emit('ticketSelected', {{ $ticket->id }})">
            <div class="row no-gutters">
                <div class="col-md-2 bg-secondary"></div>
                <div class="col-md-10">
                    <div class="card-body">
                        <p class="card-text">{{ Str::limit($ticket->question, 76, ' ...') }}.</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
