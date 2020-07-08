<style>
    .form-inline button{
        background: #ffc71f;
        border-color: #a88734 #9c7e31 #846a29;
    }
</style>

<form class="form-inline" action="{{ route('carts.store') }}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="button" class="btn btn-warning" onclick="addToCart({{ $product->id }})"><i class="fa fa-plus"></i> Add to cart</button>
</form>