<!-- newsletter section -->
<div class="newsletter-section spad">
    <div>
        @if (session('NLstatus'))
            <div class="alert alert-info" role="alert">
                {{ session('NLstatus') }}
            </div>
        @endif
    </div>
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Newsletter</h2>
            </div>
            <div class="col-md-9">
                <!-- newsletter form -->
                <form action="/newsletterMail" method="POST" class="nl-form">
                    @csrf
                    <input type="text" name="email" placeholder="Votre email ici">
                    <button type="submit" class="site-btn btn-2">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- newsletter section end-->