@extends('layouts.admin')
@section('content')

<div class="containter py-5">
    <div class="row">
        <div class="col-md-12">
            <data-table endpoint="{{ route('user-index') }}"></data-table>
        </div>
    </div>
</div>
@endsection
