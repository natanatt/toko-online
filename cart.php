@extends('layouts.app')

@section('content')

    <h1 style="margin-bottom:20px;">
        My Cart
    </h1>

    @php
        $total = 0;
    @endphp

    @foreach($carts as $cart)

        @php
            $subtotal =
                $cart->product->price * $cart->quantity;

            $total += $subtotal;
        @endphp

        <div class="card" style="
                    margin-bottom:20px;
                    display:flex;
                    gap:20px;
                 ">

            <img src="{{ asset('storage/' . $cart->product->image) }}" width="150" style="
                        border-radius:10px;
                        object-fit:cover;
                    ">

            <div>

                <h2>
                    {{ $cart->product->name }}
                </h2>

                <div class="price">
                    Rp {{ number_format($cart->product->price) }}
                </div>

                <p>
                    Stock :
                    {{ $cart->product->stock }}
                </p>

                <div style="
                        display:flex;
                        align-items:center;
                        gap:10px;
                        margin-top:10px;
                    ">

                    {{-- MINUS --}}
                    <form action="/cart/remove/{{ $cart->id }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-danger">
                            -
                        </button>
                    </form>

                    <strong>
                        {{ $cart->quantity }}
                    </strong>

                    {{-- PLUS --}}
                    <form action="/cart/add/{{ $cart->product->id }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-primary">
                            +
                        </button>
                    </form>

                </div>

                <p style="margin-top:10px;">

                    Subtotal :
                    Rp {{ number_format($subtotal) }}

                </p>

            </div>

        </div>

    @endforeach

    <div class="card">

        <h2>
            Total :
            Rp {{ number_format($total) }}
        </h2>

    </div>

@endsection