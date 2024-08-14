<footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="my-4">
                    <form id="newsletterForm" data-url="{{ route('frontend.newsletter.subscribe') }}">
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" placeholder="Enter your email address..."
                                aria-label="E-posta adresiniz" required>
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
                {{-- Copyright bilgisi --}}
                <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2023</div>
            </div>
        </div>
    </div>
</footer>
