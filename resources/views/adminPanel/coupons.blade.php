<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col tabAdminHeader">
            Управление купонами
        </div>
    </div>
    <div class="row adminCabSearch">
        <div class="col-1">Найти:</div>
        <div class="col-10">
            <input id="clientsSearch" class="form-control form-control-sm" type="text" placeholder="">
        </div>
    </div>
    <div class="row couponsTableHeader adminPanelTableHeader">
        <div class="col-1 adminPanelTableHeaderCol"></div>
        <div class="col-1 adminPanelTableHeaderCol">Никнейм</div>
        <div class="col-2 adminPanelTableHeaderCol">Имя</div>
        <div class="col-2 adminPanelTableHeaderCol">Фамилия</div>
        <div class="col-3 adminPanelTableHeaderCol">Процент</div>
        <div class="col-1 adminPanelTableHeaderCol">Город</div>
    </div>
    <div class="liveSearchResult">
        @foreach($arResult as $key=>$user)
            @if ($user['coupon'] !== 0)
                <div class="row adminPanelTableRow" id="adminPanelTableRow-{{$key}}">
                    <div class="col-1 adminPanelTableChecker">
                        <div class="form-check">
                            <input class="form-check-input tableChecker" type="checkbox" value=""
                                   id="clientsTableChecker-{{$key}}" userId="{{$key}}">
                        </div>
                    </div>
                    <div class="col-1 adminPanelTableCol">{{ $user['nickName'] }}</div>
                    <div class="col-2 adminPanelTableCol">{{ $user['first_name'] }}</div>
                    <div class="col-2 adminPanelTableCol">{{ $user['last_name'] }}</div>
                    <div class="col-3 adminPanelTableCol">{{ $user['coupon'] }}%</div>
                    <div class="col-1 adminPanelTableCol">{{ $user['city'] }}</div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="row adminPanelTableBottom">
        <div class="col-1 clientsTableBottomChecker">
            <div class="form-check">
                <input class="form-check-input adminCheckerAll" type="checkbox" value="" id="clientsTableChecker-all">
            </div>
        </div>
        <div class="col-9">
            <div class="btn-group">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Выбрать опцию
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" id="adminPanelCouponAdd">Добавить</a>
                    <a class="dropdown-item" id="adminPanelCouponUpdate">Изменить</a>
                </div>
            </div>
        </div>
        <div class="col-1">
            <button id="adminPanelSaveBtn" type="button" class="btn btn-secondary btn-sm updateBtns">Сохранить</button>
        </div>
        <div class="col-1">
            <button id="adminPanelCancelBtn" type="button" class="btn btn-secondary btn-sm updateBtns">Отменить</button>
        </div>
    </div>
</div>
<script src="{{ asset('js/admin/common.js') }}" defer></script>
<script src="{{ asset('js/admin/coupon/coupons.js') }}" defer></script>