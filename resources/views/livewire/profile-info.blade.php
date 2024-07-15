<div>

    <div class="user-profile-ov overview-edit">
        <h3>Personal information</h3>
        @if ($is_profile_of_logged_in_user == true)
            <form wire:submit="savePersonalInformation">

                <label for="fname">First name:</label>
                <input type="text" wire:model="first_name"><br><br>

                <label for="lname">Last name:</label>
                <input type="text" wire:model="last_name"><br><br>

                <label for="lname">Headline:</label>
                <input type="text" wire:model="headline"><br><br>

                <button class="save close-box-about-click-about" wire:click="savePersonalInformation">Save</button>
                <button class="cancel close-box-about">Cancel</button>
            </form>
        @else
            <h4>{{ $user->full_name }}</h4>
            <p>{{ $user->headline }}</p>
        @endif
    </div>

    <div class="user-profile-ov overview-edit">
        <h3>About</h3>
        @if ($is_profile_of_logged_in_user == true)
            <span>5000 character left</span>
            <form wire:submit="saveAbout">
                <textarea wire:model="about"></textarea>
                <button class="save close-box-about-click-about" wire:click="saveAbout">Save</button>
                <button class="cancel close-box-about">Cancel</button>
            </form>
        @else
            <p>{{ $user->about }}</p>
        @endif
    </div>

    <div class="user-profile-ov overview-edit">
        <h3>Location</h3>
        @if ($is_profile_of_logged_in_user == true)
            <form>
                <div class="datefm">
                    <select wire:model="country_id" wire:model.live="selectedCountry">
                        <option>Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}"
                                @if ($country->id == $user->country->id)
                                    selected="selected"
                                @endif
                                >{{ $country->name }}</option>
                        @endforeach
                    </select>
                    <i class="fa fa-globe"></i>
                </div>
                <div class="datefm">
                    <select wire:model="city_id" wire:model.live="selectedCity" wire:key="selectedCountry">
                        <option>City</option>
                        @foreach (App\Models\City::where('country_id', $selectedCountry->id)->get() as $city)
                            <option value="{{ $city->id }}"
                                @if ($city->id == $user->city->id)
                                    selected="selected"
                                @endif
                                >{{ $city->name }}</option>
                        @endforeach
                    </select>
                    <i class="fa fa-map-marker"></i>
                </div>
                <button class="save" wire:click="saveLocation">Save</button>
                <button class="cancel">Cancel</button>
            </form>
        @else
            <h4>{{ $user->country->name }}</h4>
            <p>{{ $user->city->name }}</p>
        @endif
    </div><!--user-profile-ov end-->
</div><!--product-feed-tab end-->