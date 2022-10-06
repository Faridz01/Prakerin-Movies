@extends('layouts.front')
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>Movie Detalied Page</h1>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- breadcrumb area end -->
    <!-- transformers area start -->
    <section class="transformers-area">
        <div class="container">
            <div class="transformers-box">
                <div class="row flexbox-center">
                    <div class="col-lg-5 text-lg-left text-center">
                        <div class="transformers-content">
                            <img src="{{ $movie->image() }}"
                                style="width: 375px; height: 500px; object-fit:cover; object-position:center"
                                alt="about" />
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="transformers-content">
                            <h2>{{ $movie->judul_film }}</h2>
                            <p>{{ $movie->genre_film->kategori }}</p>
                            <ul>
                                <li>
                                    <div class="transformers-left">
                                        Movie:
                                    </div>
                                    <div class="transformers-right">
                                        <a href="#">{{ $movie->genre_film->kategori }}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Durasi:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie->durasi }} m
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Tahun Rilis:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie->tahun_rilis->tahun_rilis }}
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Share:
                                    </div>
                                    <div class="transformers-right">
                                        <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                                        <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                                        <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                                        <a href="#"><i class="icofont icofont-youtube-play"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ url('/') }}" class="theme-btn mr-3">Home</a>
                    <a href="{{ url('/movies') }}" class="theme-btn">Movies Page</a>
                </div>
            </div>
        </div>
    </section><!-- transformers area end -->
    <!-- details area start -->
    <section class="details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="details-content">
                        <div class="details-overview">
                            <h2>Sinopsis</h2>
                            <p>{{ $movie->sinopsis }}</p>
                        </div>
                        {{-- <div id="disqus_thread"></div> --}}
                        <form action="{{ route('kirimReview') }}" method="POST">
                            <div class="details-reply">
                                <h2>Leave a Reply</h2>
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="select-container">
                                            <input type="text" name="nama" placeholder="Name" />
                                            <i class="icofont icofont-ui-user"></i>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_movie" value="{{ $movie->id }}">
                                    <div class="col-lg-6">
                                        <div class="select-container">
                                            <input type="text" name="email" placeholder="Email"  />
                                            <i class="icofont icofont-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="textarea-container">
                                            <textarea placeholder="Type Here Message" name="komentar"></textarea>
                                            <button><i class="icofont icofont-send-mail"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-comment">
                                <button class="theme-btn theme-btn2">Post Comment</button>
                                <p>You may use these HTML tags and attributes: You may use these HTML tags and attributes:
                                    You
                                    may use these HTML tags and attributes: </p>
                            </div>
                        </form>
                        <table class="table" style="width: 100%; margin-top: 50px">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Komentar</th>
                            </tr>
                            @foreach ($review as $rev)
                                <tr>
                                    <td>{{ $rev->nama }}</td>
                                    <td>{{ $rev->email }}</td>
                                    <td>{{ $rev->komentar }}</td>
                                </tr>
                            @endforeach

                        </table>
                        <div class="details-thumb">
                            <div class="details-thumb-prev">
                                <div class="thumb-icon">
                                    <i class="icofont icofont-simple-left"></i>
                                </div>
                                <div class="thumb-text">
                                    <h4>Previous Post</h4>
                                    <p>Standard Post With Gallery</p>
                                </div>
                            </div>
                            <div class="details-thumb-next">
                                <div class="thumb-text">
                                    <h4>Next Post</h4>
                                    <p>Standard Post With Preview Image</p>
                                </div>
                                <div class="thumb-icon">
                                    <i class="icofont icofont-simple-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 text-center text-lg-left">
                    <div class="portfolio-sidebar">
                        <img src="assets/img/sidebar/sidebar1.png" alt="sidebar" />
                        <img src="assets/img/sidebar/sidebar2.png" alt="sidebar" />
                        <img src="assets/img/sidebar/sidebar4.png" alt="sidebar" />
                    </div>
                </div> --}}
            </div>
        </div>
    </section><!-- details area end -->
@endsection
{{-- @section('scripts')
    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://movie-app-5.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
@endsection --}}
