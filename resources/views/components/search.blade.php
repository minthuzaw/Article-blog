{{--search--}}
<div class="row height d-flex justify-content-center align-items-center mb-3">
    <div class="col-md-6 col-lg-8 col-sm-2">
        <div class="search">
            <i class="fa fa-search"></i>
            <form method="GET" action="/articles/">
                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Find something... "
                       value="{{request('search')}}">
                {{-- <button class="btn btn-primary">Search</button>--}}
            </form>
        </div>
    </div>
</div>
