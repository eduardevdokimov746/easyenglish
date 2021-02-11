@extends('layouts.main')

@section('content')
    <section class="other_services mt-5" id="why" style="background: white">
        <div class="container">
            <div class="head-content mb-4">
                <h3 class="heading">
                    <img id="status-text" src="{{ asset('images/s2-green.png') }}">
                    <span class="word" @click="showListTranslate('{{ 1 }}', $event)">Пример</span>
                    <span class="word" @click="showListTranslate('{{ 1 }}', $event)">перевода</span>
                </h3>
            </div>
        <div id="text-body">
            "Shiro!
            Shiro!"

            Mr and Mrs Nakamura were worried.
            Their dog Shiro was missing.
            "Shiro!
            "  they called again and again.
            Mr and Mrs Nakamura lived on a small island in Japan.
            They looked everywhere on the island, but they couldn't find Shiro.

            The next day Mr Nakamura heard a noise at the front door.
            He opened the door, and there was Shiro.
            Shiro was very wet, and he was shivering.

            A few days later Shiro disappeared again.
            He disappeared in the morning, and he came back late in the night.
            When he came back, he was wet and shivering.

            Shiro began to disappear often.
            He always disappeared in the morning and came back late at night.
            He was always wet when he came back.

            Mr Nakamura was curious.
            "Where does Shiro go?
            "  he wondered.
            "Why is he wet when he comes back?"

            One morning Mr Nakamura followed Shiro.
            Shiro walked to the beach, ran into the water, and began to swim.
            Mr Nakamura jumped into his boat and followed his dog.
            Shiro swam for about two miles (1).
            Then he was tired, so climbed onto a rock and rested.
            A few minutes later he jumped back into the water and continued swimming.

            Shiro swam for three hours.
            Then he arrived at an island.
            He walked onto the beach, shook the water off, and walked toward town.
            Mr Nakamura followed him.
            Shiro walked to a house.
            A dog was waiting in front of the house.
            Shiro ran to the dog, and the two dogs began to play.
            The dog's name was Marilyn.
            Marilyn was Shiro's girlfriend.

            Marilyn lived on Zamami, another Japanese island.
            Shiro and the Nakamuras used to live on Zamami.
            Then the Nakamuras moved to Aka, a smaller island.
            They took Shiro with them.
            Shiro missed Marilyn very much and wanted to be with her.
            But he wanted to be with the Nakamuras, too.
            So, Shiro lived with the Nakamuras on the island of Aka and swam to Zamami to visit Marilyn.

            People were amazed when they heard about Shiro.
            The distance from Aka to Zamami is two and a half miles (2), and the ocean between the islands is very rough.
            "Nobody can swim from Aka to Zamami!
            "  the people said.

            Shiro became famous.
            Many people went to Zamami because they wanted to see Shiro.
            During <span class="word" @click="showListTranslate('{{ 1 }}', $event)">one</span> Japanese holiday, 3.000 people visited Zamami.
            They waited on the beach for Shiro.
            "Maybe Shiro will swim to Zamami today," they said.
            They all wanted to see Shiro, the dog who was in <span >love</span>.
        </div>
        </div>
        <div id="footer-text-block" class="mt-4 mb-4">
            <div>
                <button class="btn btn-info">Все понятно</button>
            </div>
            <div class="mt-2">
                <small :class="{press: isPressLike, like: !isPressLike}">22</small>&nbsp;
                <i class="fa fa-thumbs-up" @click="actionPress('like')" :class="{press: isPressLike, like: !isPressLike}"></i>&nbsp;|
                <i class="fa fa-thumbs-down" @click="actionPress('dislike')" :class="{press: isPressDislike, dislike: !isPressDislike}"></i>&nbsp;
                <small :class="{press: isPressDislike, dislike: !isPressDislike}">33</small>
            </div>
        </div>
    </section>

    @include('components.list_translate')

    @include('dictionary::modal')

    @include('chat::modal')
@endsection

@push('scripts')
    <script>
        $('body').removeClass('body-background');

        var likedislikeComponent = {
            data: {
                pressed: '',
            },
            computed: {
                isPressLike: function(){
                    return this.pressed == 'like' ? true : false;
                },
                isPressDislike: function(){
                    return this.pressed == 'dislike' ? true : false;
                },
            },
            methods: {
                actionPress: function(btnType){
                    if(btnType == 'like' && this.isPressLike){
                        this.pressed = '';
                    }else if(btnType == 'dislike' && this.isPressDislike){
                        this.pressed = '';
                    }else{
                        this.pressed = btnType;
                    }
                },
            }
        };
        mixins.push(likedislikeComponent);
    </script>
@endpush
