@extends('layouts.diploma.diploma')

@section('content')
<div style="margin-top: 200px; margin-bottom: 200px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Проверьте свой адрес электронной почты</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            На ваш адрес электронной почты была отправлена новая ссылка для проверки.
                        </div>
                    @endif
                        Прежде чем войти в личный кабинет, проверьте свою электронную почту на наличие проверочной ссылки.
                        Если вы не получили письмо,
                    <form class="visible-md-inline-block visible-lg-inline-block" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">нажмите здесь, чтобы запросить другое</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
