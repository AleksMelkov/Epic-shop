<?
use App\User;
?>
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row personalCabHeaderRow">
        <div class="col-2 personalCabHeader tabAdminHeader">Личный кабинет</div>
        <div class="col-9"></div>
    </div>
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-2">
            <div class="btn-group-vertical btnMenu">
                <button type="button" id="personalAdminMenu" class="btn btn-secondary active">Пользователь</button>
                <button type="button" id="personalOrdersAdminMenu" class="btn btn-secondary">Заказы</button>
                @if(User::find(Auth::user()->id)->user_type->user_type_name == 'admin')
                 <div class="adminPanelHeader">Панель администрирования</div>
                <button type="button" id="clientsAdminMenu" class="btn btn-secondary">Управление пользователями</button>
                <button type="button" id="ordersAdminMenu" class="btn btn-secondary">Управление заказами</button>
                <button type="button" id="couponsAdminMenu" class="btn btn-secondary">Управление купонами</button>
                <button type="button" id="productsAdminMenu" class="btn btn-secondary">Управление товарами</button>
                <button type="button" id="postsAdminMenu" class="btn btn-secondary">Управление записями</button>
                @endif
            </div>
        </div>
        <div id="resultWrapper" class="col-10 userInfo" userId={{  Auth::user()->id }}>
            <div class="row row_hello_user ">
                <div class="col personalCabHeader">Личные данные</div>
            </div>
            <div>
                <div class="row row_user_contacts">
                    <div class="col-4">
                        <label for="InputPhone">Номер телефона</label>
                        <input type="text" class="form-control" id="InputPhone" aria-describedby="phoneHelp" placeholder="{{ Auth::user()->phone_number }}">
                    </div>
                    <div class="col-5">
                        <label for="exampleInputEmail1">Email адрес</label>
                        <input type="text" class="form-control" id="exampleInputEmai1" aria-describedby="emailHelp" placeholder="{{ Auth::user()->email }}">
                    </div>
                </div>
                <div class="row row_user_personal">
                    <div class="col-3">
                        <label for="InputFirstName">Имя</label>
                        <input type="text" class="form-control" id="InputFirstName" aria-describedby="FirstNameHelp" placeholder="{{ Auth::user()->first_name }}">
                    </div>
                    <div class="col-3">
                        <label for="InputPatronymic">Отчетство</label>
                        <input type="text" class="form-control" id="InputPatronymic" aria-describedby="PatronymicHelp" placeholder="{{ Auth::user()->patronymic }}">
                    </div>
                    <div class="col-3">
                        <label for="InputLastName">Фамилия</label>
                        <input type="text" class="form-control" id="InputLastName" aria-describedby="LastNameHelp" placeholder="{{ Auth::user()->last_name }}">
                    </div>
                </div>
                <div class="row row_doc_personal">
                    <div class="col-2">
                        <label for="InputPassSerial">Серия паспорта</label>
                        <input type="text" class="form-control" id="InputPassSerial" aria-describedby="PassSerialHelp" placeholder="{{ Auth::user()->pass_serial }}">
                    </div>
                    <div class="col-3">
                        <label for="InputPassNumber">Номер паспорта</label>
                        <input type="text" class="form-control" id="InputPassNumber" aria-describedby="PassNumberHelp" placeholder="{{ Auth::user()->pass_number }}">
                    </div>
                    <div class="col-2">
                        <label for="InputPassDate">Дата выдачи паспорта</label>
                        <input type="text" class="form-control" id="InputPassDate" aria-describedby="PassDateHelp" placeholder="{{ Auth::user()->pass_date }}">
                    </div>
                    <div class="col-2">
                        <label for="InputCity">Ваш город</label>
                        <input type="text" class="form-control" id="City" aria-describedby="CityHelp" placeholder="{{ Auth::user()->city }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="personalSave">Сохранить</button>
            </div>
            @if(User::find(Auth::user()->id)->coupon->coupon_name !== 'none')
            <div class="row discountInfo">
                <div class="col personalCabHeader">Данные о скидке</div>
            </div>
            <div class="row">
                <div class="col">Ваша скидка составляет <b>{{ User::find(Auth::user()->id)->coupon->coupon_val }}%</b></div>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col colTest"></div>
    </div>
</div>
@endsection
