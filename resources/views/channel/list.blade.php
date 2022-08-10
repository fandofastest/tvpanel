@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt-0">

        <div class="row mt-3">
            <div class="table-responsive">
                <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Channel</th>
                        <th scope="col">Category</th>
                        <th scope="col">Country</th>
                        <th scope="col">Channel Url</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($channel as $item)
                    <tr>
                        <th scope="row">
                            <div class="media align-items-center">
                                <a href="#" class="avatar rounded-circle mr-3">
                                  <img alt="Image placeholder" src="{{url('storage/thumbnails/'.$item->thumnails)}}">
                                </a>
                                <div class="media-body">
                                    <span class="mb-0 text-sm">{{$item->title}}</span>
                                </div>
                            </div>
                        </th>
                        <td>
                           {{$item->category}}
                        </td>
                        <td>
                            {{$item->country}}

                        </td>
                        <td>
                            {{$item->channelurl}}


                        </td>

                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <form action="{{ route('channel.destroy',$item->id) }}" method="POST">

                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('channel.edit',$item->id) }}">Edit</a>
                                    @csrf
                                     @method('DELETE')
                                    <button type="submit" class="dropdown-item" href="#">Delete</a>
                                </div>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
