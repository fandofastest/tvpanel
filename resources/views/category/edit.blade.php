@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt-0">
        {{-- {{dd($category)}} --}}
        <div class="row mt-3">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <form action="{{ route('category.update',$category) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Category name</label>
                        <input class="form-control" name="name" type="text" value="{{$category->name}}" id="example-text-input">
                    </div>
                    <div class="form-group">
                        <label for="example-email-input" class="form-control-label">Thumnails</label>
                        <input type="file" id="myFile" name="filename">

                    </div>

                    <button class="btn btn-info" type="submit">Save</button>


                </form>
            </div>

        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
