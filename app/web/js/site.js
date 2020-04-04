$(function () {
    new Vue({
        el: '#app',
        mounted () {
            let token = localStorage.getItem('token')
            if (token) {
                this.isGuest = false
            }
        },
        methods: {
            login () {
                let data = {
                    username: this.form.username.value,
                    password: this.form.password.value,
                }
                this.send('POST', '/site/login', data,
                    (data) => {
                        if (data.access_token) {
                            localStorage.setItem('token', data.access_token)
                            this.isGuest = false
                        }
                    },
                    (data) => {
                        for (let key in data) {
                            if (this.form.hasOwnProperty(key)) {
                                this.form[key].error = true
                            }
                        }
                        this.logout()
                    })
            },
            userList () {
                this.send('GET', '/user/list', {},
                    (data) => {
                        alert(JSON.stringify(data))
                    },
                    (data) => {
                        console.log(data)
                        alert('Не удалось получить список пользователей')
                    })
            },
            logout () {
                this.isGuest = true
                localStorage.setItem('token', '')
            },
            send (method, url, data, success, error) {
                $.ajax({
                    method: method,
                    url: url,
                    data: data,
                    beforeSend: (xhr) => {
                        let token = localStorage.getItem('token')
                        if (token) {
                            xhr.setRequestHeader('Authorization',
                                'Bearer ' + token)
                        }
                    },
                }).done((response) => {
                    if (response.success) {
                        success(response.data)
                    } else {
                        error(response.data)
                    }
                }).fail(() => {
                    alert('error')
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
