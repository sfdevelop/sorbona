<div class="card">
    <div class="card-body">
        <form action="{{route('admin.category.index')}}">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <x-input
                            with="25"
                            type="text"
                            title="{{__('admin.title')}}"
                            name="title"
                            :item="request()"
                    />
                </div>
            </div>
            <div class="d-flex">
            <button
                    type="submit"
                    class="btn btn-sm btn-primary"
            >
                Найти
            </button>

            <a
                    style="margin-left: 10px;"
                    href="{{route('admin.category.index')}}"
                    class="btn btn-sm btn-warning ml-4"
            >
                {{__('admin.clear')}}
            </a>
            </div>
        </form>
    </div>
</div>