<nav class="navbar navbar-expand-sm ">
  <div class="container-fluid bg-blue ">
    <div class="collapse navbar-collapse d-flex justify-content-center pt-2 " id="CatMenuSM">
      <ul class="navbar-nav ">
        @foreach ($categories as $item)
            <li class="nav-item dropdown">
                <a class="nav-link white h5 " href="#" id="CatMenuLinkSM" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $item->name }}
                </a>
                <div class="dropdown-menu dropdown-large-sm">
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled h6">
                                <?php $page = 1; ?>
                                    @foreach ($item->children as $item_children)
                                    @if ($page % 7 == 0)
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled h6">
							    @endif
						        <li class="lh-sm">
							        <a class="blue text-decoration-none" href="{{ route('catalog', ['id' => $item_children->id]) }}"><i class="bi bi-play-fill"></i> {{ $item_children->name }}</a>
						        </li>
						        <?php $page++; ?>
						        @endforeach
                            </ul>
                    </div>
                </div>
            </li>
        @endforeach
      </ul>
    </div>
  </div>
</nav>