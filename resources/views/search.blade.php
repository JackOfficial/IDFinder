@extends('app.layout')
@section('title', 'IDFinder - findind ID made easy')
@section('content')

<section class="section my-5">
    <div class="container">
<h1 class="text-center my-5 font-20">SEARCH FOR IDENTIFICATIONS</h1>
{{-- <livewire:search-id :keyword="$keyword" /> --}}
<form method="GET" action="/search">
    <div class="input-group">
        <div class="input-group-prepend">
            <select name="idtype" class="border border-gray form-control-lg">
                <option value="">Select ID Type</option>
                @foreach ($idtypes as $type)
                <option value="{{ $type->id }}" {{ $type->id == $idtype ? 'selected' : '' }}>{{ $type->id_type }}</option>   
                @endforeach
            </select>
        </div>
        <input type="text" name="keyword" value="{{ old('keyword', $keyword) }}" class="form-control form-control-lg" placeholder="Search for ID..." required />
      </div>
    <button class="btn btn-success rounded-pill mt-2 mr-2">Find <i class="fa fa-search"></i></button>
 </form>

<div class="my-2">
    Found {{ count($identifications) }} {{ isset($idtype) ? count($identifications) > 1 ? $id->id_type.'s':'' : 'IDs' }}:
   </div>

<div class="row mt-2 {{ !isset($keyword) ? 'd-none' : '' }}">
    @forelse ($identifications as $identification)
    <div class="col-md-4">
          <div class="card">
            @php 
            $photos = rtrim($identification->photos,", ");
            $photos = explode(", ",$photos);
            @endphp
            <a href="{{ route('details', $identification->id) }}">
                <img class="card-img-top" src="{{ asset('storage/id/photos/' . $photos[0]) }}" alt="">
            </a>
            <div class="card-body">
              <h4 class="card-title">{{ $identification->owner_name }}</h4>
              <p class="card-text">{{ $identification->id_type }}</p>
              <a href="{{ route('details', $identification->id) }}">See Details</a>
            </div>
          </div>
    </div>
    @empty
        <h5 class="text-center">No {{ isset($idtype) ? $id->id_type : 'ID' }} found for "{{ $keyword }}" 
            <a href="#" data-toggle="modal" data-target="#notifyMe">Notify me when it's found!</a></h5>
    @endforelse
  
</div>
  
    </div>
</section>
  
  <livewire:notify-me :idtype="$idtype" :keyword="$keyword" />

@endsection

       