<!-- page section -->
<div class="page-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7 blog-posts">
                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <!-- Single Post -->
                <div class="single-post">
                    <div class="post-thumbnail">
                        <img src="{{asset('storage/img/blog/'.$post->blog_pictures->src)}}" alt="">
                        <div class="post-date">
                            <h2>{{$post->created_at->format("d")}}</h2>
                            <h3>{{$post->created_at->format("M Y")}}</h3>
                        </div>
                    </div>
                    <div class="post-content">
                        <h2 class="post-title">{{$post->titre}}</h2>
                        <div class="post-meta">
                            <a href="/filterCategorie/{{$post->categorie_id}}">{{$post->categories->nom}}</a>
                            @foreach ($post->tags as $tagg)
                                            @if ($loop->iteration == 1)
                                                <a id="styleMeta" href="/filtreTag/{{$tagg->id}}">{{$tagg->tag}}</a>
                                            @else
                                                <a href="/filtreTag/{{$tagg->id}}">, {{$tagg->tag}}</a>
                                            @endif   
                            @endforeach
                            <a id="styleMeta" href="">{{count($coms)}} Comments</a>
                        </div>
                        <p>{!! $post->texte !!}</p>
                    </div>
                    <!-- Post Author -->
                    <div class="author">
                        <div class="avatar">
                            <img src="{{asset('storage/img/users/'.$post->users->user_pictures->src)}}" height="120px">
                        </div>
                        <div class="author-info">
                            <h2>{{$post->users->nom}} {{$post->users->prenom}}, <span>{{$post->users->roles->role}}</span></h2>
                            <p>{{$post->users->description}}</p>
                        </div>
                    </div>
                    <!-- Post Comments -->
                    <div class="comments">
                        <h2>Comments </h2>
                        @if (count($coms) != 0)
                        <ul class="comment-list">
                            @foreach ($coms as $item)
                                <li>
                                    <div class="avatar mt-2">
                                        <img  src="{{asset('storage/img/users/'.$item->user_pictures->src)}}"alt="">
                                    </div>
                                    <div class="commetn-text">
                                        <h3>{{$item->nom}} | {{$item->created_at->format('d M, Y')}} </h3>
                                        <p>{{$item->commentaire}} </p>
                                    </div>
                                </li>  
                            @endforeach
                        </ul>
                        @else
				            <p>Il n'y a pas encore de commentaire pour cet article.. </p>
			            @endif
                    </div>
                    <!-- Commert Form -->
                    <div class="row">
                        <div class="col-md-9 comment-from">
                            <h2>Leave a comment</h2>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form class="form-class" action="/commentaire", method="POST">
                                @csrf
                                <div class="row">
                                @if (!Auth::check())
                                    <div class="col-sm-6">
                                        <input type="text" name="nom" placeholder="Votre nom" value="{{old('nom')}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="email" placeholder="votre email" value="{{old('email')}}">
                                    </div>
                                @endif
                                    <div class="col-sm-12">
                                        {{-- <input type="commentaire" name="subject" placeholder="Subject"> --}}
                                        <textarea name="commentaire" placeholder="Message">{{old('commentaire')}}</textarea>
                                        <button class="site-btn">send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar area -->
            <div class="col-md-4 col-sm-5 sidebar">
                @include('frontend/partials/allBlog/sideBar/search')
                @include('frontend/partials/allBlog/sideBar/categorie')
                @include('frontend/partials/allBlog/sideBar/tags')
            </div>
        </div>
    </div>
</div>