<div class="container-fluid blog py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">Blog Kami</h5>
            <h1>{{ $blogDesc }}</h1>
        </div>
        <div class="row g-5 justify-content-center">

            @foreach ($blogs as $key => $blog)
                <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".{{$key + 3}}s" >
                    <div class="blog-item position-relative bg-light rounded" >
                        @if ($blog->image)
                            <img src="{{ Storage::disk('s3')->url($blog->image) }}" class="img-fluid w-100 rounded-top" alt=""
                            style="height: 400px">
                        @else
                            <img src="{{ asset('images/no-image.png') }}" class="img-fluid w-100 rounded-top" alt=""
                            style="height: 400px">
                        @endif
                        <span class="position-absolute px-4 py-3 bg-primary text-white rounded" style="top: -28px; left: 20px;">
                            <i class="fa fa-newspaper"></i> {{ $blog->blogCategory->category }}
                        </span>
                        <a href="/blog/{{ $blog->id }}/detail">
                            <span class="position-absolute px-4 py-3 bg-secondary text-white rounded" style="top: -28px; right: 20px;">
                                <i class="fa fa-eye"></i> Lihat Detail
                            </span>
                        </a>
                        <div class="blog-btn d-flex justify-content-between position-relative px-3" style="margin-top: ;">
                            {{-- <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                                <a href="" class="btn text-white">Lihat Detail</a>
                            </div> --}}
                            {{-- <div class="blog-btn-icon btn btn-secondary px-4 py-3 rounded-pill ">
                                <div class="blog-icon-1">
                                    <p class="text-white px-2">Share<i class="fa fa-arrow-right ms-3"></i></p>
                                </div>
                                <div class="blog-icon-2">
                                    <a href="" class="btn me-1"><i class="fab fa-facebook-f text-white"></i></a>
                                    <a href="" class="btn me-1"><i class="fab fa-twitter text-white"></i></a>
                                    <a href="" class="btn me-1"><i class="fab fa-instagram text-white"></i></a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="blog-content position-relative px-3" style="margin-top: -50px;">
                            <div class="text-center">

                                @if ($blog->user_id)
                                    @if ($blog->user->foto)
                                        <img src="{{ Storage::disk('s3')->url($blog->user->foto) }}" class="img-fluid rounded-circle border border-4 border-white mb-3" alt=""
                                        style="width: 100px; height: 100px">
                                    @else
                                        <img src="{{ asset('images/profile-default.jpg') }}" class="img-fluid rounded-circle border border-4 border-white mb-3" alt=""
                                        style="width: 100px; height: 100px">
                                        @endif
                                        <h5 class="">Ditulis Oleh: {{ $blog->user->name }}</h5>
                                @else
                                    <img src="{{ asset('images/profile-default.jpg') }}" class="img-fluid rounded-circle border border-4 border-white mb-3" alt=""
                                    style="width: 100px; height: 100px">
                                    <h5 class="">Ditulis Oleh: Admin</h5>
                                @endif

                                <p class="text-secondary">{{ date('d F, Y', strtotime($blog->created_at)) }}</p>
                            </div>
                            {{-- <p class="text-secondary mt-2" style="">{{ date('d F, Y', strtotime($blog->created_at)) }}</p>
                            <hr> --}}
                            <h5 style="
                                overflow: hidden;
                                text-overflow: ellipsis;
                                display: -webkit-box;
                                -webkit-line-clamp: 1;
                                -webkit-box-orient: vertical;
                                line-height: 1.5;
                                max-height: 1.4em;
                                min-height: 1.4em;
                                height: 1.4em;
                            ">{{ $blog->title }}</h5>
                            <p class="py-2" style="
                                overflow: hidden;
                                text-overflow: ellipsis;
                                display: -webkit-box;
                                -webkit-line-clamp: 3;
                                -webkit-box-orient: vertical;
                                line-height: 1.5;
                                max-height: 4.7em;
                                min-height: 4.7em;
                                height: 4.7em;
                            ">{{ $blog->content }}</p>
                        </div>
                        <div class="blog-coment d-flex justify-content-center px-4 py-2 border bg-primary rounded-bottom">
                            {{-- <a href="" class="text-white"><small><i class="fas fa-share me-2 text-secondary"></i>5324 Share</small></a>
                            <a href="" class="text-white"><small><i class="fa fa-comments me-2 text-secondary"></i>5 Comments</small></a> --}}
                            {{-- <a href="" class="text-white"><small><i class="fa fa-eye me-2 text-secondary"></i>Lihat Blog</small></a> --}}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>