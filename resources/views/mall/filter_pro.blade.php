@foreach($products as $value)

    <article class="product instock sale purchasable">
        <div class="product-wrap">
            <div class="product-top">
                <figure>
                    <a href="">
                        <div class="product-image">
                            <img width="320" height="320"
                                 src="{{$value->getImageAttribute()->mediumUrl}}"
                                 class="attachment-shop_catalog size-shop_catalog"
                                 alt="">
                        </div>
                    </a>
                </figure>
            </div>
            <div class="product-description">
                <div class="product-meta">
                    <div class="title-wrap">
                        <p class="product-title">
                            <a href="singlepage.html">{{$value->name}}</a>
                        </p>
                    </div>
                </div>
                <div class="product-meta-container">
                    <div class="product-price-container">
                                <span class="price">

                                        <span class="Price-amount discount">
                                            <span class="Price-currencySymbol">Rs</span>{{$value->product_price}}
                                        </span>


                                        <span class="Price-amount amount">
                                            <span class="Price-currencySymbol">Rs</span>{{$value->sale_price}}</span>

                                </span>
                        <div class="save-upto">
                            <span>save upto 40%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endforeach
