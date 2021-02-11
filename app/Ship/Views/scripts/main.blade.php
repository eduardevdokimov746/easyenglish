<!-- main scripts -->
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/axios.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/underscorejs.js') }}"></script>
<!-- main scripts -->
<!-- scripts for app -->
<script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<!-- scripts for app -->

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
        isBodyBackground: true,
        start: false
    };

    var mainMethods = {

    };

    const app = new Vue({
        el: '#app',
        mixins: mixins,
        data: mainData,
        methods: mainMethods,
        beforeMount: function(){
            this.start = true;
        }
    });
</script>
