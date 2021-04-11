<!-- page section -->
<div class="page-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7 blog-posts">
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
                            <a id="styleMeta" href="">2 Comments</a>
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
                        <h2>Comments (2)</h2>
                        <ul class="comment-list">
                            <li>
                                <div class="avatar">
                                    <img src="img/avatar/01.jpg" alt="">
                                </div>
                                <div class="commetn-text">
                                    <h3>Michael Smith | 03 nov, 2017 | Reply</h3>
                                    <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. </p>
                                </div>
                            </li>
                            <li>
                                <div class="avatar">
                                    <img src="img/avatar/02.jpg" alt="">
                                </div>
                                <div class="commetn-text">
                                    <h3>Michael Smith | 03 nov, 2017 | Reply</h3>
                                    <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Commert Form -->
                    <div class="row">
                        <div class="col-md-9 comment-from">
                            <h2>Leave a comment</h2>
                            <form class="form-class">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" name="name" placeholder="Your name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="email" placeholder="Your email">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="subject" placeholder="Subject">
                                        <textarea name="message" placeholder="Message"></textarea>
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