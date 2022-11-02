<div class="row">
    <div class="col-md-6">
      @php 
      $photos = rtrim($identification->photos,", ");
      $photos = explode(", ",$photos);
      @endphp
      <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          @for($x=0; $x<count($photos); $x++)
          <li data-target="#demo" data-slide-to="{{ $x }}" class="{{ $x=0 ? 'active' : '' }}"></li>
          @endfor
        </ul>
      
        <!-- The slideshow -->
        <div class="carousel-inner">
          {{-- @for($x=0; $x<count($photos); $x++)
          <div class="carousel-item {{ $x=0 ? 'active' : '' }}">
            <img src="{{ asset('storage/id/photos/' . $photos[$x]) }}" alt="ID Photo">
          </div>
          @endfor --}}
        </div>
      
        <!-- Left and right controls -->
        <a class="carousel-control-prev {{ count($photos) == 0 ? 'd-none' : '' }}" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next {{ count($photos) == 0 ? 'd-none' : '' }}" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      
      </div>
      
      {{-- <div class="row">
        <div class="col-md 6">
          <img class="img-responsive w-100" src="{{ asset('storage/id/photos/' . $photos[0]) }}" alt="ID Photo">
        </div>
        <div class="col-md 6">
          <img class="img-responsive w-100" src="{{ asset('storage/id/photos/' . $photos[1]) }}" alt="ID Photo">
        </div>
      </div> --}}
    </div>
    <div class="col-md-6">
     <h3>ID Information:</h3>
      <div><label>ID Type: </label> {{ $identification->id_type }}</div>
      <div><label>Owner's name: </label> {{ $identification->owner_name }}</div>
      <div><label>Date of birth: </label> {{ $identification->dob }}</div>
      <div><label>Gender: </label> {{ $identification->gender }}</div>
      <div><label>Place of issue: </label> {{ $identification->place_of_issue }}</div>
      <div><label>ID number: </label> {{ $identification->id_number }}</div>
      <hr>
      <button class="btn btn-primary" wire:click="cleam({{ $identification->id }})">Cleam ID &nbsp; <div wire:loading wire:target="cleam({{ $identification->id }})" class="spinner-border spinner-border-sm"></div></button>
      <button class="btn btn-outline-primary" wire:click="share({{ $identification->id }})">Share</button>

      <div class="alert alert-danger alert-dismissible my-2 {{ Session::has('cleamFail') ? '' : 'd-none' }}">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
      <strong>FAILED:</strong> {{ Session::get('cleamFail') }} </div> 

      <div class="my-3 {{ Session::has('cleamSuccess') ? '' : 'd-none' }}">
       <div class="alert alert-success alert-dismissible my-2">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
    <strong><i class="fas fa-check"></i></strong> {{ Session::get('cleamSuccess') }} </div>
    
        <h3>Founder's information:</h3>
      <div><label>Founder name: </label> {{ $userInformation->name ?? '' }}</div>
      <div><label>Email: </label> {{ $userInformation->email ?? '' }}</div>
      <div><label>phone: </label> {{ $userInformation->phone ?? '' }}</div>
      </div>
    </div>
</div>