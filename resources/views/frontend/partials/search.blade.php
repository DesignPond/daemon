<!-- Search -->
<div class="search">
    <form method="POST" action="{{ url('search') }}">
        {!! csrf_field() !!}
        <input type="text" class="search-input form-control" placeholder="search">
        <i class="fa fa-search search-icon"></i>
    </form>
</div>
<!-- End of Search -->