@extends('layouts.front')
@section('content')
    <!-- hero area start -->
    <section class="hero-area" id="home">
        <div class="container">
            <div class="hero-area-slider">
                @foreach ($movies as $movie)
                    <div class="row hero-area-slide">
                        <div class="col-lg-6 col-md-5">
                            <div class="hero-area-content">
                                <img src="{{ $movie->image() }}" style="width: 330px; height: 456px;" alt="about" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <div class="hero-area-content pr-50">
                                <h2>
                                    <a href="/movies/{{ $movie->id }}">
                                        {{ $movie->judul_film }}</a>
                                </h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                                <p>{{ Str::limit($movie->sinopsis, 125, '...') }}</p>
                                <h3>Cast:</h3>
                                <div class="slide-cast">
                                    @foreach ($movie->casting as $cast)
                                        <div class="single-slide-cast">
                                            <img src="{{ $cast->image() }}" style="width: 39px; height: 39px;"
                                                alt="about" />
                                        </div>
                                    @endforeach
                                    {{-- <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast2.html') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast3.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast4.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast5.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast6.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast7.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast text-center">
                                5+
                            </div> --}}
                                </div>
                                <div class="slide-trailor">
                                    <h3>Watch Trailer</h3>
                                    <a class="theme-btn theme-btn2" href="#"><i class="icofont icofont-play"></i>
                                        Tickets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="row hero-area-slide">
                <div class="col-lg-6 col-md-5">
                    <div class="hero-area-content">
                        <img src="{{ asset('front/img/slide1.png') }}" alt="about" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="hero-area-content pr-50">
                        <h2>Last Avatar</h2>
                        <div class="review">
                            <div class="author-review">
                                <i class="icofont icofont-star"></i>
                                <i class="icofont icofont-star"></i>
                                <i class="icofont icofont-star"></i>
                                <i class="icofont icofont-star"></i>
                                <i class="icofont icofont-star"></i>
                            </div>
                            <h4>180k voters</h4>
                        </div>
                        <p>She is a devil princess from the demon world. She grew up sheltered by her parents and doesn't really know how to be evil or any of the common actions,   She is unable to cry due to Keita's accidental first wish, despite needed for him to wish...</p>
                        <h3>Cast:</h3>
                        <div class="slide-cast">
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast1.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast2.html') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast3.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast4.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast5.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast6.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast7.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast text-center">
                                5+
                            </div>
                        </div>
                        <div class="slide-trailor">
                            <h3>Watch Trailer</h3>
                            <a class="theme-btn theme-btn2" href="#"><i class="icofont icofont-play"></i> Tickets</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row hero-area-slide">
                <div class="col-lg-6 col-md-5">
                    <div class="hero-area-content">
                        <img src="{{ asset('front/img/slide3.png') }}" alt="about" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="hero-area-content pr-50">
                        <h2>The Deer God</h2>
                        <div class="review">
                            <div class="author-review">
                                <i class="icofont icofont-star"></i>
                                <i class="icofont icofont-star"></i>
                                <i class="icofont icofont-star"></i>
                                <i class="icofont icofont-star"></i>
                                <i class="icofont icofont-star"></i>
                            </div>
                            <h4>180k voters</h4>
                        </div>
                        <p>She is a devil princess from the demon world. She grew up sheltered by her parents and doesn't really know how to be evil or any of the common actions,   She is unable to cry due to Keita's accidental first wish, despite needed for him to wish...</p>
                        <h3>Cast:</h3>
                        <div class="slide-cast">
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast1.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast2.html') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast3.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast4.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast5.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast6.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast">
                                <img src="{{ asset('front/img/cast/cast7.png') }}" alt="about" />
                            </div>
                            <div class="single-slide-cast text-center">
                                5+
                            </div>
                        </div>
                        <div class="slide-trailor">
                            <h3>Watch Trailer</h3>
                            <a class="theme-btn theme-btn2" href="#"><i class="icofont icofont-play"></i> Tickets</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            </div>
            <div class="hero-area-thumb">
                <div class="thumb-prev">
                    <div class="row hero-area-slide">
                        <div class="col-lg-6">
                            <div class="hero-area-content">
                                <img src="{{ asset('front/img/slide3.png') }}" alt="about" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-area-content pr-50">
                                <h2>Last Avatar</h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                                <p>She is a devil princess from the demon world. She grew up sheltered by her parents and
                                    doesn't really know how to be evil or any of the common actions, She is unable to cry
                                    due to Keita's accidental first wish, despite needed for him to wish...</p>
                                <h3>Cast:</h3>
                                <div class="slide-cast">
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast1.png') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast2.html') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast3.png') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast4.png') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast5.png') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast6.png') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast7.png') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast text-center">
                                        5+
                                    </div>
                                </div>
                                <div class="slide-trailor">
                                    <h3>Watch Trailer</h3>
                                    <a class="theme-btn theme-btn2" href="#"><i class="icofont icofont-play"></i>
                                        Tickets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="thumb-next">
                    <div class="row hero-area-slide">
                        <div class="col-lg-6">
                            <div class="hero-area-content">
                                <img src="{{ asset('front/img/slide1.png') }}" alt="about" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-area-content pr-50">
                                <h2>The Deer God</h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                                <p>She is a devil princess from the demon world. She grew up sheltered by her parents and
                                    doesn't really know how to be evil or any of the common actions, She is unable to cry
                                    due to Keita's accidental first wish, despite needed for him to wish...</p>
                                <h3>Cast:</h3>
                                <div class="slide-cast">
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast1.png') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast2.html') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast3.png') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast4.png') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast5.png') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast6.png') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast">
                                        <img src="{{ asset('front/img/cast/cast7.png') }}" alt="about" />
                                    </div>
                                    <div class="single-slide-cast text-center">
                                        5+
                                    </div>
                                </div>
                                <div class="slide-trailor">
                                    <h3>Watch Trailer</h3>
                                    <a class="theme-btn theme-btn2" href="#"><i class="icofont icofont-play"></i>
                                        Tickets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- hero area end -->
    <!-- portfolio section start -->
    <section class="portfolio-area pt-60">
        <div class="container">
            <div class="row flexbox-center">
                <div class="col-lg-6 text-center text-lg-left">
                    <div class="section-title">
                        <h1><i class="icofont icofont-movie"></i> Spotlight This Month</h1>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="portfolio-menu">
                        <ul>
                            <li data-filter="*" class="active">Latest</li>
                            @foreach ($genres as $genre)
                                <li data-filter=".{{ $genre->id }}">{{ $genre->kategori }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="row portfolio-item">
                        @foreach ($allMovies as $movie)
                            <div class="col-lg-3 col-sm-6 {{ $movie->genre_film->id }}">
                                <div class="single-portfolio">
                                    <div class="single-portfolio-img">
                                        <a href="/movies/{{ $movie->id }}">
                                            <img src="{{ $movie->image() }}"
                                                style="width: 265px; height: 425px; object-fit:cover; object-position:center"
                                                alt="portfolio" />
                                        </a>
                                    </div>
                                    <div class="portfolio-content">
                                        <h2>{{ $movie->judul_film }}</h2>
                                        <div class="">
                                            <h4>{{ $movie->tahun_rilis->tahun_rilis . ' | ' . $movie->genre_film->kategori }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="col-md-4 col-sm-6 top">
                        <div class="single-portfolio">
                            <div class="single-portfolio-img">
                                <img src="{{ asset('front/img/portfolio/portfolio2.png') }}" alt="portfolio" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <h2>Tale of Revemge</h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 soon">
                        <div class="single-portfolio">
                            <div class="single-portfolio-img">
                                <img src="{{ asset('front/img/portfolio/portfolio3.png') }}" alt="portfolio" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <h2>The Lost City of Z</h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 top released">
                        <div class="single-portfolio">
                            <div class="single-portfolio-img">
                                <img src="{{ asset('front/img/portfolio/portfolio4.png') }}" alt="portfolio" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <h2>Beast Beauty</h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 released">
                        <div class="single-portfolio">
                            <div class="single-portfolio-img">
                                <img src="{{ asset('front/img/portfolio/portfolio5.png') }}" alt="portfolio" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <h2>In The Fade</h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 soon top">
                        <div class="single-portfolio">
                            <div class="single-portfolio-img">
                                <img src="{{ asset('front/img/portfolio/portfolio6.png') }}" alt="portfolio" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <h2>Last Hero</h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    </div>
                </div>
                {{-- <div class="col-lg-3 text-center text-lg-left">
                <div class="portfolio-sidebar">
                    <img src="{{ asset('front/img/sidebar/sidebar1.png') }}" alt="sidebar" />
                    <img src="{{ asset('front/img/sidebar/sidebar2.png') }}" alt="sidebar" />
                    <img src="{{ asset('front/img/sidebar/sidebar3.png') }}" alt="sidebar" />
                    <img src="{{ asset('front/img/sidebar/sidebar4.png') }}" alt="sidebar" />
                </div>
            </div> --}}
            </div>
        </div>
    </section><!-- portfolio section end -->
    <!-- video section start -->
    {{-- <section class="video ptb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title pb-20">
                    <h1><i class="icofont icofont-film"></i> Trailers & Videos</h1>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-9">
                <div class="video-area">
                    <img src="{{ asset('front/img/video/video1.png') }}" alt="video" />
                    <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                        <i class="icofont icofont-ui-play"></i>
                    </a>
                    <div class="video-text">
                        <h2>Angle of Death</h2>
                        <div class="review">
                            <div class="author-review">
                                <i class="icofont icofont-star"></i>
                                <i class="icofont icofont-star"></i>
                                <i class="icofont icofont-star"></i>
                                <i class="icofont icofont-star"></i>
                                <i class="icofont icofont-star"></i>
                            </div>
                            <h4>180k voters</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 col-sm-6">
                        <div class="video-area">
                            <img src="{{ asset('front/img/video/video2.png') }}" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-6">
                        <div class="video-area">
                            <img src="{{ asset('front/img/video/video3.png') }}" alt="video" />
                            <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                <i class="icofont icofont-ui-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
    <!-- video section end -->
    <!-- news section start -->
    {{-- <section class="news">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title pb-20">
                    <h1><i class="icofont icofont-coffee-cup"></i> Latest News</h1>
                </div>
            </div>
        </div>
        <hr />
    </div>
    <div class="news-slide-area">
        <div class="news-slider">
            <div class="single-news">
                <div class="news-bg-1"></div>
                <div class="news-date">
                    <h2><span>NOV</span> 25</h2>
                    <h1>2017</h1>
                </div>
                <div class="news-content">
                    <h2>The Witch Queen</h2>
                    <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
                </div>
                <a href="#">Read More</a>
            </div>
            <div class="single-news">
                <div class="news-bg-2"></div>
                <div class="news-date">
                    <h2><span>NOV</span> 25</h2>
                    <h1>2017</h1>
                </div>
                <div class="news-content">
                    <h2>The Witch Queen</h2>
                    <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
                </div>
                <a href="#">Read More</a>
            </div>
            <div class="single-news">
                <div class="news-bg-3"></div>
                <div class="news-date">
                    <h2><span>NOV</span> 25</h2>
                    <h1>2017</h1>
                </div>
                <div class="news-content">
                    <h2>The Witch Queen</h2>
                    <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
                </div>
                <a href="#">Read More</a>
            </div>
        </div>
        <div class="news-thumb">
            <div class="news-next">
                <div class="single-news">
                    <div class="news-bg-3"></div>
                    <div class="news-date">
                        <h2><span>NOV</span> 25</h2>
                        <h1>2017</h1>
                    </div>
                    <div class="news-content">
                        <h2>The Witch Queen</h2>
                        <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
                    </div>
                    <a href="#">Read More</a>
                </div>
            </div>
            <div class="news-prev">
                <div class="single-news">
                    <div class="news-bg-2"></div>
                    <div class="news-date">
                        <h2><span>NOV</span> 25</h2>
                        <h1>2017</h1>
                    </div>
                    <div class="news-content">
                        <h2>The Witch Queen</h2>
                        <p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
                    </div>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section> --}}
    <!-- news section end -->
    <!-- footer section start -->
@endsection
