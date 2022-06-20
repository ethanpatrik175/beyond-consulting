@extends('layouts.backend.master')
@section('title')
{{ __($page_title ?? '-') }}
@endsection
@section('page-content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">{{ __($page_title ?? '-') }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __($section ?? '-') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __($page_title ?? '-') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            @if (Session::has('message'))
            <div class="col-sm-12">
                <div class="alert alert-{{ Session::get('type') }} alert-dismissible fade show" role="alert">
                    @if (Session::get('type') == 'danger')
                    <i class="mdi mdi-block-helper me-2"></i>
                    @else
                    <i class="mdi mdi-check-all me-2"></i>
                    @endif
                    {{ __(Session::get('message')) }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif
            @if ($errors->any())
            <div class="col-sm-12">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-block-helper me-2"></i>
                    {{ __($error) }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
            </div>
            @endif
            <div class="col-sm-12 message"></div>
            <form class="needs-validation create-form" method="POST" action="{{ route('orders.update', $order->id) }}"
                enctype="multipart/form-data" novalidate>
                <div class="row">
                    <div class="col-sm-10 mb-2">
                        {!! $buttons !!}
                    </div>
                </div>
               
                <div class="row">
                    @csrf
                    @method('PUT')
                    <div class="container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Details</a></li>
                        <li><a data-toggle="tab" href="#menu1">Payment</a></li>
                        <li><a data-toggle="tab" href="#menu2">Items</a></li>
                        <li><a data-toggle="tab" href="#menu3">Reciept</a></li>
                        <li><a data-toggle="tab" href="#menu4">Order Status</a></li>
                        <li><a data-toggle="tab" href="#menu5">Order History</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <h3>Details</h3>
                          
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <h3>Payment</h3>
                           
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3>Items</h3>
                          
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <h3>Reciept</h3>
                           
                        </div>
                        <div id="menu4" class="tab-pane fade">
                            <h3>Order Status</h3>
                           
                        </div>
                        <div id="menu5" class="tab-pane fade">
                            <h3>Order History</h3>
                           
                        </div>
                    </div>
                </div>
                   
                </div>
            </form>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/backend/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('assets/backend/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/backend/js/create-slug.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    CKEDITOR.replace('description');
    $(document).on('click', '#submit-form', function () {
        $(document).find('form.create-form').submit();
    });

</script>
@endpush
