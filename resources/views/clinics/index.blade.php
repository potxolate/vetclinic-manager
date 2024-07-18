@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('messages.Clinics') }}</h1>
    <table id="clinics-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#clinics-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('clinics.data') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'mail', name: 'mail' },
            { data: 'phone', name: 'phone' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
                 
        ]
    });
});
</script>
@endpush
