<div class="dff-tab" id="tab-4">
    <form wire:submit="register">
        <div class="row">
            <div class="col-lg-12 no-pdd">
                @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="sn-field">
                    <input type="text" wire:model="first_name" placeholder="Name">
                    <i class="la la-building"></i>
                </div>
            </div>
            <div class="col-lg-12 no-pdd">
                @error('headline')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="sn-field">
                    <input type="text" wire:model="headline" placeholder="Headline">
                    <i class="la la-dropbox"></i>
                </div>
            </div>
            <div class="sn-field">
                <select wire:model="country_id">
                    <option>Select country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                <i class="la la-globe"></i>
            </div>
            <div class="col-lg-12 no-pdd">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="sn-field">
                    <input type="email" wire:model="email" placeholder="Email" required autofocus autocomplete="username">
                    <i class="la la-envelope"></i>
                </div>
            </div>
            <div class="col-lg-12 no-pdd">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="sn-field">
                    <input type="password" wire:model="password" placeholder="Password" required autocomplete="new-password">
                    <i class="la la-lock"></i>
                </div>
            </div>
            <div class="col-lg-12 no-pdd">
                <div class="sn-field">
                    <input type="password" wire:model="password_confirmation"
                        placeholder="Repeat Password" required autocomplete="new-password">
                    <i class="la la-lock"></i>
                </div>
            </div>
            <div class="col-lg-12 no-pdd">
                <button type="submit">Register</button>
            </div>
        </div>
    </form>
</div>