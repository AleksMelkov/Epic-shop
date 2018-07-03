@foreach($arResult as $key=>$user)
    <div id="{{ $key }}" class="row searchResult">
        <div class="col-4 searchResultCol">{{ $user['name'] }}</div>
        <div id="searchResultFirstName" class="col-4 searchResultCol">{{ $user['first_name'] }}</div>
        <div id="searchResultLastName" class="col-4 searchResultCol">{{ $user['last_name'] }}</div>
    </div>
@endforeach
<script src="{{ asset('js/admin/coupon/coupons.js') }}" defer></script>