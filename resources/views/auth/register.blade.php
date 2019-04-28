@extends('layouts.app')

@section('content')
<div class="register-box">
    <div class="register-logo">
        <b>Training</b> Project
    </div>

    <div class="register-box-body" id="register-form">
        <p class="login-box-msg">Register a new membership</p>
        <div class="form-group has-feedback" v-bind:class="{ 'has-error': formErrors && formErrors.name }">
            <input type="text" class="form-control" id="name" v-model="user.name" placeholder="Full name">
            <span  v-if="formErrors && formErrors.name" class="help-block">@{{ formErrors.name[0] }}</span>
        </div>
        <div class="form-group has-feedback" v-bind:class="{ 'has-error': formErrors && formErrors.email }">
            <input type="email" class="form-control" id="email"  v-model="user.email" placeholder="Email">
            <span  v-if="formErrors && formErrors.email" class="help-block">@{{ formErrors.email[0] }}</span>
        </div>
        <div class="form-group has-feedback" v-bind:class="{ 'has-error': formErrors && formErrors.password }">
            <input type="password" class="form-control" id="password"  v-model="user.password" placeholder="Password">
            <span  v-if="formErrors && formErrors.password" class="help-block">@{{ formErrors.password[0] }}</span>
        </div>
        <div class="form-group has-feedback" v-bind:class="{ 'has-error': (formErrors && formErrors.password_confirm) || confirmError }">
            <input type="password" class="form-control" id="password_confirm" v-model="user.password_confirm" placeholder="Retype password">
            <span  v-if="formErrors && formErrors.password_confirm" class="help-block">@{{ formErrors.password_confirm[0] }}</span>
            <span  v-if="!(formErrors && formErrors.password_confirm) && confirmError" class="help-block">@{{ confirmError }}</span>
        </div>
        <div class="form-group has-feedback">
            <a @click="openModalUpload()" class="btn btn-block btn-social btn-success btn-flat">
                <i class="fa fa-file-image-o"></i> @{{ user.avatarName ? user.avatarName : 'Upload Avatar' }}
            </a>
        </div>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog"></div>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Upload Avatar</h4>
                </div>
                <div class="modal-body">
                    <div v-if="!image">
                        <input type="file" @change="onFileChange">
                    </div>
                    <div v-else>
                        <img :src="image" />
                        <button @click="removeImage">Remove image</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click='confirmUpload()'>Save changes</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8"></div>
            <div class="col-xs-12">
                <button @click="comparePwd" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
        </div>
    </div>

    <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
</div>
@endsection
@section('script')
    <script src="{{ asset('/js/auth/register.js') }}"></script>
@endsection

<style>
    img {
        width: 100%;
        margin: auto;
        display: block;
        margin-bottom: 10px;
    }
</style>
