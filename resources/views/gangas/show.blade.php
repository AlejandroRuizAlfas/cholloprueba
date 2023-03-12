@extends('plantilla')
@section('titulo', 'Informació Ganga')
@section('contenido')

<main class="container">

    <!-- Left Column / Headphones Image -->
    <div class="left-column">
        <img data-image="red" class="active" src="{{ Storage::url('img/'.$ganga->url)  }}" alt="">
    </div>


    <!-- Right Column -->
    <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
            <span>Categoria {{ $ganga->categoryObj->name }}</span>
            <h1 class="title-text">{{ $ganga->title }}</h1>
            <p>{{ $ganga->description }}</p>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">

            <!-- Product Color -->
            <div class="product-color">
                <span>Valoracions</span>

                <div class="color-choose">
                    <div class="counter">
                        <button class="like"><i class="fa fa-thumbs-up"></i></button>
                        <span class="like-count">{{ $ganga->likes }}</span>
                        <button class="dislike"><i class="fa fa-thumbs-down"></i></button>
                        <span class="dislike-count">{{ $ganga->unlikes }}</span>
                    </div>
                </div>

            </div>

            <!-- Cable Configuration -->
            <div class="cable-config">
                <a href="#" style="font-size:medium">Vendido por {{ $ganga->user->name }}</a>
            </div>
        </div>

        <!-- Product Pricing -->
        <div class="product-price">
            <span>{{ $ganga->price_sale }}€</span><span><del>{{ $ganga->price }}€</del></span>
            @if(Auth::user()->id === $ganga->user_id)
            <a href="{{  route('gangas.edit', $ganga->id) }}" class="cart-btn" style="background-color: orange">Editar</a>
            <a href="{{  route('gangas.destroy', $ganga->id) }}" class="cart-btn" style="background-color: #C91524">Borrar</a>
            @endif
            <a href="#" class="cart-btn">Comprar</a>
        </div>
    </div>
</main>

<!-- <div class="bg-white p-6 rounded-lg">
    <h1 class="text-xl font-medium mb-2">{{ $ganga->title }}</h1>
    <div class="mb-4">
        <span class="text-gray-600">{{ $ganga->category }}</span>
    </div>
    <p class="text-gray-600">{{ $ganga->description }}</p>
    <div class="my-4">
        <a href="{{ $ganga->url }}" class="btn bg-blue-500 text-white">View on website</a>
    </div>
    <div class="flex items-center my-4">
        <span class="text-lg font-medium mr-2">Price:</span>
        <span class="text-gray-600">{{ $ganga->price }}</span>
    </div>
    <div class="flex items-center">
        <span class="text-lg font-medium mr-2">Sale Price:</span>
        <span class="text-gray-600">{{ $ganga->price_sale }}</span>
    </div>
    <div class="my-4">
        <span class="text-lg font-medium mr-2">Availability:</span>
        <span class="text-gray-600">{{ $ganga->available }}</span>
    </div>
    <div class="my-4">
        <span class="text-lg font-medium mr-2">User:</span>
        <span class="text-gray-600">{{ $ganga->user_id }}</span>
    </div>
    <div class="my-4">
        <span class="text-lg font-medium mr-2">Likes:</span>
        <span class="text-gray-600">{{ $ganga->likes }}</span>
    </div>
    <div class="my-4">
        <span class="text-lg font-medium mr-2">Unlikes:</span>
        <span class="text-gray-600">{{ $ganga->unlikes }}</span>
    </div>
