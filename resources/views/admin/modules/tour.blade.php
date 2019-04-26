@extends('admin.master') 
@section('style')
<link rel="stylesheet" href="{{ asset('/css/common_css/user/tour_create.css') }}"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@stop 
@section('content')
<div class="container tour_create" id="create_tour">
    <div class="form-row">
        <div class="form-group col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li id="step1" class="active">
                    <a href="#step-1">
                        <h4 class="list-group-item-heading">Step 1</h4>
                        <p class="list-group-item-text">Tour Information</p>
                    </a>
                </li>
                <li id="step2" class="disabled" @click="test()">
                    <a id="change-step-2" href="#step-2">
                        <h4 class="list-group-item-heading">Step 2</h4>
                        <p class="list-group-item-text">Detail Day</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-xs-12 well">
                @include('admin.common.createtour.first_step')               
                <button id="activate-step-2" class="btn btn-primary btn-lg" @click="createTour()">Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-xs-12 well">
                @include('admin.common.createtour.second_step')
                <button class="btn btn-primary btn-lg" @click="finishCreate()">Finish</button>
            </div>
        </div>
    </div>
</div>
@stop 
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="{{ asset('/js/admin/tour_create.js') }}"></script>

<script>
    "use strict"
    jQuery(document).ready(function() {
        var navListItems = $('ul.setup-panel li a'),
            allWells = $('.setup-content');

        allWells.hide();

        navListItems.click(function(e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this).closest('li');

            if (!$item.hasClass('disabled')) {
                $item.addClass('active');
                allWells.hide();
                $target.show();
            }
        });

        $('ul.setup-panel li.active a').trigger('click');

        // DEMO ONLY //

        $('select').selectpicker(); 
    });
</script>
@stop
