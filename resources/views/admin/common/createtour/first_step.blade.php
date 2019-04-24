<div class="box box-primary">
    <div class="box-header well text-center">
        <h3 class="box-title">{{ trans('message.information') }}</h3>
    </div>
    <div class="box-body">
        <div class="infor">
            <form role="form">
                <div slot="input" >
                    <div class="form-group" v-bind:class="{ 'has-error': formErrors && formErrors.name }">
                        <label for="exampleInputName1">{{ trans('message.name') }}</label>
                        <input type="name" class="form-control" id="exampleInputName1" placeholder="Enter Name" v-model="tour.name">
                        <span  v-if="formErrors && formErrors.name" class="help-block">@{{ formErrors.name[0] }}</span>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': formErrors && formErrors.price }">
                        <label for="exampleInputPrice1">{{ trans('message.price') }}</label>
                        <input type="price" class="form-control" id="exampleInputPrice1" placeholder="Price" v-model.number="tour.price">
                        <span  v-if="formErrors && formErrors.price" class="help-block">@{{ formErrors.price[0] }}</span>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': formErrors && formErrors.duration }">
                        <label for="exampleInputDuration1">{{ trans('message.duration') }}</label>
                        <input type="duration" class="form-control" id="exampleInputDuration1" placeholder="Duration" v-model="tour.duration">
                        <span  v-if="formErrors && formErrors.duration" class="help-block">@{{ formErrors.duration[0] }}</span>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': formErrors && formErrors.description }">
                        <label for="exampleInputDescription1">{{ trans('message.description') }}</label>
                        <textarea type="description" class="form-control" id="exampleInputDescription1" placeholder="Description" v-model="tour.description"></textarea>
                        <span  v-if="formErrors && formErrors.description" class="help-block">@{{ formErrors.description[0] }}</span>
                    </div>
                    <div class="form-group">
                        <label for="inputCategory">{{ trans('message.category') }}</label>
                        <br>
                        <select id="inputCategory" class="selectpicker" v-model="tour.categories" class="form-control" multiple>
                            <option v-for="(category, cateindex) in categories" v-bind:value="cateindex + 1">@{{ category.name }}</option>
                        </select>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': formErrors && formErrors.image }">
                        <label for="exampleInputFile">{{ trans('message.image') }}</label>
                        <input type="file" accept="image/*" id="imageFile" v-on:change="pushTourImage">
                        <span  v-if="formErrors && formErrors.image" class="help-block">@{{ formErrors.image[0] }}</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
