<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-anchor icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>
                @section('page-title') Give me a Title @show
                <div class="page-title-subheading">
                    @section('page-title-subheading') Give me a subheading @show
                </div>
            </div>
        </div>    
    </div>
</div>

<div class="col-md-12">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @yield('main')
</div>
