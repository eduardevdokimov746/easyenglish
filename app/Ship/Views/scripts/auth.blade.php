<!-- main scripts -->
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/axios.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/underscorejs.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validation/dist/validators.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validation/dist/vuelidate.min.js') }}"></script>

<!-- main scripts -->

<script>
    const { required, minLength, numeric, alpha, alphaNum, email, sameAs } = window.validators;

    var mixins = [];
    var validation = {};

    function isEmptyString(checkString){
        var regex = /\s*\S+\s*$/;
        return !regex.test(checkString);
    }

    function isNotEmptyString(checkString){
        return !isEmptyString(checkString);
    }

    function issetUpperCaseLatter(str){
        var index = 0;
        var character='';

        while (index < str.length){
            character = str.charAt(index);
            if(isNaN(character * 1) && character.toUpperCase() == character){
                return true;
            }
            index++;
        }
        return false;
    }

    function issetNumber(str){
        var index = 0;
        var character='';

        while (index < str.length){
            character = str.charAt(index);
            if (!isNaN(character * 1)) {
                return true;
            }
            index++;
        }
        return false;
    }

    function isPasswordConfirmationValid(password, passwordConfirmation){
        return password == passwordConfirmation;
    }

    const custom_password = function (password){
        return (password.length >= 6 && issetUpperCaseLatter(password) && issetNumber(password));
    };
</script>

@stack('scripts')

<script defer>
    Vue.use(window.vuelidate.default);

    var mainData = {
        passwordInputType: 'password',
        isVisiblePassword: false,
        fields: {},
    };

    var mainMethods = {
        changeTypeInputPassword: function(type){
            if(type == 'text'){
                this.isVisiblePassword = true;
            }else{
                this.isVisiblePassword = false;
            }
            this.passwordInputType = type;
        },
        statusValidation: function(validation, rule){
            return validation.$dirty && !rule;
        },
    };

    const app = new Vue({
        el: '#app',
        mixins: mixins,
        data: mainData,
        methods: mainMethods,
        computed: {
            isAllInputFilled: function() {
                var resultTest = _.find(this.fields, function(item){
                    return isEmptyString(item);
                });

                if(resultTest === undefined){
                    return true;
                }else{
                    return false;
                }
            }
        },
        validations: validation
    });
</script>
