<!-- main scripts -->
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/axios.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/underscorejs.js') }}"></script>
<!-- main scripts -->

<script>
    var mixins = [];

    function isEmptyString(checkString){
        var regex = /\s*\S+\s*$/;
        return !regex.test(checkString);
    }

    function isNotEmptyString(checkString){
        return !isEmptyString(checkString);
    }
</script>

@stack('scripts')

<script defer>
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
        }
    };

    const app = new Vue({
        el: '#app',
        mixins: mixins,
        data: mainData,
        methods: mainMethods,
        computed: {
            isDisabledBtn: function() {
                var resultTest = _.find(this.fields, function(item){
                    return isEmptyString(item);
                });

                if(resultTest === undefined){
                    return null;
                }else{
                    return 'disabled';
                }
            }
        }
    });
</script>
