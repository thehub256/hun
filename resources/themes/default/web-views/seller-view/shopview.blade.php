@extends('layouts.front-end.app')

@section('title',translate('shop_Page'))

@push('css_or_js')

    @if($shopInfoArray['id'] != 0)
        <meta property="og:image" content="{{ $shopInfoArray['image_full_url']['path'] }}"/>
        <meta property="og:title" content="{{ $shopInfoArray['name']}} "/>
        <meta property="og:url" content="{{route('shopView',[$shopInfoArray['id']])}}">
    @else
        <meta property="og:image" content="{{$web_config['fav_icon']['path']}}"/>
        <meta property="og:title" content="{{ $shopInfoArray['name']}} "/>
        <meta property="og:url" content="{{route('shopView',[$shopInfoArray['id']])}}">
    @endif

    @if($shopInfoArray['id'] != 0)
        <meta property="twitter:card" content="{{$shopInfoArray['image_full_url']['path']}}"/>
        <meta property="twitter:title" content="{{route('shopView',[$shopInfoArray['id']])}}"/>
        <meta property="twitter:url" content="{{route('shopView',[$shopInfoArray['id']])}}">
    @else
        <meta property="twitter:card" content="{{$web_config['fav_icon']['path']}}"/>
        <meta property="twitter:title" content="{{route('shopView',[$shopInfoArray['id']])}}"/>
        <meta property="twitter:url" content="{{route('shopView',[$shopInfoArray['id']])}}">
    @endif

    <meta property="og:description"
          content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">
    <meta property="twitter:description"
          content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">
@endpush

@section('content')

    @php($decimalPointSettings = getWebConfig(name: 'decimal_point_settings'))

    <div class="container py-4 __inline-67">
        <div class="rtl">
            <div class="bg-white __shop-banner-main">
                @if($shopInfoArray['id'] != 0)
                    <img class="__shop-page-banner" alt=""
                         src="{{ getStorageImages(path: $shopInfoArray['banner_full_url'], type: 'wide-banner') }}">
                @else
                    @php($banner=getWebConfig(name: 'shop_banner'))
                    <img class="__shop-page-banner" alt=""
                         src="{{ getStorageImages(path: $banner, type: 'wide-banner') }}">
                @endif
                @include('web-views.seller-view.shop-info-card', ['displayClass' => 'd-none d-md-block max-width-500px'])

            </div>
        </div>

        @include('web-views.seller-view.shop-info-card', ['displayClass' => 'd-md-none border mt-3'])

        <div class="row align-items-center g-3 py-4">
            <div class="col-12 col-md-4">
                <div class="d-flex flex-wrap justify-content-between align-items-center w-max-md-100 me-auto gap-3">
                    <h3 class="widget-title align-self-center font-bold fs-16 my-0">{{translate('Filters')}}</h3>
                    <div
                        class="filter-ico-button btn btn--primary p-2 m-0 d-lg-none d-flex align-items-center filter-show-btn">
                        <i class="tio-filter"></i>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8">
                <div class="d-flex flex-column flex-sm-row justify-content-end gap-3 m-0">
                    <form>
                        <div class="sorting-item justify-content-between pe-2 d-none d-lg-flex">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                                     fill="none">
                                    <path d="M11.6667 7.80078L14.1667 5.30078L16.6667 7.80078" stroke="#D9D9D9"
                                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path
                                        d="M7.91675 4.46875H4.58341C4.3533 4.46875 4.16675 4.6553 4.16675 4.88542V8.21875C4.16675 8.44887 4.3533 8.63542 4.58341 8.63542H7.91675C8.14687 8.63542 8.33341 8.44887 8.33341 8.21875V4.88542C8.33341 4.6553 8.14687 4.46875 7.91675 4.46875Z"
                                        stroke="#D9D9D9" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M7.91675 11.9688H4.58341C4.3533 11.9688 4.16675 12.1553 4.16675 12.3854V15.7188C4.16675 15.9489 4.3533 16.1354 4.58341 16.1354H7.91675C8.14687 16.1354 8.33341 15.9489 8.33341 15.7188V12.3854C8.33341 12.1553 8.14687 11.9688 7.91675 11.9688Z"
                                        stroke="#D9D9D9" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M14.1667 5.30078V15.3008" stroke="#D9D9D9" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <label class="for-sorting" for="sorting">
                                    <span class="text-nowrap">{{translate('sort_by')}}</span>
                                </label>
                            </div>
                            <select class="product-list-filter-on-viewpage">
                                <option value="latest">{{translate('latest')}}</option>
                                <option
                                    value="low-high">{{translate('low_to_High_Price')}} </option>
                                <option
                                    value="high-low">{{translate('high_to_Low_Price')}}</option>
                                <option
                                    value="a-z">{{translate('A_to_Z_Order')}}</option>
                                <option
                                    value="z-a">{{translate('Z_to_A_Order')}}</option>
                            </select>
                        </div>
                    </form>

                    <form method="get" action="{{route('shopView', ['id' => $seller_id])}}">
                        <div class="search_form input-group search-form-input-group">
                            <input type="hidden" value="search" name="data_from">
                            <input type="search" class="form-control rounded-left text-align-direction"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="{{translate('search_products_from_this_store')}}">
                            <button type="submit" class="btn--primary btn">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row rtl">

            @include('web-views.seller-view.partials._shop-sidebar')

            <div class="col-lg-9 product-div">
                @if (count($products) > 0)
                    <div class="row g-3" id="ajax-products">
                        @include('web-views.products._ajax-products',['products'=>$products,'decimal_point_settings' => $decimalPointSettings])
                    </div>
                @else
                    <div class="d-flex justify-content-center align-items-center w-100 py-5 my-2">
                        <div>
                            <img src="{{ theme_asset(path: 'public/assets/front-end/img/media/product.svg') }}"
                                 class="img-fluid" alt="">
                            <h6 class="text-muted text-capitalize">{{ translate('no_product_found') }}</h6>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>

    <span id="shop-sort-by-filter-url" data-url="{{url('/')}}/shopView/{{$shopInfoArray['id']}}"></span>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-faded-info">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{translate('Send_Message_to_vendor')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('messages')}}" method="post" id="shop-view-chat-form">
                        @csrf
                        <input value="{{$shopInfoArray['id'] != 0 ? $shopInfoArray['id'] : 0}}" name="vendor_id" hidden>
                        <textarea name="message" class="form-control min-height-100px max-height-200px" required
                                  placeholder="{{ translate('Write_here') }}..."></textarea>
                        <br>
                        <div class="justify-content-end gap-2 d-flex flex-wrap">
                            <a href="{{route('chat', ['type' => 'vendor'])}}"
                               class="btn btn-soft-primary bg--secondary border">
                                {{translate('go_to_chatbox')}}
                            </a>
                            <button class="btn btn--primary text-white">
                                {{translate('send')}}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <span id="products-search-data-backup"
          data-url="{{ route('shopView',['id' => ($shopInfoArray['id'] != 0 ? $shopInfoArray['id'] : 0)]) }}"
          data-brand="{{ $data['brand_id'] ?? '' }}"
          data-category="{{ $data['category_id'] ?? '' }}"
          data-name="{{ request('search') ?? request('name') }}"
          data-from="{{ request('data_from') }}"
          data-sort="{{ request('sort_by') }}"
          data-product-type="{{ request('product_type') ?? 'all' }}"
          data-message="{{ translate('items_found') }}"
          data-publishing-house-id="{{ request('publishing_house_id') }}"
          data-author-id="{{ request('author_id') }}"
    ></span>

@endsection

@push('script')
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/product-view.js') }}"></script>
@endpush
