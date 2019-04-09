<div class="box box-primary">
    <div class="box-header well text-center">
        <h3 class="box-title">{{ trans('message.information') }}</h3>
    </div>
    <div class="box-body">
        <div class="infor">
            <form role="form">
                <div slot="input" slot-scope="picker">
                    <div class="form-group">
                        <label for="exampleInputName1">{{ trans('message.name') }}</label>
                        <input type="name" class="form-control" id="exampleInputName1" placeholder="Enter Name" v-model="product.name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPrice1">{{ trans('message.price') }}</label>
                        <input type="price" class="form-control" id="exampleInputPrice1" placeholder="Price" v-model.number="product.price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDuration1">{{ trans('message.duration') }}</label>
                        <input type="duration" class="form-control" id="exampleInputDuration1" placeholder="Duration" v-model="product.duration">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription1">{{ trans('message.description') }}</label>
                        <textarea type="description" class="form-control" id="exampleInputDescription1" placeholder="Description" v-model="product.description"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputCategory">{{ trans('message.category') }}</label>
                            <select id="inputCategory" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">{{ trans('message.image') }}</label>
                        <input type="file" id="exampleInputFile" v-model="product.image">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
