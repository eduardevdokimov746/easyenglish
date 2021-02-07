<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/axios.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/underscorejs.js') }}"></script>

<script>
    var mixins = [];
</script>

@stack('scripts')

<script>
    var mainData = {

    };

    var mainMethods = {

    };

    const app = new Vue({
        el: '#app',
        mixins: mixins,
        data: mainData,
        methods: mainMethods
    });
</script>
