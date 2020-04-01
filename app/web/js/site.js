$(function () {
    new Vue({
        el: '#app',
        methods: {
            login () {
                let data = {
                    username: this.form.username.value,
                    password: this.form.password.value,
                }
                this.send('/site/login', data,
                    (data) => {
                        console.log(data);
                        this.isGuest = false
                    },
                    (data) => {
                        for (let key in data) {
                            this.form[key].error = true
                        }
                        this.isGuest = true
                    })
            },
            send (url, data, success, error) {
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: data,
                }).done((response) => {
                    if (response.success) {
                        success(response.data)
                    } else {
                        error(response.data)
                    }
                }).fail(() => {
                    alert('error')
                    this.isGuest = true
                })
            },
        },
        data: {
            isGuest: true,
            form: {
                username: { value: '', error: false },
                password: { value: '', error: false },
            },
            message: 'Hello World!',
        },
    })
})
