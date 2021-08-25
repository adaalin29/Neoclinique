@extends('parts.template')

@section('title', $noutate->nume)

@section('content')
<p>{{$noutate->nume}}</p>
<p>{{$noutate->imagini}}</p>
<p>{{$noutate->continut}}</p>
@endsection

@push('scripts')

@endpush