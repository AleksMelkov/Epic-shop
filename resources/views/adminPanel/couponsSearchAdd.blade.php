<div class="row updateRow adminPanelTableRowAdd">
    <div class="col-2 searchArea">
        <input id="clientCouponSearch" class="form-control form-control-sm" type="text" placeholder="">
        <small id="clientSearch" class="form-text text-muted">Поиск по пользователям</small>
        <div class="container-fluid searchResultWrapper"></div>
    </div>
    <div class="col-2 adminPanelTableCol" id="newCouponUserFirstName"></div>
    <div class="col-2 adminPanelTableCol" id="newCouponUserLastName"></div>
    <div class="col-3 adminPanelTableCol">
        @foreach($arResult as $couponVal)
            <button id="{{ $couponVal }}" type="button" class="btn btn-secondary btn-sm couponValBtn">{{ $couponVal }}%</button>
        @endforeach
    </div>
</div>
<script src="{{ asset('js/admin/coupon/coupons.js') }}" defer></script>