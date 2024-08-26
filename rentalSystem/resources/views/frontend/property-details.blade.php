<!-- resources/views/frontend/about.blade.php -->
@extends('layouts.master')

@section('title', 'Property Details')

@section('content')
<style>
.rating .stars i {
    font-size: 24px;
    color: #ccc; /* Default star color */
    cursor: pointer;
    transition: color 0.3s ease;
}

.rating .stars i.selected,
.rating .stars i:hover,
.rating .stars i:hover ~ i {
    color: #f39c12; /* Color for selected or hovered stars */
}

.rating .stars i:hover ~ i {
    color: #ccc; /* Revert color of stars to the right */
}


</style>
<!-- Property Details Section Begin -->
<section class="property-details-section">
    @if (session('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('commentError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('commentError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="property-pic-slider owl-carousel">
        <div class="ps-item">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 p-0">
                                <div class="ps-item-inner large-item set-bg" data-setbg="{{ asset('img/property/slider/ps-1.jpg') }}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-sm-6 p-0">
                                <div class="ps-item-inner set-bg" data-setbg=" {{ asset('img/property/slider/ps-2.jpg') }}"></div>
                            </div>
                            <div class="col-sm-6 p-0">
                                <div class="ps-item-inner set-bg" data-setbg="{{ asset('img/property/slider/ps-3.jpg') }}"></div>
                            </div>
                            <div class="col-sm-6 p-0">
                                <div class="ps-item-inner set-bg" data-setbg="{{ asset('img/property/slider/ps-4.jpg') }}"></div>
                            </div>
                            <div class="col-sm-6 p-0">
                                <div class="ps-item-inner set-bg" data-setbg="{{ asset('img/property/slider/ps-5.jpg') }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-item">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 p-0">
                                <div class="ps-item-inner large-item set-bg" data-setbg="{{ asset('img/property/slider/ps-1.jpg') }}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-sm-6 p-0">
                                <div class="ps-item-inner set-bg" data-setbg="{{ asset('img/property/slider/ps-2.jpg') }}"></div>
                            </div>
                            <div class="col-sm-6 p-0">
                                <div class="ps-item-inner set-bg" data-setbg="{{ asset('img/property/slider/ps-2.jpg') }}"></div>
                            </div>
                            <div class="col-sm-6 p-0">
                                <div class="ps-item-inner set-bg" data-setbg="{{ asset('img/property/slider/ps-4.jpg') }}"></div>
                            </div>
                            <div class="col-sm-6 p-0">
                                <div class="ps-item-inner set-bg" data-setbg="{{ asset('img/property/slider/ps-5.jpg') }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="pd-text">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="pd-title">
                                <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                                <div class="label">For rent</div>
                                <div class="pt-price">{{ $property->price_per_day }}<span>/day</span></div>
                                <h3>{{ $property->title }}</h3>
                                <p><span class="icon_pin_alt"></span> {{ $property->address }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="pd-social">

                                <a href="#"><i class="fa fa-mail-forward"></i></a>
                                <a href="#"><i class="fa fa-send"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="#"><i class="fa fa-mail-forward"></i></a>
                                <a href="#"><i class="fa fa-cloud-download"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="pd-board">
                        <div class="tab-board">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Amenities</a>
                                </li>
                            </ul><!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="tab-details">
                                        <ul class="left-table">
                                            <li>
                                                <span class="type-name">Property Type</span>
                                                <span class="type-value">House</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Rating</span>
                                                <span class="type-value">
                                                    @php
                                                    $sum = 0;
                                                    @endphp
                                                    @foreach ($reviews as $review)
                                                        @php
                                                         $sum += $review->rating
                                                         @endphp
                                                    @endforeach
                                                    @if ($sum != 0)

                                                    {{ number_format($sum/$countOfReview , 1) }} of 5
                                                    @endif
                                                    @if ($sum == 0)

                                                    No Review
                                                    @endif
                                                </span>
                                            </li>
                                            <li>
                                                <span class="type-name">Price</span>
                                                <span class="type-value">${{ $property->price_per_day }}/Day</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Year Built</span>
                                                <span class="type-value">2019</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Contract type</span>
                                                <span class="type-value">Rent</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Agent</span>
                                                <span class="type-value">{{ $property->user->name }}</span>
                                            </li>
                                        </ul>
                                        <ul class="right-table">
                                            <li>
                                                <span class="type-name">Home Area</span>
                                                <span class="type-value">1200 sqft</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Rooms</span>
                                                <span class="type-value">{{ $property->number_of_rooms }}</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Bedrooms</span>
                                                <span class="type-value">{{ $property->number_of_bedrooms }}</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Bathrooms</span>
                                                <span class="type-value">{{ $property->number_of_bathrooms }}</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Garages</span>
                                                <span class="type-value">{{ $property->number_of_garage }}</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Amenities</span>
                                                <span class="type-value">
                                                    @if ($property->AC == 1)
                                                        AC
                                                    @endif
                                                    @if ($property->WIFI == 1)
                                                    WIFI
                                                    @endif
                                                    @if ($property->pool == 1)
                                                    Pool
                                                    @endif
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-2" role="tabpanel">
                                    <div class="tab-desc">
                                        <p>{{ $property->description }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-3" role="tabpanel">
                                    <div class="tab-details">
                                        <ul class="left-table">
                                            <li>
                                                <span class="type-name">Property Type</span>
                                                <span class="type-value">House</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Property ID</span>
                                                <span class="type-value">#219</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Price</span>
                                                <span class="type-value">$ 289.0/mounth</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Year Built</span>
                                                <span class="type-value">2019</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Contract type</span>
                                                <span class="type-value">Rent</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Agent</span>
                                                <span class="type-value">Ashton Kutcher</span>
                                            </li>
                                        </ul>
                                        <ul class="right-table">
                                            <li>
                                                <span class="type-name">Home Area</span>
                                                <span class="type-value">1200 sqft</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Rooms</span>
                                                <span class="type-value">9</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Bedrooms</span>
                                                <span class="type-value">4</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Bathrooms</span>
                                                <span class="type-value">3</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Garages</span>
                                                <span class="type-value">2</span>
                                            </li>
                                            <li>
                                                <span class="type-name">Parking lots</span>
                                                <span class="type-value">2</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pd-widget" >
                        <h4>{{ $countOfReview }} reviews</h4>
                        <div class="pd-review"style="overflow-y: auto; max-height: 260px;">
                            @foreach ($reviews as $review )

                            <div class="pr-item">
                                <div class="pr-avatar">
                                    <div class="pr-pic">
                                        <img src="{{ asset('img/property/details/review/review-1.jpg') }}" alt="">
                                    </div>
                                    <div class="pr-text">
                                        <h6>{{ $review->renter->name }}</h6>
                                        <span>{{ $review->created_at->format('d M Y') }}</span>
                                        <div class="pr-rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star{{ $review->rating >= $i ? '' : '-o' }}"></i>
                                        @endfor
                                        </div>
                                    </div>
                                </div>
                                <p>{{ $review->comment }}</p>
                                          </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="pd-widget">
                        <h4>Your Rating</h4>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                 {{ session('success') }}
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            </div>
                        @endif



                        <form action="  {{ route('submitReview' ,$property->id) }}" method="POST" class="review-form">
                            @csrf <!-- Ensure you include this if youre using Laravel for CSRF protection -->
                            <div class="group-input">
                                <input type="hidden" name="property_id" value="{{ $property->id }}">
                                <input type="hidden" name="renter_id" value="{{  Auth::id() }}">
                                <input type="number" name="rating" id="rating" hidden>
                                <textarea type="text" name="comment" placeholder="Your comment" required style="max-width: 47vw"></textarea>
                            </div>



                            <div class="rating">
                                <span>Your Rating:</span>
                                <div class="stars">
                                    <i class="fa fa-star" data-value="1"></i>
                                    <i class="fa fa-star" data-value="2"></i>
                                    <i class="fa fa-star" data-value="3"></i>
                                    <i class="fa fa-star" data-value="4"></i>
                                    <i class="fa fa-star" data-value="5"></i>
                                </div>
                            </div>
                            <button type="submit" class="site-btn">Send Review</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="property-sidebar">
                    <div class="single-sidebar">
                        <div class="section-title sidebar-title">
                            <h5>Owner</h5>
                        </div>
                        <div class="top-agent">
                            <div class="ta-item">
                                <div class="ta-pic set-bg" data-setbg="{{ asset('img/property/details/sidebar/ta-1.jpg') }}"></div>
                                <div class="ta-text">
                                    <h6><a href="#">{{ $property->user->name }}</a></h6>
                                    {{-- <span>Team Leader</span> --}}
                                    <div class="ta-num">123-455-688</div>
                                </div>
                            </div>

                        </div>
                    </div>

                   <div class="single-sidebar">
                       @if (session('successBook'))
                                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('successBook') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                               </div>
                                               @endif
    <div class="section-title sidebar-title">
        <h5>Mortgage Calculator</h5>
    </div>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
    <form action="{{ route('bookings.store' , $property->id) }}" method="POST" class="calculator-form">
        @csrf
        <!-- Hidden input to store property_id -->
        <input type="hidden" id="property_id" name="property_id" value="{{$property->id }}">
        <div class="filter-input">
            <p>Start Date</p>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}">
        </div>
        <div class="filter-input">
            <p>End Date</p>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}">
        </div>
        <div class="filter-input">
            <p>Total Price</p>
            <input type="text" id="total_price" name="total_price" placeholder="$" value="{{ $property->price_per_day }}">
        </div>
        <button type="submit" class="site-btn">Book</button>
    </form>
</div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Property Details Section End -->

    </form>
</div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Property Details Section End -->


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
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.rating .stars i');
    const ratingInput = document.getElementById('rating');

    stars.forEach((star) => {
        // Handle click event
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            ratingInput.value = value;

            // Remove 'selected' class from all stars
            stars.forEach(s => s.classList.remove('selected'));

            // Add 'selected' class to the clicked star and all preceding stars
            this.classList.add('selected');
            let prev = this.previousElementSibling;
            while (prev) {
                prev.classList.add('selected');
                prev = prev.previousElementSibling;
            }
        });

        // Handle mouseover event
        star.addEventListener('mouseover', function() {
            // Add hover effect to the current star and all preceding stars
            this.classList.add('hover');
            let prev = this.previousElementSibling;
            while (prev) {
                prev.classList.add('hover');
                prev = prev.previousElementSibling;
            }
        });

        // Handle mouseout event
        star.addEventListener('mouseout', function() {
            // Remove hover effect from all stars
            stars.forEach(s => s.classList.remove('hover'));
        });
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const propertyPrice = parseFloat('{{ $property->price_per_day  }}');
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');
    const totalPriceInput = document.getElementById('total_price');

    function calculateTotalPrice() {
        const startDateValue = startDateInput.value;
        const endDateValue = endDateInput.value;

        if (startDateValue && endDateValue) {
            const startDate = new Date(startDateValue);
            const endDate = new Date(endDateValue);

            if (endDate >= startDate) {
                const days = (endDate - startDate) / (1000 * 60 * 60 * 24);
                totalPriceInput.value = (days * propertyPrice).toFixed(2);
            } else {
                totalPriceInput.value = '';
            }
        } else {
            totalPriceInput.value = '';
        }
    }

    startDateInput.addEventListener('input', calculateTotalPrice);
    endDateInput.addEventListener('input', calculateTotalPrice);
});

    </script>

</section>
<!-- Contact Section End -->
@endsection

