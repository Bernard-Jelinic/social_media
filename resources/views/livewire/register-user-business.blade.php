<div>
    <div class="signup-tab">
        <ul>
            <li wire:click="differentTab" class="{{ $isRegisterUserForm == false ? 'current' : '' }}"><a href="#" title="">User</a></li>
            <li wire:click="differentTab" class="{{ $isRegisterUserForm == true ? 'current' : '' }}"><a href="#" title="">Business Page</a></li>
        </ul>
    </div>
    @if($isRegisterUserForm == false)
        <form wire:submit="registerUser">
            <div class="row">
                @error('registerUserForm.first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input type="text" id="first_name" wire:model="registerUserForm.first_name" placeholder="First Name" required autofocus autocomplete="first_name">
                        <i class="la la-user"></i>
                    </div>
                </div>
                @error('registerUserForm.last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input type="text" id="last_name" wire:model="registerUserForm.last_name" placeholder="Last Name" required autofocus autocomplete="last_name">
                        <i class="la la-user"></i>
                    </div>
                </div>
                @error('registerUserForm.headline')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input type="text" wire:model="registerUserForm.headline" placeholder="Headline">
                        <i class="la la-dropbox"></i>
                    </div>
                </div>
                @error('registerUserForm.country_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <select wire:model="registerUserForm.country_id">
                            <option value="null">Select country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <i class="la la-globe"></i>
                    </div>
                </div>
                @error('registerUserForm.email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input type="email" id="email" wire:model="registerUserForm.email" placeholder="Email" required autofocus autocomplete="username">
                        <i class="la la-envelope"></i>
                    </div>
                </div>
                @error('registerUserForm.password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input type="password" id="password" wire:model="registerUserForm.password" placeholder="Password" required autocomplete="new-password">
                        <i class="la la-lock"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input type="password" id="password_confirmation" wire:model="registerUserForm.password_confirmation"
                            placeholder="Repeat Password" required autocomplete="new-password">
                        <i class="la la-lock"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <button type="submit">Register</button>
                </div>
            </div>
        </form>
    @else
        <form wire:submit="registerBusiness">
            <div class="row">
                <div class="col-lg-12 no-pdd">
                    @error('registerBusinessForm.first_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="sn-field">
                        <input type="text" wire:model="registerBusinessForm.first_name" placeholder="Name">
                        <i class="la la-building"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    @error('registerBusinessForm.headline')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="sn-field">
                        <input type="text" wire:model="registerBusinessForm.headline" placeholder="Headline">
                        <i class="la la-dropbox"></i>
                    </div>
                </div>
                <div class="sn-field">
                    <select wire:model="registerBusinessForm.country_id">
                        <option>Select country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    <i class="la la-globe"></i>
                </div>
                <div class="col-lg-12 no-pdd">
                    @error('registerBusinessForm.email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="sn-field">
                        <input type="email" wire:model="registerBusinessForm.email" placeholder="Email" required autofocus autocomplete="username">
                        <i class="la la-envelope"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    @error('registerBusinessForm.password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="sn-field">
                        <input type="password" wire:model="registerBusinessForm.password" placeholder="Password" required autocomplete="new-password">
                        <i class="la la-lock"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input type="password" wire:model="registerBusinessForm.password_confirmation"
                            placeholder="Repeat Password" required autocomplete="new-password">
                        <i class="la la-lock"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <button type="submit">Register</button>
                </div>
            </div>
        </form>
    @endif
</div>
