<!-- Button trigger modal -->
<button type="button" class="btn bg-gray-100 d-none d-lg-block d-md-block" data-bs-toggle="modal"
        data-bs-target="#exampleModal">
    <i class="fa fa-search fa-lg"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="search">
                    <i class="fa fa-search"></i>
                    <form method="GET" action="/articles/">
                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Find something... "
                               value="{{request('search')}}"
                               autofocus
                        >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
