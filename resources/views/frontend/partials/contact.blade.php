<!-- Contact section -->
<div class="contact-section spad fix">
    <div class="container">
        <div class="row">
            <!-- contact info -->
            <div class="col-md-5 col-md-offset-1 contact-info col-push">
                <div class="section-title left">
                    <h2>Contact us</h2>
                </div>
                @foreach ($contactUs as $item)
                    <p>{{$item->texte}}</p>   
                @endforeach
                <h3 class="mt60">Main Office</h3>
                @foreach ($contactAdresse as $item)
                <p class="con-item">{{$item->rue}},{{$item->numero}} <br> {{$item->code_postale}} {{$item->commune}} </p>
                <p class="con-item">{{$item->tel}}</p>
                <p class="con-item">{{$item->email}}</p>
                @endforeach
            </div>
            <!-- contact form -->
            <div class="col-md-6 col-pull">
                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
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
                <form action="/contactFormulaire" method="POST" class="form-class" id="con_form">
                    @csrf
                    <div class="row">
                        {{-- @if (!Auth::check()) --}}
                        <div class="col-sm-6">
                            <input type="text" name="name" placeholder="votre nom" value="{{old('name')}}">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="email" placeholder="votre e-mail" value="{{old('email')}}">
                        </div>
                        <div class="col-sm-12">
                            {{-- <input type="text" name="subject" placeholder="Subject"> --}}
                            <select name="subject_id" id="" class="form-control">
                                @foreach ($subject as $item)
                                    <option value="{{$item->id}}">{{$item->subject}}</option>
                                @endforeach
                            </select>
                         
                                <textarea name="message" placeholder="voter message"></textarea>
                                <button type="submit" class="site-btn">send</button>

                       
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact section end-->