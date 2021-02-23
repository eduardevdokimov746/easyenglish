@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">

            <div class="head-content mb-4">
                <h1 class="heading col">Задание 20.20.2020 (<span>Перевод</span>)</h1>
            </div>

            @include('studentsection/zadanie::components/otvety_na_voprosy')

            @include('studentsection/zadanie::components/perevod')

            @include('studentsection/zadanie::components/sopostavlenie_slov')

            @include('studentsection/zadanie::components/perevod_slov')

        </div>
    </section>
@endsection


