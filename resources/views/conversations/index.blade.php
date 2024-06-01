@extends('layouts.app')

@section('content')

    <section class="messages-page">
        <div class="container">
            <div class="messages-sec">
                <div class="row">
                    @livewire('chat-conversation-all-left-side')
                    <div class="col-lg-8 col-md-12 pd-right-none pd-left-none">
                        @livewire('chat-conversation-main')
                    </div>
                </div>
            </div><!--messages-sec end-->
        </div>
    </section><!--messages-page end-->

    @include('partials.footer')
@endsection