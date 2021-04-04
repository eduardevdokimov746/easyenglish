@extends('layouts.auth')

@section('content')
    <div class="form-div mt-5">
        <div class="banner-form-w3">
            <div class="padding">
                <form action="{{ route('web_show_reset_form') }}" class='form-auth form-input-code' method="get">
                    <div class="form-style">
                        <h5 class="mb-3">КОД ВОССТАНОВЛЕНИЯ ПАРОЛЯ</h5>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="list-style: none">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div>
                            <span>На указанную эл. почту было отправленно письмо с кодом восстановления.</span>
                        </div>

                        <div class="div-input">
                            <input placeholder="Введите код" name="code" v-model="$v.fields.forgotCode.$model" type="text">

                            <div class='div-error-auth' v-if="statusValidation($v.fields.forgotCode, $v.fields.forgotCode.required)">
                                <span>{{ __('ship::validation.required', ['attribute' => __('ship::attributes.forgot-code')]) }}</span>
                            </div>
                        </div>


                        <button class="btn btn-submit" :disabled="isActiveBtn">Отправить</button>

                        <div class='ext-action-form' style="padding: 5px 0 0 0">
                            <span>
                                <a href="{{ route('web_show_forgot_form') }}">ПОЛУЧИТЬ КОД</a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        validation = {
            fields:{
                forgotCode: {
                    required
                },
            }
        };

        var forgotCodeComponent = {
            data: {
                fields: {
                    forgotCode: '',
                },
            },
            computed: {
                isActiveBtn(){
                    return this.statusValidation(this.$v.fields, this.$v.fields.$error) ? null : 'disabled';
                }
            }
        };

        mixins.push(forgotCodeComponent);
    </script>
@endpush
