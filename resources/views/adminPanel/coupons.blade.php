<div class="row">
    <div class="col personalCabHeader">
        Управление купонами
    </div>
</div>
<div class="row clientCabSearch">
    <div class="col-1">Найти:</div>
    <div class="col-10">
        <input id="clientsSearch" class="form-control form-control-sm" type="text" placeholder="">
    </div>
</div>
<div class="row couponsTableHeader">
    <div class="col-1 couponsTableHeaderChecker"></div>
    <div class="col-2 couponsTableHeaderNickName">Никнейм</div>
    <div class="col-2 couponsTableHeaderFirstName">Имя</div>
    <div class="col-2 couponsTableHeaderLastName">Фамилия</div>
    <div class="col-1 couponsTableHeaderDiscount">Процент</div>
    <div class="col-2 couponsTableHeaderCity">Город</div>
</div>
<div class="liveSearchResult">
    @foreach($arResult as $key=>$user)
        @if ($user['coupon'] !== 0)
        <div class="row clientsTableRow" id="clientsTableRow-{{$key}}" >
            <div class="col-1 clientsTableCol clientsTableChecker">
                <div class="form-check">
                    <input class="form-check-input clientsTableChecker" type="checkbox" value=""
                           id="clientsTableChecker-{{$key}}" userId="{{$key}}">
                </div>
            </div>
            <div class="col-2 clientsTableCol clientsTableNickName">{{ $user['nickName'] }}</div>
            <div class="col-2 clientsTableCol clientsTableFirstName">{{ $user['first_name'] }}</div>
            <div class="col-2 clientsTableCol clientsTableLastName">{{ $user['last_name'] }}</div>
            <div class="col-1 clientsTableCol clientsTableEmail">{{ $user['coupon'] }}%</div>
            <div class="col-2 clientsTableCol clientsTableCity">{{ $user['city'] }}</div>
        </div>
        @endif
    @endforeach
</div>
<div class="row clientsTableBottom">
    <div class="col-1 clientsTableBottomChecker">
        <div class="form-check">
            <input class="form-check-input clientCheckerAll" type="checkbox" value="" id="clientsTableChecker-all">
        </div>
    </div>
    <div class="col-9">
        <div class="btn-group">
            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                Выбрать опцию
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" id="adminClientUpdate">Изменить</a>
                <a class="dropdown-item" id="adminClientDelete">Удалить</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
    </div>
    <div class="col-1">
        <button id="clientSaveBtn" type="button" class="btn btn-secondary btn-sm updateBtns">Сохранить</button>
    </div>
    <div class="col-1">
        <button id="clientCancelBtn" type="button" class="btn btn-secondary btn-sm updateBtns">Отменить</button>
    </div>
</div>
<script src="{{ asset('js/admin/client/clients.js') }}" defer></script>