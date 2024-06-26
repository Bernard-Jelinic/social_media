@extends('layouts.app')

@section('content')

<section class="cover-sec">
    <img src="http://via.placeholder.com/1600x400" alt="">
    <a href="#" title=""><i class="fa fa-camera"></i> Change Image</a>
</section>

<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="main-left-sidebar">
                            <div class="user_profile">
                                <livewire:upload-profile-image :is_profile_of_logged_in_user="$is_profile_of_logged_in_user" :user_profile="$user"/>
                                
                                @if (!$is_profile_of_logged_in_user)
                                    <livewire:friend-management :user_profile="$user"/>
                                @endif

                            </div><!--user_profile end-->
                            @if ($is_profile_of_logged_in_user)
                                <livewire:profile-viewers/>
                            @endif
                        </div><!--main-left-sidebar end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="main-ws-sec">
                            <div class="user-tab-sec">
                                <h3>{{ $user->full_name }}</h3>
                                @if ( !is_null($user->headline) )
                                    <div class="star-descp">
                                        <span>{{ $user->headline }}</span>
                                    </div><!--star-descp end-->
                                    @endif
                                <div class="tab-feed st2">
                                    <ul>
                                        <li data-tab="feed-dd" class="active">
                                            <a href="#" title="">
                                                <img src="{{ asset('assets/images/ic1.png') }}" alt="">
                                                <span>Feed</span>
                                            </a>
                                        </li>
                                        <li data-tab="info-dd">
                                            <a href="#" title="">
                                                <img src="{{ asset('assets/images/ic2.png') }}" alt="">
                                                <span>Info</span>
                                            </a>
                                        </li>
                                        <li data-tab="portfolio-dd">
                                            <a href="#" title="">
                                                <img src="{{ asset('assets/images/ic3.png') }}" alt="">
                                                <span>Portfolio</span>
                                            </a>
                                        </li>
                                        <li data-tab="friends-request">
                                            <a href="#" title="">
                                                <img src="{{ asset('assets/images/ic6.png') }}" alt="">
                                                <span>Friend requests</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- tab-feed end-->
                            </div><!--user-tab-sec end-->

                            <livewire:post-central :is_profile_of_logged_in_user="$is_profile_of_logged_in_user" :user="$user"/>

                            <div class="product-feed-tab" id="info-dd">
                                <div class="user-profile-ov">
                                    <h3><a href="#" title="" class="overview-open">Overview</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
                                    <p>{{ $user->about }}</p>
                                </div><!--user-profile-ov end-->
                                <div class="user-profile-ov st2">
                                    <h3><a href="#" title="" class="exp-bx-open">Experience </a><a href="#" title="" class="exp-bx-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="exp-bx-open"><i class="fa fa-plus-square"></i></a></h3>
                                    <h4>Web designer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                    <h4>UI / UX Designer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id.</p>
                                    <h4>PHP developer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
                                    <p class="no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                </div><!--user-profile-ov end-->
                                <div class="user-profile-ov">
                                    <h3><a href="#" title="" class="ed-box-open">Education</a> <a href="#" title="" class="ed-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title=""><i class="fa fa-plus-square"></i></a></h3>
                                    <h4>Master of Computer Science</h4>
                                    <span>2015 - 2018</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                </div><!--user-profile-ov end-->
                                <div class="user-profile-ov">
                                    <h3><a href="#" title="" class="lct-box-open">Location</a> <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title=""><i class="fa fa-plus-square"></i></a></h3>
                                    <h4>India</h4>
                                    <p>151/4 BT Chownk, Delhi </p>
                                </div><!--user-profile-ov end-->
                                <div class="user-profile-ov">
                                    <h3><a href="#" title="" class="skills-open">Skills</a> <a href="#" title="" class="skills-open"><i class="fa fa-pencil"></i></a> <a href="#"><i class="fa fa-plus-square"></i></a></h3>
                                    <ul>
                                        <li><a href="#" title="">HTML</a></li>
                                        <li><a href="#" title="">PHP</a></li>
                                        <li><a href="#" title="">CSS</a></li>
                                        <li><a href="#" title="">Javascript</a></li>
                                        <li><a href="#" title="">Wordpress</a></li>
                                        <li><a href="#" title="">Photoshop</a></li>
                                        <li><a href="#" title="">Illustrator</a></li>
                                        <li><a href="#" title="">Corel Draw</a></li>
                                    </ul>
                                </div><!--user-profile-ov end-->
                            </div><!--product-feed-tab end-->
                            <div class="product-feed-tab" id="portfolio-dd">
                                <div class="portfolio-gallery-sec">
                                    <h3>Portfolio</h3>
                                    <div class="gallery_pf">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                <div class="gallery_pt">
                                                    <img src="http://via.placeholder.com/271x174" alt="">
                                                    <a href="#" title=""><img src="{{ asset('assets/images/all-out.png') }}" alt=""></a>
                                                </div><!--gallery_pt end-->
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                <div class="gallery_pt">
                                                    <img src="http://via.placeholder.com/170x170" alt="">
                                                    <a href="#" title=""><img src="{{ asset('assets/images/all-out.png') }}" alt=""></a>
                                                </div><!--gallery_pt end-->
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                <div class="gallery_pt">
                                                    <img src="http://via.placeholder.com/170x170" alt="">
                                                    <a href="#" title=""><img src="{{ asset('assets/images/all-out.png') }}" alt=""></a>
                                                </div><!--gallery_pt end-->
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                <div class="gallery_pt">
                                                    <img src="http://via.placeholder.com/170x170" alt="">
                                                    <a href="#" title=""><img src="{{ asset('assets/images/all-out.png') }}" alt=""></a>
                                                </div><!--gallery_pt end-->
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                <div class="gallery_pt">
                                                    <img src="http://via.placeholder.com/170x170" alt="">
                                                    <a href="#" title=""><img src="{{ asset('assets/images/all-out.png') }}" alt=""></a>
                                                </div><!--gallery_pt end-->
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                <div class="gallery_pt">
                                                    <img src="http://via.placeholder.com/170x170" alt="">
                                                    <a href="#" title=""><img src="{{ asset('assets/images/all-out.png') }}" alt=""></a>
                                                </div><!--gallery_pt end-->
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                <div class="gallery_pt">
                                                    <img src="http://via.placeholder.com/170x170" alt="">
                                                    <a href="#" title=""><img src="{{ asset('assets/images/all-out.png') }}" alt=""></a>
                                                </div><!--gallery_pt end-->
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                <div class="gallery_pt">
                                                    <img src="http://via.placeholder.com/170x170" alt="">
                                                    <a href="#" title=""><img src="{{ asset('assets/images/all-out.png') }}" alt=""></a>
                                                </div><!--gallery_pt end-->
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                <div class="gallery_pt">
                                                    <img src="http://via.placeholder.com/170x170" alt="">
                                                    <a href="#" title=""><img src="{{ asset('assets/images/all-out.png') }}" alt=""></a>
                                                </div><!--gallery_pt end-->
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                <div class="gallery_pt">
                                                    <img src="http://via.placeholder.com/170x170" alt="">
                                                    <a href="#" title=""><img src="{{ asset('assets/images/all-out.png') }}" alt=""></a>
                                                </div><!--gallery_pt end-->
                                            </div>
                                        </div>
                                    </div><!--gallery_pf end-->
                                </div><!--portfolio-gallery-sec end-->
                            </div><!--product-feed-tab end-->
                            <div class="product-feed-tab" id="friends-request">
                                <div class="add-billing-method">
                                    <livewire:friend-request />
                                </div>
                            </div><!--product-feed-tab end-->
                        </div><!--main-ws-sec end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="right-sidebar">
                            <div class="message-btn">
                                <a href="{{ route('conversations.createOpenConversation', ['participant_one' => auth()->id(), 'participant_two' => $user->id] ) }}" title="Message"><i class="fa fa-envelope"></i> Message</a>
                            </div>
                            <div class="widget widget-portfolio">
                                <div class="wd-heady">
                                    <h3>Portfolio</h3>
                                    <img src="{{ asset('assets/images/photo-icon.png') }}" alt="">
                                </div>
                                <div class="pf-gallery">
                                    <ul>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                    </ul>
                                </div><!--pf-gallery end-->
                            </div><!--widget-portfolio end-->
                        </div><!--right-sidebar end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div> 
    </div>
