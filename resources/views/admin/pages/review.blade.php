@extends('admin.layouts.master')

@section('main-content')
    {{-- Main Content --}}
    <main class="content">
            <div class="container-fluid p-0">
                <h1 class="h3 mb-3">Reviews List</h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h5 class="card-title mb-0">Empty card</h5> --}}
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Hotel</th>
                                            <th>Rating</th>
                                            <th>Comment</th>
                                            <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reviews as $review)
                                            <tr>
                                                <td>{{ $review->hotel->name ?? 'N/A' }}</td>
                                                <td>
                                                    @for ($j = 1; $j <= $review->rating; $j++)
                                                        <msall class="text-warning">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>
                                                        </msall>
                                                    @endfor
                                                </td>
                                                <td>{{ $review->comment }}</td>
                                                <td>{{ $review->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </main>
@endsection
