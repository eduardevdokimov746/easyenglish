var listTranslateWord = {
    data: {
        translateWords: [],
        visibleInputWordTranslate: false,
        newWord: '',

    },
    mounted: function(){
        $(document).mouseup(function (e){ // событие клика по веб-документу
            var elements = $("#list-translate"); // тут указываем класс элементов
            elements.each(function() {
                var dqv = $(this);
                if (!dqv.is(e.target) && dqv.has(e.target).length === 0) {
                    app.translateWords = [];
                }
            });
        });
    },
    methods: {
        showListTranslate: function(wordId, action){
            console.log(action.pageY, action.pageX);

            var element = action.currentTarget;

            this.translateWords.push('test');

            $('#list-translate').css({'top': action.pageY + 10, 'left': action.pageX + 10});
        },
        showInputWordTranslate: function(){
            this.visibleInputWordTranslate = true;
        },
        hideInputWordTranslate: function(){
            this.visibleInputWordTranslate = false;
        }
    },
    computed: {
        isDisabled: function(){
            return !isNotEmptyString(this.newWord);
        }
    }
};

mixins.push(listTranslateWord);
