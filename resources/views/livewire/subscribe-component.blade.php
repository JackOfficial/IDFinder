<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h5 class="text-primary text-uppercase small-title">Subscribe</h5>
                    <h4 class="mb-3">Subscribe to our Newsletter</h4>
                    <p>It will be as simple as occidental in fact, it will be Occidental.</p>
                </div>
            </div>

            <div class="col-xl-8 col-lg-10">
                <div class="text-center">
                    <div class="subscribe">
                        <form wire:submit.prevent="subscribe">
                            <div class="row">
                                <div class="col-md-9">
                                    <div>
                                        <input type="email" wire:model="email" class="form-control @error('email') is-invalid @else is-valid @enderror" placeholder="Enter your E-mail address">
                                        @error('email')
                                         <div class="text-danger text-left">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mt-3 mt-md-0">
                                        <button type="submit" wire:loading.attr="disabled" class="btn btn-primary btn-block">Subscribe &nbsp; <div wire:loading wire:target="subscribe" class="spinner-border spinner-border-sm"></div></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
