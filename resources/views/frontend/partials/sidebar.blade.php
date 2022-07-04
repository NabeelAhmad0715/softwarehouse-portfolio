<div class="sidebar-menu-left">
    <div class="responsive sidebar-megamenu">
       <div class="vertical-menu no-gutter">
          <nav class="navbar-default">
             <div class="container-megamenu vertical ">
                <div class="vertical-wrapper">
                   <span id="remove-verticalmenu" class="fa fa-times"></span>
                   <div class="megamenu-pattern">
                      <ul class="megamenu bg-black">
                         <div class="topCats text-white">Top Categories</div>
                         @foreach ($categories as $category)
                            <li class="item-vertical style1 with-sub-menu hover category_side_set bg-black">
                                <p class="close-menu"></p>
                                <a href="{{ route('pages.categories', $category->slug) }}" class="clearfix text-white">
                                <span style="display:flex">
                                    <div class="icon-img">
                                        <img src="{{ asset('/storage/'. $category->logo) }}" style="height:20px" />
                                    </div>
                                    <strong style="text-transform: capitalize;
                                    font-weight: 400;margin-top: 3px;margin-left:5px">{{ $category->title }} </strong>
                                </span>
                                <span class="label"> </span>
                                </a>
                            </li>
                         @endforeach
                         <li class="item-vertical style1 with-sub-menu hover category_side_set mt-3 bg-black">
                            <a href="{{ route('pages.categories', $categories[0]->slug) }}" class="clearfix ">
                            <span style="color: #D30000;
                            font-size: 11px;">
                                More >>
                            </span>
                            </a>
                        </li>
                      </ul>
                   </div>
                </div>
             </div>
          </nav>
       </div>
    </div>
 </div>
