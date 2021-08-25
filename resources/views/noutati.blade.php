@extends('parts.template')

@section('title', 'Noutati')

@section('content')
    @foreach($noutati as $noutate)
            <a href="/noutati/{{$noutate->slug}}"><p>{{$noutate->nume}}</p></a>
            <p>{{$noutate->imagini}}</p>
            <p>{{$noutate->continut}}</p>
            </br>
    @endforeach
@endsection

@push('scripts')

@endpush