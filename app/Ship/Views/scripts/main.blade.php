<!-- main scripts -->
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/axios.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/underscorejs.js') }}"></script>
<script type="text/javascript" src="{{ asset('ckeditor/build/ckeditor.js') }}"></script>
<script src="https://unpkg.com/vuelidate/dist/validators.min.js"></script>
<script src="https://unpkg.com/vuelidate/dist/vuelidate.min.js"></script>
<!-- main scripts -->
<!-- scripts for app -->
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<!-- scripts for app -->

<script>
    const { required, minLength, numeric, alpha, alphaNum, email, sameAs } = window.validators;
    var validation = {};
    var mixins = [];

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

    const custom_password = function (password){
        if (isEmptyString(password)) {
            return true;
        }
        return (password.length >= 6 && issetUpperCaseLatter(password) && issetNumber(password));
    };
</script>

@stack('scripts')

<script defer>
    Vue.use(window.vuelidate.default);

    var mainData = {
        isBodyBackground: true,
        start: false
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
        beforeMount: function(){
            this.start = true;
        },
        validations: validation
    });
</script>
