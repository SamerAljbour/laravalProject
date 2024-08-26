<!-- resources/views/frontend/about.blade.php -->
@extends('layouts.master')

@section('title', 'Property Submit')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section spad set-bg" data-setbg="img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h4>Property Submit</h4>
                    <div class="bt-option">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Property</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Property Submit Section Begin -->
<section class="property-submit-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="property-submit-form">
                    <form action="#">
                        <div class="pf-title">
                            <h4>Title</h4>
                            <input type="text" placeholder="Your Title*">
                        </div>
                        <div class="pf-summernote">
                            <h4>Content</h4>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link texteditor-switch" data-toggle="tab" href="#tabs-1" role="tab">Text</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link texteditor-switch active" data-toggle="tab" href="#tabs-2" role="tab">Visual</a>
                                </li>
                            </ul>
                            <textarea class="texteditor-content" name="example"></textarea>
                        </div>
                        <div class="pf-location">
                            <h4>Property Location</h4>
                            <div class="location-inputs">
                                <input type="text" placeholder="Address">
                                <input type="text" placeholder="Neighborhood">
                                <input type="text" placeholder="City">
                                <input type="text" placeholder="State">
                                <input type="text" placeholder="Country">
                                <input type="text" placeholder="Posta Code / Zip">
                            </div>
                        </div>
                        <div class="pf-map">
                            <h4>Goolge Map</h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="map-inputs">
                                        <input type="text" placeholder="Latitude">
                                        <input type="text" placeholder="Longitude">
                                        <input type="text" placeholder="Street View">
                                    </div>
                                    <button type="button" class="site-btn">PPlace the pin the address above</button>
                                </div>
                                <div class="col-lg-8">
                                    <div class="g-map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d735515.5813275519!2d-80.41163541934742!3d43.93644386501528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882a55bbf3de23d7%3A0x3ada5af229b47375!2sMono%2C%20ON%2C%20Canada!5e0!3m2!1sen!2sbd!4v1583262687289!5m2!1sen!2sbd" height="245" style="border:0;" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pf-type">
                            <h4>Property type</h4>
                            <div class="type-item">
                                <label for="pt-apart">Apartment
                                    <input type="checkbox" id="pt-apart">
                                    <span class="checkbox"></span>
                                </label>
                                <label for="pt-house">House
                                    <input type="checkbox" id="pt-house">
                                    <span class="checkbox"></span>
                                </label>
                                <label for="pt-off">Office
                                    <input type="checkbox" id="pt-off">
                                    <span class="checkbox"></span>
                                </label>
                                <label for="pt-villa">Villa
                                    <input type="checkbox" id="pt-villa">
                                    <span class="checkbox"></span>
                                </label>
                                <label for="pt-store">Store
                                    <input type="checkbox" id="pt-store">
                                    <span class="checkbox"></span>
                                </label>
                                <label for="pt-rest">Resturent
                                    <input type="checkbox" id="pt-rest">
                                    <span class="checkbox"></span>
                                </label>
                            </div>
                        </div>
                        <div class="pf-status">
                            <h4>Property status</h4>
                            <div class="status-item">
                                <label for="ps-rent">For rent
                                    <input type="checkbox" id="ps-rent">
                                    <span class="checkbox"></span>
                                </label>
                                <label for="ps-sale">For sale
                                    <input type="checkbox" id="ps-sale">
                                    <span class="checkbox"></span>
                                </label>
                            </div>
                        </div>
                        <div class="pf-feature-price">
                            <h4>Featured Price</h4>
                            <div class="fp-inputs">
                                <input type="text" placeholder="Price">
                                <input type="text" placeholder="Second Price ( Optional )">
                                <input type="text" placeholder="After Price Label (ex: monthly)">
                            </div>
                        </div>
                        <div class="pf-feature">
                            <h4>Property Features</h4>
                            <div class="features-list">
                                <div class="feature-item">
                                    <label for="air">Air conditioning
                                        <input type="checkbox" id="air">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="lundry">Laundry
                                        <input type="checkbox" id="lundry">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="refrigerator">Refrigerator
                                        <input type="checkbox" id="refrigerator">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="washer">Washer
                                        <input type="checkbox" id="washer">
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                                <div class="feature-item">
                                    <label for="barbeque">Barbeque
                                        <input type="checkbox" id="barbeque">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="lawn">Lawn
                                        <input type="checkbox" id="lawn">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="sauna">Sauna
                                        <input type="checkbox" id="sauna">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="wifi">Wifi
                                        <input type="checkbox" id="wifi">
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                                <div class="feature-item">
                                    <label for="dryer">Dryer
                                        <input type="checkbox" id="dryer">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="microwave">Microwave
                                        <input type="checkbox" id="microwave">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="pool">Swimming Pool
                                        <input type="checkbox" id="pool">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="window">Window Coverings
                                        <input type="checkbox" id="window">
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                                <div class="feature-item">
                                    <label for="gym">Gym
                                        <input type="checkbox" id="gym">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="shower">OutdoorShower
                                        <input type="checkbox" id="shower">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="tv">Tv Cable
                                        <input type="checkbox" id="tv">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="villa">Villa
                                        <input type="checkbox" id="villa">
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="pf-feature-image">
                            <h4>Featured Image</h4>
                            <div class="feature-image-content"></div>
                        </div>
                        <div class="pf-property-details">
                            <h4>Property details</h4>
                            <div class="property-details-inputs">
                                <input type="text" placeholder="Property ID">
                                <input type="text" placeholder="Area Size ( Only digits )">
                                <input type="text" placeholder="Size Prefix">
                                <input type="text" placeholder="Bedrooms">
                                <input type="text" placeholder="Bathrooms">
                                <input type="text" placeholder="Garages">
                                <input type="text" placeholder="Garages Size">
                                <input type="text" placeholder="Year Built">
                                <input type="text" placeholder="Virtual Tour Video URL">
                            </div>
                            <button type="submit" class="site-btn">Submit Property</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Property Submit Section End -->

<!-- Contact Section Begin -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-info">
                    <div class="ci-item">
                        <div class="ci-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="ci-text">
                            <h5>Address</h5>
                            <p>160 Pennsylvania Ave NW, Washington, Castle, PA 16101-5161</p>
                        </div>
                    </div>
                    <div class="ci-item">
                        <div class="ci-icon">
                            <i class="fa fa-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <h5>Phone</h5>
                            <ul>
                                <li>125-711-811</li>
                                <li>125-668-886</li>
                            </ul>
                        </div>
                    </div>
                    <div class="ci-item">
                        <div class="ci-icon">
                            <i class="fa fa-headphones"></i>
                        </div>
                        <div class="ci-text">
                            <h5>Support</h5>
                            <p>Support.aler@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cs-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d735515.5813275519!2d-80.41163541934742!3d43.93644386501528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882a55bbf3de23d7%3A0x3ada5af229b47375!2sMono%2C%20ON%2C%20Canada!5e0!3m2!1sen!2sbd!4v1583262687289!5m2!1sen!2sbd" height="450" style="border:0;" allowfullscreen=""></iframe>
    </div>
</section>
<!-- Contact Section End -->
@endsection
