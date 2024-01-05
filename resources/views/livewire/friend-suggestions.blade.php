<div class="suggestions full-width">
    <div class="sd-title">
        <h3>Suggestions</h3>
    </div><!--sd-title end-->
    <div class="suggestions-list">
        @foreach ($suggestions as $suggestion)
            <div class="suggestion-usd">
                <img style="width: 35px;" src="{{ asset($suggestion->profile_image) }}" alt="Profile image">
                <div class="sgt-text">
                    <h4>{{ $suggestion->full_name }}</h4>
                    <span>{{ $suggestion->headline }}</span>
                </div>
                <span wire:click="addSuggestionFriend({{ $suggestion }})"><i class="la la-plus"></i></span>
            </div>    
        @endforeach
    </div><!--suggestions-list end-->
</div><!--suggestions end-->
