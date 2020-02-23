@extends('layouts.app')
@section('title', 'Sell With Us')

@section('content')

<section id="seller-page">
    <div class="container-fluid p-0">
        <div class="seller-banner">
            <a href="{{route('sell.index')}}"><figure style="max-height:100%!important"><img src="{{asset('images/sellerpage/Become-a-seller-front-banne.jpg')}}" alt=""></figure></a>
        </div>
    </div>
    <div class="container">
        <div class="heading pb-3 mb-3 ">
            <h2 class="font-weight-bold">
                Reasons to join SmartBazaar
            </h2>
        </div>
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="seller-cat">
                    <figure><img src="{{asset('images/sellerpage/commission.png')}}" alt=""></figure>
                    <div class="info">
                        <div class="heading">
                            <h3>No commission</h3>
                        </div>
                        <p class="text-muted">for the first year  of  joining.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="seller-cat">
                    <figure><img src="{{asset('images/sellerpage/grow.png')}}" alt=""></figure>
                    <div class="info">
                        <div class="heading">
                            <h3>Grow Your Business</h3>
                        </div>
                        <p class="text-muted">by boosting your sales, profit.</p>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="seller-cat">
                    <figure><img src="{{asset('images/sellerpage/service.png')}}" alt=""></figure>
                    <div class="info">
                        <div class="heading">
                            <h3>merchant service</h3>
                        </div>
                        <p class="text-muted"> to help you upload your products.</p>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="seller-cat">
                    <figure><img src="{{asset('images/sellerpage/delivery.png')}}" alt=""></figure>
                    <div class="info">
                        <div class="heading">
                            <h3>free delivery</h3>
                        </div>
                        <p class="text-muted"> from your shop to customer’s house.</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <div class="heading py-3">
                <h2 class="font-weight-bold">
                  Benefits
                </h2>
            </div>
            <div class="benefits">
                <ul>
                    <li><span>Digital presence:</span> Stay open online 24x7, 365 days a year: Customers can purchase your products at any time even when your shop is closed.  A new way for you to showcase your online presence without having your own website that also allows you to sell your products.
                    </li>
                    <li><span>Increase  Sales & Profit:</span> Increase customer reach and sales by catering your products to large customer segment and not just regular and nearby customers that will multiply your profit.
                    </li>
                    <li><span> Effective Online sales platform:</span> The trend of online shops is increasing day by day. The facilities in our app/website is the most effective solution in Nepal. Thousands of customers using our application/website will have access to details of your shops such as address, map location, phone number, type of products you sell, product display along with special deals posted from your store.
                    </li>
                    <li><span>Competitive Edge: </span> To stay ahead in the competition, online presence is a must in today’s market. Become a member of elite network and get competitive edge over shops that are not in our network.
                    </li>
                    <li><span>Effective Advertising & Marketing:</span> Post deals, discounts anytime on your own and reach out to thousands of customers that is more effective and economic than posting ads in newspapers, radio, television etc.
                    </li>
                    <li><span>Strengthen Brand: </span> Establish and strengthen your brand by showcasing your products attractively through our website & app that will make your shop popular among thousands within short span of time.
                    </li>

                  </ul>
               

            </div>
            </div>
            <!--<div class="col-md-4">-->
            <!--    <div class="side-banner pt-md-5">-->
            <!--        <a href=""><figure><img src="{{asset('images/sellerpage/nocommission.png')}}" alt=""></figure></a>-->
            <!--    </div>-->
            <!--    <div class="side-banner pt-md-5">-->
            <!--        <a href=""><figure><img src="{{asset('images/sellerpage/not sure.png')}}" alt=""></figure></a>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        
    </div>
    <div class="container member">
        <div class="heading py-3">
                <h2 class="font-weight-bold">
                  Membership Packages
                </h2>
            </div>
       
        <div class="row member-row">
            <div class="col-md-6 col-sm-6 d-flex">
            <div class="col member-row-type pl-0">
                <span style="    color: #cd3331;
                                    font-weight: bold;">
                    Membership Type
                    </span>
                <p>Standard Membership</p>
                <p>Exclusive Membership</p>
            </div>

            <div class="col member-row-price">
                <span style="    color: #cd3331;
                                font-weight: bold;">
                    Price
                    </span>
                <p>Rs 2000 yearly</p>
                <p>Rs 5000 yearly</p>
            </div>
</div>
            <div class="col-md-6 col-sm-6 member-row-benefits">
                <span style="    color: #cd3331;
    font-weight: bold;">Benefits</span>
                <ul>
                <li>Standard Benefits. Free extension of membership for 3 months</li>
                <li>Featured on Homepage</li>
                <li>Recommended by Smartbazaar Stamp on all products</li>
                <li>Sends deal to customers</li>
                <li>FREE 100 product photograph service</li>
                <li>FREE 500 Co-branded visiting cards</li>
                <li>FREE extension of membership for 3 months</li>
            </ul>
            </div>



        </div>
        
    </div>
      <div class="container banner ">
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-12 pt-3 text-center">
                 <div class="button-seller  w-50 mx-auto ">
                    <a href="{{route('sell.index')}}" class="d-block p-2">
                        <img src="{{asset('images/sellerpage/seller.png')}}" alt="">
                    </a>
                </div>
                <!--<img src="../images/seller.png" class="seller">-->
                <img src="{{asset('images/sellerpage/starting.png')}}" class="start mb-5 w-75 text-center">
            </div>
            <div class="col-md-6  col-sm-12 d-flex justify-content-center align-self-center">
                <img src="{{asset('images/sellerpage/notsure.png')}}" class="notsure p-sm-5 p-2 w-75 mb-5 ">
            </div>

        </div>
    </div>
</section>
@endsection