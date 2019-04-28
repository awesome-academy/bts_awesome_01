new Vue({
    el: '#create_tour',
    data: function() {
        return {
            tour: {
                'name': null,
                'price': null,
                'duration': null,
                'description': null,
                'image': null,
                'status' : 0,
                'categories' : [],
            },
            days: {
                'start_date': null,
                'end_date': null,
                'description': null,
                'services': [],
                'city': null,
                'images': [],   
                'url': [],
                'tourId': null,
                'dayId': null,
            },
            formErrors: null,
            dayErrors: null,
            dayService: [],
            selectedFiles: '',
            categories: [],
            services: [],
            provinces: [],
        }
    },
    created: function(){
        this.getListOption();
    },
    watch: {
        'tour.name': function() {
            if(this.formErrors && this.formErrors.name) this.formErrors.name = null;
        },
        'tour.price': function() {
            if(this.formErrors && this.formErrors.price) this.formErrors.price = null;
        },
        'tour.duration': function() {
            if(this.formErrors && this.formErrors.duration) this.formErrors.duration = null;
        },
        'tour.image': function() {
            if(this.formErrors && this.formErrors.image) this.formErrors.image = null;
        },
        'tour.description': function() {
            if(this.formErrors && this.formErrors.description) this.formErrors.description = null;
        },
        'days.start_date': function() {
            if(this.dayErrors && this.dayErrors.start_date) this.dayErrors.start_date = null;
        },
        'days.end_date': function() {
            if(this.dayErrors && this.dayErrors.end_date) this.dayErrors.end_date = null;
        },
        'days.images': function() {
            if(this.dayErrors && this.dayErrors.images) this.dayErrors.images = null;
        },
        'days.city': function() {
            if(this.dayErrors && this.dayErrors.city) this.dayErrors.city = null;
        },
        'days.description': function() {
            if(this.dayErrors && this.dayErrors.description) this.dayErrors.description = null;
        },
        'days.services': function() {
            if(this.dayErrors && this.dayErrors.services) this.dayErrors.services = null;
        },
    },
    methods: {
        getListOption() {
            var option = {
                method: 'GET',
                url: '/admin/tours/create',
                json: true
            }
            axios(option).then((response) => {
                this.provinces = response.data.provinces;
                this.categories = response.data.categories;
                this.services = response.data.services;
            }).catch((error) => {
                this.handleError(error.response.status);
            });
        },
        createTour() {
            var self = this;
            axios.post('/admin/tours', this.tour).then((response) => {
                self.formErrors = null;
                document.getElementById("step2").classList.remove('disabled');
                document.getElementById("step1").classList.remove('active');
                document.getElementById("step1").classList.add('disabled');
                document.getElementById("change-step-2").dispatchEvent(new Event('click'));
                self.days.tourId =  response.data.tour.id
            }).catch((error) => {
                self.formErrors = error.response.data.errors
            });
        },
        pushTourImage(e){
            let files = e.currentTarget.files || e.dataTransfer.files;
            this.onImageChange(files,0)
        },
        pushDayImage(e){
            this.days.images = []
            let files = e.currentTarget.files || e.dataTransfer.files;
            this.onImageChange(files,1)
        },
        onImageChange(files, v) {
            if (files.length > 1) {
                for (var i=0; i< files.length; i++){
                    this.createImage(files[i],v);
                }
            }   
            else if (files.length = 1)  {
                this.createImage(files[0],v)
            }
            else return   
        },
        createImage(file, v) {
            let reader = new FileReader();
            let self = this;
            if (v == 0) {
                reader.onload = (e) => {
                    self.tour.image = e.target.result;
                };
            } else {
                reader.onload = (e) => {
                    self.days.images.push(e.target.result);
                };
                this.days.url.push(URL.createObjectURL(file));
            }
            reader.readAsDataURL(file);
        },
        addService(days) {
            var self = this
            axios.post('/admin/days', this.days).then((response) => {   
                self.dayErrors = null
                self.days.dayId = response.data.day_id
                self.days.images = response.data.images_id
                self.days.city = this.provinces[self.days.city - 1].name
                var arr = self.days.services
                var i = 0
                arr.forEach(element => {
                    self.days.services[i] = this.services[element - 1].name
                    i += 1
                }); 
                self.dayService.push(days)
                self.resetdays()
            }).catch((error) => {
                console.log(error)
                self.dayErrors = error.response.data.errors
            });
        },
        resetdays() {
            var temp = this.days.tourId
            this.days = {};
            this.$set(this.days,'start_date',null)
            this.$set(this.days,'end_date',null)
            this.$set(this.days,'description',null)
            this.$set(this.days,'services',[])
            this.$set(this.days,'city',null)
            this.$set(this.days,'images',null)
            this.days.url = []
            this.days.tourId = temp
            this.days.dayId = null
        },
        removeDay(index) {
            var self = this
            var i = this.dayService[index].dayId
            axios.delete('/admin/days/' + i).then((response) => {
                self.dayService.splice(index, 1)
            }).catch((error) => {
                self.dayErrors = error.response.data.errors
            });
        },
        finishCreate() {
            var self = this
            this.tour.status = 1
            axios.put('/admin/tours/updatestatus/' + this.days.tourId).then((response) => {
                window.location.replace('/admin');
            }).catch((error) => {
                self.dayErrors = error.response.data.errors
            });
        },
    }    
})
