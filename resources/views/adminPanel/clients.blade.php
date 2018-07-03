<div class="container-fluid">
    <div class="row clientCabHeader">
        <div class="col-1"></div>
        <div class="col-11 personalCabHeader tabAdminHeader">
            Управление пользователями
        </div>
    </div>
    <div class="row adminCabSearch">
        <div class="col-1">Найти:</div>
        <div class="col-11">
            <input id="clientsSearch" class="form-control form-control-sm" type="text" placeholder="">
        </div>
    </div>
    <div class="row clientsTableHeader adminPanelTableHeader">
        <div class="col-1 clientsTableHeaderChecker adminPanelTableHeaderCol"></div>
        <div class="col-1 clientsTableHeaderNickName adminPanelTableHeaderCol">Никнейм</div>
        <div class="col-2 clientsTableHeaderFirstName adminPanelTableHeaderCol">Имя</div>
        <div class="col-2 clientsTableHeaderLastName adminPanelTableHeaderCol">Фамилия</div>
        <div class="col-2 clientsTableHeaderPhone adminPanelTableHeaderCol">Мобильный</div>
        <div class="col-2 clientsTableHeaderEmail adminPanelTableHeaderCol">Email</div>
        <div class="col-2 clientsTableHeaderCity adminPanelTableHeaderCol">Город</div>
    </div>
    <div class="liveSearchResult">
        @foreach($arResult as $key=>$user)
            <div class="row clientsTableRow adminPanelTableRow" id="clientsTableRow-{{$key}}">
                <div class="col-1 clientsTableCol clientsTableChecker">
                    <div class="form-check">
                        <input class="form-check-input tableChecker" type="checkbox" value=""
                               id="clientsTableChecker-{{$key}}" userId="{{$key}}">
                    </div>
                </div>
                <div class="col-1 clientsTableCol clientsTableNickName adminPanelTableCol">{{ $user['nickName'] }}</div>
                <div class="col-2 clientsTableCol clientsTableFirstName adminPanelTableCol">{{ $user['first_name'] }}</div>
                <div class="col-2 clientsTableCol clientsTableLastName adminPanelTableCol">{{ $user['last_name'] }}</div>
                <div class="col-2 clientsTableCol clientsTablePhone adminPanelTableCol">{{ $user['phone_number'] }}</div>
                <div class="col-2 clientsTableCol clientsTableEmail adminPanelTableCol">{{ $user['email'] }}</div>
                <div class="col-2 clientsTableCol clientsTableCity adminPanelTableCol">{{ $user['city'] }}</div>
            </div>
        @endforeach
    </div>
    <div class="row clientsTableBottom adminPanelTableBottom">
        <div class="col-1 clientsTableBottomChecker">
            <div class="form-check">
                <input class="form-check-input clientCheckerAll adminCheckerAll" type="checkbox" value="" id="clientsTableChecker-all">
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
</div>
<script src="{{ asset('js/admin/common.js') }}" defer></script>
<script src="{{ asset('js/admin/client/clients.js') }}" defer></script>
<script src="{{ asset('js/admin/client/clientsLiveSearch.js') }}" defer></script>