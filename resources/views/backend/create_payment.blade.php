@extends('layouts.master')

@section('content')
   <div class="container">
   <div class="card">
  <h5 class="card-header">Rayzor Payment Gateway</h5>
  <div class="card-body">
  <div class="panel panel-default">
        <div class="panel-body">
            <h1 class="text-3xl md:text-5xl font-extrabold text-center uppercase mb-12 bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent transform -rotate-2"> </h1>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <center>
                <form action="{{route('payment_transaction')}}" method="POST" >
                    @csrf 
                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ env('RAZORPAY_API_KEY') }}"
                            data-amount="100"
                            data-buttontext="Pay 10 INR"
                            data-name="Gowtham Sakthi"
                            data-description="A demo razorpay payment"
                            data-image="{{asset('img/service-icon-9.png')}}"
                            data-prefill.name="Gowtham Sakthi"
                            data-prefill.email="gowthamsakthi2520@gmail.com"
                            data-theme.color="#ff7529">
                    </script>
                </form>
            </center>
        </div>
    </div>
  </div>
</div>

   </div>
@endsection