</main>

<footer>
    <div class="footy-sec mn no-margin">
        <div class="container">
            <ul>
                <li><a href="#" title="">Help Center</a></li>
                <li><a href="#" title="">Privacy Policy</a></li>
                <li><a href="#" title="">Community Guidelines</a></li>
                <li><a href="#" title="">Cookies Policy</a></li>
                <li><a href="#" title="">Career</a></li>
                <li><a href="#" title="">Forum</a></li>
                <li><a href="#" title="">Language</a></li>
                <li><a href="#" title="">Copyright Policy</a></li>
            </ul>
            <p><img src="{{ asset('assets/images/copy-icon2.png') }}" alt="">Copyright 2018</p>
            <img class="fl-rgt" src="{{ asset('assets/images/logo2.png') }}" alt="">
        </div>
    </div>
</footer><!--footer end-->

<div class="overview-box" id="overview-box">
    <div class="overview-edit">
        <h3>Overview</h3>
        <span>5000 character left</span>
        <form>
            <textarea>{{ $user->about }}</textarea>
            <button type="submit" class="save">Save</button>
            <button type="submit" class="cancel">Cancel</button>
        </form>
        <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div><!--overview-edit end-->
</div><!--overview-box end-->

<div class="overview-box" id="experience-box">
    <div class="overview-edit">
        <h3>Experience</h3>
        <form>
            <input type="text" name="subject" placeholder="Subject">
            <textarea></textarea>
            <button type="submit" class="save">Save</button>
            <button type="submit" class="save-add">Save & Add More</button>
            <button type="submit" class="cancel">Cancel</button>
        </form>
        <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div><!--overview-edit end-->
