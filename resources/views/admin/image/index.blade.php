@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Images</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Images</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><a href="{{ route('image.create') }}"><button type="button"
                                            class="btn btn-block bg-gradient-primary">Add Image</button></a></h3>
                            </div>
                            <div class="card-body">
                                @if($first_image_type==0)
                                    <h5>No Image Uploaded Yet</h5>
                                @endif
                                @php
                                $landscape_image_count=0;
                                $potrait_image_count=0;
                                @endphp
                                @if ($first_image_type == 1)
                                    @while ($landscape_image_count < count($landscape_images) || $potrait_image_count < count($potrait_images))
                                        @if ($landscape_image_count < count($landscape_images))
                                            <div class="row">
                                                <img src={{ asset('storage/' . $landscape_images[$landscape_image_count]->image) }}
                                                    width="950" height="100">
                                            </div>
                                            @php
                                                $landscape_image_count = $landscape_image_count + 1;
                                            @endphp
                                            <br>
                                        @endif
                                        @if ($potrait_image_count < count($potrait_images))
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img src={{ asset('storage/' . $potrait_images[$potrait_image_count]->image) }}
                                                        width="450" height="100">
                                                </div>
                                                @php
                                                    $potrait_image_count = $potrait_image_count + 1;
                                                @endphp
                                                @if ($potrait_image_count < count($potrait_images))
                                                    <div class="col-sm-6">
                                                        <img src={{ asset('storage/' . $potrait_images[$potrait_image_count]->image) }}
                                                            width="450" height="100">
                                                    </div>
                                                    @php
                                                        $potrait_image_count = $potrait_image_count + 1;
                                                    @endphp
                                                @endif
                                            </div>
                                            <br>
                                        @endif
                                    @endwhile
                                @endif
                                @if($first_image_type == 2)
                                    @while ($landscape_image_count < count($landscape_images) || $potrait_image_count < count($potrait_images))
                                        @if ($potrait_image_count < count($potrait_images))
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img src={{ asset('storage/' . $potrait_images[$potrait_image_count]->image) }}
                                                        width="450" height="100">
                                                </div>
                                                @php
                                                    $potrait_image_count = $potrait_image_count + 1;
                                                @endphp
                                                @if ($potrait_image_count < count($potrait_images))
                                                    <div class="col-sm-6">
                                                        <img src={{ asset('storage/' . $potrait_images[$potrait_image_count]->image) }}
                                                            width="450" height="100">
                                                    </div>
                                                    @php
                                                        $potrait_image_count = $potrait_image_count + 1;
                                                    @endphp
                                                @endif
                                            </div>
                                            <br>
                                        @endif
                                        @if ($landscape_image_count < count($landscape_images))
                                            <div class="row">
                                                <img src={{ asset('storage/' . $landscape_images[$landscape_image_count]->image) }}
                                                    width="950" height="100">
                                            </div>
                                            @php
                                                $landscape_image_count = $landscape_image_count + 1;
                                            @endphp
                                            <br>
                                        @endif
                                    @endwhile
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
