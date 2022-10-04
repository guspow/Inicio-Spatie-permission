@if($message = Session::get('success'))
    <div class="alert alert-success alert-border-left alert-dismissible fade show mb-xl-2" role="alert">
        <i class="fa fa-check"></i> {{$message}}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
    </div>
@endif

@if($message = Session::get('error'))
  <div class="alert alert-danger alert-border-left alert-dismissible fade show mb-xl-2" role="alert">
      <i class="fa fa-exclamation"></i> {{$message}}
      {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
  </div>
@endif

@if($message = Session::get('warning'))
  <div class="alert alert-warnings alert-border-left alert-dismissible fade show mb-xl-2" role="alert">
      <i class="fa fa-exclamation-triangle"></i> {{$message}}
      {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
  </div>
@endif

@if($message = Session::get('info'))
  <div class="alert alert-info alert-border-left alert-dismissible fade show mb-xl-2" role="alert">
      <i class="fa fa-info-circle"></i> {{$message}}
      {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
  </div>
@endif

@if($errors->any())
  <div class="alert alert-danger alert-border-left alert-dismissible fade show mb-xl-2" role="alert">
      <i class="fa fa-exclamation"></i><strong> ERROR!</strong>
      @foreach ($errors->all() as $error)
          <br>{{ $error }}
      @endforeach
      {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
  </div>
@endif