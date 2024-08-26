<!-- resources/views/frontend/about.blade.php -->
@extends('layouts.master')

@section('title', 'agents')

@section('content')
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section spad set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h4>Our Agents</h4>
                        <div class="bt-option">
                            <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                            <span>Agents</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Agent Section Begin -->
    <section class="agent-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="agent-search-form">
                        <form action="#">
                            <input type="text" placeholder="Find agent">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="as-slider owl-carousel">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="img/agents/agent-1.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Ashton Kutcher</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>Kucher@gmail.com</span></li>
                                    <li>Phone <span>123-455-688</span></li>
                                </ul>
                                <a href="{{ route('viewProfile') }}" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="img/agents/agent-2.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Ashton Kutcher</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>Kucher@gmail.com</span></li>
                                    <li>Phone <span>123-455-688</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="img/agents/agent-3.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Ashton Kutcher</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>Kucher@gmail.com</span></li>
                                    <li>Phone <span>123-455-688</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="img/agents/agent-4.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Ashton Kutcher</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>Kucher@gmail.com</span></li>
                                    <li>Phone <span>123-455-688</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="img/agents/agent-5.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Ashton Kutcher</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>Kucher@gmail.com</span></li>
                                    <li>Phone <span>123-455-688</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="img/agents/agent-6.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Ashton Kutcher</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>Kucher@gmail.com</span></li>
                                    <li>Phone <span>123-455-688</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="img/agents/agent-1.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Ashton Kutcher</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>Kucher@gmail.com</span></li>
                                    <li>Phone <span>123-455-688</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="img/agents/agent-2.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Ashton Kutcher</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>Kucher@gmail.com</span></li>
                                    <li>Phone <span>123-455-688</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="img/agents/agent-3.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Ashton Kutcher</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>Kucher@gmail.com</span></li>
                                    <li>Phone <span>123-455-688</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="img/agents/agent-4.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Ashton Kutcher</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>Kucher@gmail.com</span></li>
                                    <li>Phone <span>123-455-688</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="img/agents/agent-5.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Ashton Kutcher</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>Kucher@gmail.com</span></li>
                                    <li>Phone <span>123-455-688</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="as-item">
                            <div class="as-pic">
                                <img src="img/agents/agent-6.jpg" alt="">
                                <div class="rating-point">
                                    4.5
                                </div>
                            </div>
                            <div class="as-text">
                                <div class="at-title">
                                    <h6>Ashton Kutcher</h6>
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                                <ul>
                                    <li>Property <span>215</span></li>
                                    <li>Email <span>Kucher@gmail.com</span></li>
                                    <li>Phone <span>123-455-688</span></li>
                                </ul>
                                <a href="#" class="primary-btn">View profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Agent Section End -->

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
