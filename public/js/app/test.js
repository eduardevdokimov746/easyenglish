var component = {
    data: {
        login: '',
        email: '',
        password: '',
        password_confirmation: '',
        pwd_input_type: 'password',
        errors: [],
        loginLen: 0
    },
    methods: {
        changeVisiblePwd: function(){
            this.pwd_input_type = this.pwd_input_type == 'text' ? 'password' : 'text';
        },
        actionSub: _.debounce(
            function() {
                axios
                    .post(route, {
                        login: this.login,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation,

                    })
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(error => {
                        var err = error.response.data.errors;
                        console.log(err);
                        this.errors = [];
                        for (const [key, value] of Object.entries(err)) {
                            this.errors.push(value[0]);
                        }
                    })
                    .then(function () {
                        setInterval(function(){
                            console.log('asd');
                        }, 2000);
                    })
                }
            , 300)
    }
};

mixins.push(component);
