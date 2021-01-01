@extends('backend.master')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Livewire DataTable Tutorial</h3>
                </div>
            </div>
            <livewire:students />

        </div>
        <!-- /.card -->
    </div>
</div>


@endsection
