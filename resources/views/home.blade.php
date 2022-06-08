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
                    <a href="javascript:void(0)" id="send">Send Mail</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script>

        $(document).on('click', '#send', function () {
                $.ajax({
                    url: "{{ route('send.email') }}",
                    type: "POST",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success: function (data) {
                        console.log(data)
                        alert('success');
                        // if (data) {
                        //
                        // } else {
                        // }
                    }
                });
        });
    </script>
@endsection
