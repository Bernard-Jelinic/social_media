@extends('layouts.app')

@section('content')

    <section class="messages-page">
        <div class="container">
            <div class="messages-sec">
                <div class="row">
                    @livewire('left-side-all-chat-conversations')
                    <div class="col-lg-8 col-md-12 pd-right-none pd-left-none">
                        @livewire('chat-conversation')
                    </div>
                </div>
            </div><!--messages-sec end-->
        </div>
    </section><!--messages-page end-->

    @include('partials.footer')
@endsection