@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <button id="send">Send Mail</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('#send').on('click', function () {
                $.ajax({
                    url: "{{ route('send.email') }}",
                    type: "POST",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success: function (data) {
                        console.log(data)
                        // if (data) {
                        //
                        // } else {
                        // }
                    }
                });
        });
    </script>
@endsection
