<div>

     @if (session()->has('postSuccess'))
<div class="alert alert-success mb-3">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
{{ session('postSuccess') }} </div>

@elseif(session()->has('postFail'))
<div class="alert alert-danger mb-3">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Oops!</strong> {{ session('postFail') }} </div> 
@endif

    <form wire:submit.prevent="post">
        <div class="form-group">
          <label for="identification">ID Type:</label>
          <select wire:model="identification" class="form-control" required>
            <option value="">Select ID Type</option>
            @foreach ($idtypes as $idtype)
            <option value="{{ $idtype->id }}">{{ $idtype->id_type }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
            <label for="name">Owner's Names:</label>
            <input type="text" wire:model="name" class="form-control" placeholder="Owner name" required />
          </div>
          <div class="form-group">
            <label for="IDno">ID Number:</label>
            <input type="text" wire:model="idno" class="form-control" placeholder="Enter ID number" required />
          </div>
        <div class="form-group">
          <label for="photos">Photos (Front and back face):</label><br>
          <input type="file" wire:model="photos" accept="image/*" multiple required/>
          @if(!empty($photos))
          <div class="my-2">
          @foreach($photos as $photo)
            <a href="{{ $photo->temporaryUrl() }}" target="__blank"> 
                <img src="{{ $photo->temporaryUrl() }}" alt="" class="w-25" style="100px" />
            </a>
          @endforeach
        </div>
         @endif
        </div>
        <button type="submit" class="btn btn-primary">Post ID &nbsp; <div wire:loading wire:target="post" class="spinner-border spinner-border-sm"></div></button>
      </form>
</div>
