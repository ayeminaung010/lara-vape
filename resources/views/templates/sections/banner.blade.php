<!-- banner -->
<section id="banner-item" class="">
    @if ($frontend->banner_image !== null)
        <a href="">
            <img src="{{ asset('dbImg/banner/'.$frontend->banner_image) }}" class="w-100" alt="" />
        </a>
    @else
        <a href="#">
            <img src="{{ asset('user/images/img/16853994171260.717052064330995') }}" class="w-100" alt="" />
        </a>
    @endif
</section>
