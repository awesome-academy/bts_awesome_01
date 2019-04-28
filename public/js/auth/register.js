new Vue({
    el: '#register-form',
    data: {
        image: '',
        imageName: null,
        user: {
            'name': null,
            'password': null,
            'email': null,
            'avatar': null,
            'avatarName': null,
            'password_confirm': null,
        },
        confirmError: null,
        formErrors: null,
    },
    watch: {
        'user.name': function() {
            if(this.formErrors && this.formErrors.name) this.formErrors.name = null
        },
        'user.email': function() {
            if(this.formErrors && this.formErrors.email) this.formErrors.email = null
        },
        'user.password': function() {
            if(this.formErrors && this.formErrors.password) this.formErrors.password = null
        },
        'user.password_confirm': function() {
            if(this.formErrors && this.formErrors.password_confirm) this.formErrors.password_confirm = null
            if(this.user.password == this.user.password_confirm) this.confirmError = null
        },
    },
    methods: {
        openModalUpload() {
            this.image = null;
            this.imageName = null;
            this.user.avatar = null;
            this.user.avatarName = null;
            $('#modal-default').modal('show');
        },

        onFileChange(e) {
            this.imageName = e.target.files[0].name;
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            this.createImage(files[0]);
        },

        createImage(file) {
            var reader = new FileReader();
            var vm = this;

            reader.onload = (e) => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },

        removeImage: function (e) {
            this.image = '';
            this.imageName = '';
        },

        confirmUpload() {
            this.user.avatar = this.image;
            this.user.avatarName = this.imageName;
            $('#modal-default').modal('hide');
        },

        comparePwd(){
            try{
                if (this.user.password !== this.user.password_confirm) throw "Password not match"
                this.handleRegister()
            } catch(err) {
                this.confirmError = err
            }
        },

        handleRegister(){
            var self = this;
            axios.post('/account/handle-register', this.user).then((response) =>{
                window.location.href = '/account/login'
            }).catch((error) => {
                self.formErrors = error.response.data.errors;
            });
        }
    }
}) 