</div><!--overview-box end-->

<div class="overview-box" id="education-box">
    <div class="overview-edit">
        <h3>Education</h3>
        <form>
            <input type="text" name="school" placeholder="School / University">
            <div class="datepicky">
                <div class="row">
                    <div class="col-lg-6 no-left-pd">
                        <div class="datefm">
                            <input type="text" name="from" placeholder="From" class="datepicker">	
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                    <div class="col-lg-6 no-righ-pd">
                        <div class="datefm">
                            <input type="text" name="to" placeholder="To" class="datepicker">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <input type="text" name="degree" placeholder="Degree">
            <textarea placeholder="Description"></textarea>
            <button type="submit" class="save">Save</button>
            <button type="submit" class="save-add">Save & Add More</button>
            <button type="submit" class="cancel">Cancel</button>
        </form>
        <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div><!--overview-edit end-->
</div><!--overview-box end-->

<div class="overview-box" id="location-box">
    <div class="overview-edit">
        <h3>Location</h3>
        <form>
            <div class="datefm">
                <select>
                    <option>Country</option>
                    <option value="pakistan">Pakistan</option>
                    <option value="england">England</option>
                    <option value="india">India</option>
                    <option value="usa">United Sates</option>
                </select>
                <i class="fa fa-globe"></i>
            </div>
            <div class="datefm">
                <select>
                    <option>City</option>
                    <option value="london">London</option>
                    <option value="new-york">New York</option>
                    <option value="sydney">Sydney</option>
                    <option value="chicago">Chicago</option>
                </select>
                <i class="fa fa-map-marker"></i>
            </div>
            <button type="submit" class="save">Save</button>
            <button type="submit" class="cancel">Cancel</button>
        </form>
        <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div><!--overview-edit end-->
</div><!--overview-box end-->

<div class="overview-box" id="skills-box">
    <div class="overview-edit">
        <h3>Skills</h3>
        <ul>
            <li><a href="#" title="" class="skl-name">HTML</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
            <li><a href="#" title="" class="skl-name">php</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
            <li><a href="#" title="" class="skl-name">css</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
        </ul>
        <form>
            <input type="text" name="skills" placeholder="Skills">
            <button type="submit" class="save">Save</button>
            <button type="submit" class="save-add">Save & Add More</button>
            <button type="submit" class="cancel">Cancel</button>
        </form>
        <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div><!--overview-edit end-->
</div><!--overview-box end-->

<div class="overview-box" id="create-portfolio">
    <div class="overview-edit">
        <h3>Create Portfolio</h3>
        <form>
            <input type="text" name="pf-name" placeholder="Portfolio Name">
            <div class="file-submit">
                <input type="file" name="file">
            </div>
            <div class="pf-img">
                <img src="http://via.placeholder.com/60x60" alt="">
            </div>
            <input type="text" name="website-url" placeholder="htp://www.example.com">
            <button type="submit" class="save">Save</button>
            <button type="submit" class="cancel">Cancel</button>
        </form>
        <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div><!--overview-edit end-->
</div><!--overview-box end-->
@endsection