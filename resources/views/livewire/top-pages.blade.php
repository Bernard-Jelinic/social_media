<div class="widget widget-jobs">
    <div class="sd-title">
        <h3>Top Pages</h3>
    </div>
    <div class="jobs-list">
        @foreach ($most_repeating_records as $user)
            <div class="job-info">
                <div class="job-details">
                    <h3>{{ $user->full_name }}</h3>
                    <p>{{ $user->headline }}</p>
                </div>
                <div class="hr-rate">
                    <img style="width: 35px;" src="{{ asset($user->profile_image) }}" alt="Profile image">
                </div>
            </div><!--job-info end-->
        @endforeach
    </div><!--jobs-list end-->
</div><!--widget-jobs end-->