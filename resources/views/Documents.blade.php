@extends('.layouts.app')

@section('title', __('Document'))

@section('content')
    <!-- main Section -->
    <div class="main-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="dash-heading mb-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ __('Document') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div id="tw-loader" class="tw-loader">
                        <div class="tw-ellipsis">
                            <div></div><div></div><div></div><div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-10">
                <div class="col-lg-12 mb-30">
                    <div class="tw-card">
                        <div class="tw-card-header mb-10 d-flex justify-content-between">
                            Documents List
                            <div>
                                @can('admin')
                                    <a class="btn btn-primary" href="{{ url('admin/add-document') }}"><i class="fas fa-plus"></i> Add Document</a>
                                @endcan
                            </div>
                        </div>
                        <div class="tw-card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="document-table">
                                    <thead>
                                    <th>Name</th>
                                    <th>File</th>
                                    <th>Options</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('message'))
        <input type="hidden" id="message" value="{!! session('message') !!}">
    @endif
    <!-- /main Section -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            let message = $('#message').val();
            if(message === 'success') {
                Toast.fire({
                    icon: 'success',
                    title: 'Added successfully'
                })
            } else if(message === 'updated') {
                Toast.fire({
                    icon: 'success',
                    title: 'Updated successfully'
                })
            } else if(message == 'failed') {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed. Try again'
                })
            } else if(message === 'deleted') {
                Toast.fire({
                    icon: 'success',
                    title: 'Deleted successfully'
                })
            }

            $('#document-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('getDocuments') !!}',
                dom: '<"row mt-4 top"<"col-md-3"l><"col-md-6 text-center"B><"col-md-3"f>>rtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'file', name: 'file' },
                    { data: 'action', name: 'action', orderable: false },
                ],
                columnDefs: [
                    { "width": "33%", "targets": 0 },
                    { "width": "33%", "targets": 1 },
                    { "width": "34%", "targets": 2 },
                ],
                order: [[0, 'asc']]
            });
        })

        $(document).on("click", '.deleteDocument', function() {
            let id = $(this).data("id");
            axios.get('{{ url('deleteDocument') }}/'+id)
            .then(response => {
                $('#document-table').DataTable().clear().destroy();
                $('#document-table').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: '{!! route('getDocuments') !!}',
                    dom: '<"row mt-4 top"<"col-md-3"l><"col-md-6 text-center"B><"col-md-3"f>>rtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ],
                    columns: [
                        { data: 'name', name: 'name' },
                        { data: 'file', name: 'file' },
                        { data: 'action', name: 'action', orderable: false },
                    ],
                    columnDefs: [
                        { "width": "33%", "targets": 0 },
                        { "width": "33%", "targets": 1 },
                        { "width": "34%", "targets": 2 },
                    ],
                    order: [[0, 'asc']]
                });
            })
        })
    </script>
@endpush
