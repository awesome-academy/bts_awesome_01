@extends('layouts.app')
@section('content')
<div class="login-box" id="login-form">
    <div class="login-logo">
        <a href="/"><b>BTS</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg" :class="{'error-login': userNotFound}">@{{ userNotFound ? userNotFound : 'Sign in to start your session' }}</p>
        <form @submit.prevent="handleLogin">
            <div class="form-group has-feedback" v-bind:class="{ 'has-error': formErrors && formErrors.email }">
                <input type="email" class="form-control" v-model="user.email"  placeholder="Email">
                <span  v-if="formErrors && formErrors.email" class="help-block">@{{ formErrors.email[0] }}</span>
            </div>
            <div class="form-group has-feedback" v-bind:class="{ 'has-error': formErrors && formErrors.password }">
                <input type="password" class="form-control" v-model="user.password" placeholder="Password">
                <span  v-if="formErrors && formErrors.password" class="help-block">@{{ formErrors.password[0] }}</span> 
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('message.signin')}}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> {{ trans('message.signinfb')}}</a>
        </div>
        <!-- /.social-auth-links -->
        <a href="#">{{ trans('message.forgotpw')}}</a><br>
        <a href="register.html" class="text-center">{{ trans('message.register')}}</a>
    </div>
    <!-- /.login-box-body -->
</div>
@endsection
@section('script')
    <script src="{{ asset('/js/auth/login.js') }}"></script>
@endsection
