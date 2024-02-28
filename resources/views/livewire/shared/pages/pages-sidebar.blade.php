<div class="widget widget-jobs">
    <div class="sd-title">
        <h3>{{ $title }}</h3>
    </div>
    <div class="jobs-list">
        @foreach ($users as $user)
            <a class="job-info" href="{{ route('profile.show', $user->id) }}">
                    <div class="job-details">
                        <h3>{{ $user->full_name }}</h3>
                        <p>{{ $user->headline }}</p>
                    </div>
                    <div class="hr-rate">
                        <img style="width: 35px;" src="{{ asset($user->profile_image) }}" alt="Profile image">
                    </div>
            </a><!--job-info end-->
        @endforeach
    </div><!--jobs-list end-->
</div><!--widget-jobs end-->