</div> -->
<style>
    /* Basic Styling */
    html,
    body {
        height: 100%;
        width: 100%;
        margin: 0;
        font-family: 'Roboto', sans-serif;
    }

    .cart-btn {
        margin-right: 10px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 15px;
        display: flex;
        margin-bottom: 100px;
    }

    /* Columns */
    .left-column {
        width: 65%;
        position: relative;
    }

    .right-column {
        width: 35%;
        margin-top: 60px;
    }


    /* Left Column */
    .left-column img {
        width: 100%;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .left-column img.active {
        opacity: 1;
        width: 512px;
        height: 512px;
        margin: 50px;
        margin-bottom: 100px;
    }


    /* Right Column */

    /* Product Description */
    .product-description {
        border-bottom: 1px solid #E1E8EE;
        margin-bottom: 20px;
    }

    .product-description span {
        font-size: 12px;
        color: #358ED7;
        letter-spacing: 1px;
        text-transform: uppercase;
        text-decoration: none;
    }

    .product-description h1 {
        font-weight: 300;
        font-size: 52px;
        color: #43484D;
        letter-spacing: -2px;
    }

    .product-description p {
        font-size: 16px;
        font-weight: 300;
        color: #86939E;
        line-height: 24px;
    }

    /* Product Configuration */
    .product-color span,
    .cable-config span {
        font-size: 14px;
        font-weight: 400;
        color: #86939E;
        margin-bottom: 20px;
        display: inline-block;
    }

    /* Product Color */
    .product-color {
        margin-bottom: 30px;
    }

    .color-choose div {
        display: inline-block;
    }

    .color-choose input[type="radio"] {
        display: none;
    }

    .color-choose input[type="radio"]+label span {
        display: inline-block;
        width: 40px;
        height: 40px;
        margin: -1px 4px 0 0;
        vertical-align: middle;
        cursor: pointer;
        border-radius: 50%;
    }

    .color-choose input[type="radio"]+label span {
        border: 2px solid #FFFFFF;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
    }

    .color-choose input[type="radio"]#red+label span {
        background-color: #C91524;
    }

    .color-choose input[type="radio"]#blue+label span {
        background-color: #314780;
    }

    .color-choose input[type="radio"]#black+label span {
        background-color: #323232;
    }

    .color-choose input[type="radio"]:checked+label span {
        background-image: url(images/check-icn.svg);
        background-repeat: no-repeat;
        background-position: center;
    }

    /* Cable Configuration */
    .cable-choose {
        margin-bottom: 20px;
    }

    .cable-choose button {
        border: 2px solid #E1E8EE;
        border-radius: 6px;
        padding: 13px 20px;
        font-size: 14px;
        color: #5E6977;
        background-color: #fff;
        cursor: pointer;
        transition: all .5s;
    }

    .cable-choose button:hover,
    .cable-choose button:active,
    .cable-choose button:focus {
        border: 2px solid #86939E;
        outline: none;
    }

    .cable-config {
        border-bottom: 1px solid #E1E8EE;
        margin-bottom: 20px;
    }

    .cable-config a {
        color: #358ED7;
        text-decoration: none;
        font-size: 12px;
        position: relative;
        margin: 10px 0;
        display: inline-block;
    }

    .cable-config a:before {
        content: "?";
        height: 15px;
        width: 15px;
        border-radius: 50%;
        border: 2px solid rgba(53, 142, 215, 0.5);
        display: inline-block;
        text-align: center;
        line-height: 16px;
        opacity: 0.5;
        margin-right: 5px;
    }

    /* Product Price */
    .product-price {
        display: flex;
        align-items: center;
    }

    .product-price span {
        font-size: 26px;
        font-weight: 300;
        color: #43474D;
        margin-right: 20px;
    }

    .cart-btn {
        display: inline-block;
        background-color: #7DC855;
        border-radius: 6px;
        font-size: 16px;
        color: #FFFFFF;
        text-decoration: none;
        padding: 12px 30px;
        transition: all .5s;
    }

    .cart-btn:hover {
        background-color: #64af3d;
    }

    /* Responsive */
    @media (max-width: 940px) {
        .container {
            flex-direction: column;
            margin-top: 60px;
        }

        .left-column,
        .right-column {
            width: 100%;
        }

        .left-column img {
            width: 300px;
            right: 0;
            top: -65px;
            left: initial;
        }
    }

    @media (max-width: 535px) {
        .left-column img {
            width: 220px;
            top: -85px;
        }
    }

    .counter {
        display: flex;
        align-items: center;
    }

    .like-count,
    .dislike-count {
        margin: 0 10px;
    }

    .title-text {
        line-height: 1.1em;
        margin-bottom: 50px;
    }
</style>
@endsection