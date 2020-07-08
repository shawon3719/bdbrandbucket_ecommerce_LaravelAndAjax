<style>
    .inner{
        overflow: hidden;
    }
    .inner img{
        transition: all 1.5s ease;
    }
    .inner:hover img{
        transform: scale(1.5);
    }
    .card{
        alignment: center;
    }
    .con .fa{
        color: #272e35;
    }
    .card-text{
        color: #f57224!important;
        font-family: Arial,sans-serif;;
    }
</style>
<div class="row">

    @foreach ($products as $product)

        <div class="col-md-4">
            <div class="card shadow mt-2">
                <div class="inner">
                {{-- <img class="card-img-top feature-img" src="{{ asset('images/products/'. 'galaxy.png') }}" alt="Card image" > --}}
                @php $i = 1; @endphp

                @foreach ($product->images as $image)
                    @if ($i > 0)
                        <a href="{!! route('products.show', $product->slug) !!}">
                        <img class="card-img-top feature-img" src="{{ asset('images/products/'. $image->image) }}" alt="{{$product->title}}" >
                        </a>
                    @endif

                    @php $i--; @endphp
                @endforeach
                </div>

                <div class="card-body text-center">
                    <div class="con">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <h4 class="card-title">
                        <a href="{!! route('products.show', $product->slug) !!}">{{ $product->title }}</a>
                    </h4>
                    <p class="card-text">Taka - {{ $product->price }}</p>
                    <div class="btn-add ml-4">
                    @include('frontend.pages.product.partials.cart-button')
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</div>
<div class="mt-4 pagination">
    {{$products->links()}}
</div>