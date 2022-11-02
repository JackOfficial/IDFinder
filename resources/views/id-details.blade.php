@extends('app.layout')
@section('title', 'IDFinder - findind ID made easy')
@section('content')

<section class="section my-5">
    <div class="container">
<h1 class="text-center my-5">IDENTIFICATIONS DETAILS</h1>

<livewire:cleam-id :idno="$idno" />
    </div>
</section>

@endsection

       