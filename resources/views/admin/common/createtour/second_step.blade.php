<div class="box box-primary">
    <div class="box-header well text-center">
        <h3 class="box-title">{{ trans('message.dayplan') }}</h3>
    </div>
    <div class="box-body">
        <div class="w-1/4 h-full bg-grey-darkest"></div>
        <div class="flex-col w-1/2 h-full bg-grey-lightest rounded-lg overflow-scroll p-2 shadow-xs">
            <div class="flex items-center border-b border-b-2 border-teal py-2">
                <div class="box-body">
                    <div class="form-row">
                        <div class="form-group col-xs-6">
                            <button class="btn btn-success" @click="addService(days)">{{ trans('message.add') }}</button>
                        </div>
                        <div class="clearfix">
                            &nbsp;
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-xs-12" v-bind:class="{ 'has-error': dayErrors && dayErrors.start_date }">
                            <label>{{ trans('message.startdate') }}</label>
                            <input type="date" max="9999-12-31" class="form-control pull-right" v-model="days.start_date">
                            <span  v-if="dayErrors && dayErrors.start_date" class="help-block">@{{ dayErrors.start_date[0] }}</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-xs-12" v-bind:class="{ 'has-error': dayErrors && dayErrors.end_date }">
                            <label>{{ trans('message.enddate') }}</label>
                            <input type="date" max="9999-12-31" class="form-control pull-right" v-model="days.end_date">
                            <span  v-if="dayErrors && dayErrors.end_date" class="help-block">@{{ dayErrors.end_date[0] }}</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12" v-bind:class="{ 'has-error': dayErrors && dayErrors.description }">
                            <label for="exampleInputDescription1">{{ trans('message.description') }}</label>
                            <textarea type="description" class="form-control" id="exampleInputDescription1" v-model="days.description" placeholder="Enter Description"></textarea>
                            <span  v-if="dayErrors && dayErrors.description" class="help-block">@{{ dayErrors.description[0] }}</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12" v-bind:class="{ 'has-error': dayErrors && dayErrors.city }">
                            <label for="inputState">{{ trans('message.city') }}</label>
                            <select id="inputState" v-model="days.city" class="form-control">
                                <option v-for="(city, cityindex) in provinces" v-bind:value="cityindex +1">@{{ city.name }}</option>
                            </select>
                            <span  v-if="dayErrors && dayErrors.city" class="help-block">@{{ dayErrors.city[0] }}</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12" v-bind:class="{ 'has-error': dayErrors && dayErrors.services }">
                            <label for="exampleInputEmail1">{{ trans('message.service') }}</label>
                            <br>
                            <select class="selectpicker" multiple data-live-search="true" v-model="days.services">
                                <option v-for="(service, servindex) in services" v-bind:value="servindex +1">@{{ service.name }}</option>
                            </select>
                            <span  v-if="dayErrors && dayErrors.services" class="help-block">@{{ dayErrors.services[0] }}</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12" v-bind:class="{ 'has-error': dayErrors && dayErrors.images }">
                            <label>{{ trans('message.image') }}</label>
                            <br>
                            <input type="file" accept="image/*" v-on:change="pushDayImage" multiple>
                        </div>
                        <span  v-if="dayErrors && dayErrors.images" class="help-block">@{{ dayErrors.images[0] }}</span>
                    </div>
                </div>
                <template v-if="dayService.length == 0">
                    <h3 class="bg-info text-center noservice">No Service</h3>
                </template>
                <template v-else>
                    <div class="text-center mt-3 flex bg-grey-light w-full h-auto rounded-lg" v-for="(day, index) in dayService" :key="index">
                        <div class="row bg-warning dayplan">
                            <div class="col-md-2">&nbsp;</div>
                            <div class="col-md-8">
                                <div class="row space-16">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="thumbnail customCard">
                                            <div class="caption text-center">
                                                 <div class="position-relative">
                                                    <!-- carousel -->
                                                    <div v-bind:id="'myCarousel' + index" class="carousel slide" data-interval="8000" data-ride="carousel">
                                                        <!-- Wrapper for slides -->
                                                        <div class="carousel-inner">
                                                            <div class="item active">
                                                                <img src="{{ asset('/dist/img/camp.jpg') }}" style="width:680px;height:300px;" >
                                                                <div class="carousel-caption">
                                                                <h3>Day Image Preview</h3>
                                                            </div>
                                                            </div>
                                                            <div class="item" v-for="(anh, key) in day.url" :key="key" >
                                                                <img :src="anh" style="width:680px;height:300px;" >
                                                            </div>
                                                        <!-- Left and right controls -->
                                                        <a class="left carousel-control" :href="'#myCarousel' + index" role="button" data-slide="prev" style="padding-right:70px">
                                                            <span class="fa fa-arrow-left" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>    
                                                        <a class="right carousel-control" :href="'#myCarousel' + index" role="button" data-slide="next">
                                                            <span class="fa fa-arrow-right" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                        </div>
                                                    </div>
                                                    <!-- end carousel -->    
                                                </div>
                                                <h2 id="thumbnail-label"><a href="#" target="_blank">Day @{{index+1}}</a></h2>
                                                <p><i class="fa fa-calendar light-red lighter bigger-120"></i>&nbsp;Times:From @{{ day.start_date }} To @{{ day.end_date }}</p>
                                                <div class="thumbnail-description smaller">
                                                    <h3>Description</h3>
                                                    <p>@{{ day.description }}</p>
                                                </div>
                                            </div>
                                            <div class="caption card-footer text-center">
                                                <ul class="list-inline">
                                                    <li><strong>@{{ day.city }} -</strong></li>
                                                    <li><strong>Services </strong>:</li>
                                                    <li v-for="(serv, mark) in day.services" :key="mark">@{{ serv }} </li>
                                                </ul>
                                            </div>
                                            <div class="w-1/6 pr-2 xHolder">
                                                <i class="fa fa-times text-2xl" aria-hidden="true" @click="removeDay(index)"></i>       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                </template>    
            </div>
        </div>
        <div class="w-1/4 h-full bg-grey-darkest"></div>
    </div>
</div>
