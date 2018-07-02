@foreach($arResult as $key=>$user)
    <div class="row clientsTableRow adminPanelTableRow" id="clientsTableRow-{{$key}}">
        <div class="col-1 clientsTableChecker">
            <div class="form-check">
                <input class="form-check-input clientsTableChecker" type="checkbox" value=""
                       id="clientsTableChecker-{{$key}}">
            </div>
        </div>
        <div class="col-1 clientsTableNickName adminPanelTableCol">{{ $user['nickName'] }}</div>
        <div class="col-2 clientsTableFirstName adminPanelTableCol">{{ $user['first_name'] }}</div>
        <div class="col-2 clientsTableLastName adminPanelTableCol">{{ $user['last_name'] }}</div>
        <div class="col-2 clientsTablePhone adminPanelTableCol">{{ $user['phone_number'] }}</div>
        <div class="col-2 clientsTableEmail adminPanelTableCol">{{ $user['email'] }}</div>
        <div class="col-2 clientsTableCity adminPanelTableCol">{{ $user['city'] }}</div>
    </div>
@endforeach
<script src="{{ asset('js/admin/client/clients.js') }}" defer></script>