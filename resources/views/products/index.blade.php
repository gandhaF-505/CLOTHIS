@extends('layouts.app')

@section('title', 'Products - Clothis')

@section('content')

<section class="product-page">

    <div class="container">

        <div class="product-heading">

            <span class="product-label">
                CLOTHIS COLLECTION
            </span>

            <h1>
                Choose Your Canvas.
            </h1>

            <p>
                Pilih produk yang ingin kamu custom
                dengan desainmu sendiri.
            </p>

        </div>


        <div class="row g-4">

            @foreach ($products as $product)

                <div class="col-lg-4 col-md-6">

                    <div class="catalog-card">

                        <div class="catalog-image">

                            <img
                                src="{{ asset('images/' . $product['image']) }}"
                                alt="{{ $product['name'] }}"
                            >

                            <span class="stock">
                                IN STOCK
                            </span>

                        </div>


                        <div class="catalog-content">

                            <div>

                                <h2>
                                    {{ $product['name'] }}
                                </h2>

                                <p>
                                    {{ $product['description'] }}
                                </p>

                            </div>
                            
                        <div class="catalog-bottom">

                                <div>

                                    <small>
                                        STARTING FROM
                                    </small>

                                    <strong>
                                        Rp. {{ $product['price'] }}
                                    </strong>

                                </div>


                                <a
                                    href="#"
                                    class="custom-button"
                                >
                                    Custom →
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endsection
