<div class="page-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7 blog-posts">
                <!-- Post item -->

                @if (count($post)==0)
                    <div>
                        <h1>Aucun artcile n'a ete trouve</h1>
                    </div>
                @else
                    @foreach ($post as $item)
                        <div class="post-item">
                                <div class="post-thumbnail ">
                                    <img src="{{asset('storage/img/blog/'.$item->blog_pictures->src)}}" alt="">
                                    <div class="post-date">
                                        <h2>{{$item->created_at->format('d')}}</h2>
                                        <h3>{{$item->created_at->format('M Y')}}</h3>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title">{{$item->titre}}</h2>
                                    <div class="post-meta">
                                        <a id="styleMeta" href="/filterCategorie/{{$item->categorie_id}}">{{$item->categories->nom}}</a>

                                        @foreach ($item->tags as $tagg)
                                            @if ($loop->iteration == 1)
                                                <a id="styleMeta" href="/filtreTag/{{$tagg->id}}">{{$tagg->tag}}</a>
                                            @else
                                                <a href="/filtreTag/{{$tagg->id}}">, {{$tagg->tag}}</a>
                                            @endif   
                                        @endforeach
                                        
                                        <a id="styleMeta" href="/blogArticle/{{$item->id}}">{{count($comsValide->where('post_id', $item->id))}} Comments</a>
                                    </div>
                                    <p>{!!Str::limit($item->texte, 300)!!}</p>
                                    <a href="/blogArticle/{{$item->id}}" class="read-more ">Read More</a>
                                </div>
                            </div>
                        @endforeach
                @endif 
                <!-- Pagination -->
                @if (Route::getCurrentRoute()->uri() != 'filtreTag/{id}')
                    <div class="page-pagiantion">
                        {{  $post->fragment('service')->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @endif
                {{-- <div class="page-pagination">
                    <a class="active" href="">01.</a>
                    <a href="">02.</a>
                    <a href="">03.</a>
                </div> --}}
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