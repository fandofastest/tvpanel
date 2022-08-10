@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt-0">

        <div class="row mt-3">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <form action="{{ route('channel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Channel Title</label>
                        <input class="form-control" name="title" type="text" value="John Snow" id="example-text-input">
                    </div>
                    <div class="form-group">
                        <label for="example-search-input" class="form-control-label">Category</label>
                        <select class="form-control"  id="exampleFormControlSelect1"name="category">
                            @foreach ($category as $item)
                            <option>{{$item->name}}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="example-email-input" class="form-control-label">Thumnails</label>
                        <input type="file" id="myFile" name="filename">

                    </div>
                    <div class="form-group">
                        <label for="example-url-input" class="form-control-label">Country</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="country">
                            @foreach ($country as $item)
                            <option>{{$item['country']}}</option>
                            @endforeach

                          </select>
                    </div>
                    <div class="form-group">
                        <label for="example-tel-input" class="form-control-label">Channel URL</label>
                        <input class="form-control" name="channelurl" type="text" value="https://www.google.com" id="example-tel-input">
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
