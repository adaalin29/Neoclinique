@extends('parts.template')

@section('title', 'Termeni si conditii')

@section('content')

<section id="termeni-page-image" class="overflow-hidden">
  <div class="grey-overlay">
    <img src="img/OBCD3X0.png" alt="" />

    <div class="overlay-container">
      <h3 class="text-white section-title">{{settings('termeni-si-conditii.title')}}</h3>
      <div class="breadcrumb-container">
        <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
        <div class="bara-verticala">|</div>
        <div class="breadcrumb-element">{{__('site.termeni')}}</div>
      </div>
    </div>
  </div>
</section>

<section id="termeni-page">
  <div class="container light-text">
    <div class="mt4 mb4">
      <p>
        {!!str_replace("\n","</br>",settings('termeni-si-conditii.continut'))!!}
      </p>
    </div>
  </div>
</section>
<a id="button_to_top"></a>
@endsection

@push('scripts')

@endpush