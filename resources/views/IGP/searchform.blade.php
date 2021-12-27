
@extends('layouts.portal', [
    'menu' => 'SearchPetition',
    
])
@section('module','IGP Management')
@section('element','Petition Search')
<style>
.b-container1 {
    background-image: linear-gradient(#b33232, #304d86);
    background-attachment: fixed;
    opacity: 16px;

    background-repeat: no-repeat;

  }
</style>
@section('content')

            @livewire('search')
     
@endsection
