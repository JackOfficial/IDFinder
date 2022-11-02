<div>
    <form wire:submit.prevent="search">
        <div class="row">
            <div class="col-md-2"></div>
    <div class="col-md-6">
        <input type="text" wire:model.defer="keyword" class="form-control rounded-pill form-control-lg @error('keyword') is-invalid @enderror" placeholder="Search for your ID" required/>
    @error('keyword')
      <span class="text-danger">{{ $keyword }}</span>  
    @enderror
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary rounded-pill">Search &nbsp; <div wire:loading wire:target="search" class="spinner-border spinner-border-sm"></div></button>
    </div>
    <div class="col-md-2"></div>
        </div>
      
    </form>
    
    <div class="my-2">
     Found {{ count($identifications) }} {{ count($identifications) > 1 ? 'IDs' : 'ID' }}:
    </div>

    <div class="row mt-2 {{ !isset($keyword) ? 'd-none' : '' }}">
        @forelse ($identifications as $identification)
        <div class="col-md-3">
            <div class="card">
                @php 
                $photos = rtrim($identification->photos,", ");
                $photos = explode(", ",$photos);
                @endphp
                <img class="card-img-top" src="{{ asset('storage/id/photos/' . $photos[0]) }}" alt="Card image">
                <div class="card-img-overlay">
                  <h4 class="card-title">{{ $identification->owner_name }}</h4>
                  <p class="card-text">Some example text.</p>
                  <a href="#" class="btn btn-primary">See Profile</a>
                </div>
              </div>
        </div>
        @empty
            <h3 class="text-center">No id found for "{{ $keyword }}"</h3>
        @endforelse
      
    </div>
</div>
