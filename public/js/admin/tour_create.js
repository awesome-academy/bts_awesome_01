new Vue({
    el: '#create_tour',
    data: {
        name: null,
        price: null,
        duration: null,
        description: null,
        images: [],
        day: {
            'start_date': null,
            'end_date': null,
            'description': null,
            'images': null,
        }
    },
    components: {
        VueUploadMultipleImage
      },
      methods: {
        uploadImageSuccess(formData, index, fileList) {
          console.log('data', formData, index, fileList)
          // Upload image api
          // axios.post('http://your-url-upload', formData).then(response => {
          //   console.log(response)
          // })
        },
        beforeRemove (index, done, fileList) {
          console.log('index', index, fileList)
          var r = confirm("remove image")
          if (r == true) {
            done()
          } else {
          }
        },
        editImage (formData, index, fileList) {
          console.log('edit data', formData, index, fileList)
        },
        dataChange (data) {
          console.log(data)
        }
    }
})
