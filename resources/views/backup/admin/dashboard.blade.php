@extends('layout.main')

@section('container')

<style>
  .typing-demo {
    width: 28ch;
    animation: typing 2s steps(22), blink .5s step-end infinite alternate;
    white-space: nowrap;
    overflow: hidden;
    border-right: 3px solid;
    font-family: monospace;
    font-size: 2em;
  }

  @keyframes typing {
    from {
      width: 0;
    }
  }

  @keyframes blink {
    50% {
      border-color: transparent;
    }
  }
}
</style>

<h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
<div class="col-lg-8 px-0">
   <div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
      <h5 class="card-title">
        <div class="typing-demo fs-4">
          Selamat Datang, {{ Auth::guard('admin')->user()->nama }}</h5>
        </div> 
    </div>
  </div>
</div>
@endsection()