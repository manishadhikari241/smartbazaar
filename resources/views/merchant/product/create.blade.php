@extends('merchant.layouts.app')
@section('title',"Add Product")

@section('content')
    <style>
        .uk-radio {
            margin: 0 !important;
            margin-right: 10px !important;
        }

        .uk-radio:focus {
            outline: none !important;
        }
    </style>

    @include('partials.message-success')
    @include('partials.message-error')

    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $e)
                    <li> {{ $e }}</li>
                @endforeach
            </ul>

        </div>
    @endif
    <section class="content__box content__box--shadow">
        <div class="  details-of-orders">
            <span class="title">add products</span>
            <button class="btn btn-default pull-right">add new</button>
            <div class="clearfix"></div>
        </div>
    </section>
    <form class="uk-form-horizontal uk-margin-large" action="{{route('vendor.products.store')}}" method="post"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="existing" value="{{ isset($existing) ? $existing->id  : '' }}">
        <section class="content__box content__box--shadow">
            <div class="row">
                <div class="col-md-12">
                    <section class="add-product__form--left">
                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#simple" aria-controls="simple"
                                                                          role="tab"
                                                                          data-toggle="tab">Basic Product
                                        Information</a></li>
                                <li role="presentation"><a href="#category" aria-controls="simple"
                                                           role="tab"
                                                           data-toggle="tab">Select Category</a></li>
                                <li role="presentation"><a href="#pricing" aria-controls="pricing" role="tab"
                                                           data-toggle="tab">Product Attributes</a></li>
                                <li role="presentation"><a href="#images" aria-controls="pricing" role="tab"
                                                           data-toggle="tab">Publish</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane " id="category">
                                    <style>
                                        ul.parent-list li:hover > ul {
                                            display: block !important;
                                        }

                                        input.product--hidden-category {
                                            border: none;
                                            /* display: inline-block; */
                                            font-size: 24px;
                                            font-weight: 500;
                                            color: #d8011f !important;
                                        }

                                        .all-menus ul li.parent {
                                            position: relative;
                                            border-bottom: 1px solid #ccc;
                                            font-size: 15px;
                                            padding: 5px 20px;
                                        }

                                        .all-menus ul > li > ul {
                                            width: 200px;
                                            position: absolute;
                                            left: 100%;
                                            top: 0;
                                            display: none;
                                            z-index: 999;
                                            padding: 0;
                                            margin: 0;
                                        }

                                        .all-menus {
                                            padding: 0 !important;
                                        }

                                        .all-menus ul.parent-list {
                                            list-style: none;
                                            margin: 0;
                                            padding: 0;
                                        }

                                        .all-menus ul > li > ul > li {
                                            font-size: 13px;
                                            padding: 5px 20px;
                                            border-bottom: 1px solid #ccc;
                                        }
                                    </style>

                                    <section>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <h3>All Menus</h3>
                                                <hr>
                                                <div class="content__box content__box--shadow all-menus">

                                                    <ul class="parent-list">
                                                        @foreach($categorys as $category)

                                                            <li class="parent">
                                                                <a href="javasacript::void(0)" class="category-product"
                                                                   data-category="{{$category->id}}"
                                                                   data-name="{{$category->name}}">{{$category->name}}</a>
                                                                @if($category->children)
                                                                    <ul style="list-style: none;"
                                                                        class="content__box--shadow">
                                                                        @foreach($category->children as $cat)
                                                                            <li style="position: relative;">
                                                                                <a href="javasacript::void(0)"
                                                                                   class="category-product"
                                                                                   data-category="{{$cat->id}}"
                                                                                   data-name="{{$cat->name}}">{{$cat->name}}</a>
                                                                                @if($cat->children )
                                                                                    <ul style="list-style: none;"
                                                                                        class="content__box--shadow">
                                                                                        @foreach($cat->children as $child )
                                                                                            <li style="position: relative;">
                                                                                                <a href="javasacript::void(0)"
                                                                                                   class="category-product"
                                                                                                   data-category="{{$child->id}}"
                                                                                                   data-name="{{$child->name}}">{{$child->name}}</a>
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @endif
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            @if(isset($existing))
                                                <div class="col-xs-9">
                                                    <h3>Your Selected Category: <span style="color: red"> <input
                                                                    type="text"
                                                                    value="{{ $existing->categories ? $existing->categories->first()->name : '' }}"
                                                                    id="category_name" class="product--hidden-category"
                                                                    readonly/></span></h3>

                                                    <hr>
                                                    <input type="hidden"
                                                           value="{{ $existing->categories ? $existing->categories->first()->id : '' }}"
                                                           id="category_id" name="category_id"/>
                                                </div>
                                            @else
                                                <div class="col-xs-9">
                                                    <h3 style="display:inline-block;">Your Selected Category is:</h3>
                                                    <input type="text" value="" id="category_name"
                                                           class="product--hidden-category" readonly/>
                                                    <hr>

                                                    <input type="hidden" value="" id="category_id" name="category_id"/>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            <section class="add-product__form--right">
                                                <div class=" uk-card uk-card-default uk-card-body uk-padding-small">
                                                    <div class="title">Brand</div>
                                                    <div class="simple__box">
                                                        <div class="checkbox" style="width: 100%">
                                                            <select class="js-example-basic-multiple select2"
                                                                    name="brand_id" style="width: 100%">
                                                                @foreach($brands as $brand)

                                                                    <option value="{{$brand->id}}"
                                                                            @if(isset($existing) && $existing->brand_id == $brand->id) selected @endif>{{$brand->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="add_more1">
                                                        <div class="form-group add_more-category display--none ">
                                                            <input type="text" class="form-control margin__bottom">
                                                            <select class="form-control margin__bottom ">
                                                                <option value="0" selected="selected">— Parent category
                                                                    —
                                                                </option>
                                                                <option class="level-0" value="23">Food</option>
                                                                <option class="level-1" value="27">&nbsp;&nbsp;&nbsp;sdfsdfsdf</option>
                                                                <option class="level-0" value="24">Travel</option>
                                                                <option class="level-0" value="26">Uncategorized
                                                                </option>
                                                            </select>
                                                            <button type="button" class="btn btn-primary ">Add</button>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                {{-- <div class="tag__box">
                                                    <div class="title" >tags</div>
                                                    <div class="tag--input">
                                                        <input type="text" value=""  name="tags" data-role="tagsinput" class="form-control"/>
                                                        <h6 class="help-block">write tags and press ',' to add it</h6>
                                                    </div>
                                                </div> --}}
                                            </section>
                                        </div>

                                    </section>

                                    <section class="col-md-12 content__box uk-margin-top">
                                        <div class="product--info">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#inventory">inventory</a>
                                                </li>
                                                <li><a data-toggle="tab" href="#specification">Specification</a></li>
                                                <li><a data-toggle="tab" href="#feature">Features</a></li>
                                                <li><a data-toggle="tab" href="#faqs">FAQS</a></li>
                                                <li><a data-toggle="tab" href="#seo">SEO</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="inventory" class="tab-pane fade in active">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">


                                                                <div class="form-group col-md-6 sale--inline">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">SKU</span>
                                                                        <input value="{{old('sku')}}" id="sku"
                                                                               type="text" class="form-control"
                                                                               name="sku"
                                                                               placeholder="Additional Info">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 sale--inline">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">TAX</span>
                                                                        <input id="sku" type="number"
                                                                               class="form-control" name="tax"
                                                                               placeholder="13"
                                                                               value="{{old('tax')}}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <label class="col-sm-3 col-md-3 control-label"
                                                                       for="qty">Delivery Time</label>
                                                                <div class="form-group col-md-4 sale--inline">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">From</span>
                                                                        <input id="from" type="number"
                                                                               class="form-control" name="from"
                                                                               placeholder="Minimun Day"
                                                                               value="{{old('from')}}">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-4 sale--inline">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">To</span>
                                                                        <input id="to" type="number"
                                                                               class="form-control" name="to"
                                                                               placeholder="Maximum"
                                                                               value="{{old('to')}}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group stock-qty pad-20">
                                                                <label class="col-sm-3 control-label" for="qty">Stock
                                                                    Qty</label>
                                                                <div class="col-sm-9">
                                                                    <input min="0" class="form-control"
                                                                           name="stock_quantity" type="number"
                                                                           value="{{old('stock_quantity')}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group pad-20">
                                                                <label class="col-sm-3 control-label"
                                                                       for="stock_availability_status">Stock
                                                                    Availability</label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control" name="stock">
                                                                        <option value="1"
                                                                                @if(old('stock') == 1) checked @endif>In
                                                                            Stock
                                                                        </option>
                                                                        <option value="0"
                                                                                @if(old('stock') == 0) checked @endif >
                                                                            Out of Stock
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="specification" class="tab-pane fade">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-bordered table-specifications">
                                                                <thead>
                                                                <tr>
                                                                    <th>SN</th>
                                                                    <th>Title</th>
                                                                    <th>Description</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @if(isset($existing->specifications))
                                                                    @foreach($existing->specifications as $specification)
                                                                        <tr data-row="{{ $loop->iteration }}">
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <input type="text"
                                                                                           name="specifications[title][{{ $specification->id }}]"
                                                                                           value="{{ $specification->title }}"
                                                                                           class="form-control"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <input type="text"
                                                                                           name="specifications[description][{{ $specification->id }}]"
                                                                                           value="{{ $specification->description }}"
                                                                                           class="form-control"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <a href="javascript:void(0)"
                                                                                   class="btn btn-danger btn-xs btn-delete-specification"
                                                                                   data-specification="{{ $specification->id }}"><i
                                                                                            class="fa fa-trash"></i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th>
                                                                        <button class="btn btn-danger btn-sm btn-add-specification">
                                                                            Add New
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="feature" class="tab-pane fade">
                                                    <h3>Product Feature</h3>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-bordered table-features">
                                                                <thead>
                                                                <tr>
                                                                    <th>SN</th>
                                                                    <th>Features</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @if(isset($existing->features))
                                                                    @foreach($existing->features as $feature)
                                                                        <tr data-row="{{ $loop->iteration }}">
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <input type="text"
                                                                                           name="features[feature][{{ $feature->id }}]"
                                                                                           value="{{ $feature->feature }}"
                                                                                           class="form-control"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-delete-feature"
                                                                                        data-specification="{{ $feature->id }}">
                                                                                    <i
                                                                                            class="fa fa-trash"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th>
                                                                        <button class="btn btn-danger btn-sm btn-add-feature">
                                                                            Add New
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="faqs" class="tab-pane fade">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-bordered table-faqs">
                                                                <thead>
                                                                <tr>
                                                                    <th>SN</th>
                                                                    <th>Question</th>
                                                                    <th>Answer</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @if(isset($existing->faqs))
                                                                    @foreach($existing->faqs as $faq)
                                                                        <tr data-row="{{ $loop->iteration }}">
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <input type="text"
                                                                                           name="faqs[question][{{ $faq->id }}]"
                                                                                           value="{{ $faq->title }}"
                                                                                           class="form-control"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <input type="text"
                                                                                           name="faqs[answer][{{ $faq->id }}]"
                                                                                           value="{{ $faq->description }}"
                                                                                           class="form-control"
                                                                                           required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-delete-faq"
                                                                                        data-faq="{{ $faq->id }}"><i
                                                                                            class="fa fa-trash"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th>
                                                                        <button class="btn btn-danger btn-sm btn-add-faq">
                                                                            Add New
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="seo" class="tab-pane fade">
                                                    <h3>Meta Keywords</h3>
                                                    <div class="tag--input">
                                                        <textarea value="{{old('meta_keyword')}}" data-role="tagsinput"
                                                                  class="form-control"
                                                                  style="width: 100%;" name="meta_keyword"></textarea>
                                                        <h6 class="help-block">write tags and press ',' to add it</h6>
                                                    </div>
                                                    <h3>Meta Content</h3>
                                                    <div class="uk-margin">
                                                        <textarea class="uk-textarea" name="meta_description" rows="5"
                                                                  placeholder="textarea for meta description">{{old('meta_description')}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div role="tabpanel" class="tab-pane active" id="simple">
                                    <section class="simple__box">
                                        <div class="row">
                                            <div class="form-group col-md-7">
                                                <input type="text" class="form-control" name="name"
                                                       placeholder="Product title"
                                                       value="{{old('name')? old('name') : isset($existing) ? $existing->name : ''}}">
                                            </div>
                                            <!--<div class="col-md-5">-->
                                            <!--    <input type="number" name="commission" min="0" class="form-control"-->
                                            <!--           placeholder="Enter Owner Commission for this product"-->
                                            <!--           value="{{old('commission')}}">-->
                                            <!--</div>-->
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 sale--inline">
                                                <label class="uk-form-label" for="form-horizontal-text">Price</label>
                                                <div class="uk-form-controls">
                                                    <div class="uk-inline">
                                                        <span class="uk-form-icon">Rs</span>
                                                        <input id="msg" class="uk-input" type="text"
                                                               name="product_price"
                                                               value="{{old('product_price') ? old('product_price') :isset($existing) ? $existing->product_price : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 sale--inline">
                                                <label class="uk-form-label" for="form-horizontal-text">Sale
                                                    Price</label>
                                                <div class="uk-form-controls">
                                                    <div class="uk-inline">
                                                        <span class="uk-form-icon">Rs</span>
                                                        <input id="msg" class="uk-input" type="text" name="sale_price"
                                                               value="{{old('sale_price') ?old('sale_price'):  isset($existing) ? $existing->sale_price : '' }}">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group col-md-6 sale--inline">
                                                <label class="uk-form-label" for="form-horizontal-text">Sale Price</label>

                                                @include('merchant.product.images')
                                            </div>

                                        </div>
                                        {{--&nbsp;<span uk-icon="info" uk-tooltip="title:dfsfdsafdafdsfsd dsfsdfds dfsd fsd; delay: 500;pos:right"></span>--}}
                                        <div class="title">Negotiable</div>
                                        <div class="row">
                                            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid sale--inline">
                                                <label>
                                                    <input class="uk-radio" type="radio" name="negotiable" value="1"
                                                           @if(old('negotiable') == 1) checked @endif >Available
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="negotiable" value="0"
                                                           @if(old('negotiable') == 0) checked @endif >Unavailable
                                                </label>
                                            </div>
                                        </div>
                                        @if(\App\User::where('id',\Illuminate\Support\Facades\Auth::user()->id)->wherehas('roles',function ($query){
                               $query->where('roles.id',7);
                               })->first()!=null)
                                            <div class="title">Super Store</div>
                                            <div class="row">
                                                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid sale--inline">
                                                    <label>
                                                        <input class="uk-radio" type="radio" name="super_store_status"
                                                               value="1">Available
                                                    </label>
                                                    <label>
                                                        <input class="uk-radio" type="radio" name="super_store_status"
                                                               value="0"
                                                               checked>Unavailable
                                                    </label>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="title">Product Quality</div>
                                        <div class="row">
                                            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid sale--inline">
                                                <label>
                                                    <input class="uk-radio" type="radio" name="quality"
                                                           value="Genuine Product" checked>Genuine Product
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="quality"
                                                           value="Quality Assurence">Quality Assurence
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="quality"
                                                           value="Clone Product">Clone Product
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="quality"
                                                           value="Standard Product">Standard Product
                                                </label>
                                            </div>
                                        </div>
                                        <section class="description">
                                            <div class="title">Privacy Policy</div>
                                            <div class="uk-margin">
                                                <textarea class="uk-textarea" name="short_description" rows="5"
                                                          placeholder="textarea for privacy policy">{{old('short_description')?old('short_description'):isset($existing) ? $existing->long_description : '' }}</textarea>
                                            </div>
                                        </section>
                                        <section class="description">
                                            <div class="title">long description</div>
                                            <textarea class="longdescrip"
                                                      name="long_description">{{old('long_description')?old('long_description'):isset($existing) ? $existing->long_description : '' }}</textarea>

                                        </section>


                                    </section>

                                </div>

                                <div role="tabpanel" class="tab-pane" id="pricing">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="color">Color</label>
                                                <input type="text" name="color" class="form-control"
                                                       placeholder="Type your item color (e.g. white)">
                                            </div>
                                            <table class="table table-bordered table-colors">
                                                <thead>
                                                <tr style="background: #d8011f;color: #FFF;">
                                                    <th>SN</th>
                                                    <th>Quantity</th>
                                                    <th>Size</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                <tr style="color: #ccc;">
                                                    <th>Example</th>
                                                    <th>eg.2</th>
                                                    <th>eg.XL</th>
                                                    <th>
                                                        <a href="javascript:void(0)"
                                                           class="btn btn-danger btn-sm btn-add-color">Add New</a>
                                                    </th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="images">


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="publish">Publish Product</label>
                                            <select class="form-control" name="status" id="publish">
                                                <option value="published"
                                                        @if(old('status') == 'published') selected @endif>Publish
                                                </option>
                                                <option value="unpublished"
                                                        @if(old('status') == 'unpublished') selected @endif>Unpublish
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <section class="content__box submit__box pull-right">
                                        <button type="submit" class="uk-button uk-button-primary">submit</button>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </section>
        {{--<section class="content__box submit__box">--}}
        {{--<button type="submit" class="uk-button uk-button-primary">submit</button>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</section>--}}
    </form>
@endsection
{{-- for_additional_scripts | only for this page --}}
@push('scripts')

    <script>
        $(document).on("click", ".category-product", function (e) {
            e.preventDefault();
            var $this = $(this);
            document.getElementById("category_id").value = $this.attr('data-category');
            document.getElementById("category_name").value = $this.attr('data-name');

        });

        /**
         * Generate random integer
         *
         * @returns {number}
         */
        function generateRandomInteger() {
            return Math.floor(Math.random() * 90000) + 10000;
        }


        jQuery(document).on('click', '.btn-delete-specification', function (e) {
            e.preventDefault();
            var $this = $(this);
            $this.closest("tr").remove();
        });
        jQuery(document).on('click', '.btn-add-specification', function (e) {
            e.preventDefault();
            console.log('tgd');
            var lastRow = $('table.table-specifications > tbody > tr').last().attr('data-row');
            var counter = lastRow ? parseInt(lastRow) + 1 : 1;
            var randomInteger = generateRandomInteger();
            var newRow = jQuery('<tr data-row="' + counter + '">' +
                '<td>' + counter + '</td>' +
                '<td><input type="text" name="specifications[title][' + randomInteger + ']" class="form-control" required/></td>' +
                '<td><input type="text" name="specifications[description][' + randomInteger + ']" class="form-control" required/></td>' +
                '<td><button type="button" class="btn btn-danger btn-xs btn-delete-specification" data-specification=""><i class="fa fa-trash"></i></button></td>' +
                '</tr>');
            jQuery('table.table-specifications').append(newRow);
        });

        // Add feature
        /**
         * Generate random integer
         *
         * @returns {number}
         */
        function generateRandomInteger() {
            return Math.floor(Math.random() * 90000) + 10000;
        }

        jQuery(document).on('click', '.btn-delete-feature', function (e) {
            e.preventDefault();
            var $this = $(this);
            $this.closest("tr").remove();
        });
        jQuery(document).on('click', '.btn-add-feature', function (e) {
            e.preventDefault();
            console.log('tgd');
            var lastRow = $('table.table-features > tbody > tr').last().attr('data-row');
            var counter = lastRow ? parseInt(lastRow) + 1 : 1;
            var randomInteger = generateRandomInteger();
            var newRow = jQuery('<tr data-row="' + counter + '">' +
                '<td>' + counter + '</td>' +
                '<td><input type="text" name="features[feature][' + randomInteger + ']" class="form-control" required/></td>' +
                '<td><button type="button" class="btn btn-danger btn-xs btn-delete-feature" data-feature=""><i class="fa fa-trash"></i></button></td>' +
                '</tr>');
            jQuery('table.table-features').append(newRow);
        });


        // Add FAQS
        /**
         * Generate random integer
         *
         * @returns {number}
         */
        function generateRandomInteger() {
            return Math.floor(Math.random() * 90000) + 10000;
        }

        jQuery(document).on('click', '.btn-delete-faq', function (e) {
            e.preventDefault();
            var $this = $(this);
            $this.closest("tr").remove();
        });
        jQuery(document).on('click', '.btn-add-faq', function (e) {
            e.preventDefault();
            console.log('tgd');
            var lastRow = $('table.table-faqs > tbody > tr').last().attr('data-row');
            var counter = lastRow ? parseInt(lastRow) + 1 : 1;
            var randomInteger = generateRandomInteger();
            var newRow = jQuery('<tr data-row="' + counter + '">' +
                '<td>' + counter + '</td>' +
                '<td><input type="text" name="faqs[question][' + randomInteger + ']" class="form-control" required/></td>' +
                '<td><input type="text" name="faqs[answer][' + randomInteger + ']" class="form-control" required/></td>' +
                '<td><button type="button" class="btn btn-danger btn-xs btn-delete-faq" data-faq=""><i class="fa fa-trash"></i></button></td>' +
                '</tr>');
            jQuery('table.table-faqs').append(newRow);
        });

        // Add Size
        /**
         * Generate random integer
         *
         * @returns {number}
         */
        function generateRandomInteger() {
            return Math.floor(Math.random() * 90000) + 10000;
        }

        //jQuery(document).on('click', '.btn-delete-size', function (e) {
        //e.preventDefault();
        //var $this = $(this);
        //$this.closest("tr").remove();
        //});
        //jQuery(document).on('click', '.btn-add-size', function (e) {
        //e.preventDefault();
        //console.log('tgd');
        //var lastRow = $('table.table-sizes > tbody > tr').last().attr('data-row');
        //var counter = lastRow ? parseInt(lastRow) + 1 : 1;
        //var randomInteger = generateRandomInteger();
        //var newRow = jQuery('<tr data-row="' + counter + '">' +
        //    '<td>' + counter + '</td>' +
        //    '<td><input type="text" name="sizes[value][' + randomInteger + ']" class="form-control" required/></td>'  +
        //    '<td><button type="button" class="btn btn-danger btn-xs btn-delete-size" data-size=""><i class="fa fa-trash"></i></button></td>' +
        //'</tr>');
        //jQuery('table.table-sizes').append(newRow);
        //});

        // Add color
        /**
         * Generate random integer
         *
         * @returns {number}
         */
        function generateRandomInteger() {
            return Math.floor(Math.random() * 90000) + 10000;
        }

        jQuery(document).on('click', '.btn-delete-color', function (e) {
            e.preventDefault();
            var $this = $(this);
            $this.closest("tr").remove();
        });
        jQuery(document).on('click', '.btn-add-color', function (e) {
            e.preventDefault();
            console.log('tgd');
            var lastRow = $('table.table-colors > tbody > tr').last().attr('data-row');
            var counter = lastRow ? parseInt(lastRow) + 1 : 1;
            var randomInteger = generateRandomInteger();
            var newRow = jQuery('<tr data-row="' + counter + '">' +
                '<td>' + counter + '</td>' +
                '<td><input type="number" name="additionals[quantity][' + randomInteger + ']" class="form-control" required row="2"/></td>' +
                '<td><input type="text" name="additionals[size][' + randomInteger + ']" class="form-control" required/></td>' +
                '<td><button type="button" class="btn btn-danger btn-xs btn-delete-color" data-color=""><i class="fa fa-trash"></i></button></td>' +
                '</tr>');
            jQuery('table.table-colors').append(newRow);
        });


        jQuery(document).on('click', '.product-image-list .is_main_image_button', function (e) {
            e.preventDefault();

            jQuery('.product-image-list .is_main_image_button').removeClass('active');
            jQuery('.product-image-list .is_main_image_hidden_field').val(0);


            if (jQuery(this).hasClass('active')) {

                jQuery(this).removeClass('active');
                jQuery(this).parents('.image-preview:first').find('.is_main_image_hidden_field').val(0);
            } else {
                jQuery(this).addClass('active');
                jQuery(this).parents('.image-preview:first').find('.is_main_image_hidden_field').val(1);
            }

        });

        jQuery(document).on('click', '.product-image-list .image-preview .destroy-image', function (e) {

            var token = jQuery('.product-image-element').attr('data-token');
            var path = jQuery(e.target).parents('.image-preview:first').find('.img-tag').attr('data-path');
            var data = {_token: token, path: path};
            jQuery.ajax({
                url: '{{ url('vendors/product/image/delete') }}',
                data: data,
                dataType: 'json',
                type: 'post',
                success: function (response) {
                    if (response.success === true) {
                        jQuery(e.target).parents('.image-preview:first').remove();
                    }

                }
            });

        });

        jQuery('.product-image-element').change(function (e) {
            var files = e.target.files;

            if (files.length <= 0) {
                return;
            }

            var formData = new FormData();

            formData.append('_token', jQuery(e.target).attr('data-token'));
            for (var i = 0, file; file = files[i]; ++i) {
                formData.append('image', file);
            }

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ url('/vendors/product/image/upload') }}', true);
            xhr.onload = function (e) {
                if (this.status === 200) {
                    jQuery('.product-image-list').append(this.response);
                    if (jQuery('.product-image-list .image-preview').length === 1) {
                        jQuery('.product-image-list .image-preview .is_main_image_button').trigger('click');
                    }
                }
            };

            xhr.send(formData);

            jQuery(".product-image-element").val('');
        });
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush