@extends('admin')
@section('content')
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
<br>
<ul class="alerts-list delete">
</ul>
<div class="widget-content-white glossed">
        <div class="padded">
                <table id="cities" class="table table-striped table-bordered table-hover datatable">
                        <thead>
                                <tr>
                                    <th class="col-md-1">عنوان المدونه</th>
                                    <th class="col-md-1">أسم المستخدم</th>
                                    <th class="col-md-3">التعليق</th>
                                    <th class="col-md-1">الوقت</th>
                                    <th class="col-md-1">التاريخ</th>
                                    <th class="col-md-1">خيارات</th>
                                </tr>
                        </thead>
                        <tbody>
                                @foreach ($tableData->getData()->data as $row)
                                <tr>
                                        <td>{{ $row->Post_title }}</td>
                                        <td>{{ $row->user_name }}</td>
                                        <td>{{ $row->comment }}</td>
                                        <td>{{ $row->time }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>{!!$row->actions !!}</td>
                                </tr>
                                @endforeach
                        </tbody>
                </table>
        </div>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        function populateForm(response, frm) {
        var i;
        for (i in response) {
            if (i in frm.elements)
                frm.elements[i].value = response[i];
        }
    }

        $("#submitForm").on('click', function(e){
        $('#addModal').modal('hide');
    });

                            oTable = $('#cities').DataTable({
                                "processing": true,
                                "serverSide": true,
                                "responsive": true,
                                "deferLoading": {{ $tableData->getData()->recordsFiltered }},
                                "columns": [
                                        {data: 'Post_title', name: 'Post_title'},
                                        {data: 'user_name', name: 'user_name'},
                                        {data: 'comment', name: 'comment'},
                                        {data: 'time', name: 'time'},
                                        {data: 'date', name: 'date'},
                                        {data: 'actions', name: 'actions', orderable: false, searchable: false}
                                ]
                            });
});
</script>
<script src="{{ asset('/admin-ui/js/for_pages/table.js') }}"></script>

    @endsection
