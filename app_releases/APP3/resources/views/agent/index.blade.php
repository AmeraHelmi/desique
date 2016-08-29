@extends('admin')
@section('content')

		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
<br>

<ul class="alerts-list delete"></ul>
<a class="btn btn-primary" data-toggle="modal" data-target="#addModal" style="margin-bottom:20px;" >
		<i class="fa fa-plus-circle" style="font-size: 18px;"></i> أضافة وكيل
</a>
<div id="status"></div>
	<button onclick="uploadPhoto()">Upload Photo</button>
	<button onclick="getInfo()">Get Info</button>
	<button onclick="post()">post</button>
	<button onclick="login()" id="login">Login</button>
<div class="widget-content-white glossed">
		<div class="padded">
				<table id="countries" class="table table-striped table-bordered table-hover datatable">
						<thead>
								<tr>
										<th class="col-md-2">الأسم</th>
										<th class="col-md-4">معلومات اضافيه</th>
										<th class="col-md-2">خيارات</th>
								</tr>
						</thead>
						<tbody>
								@foreach ($tableData->getData()->data as $row)
								<tr>
										<td>{{ $row->name }}</td>
										<td>{{ $row->addition_info }}</td>
										<td>{!! $row->actions !!}</td>
								</tr>
								@endforeach
						</tbody>
				</table>
		</div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addModalLabel"><i class="fa fa-plus-circle"></i> أضافة وكيل</h4>
            </div>
            <form role="form"  method="POST" class="addForm" action="{{ url('/agent/store') }}" data-toggle="validator">
                <div class="modal-body">
                    @include('agent.form')
                </div>
                <div class="modal-footer">
                   <button type="submit" id="submitForm" class="btn btn-primary">موافق</button>
                    <button type="submit" class="btn btn-primary" id="addNew">موافق وأضافة جديد</button>

                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editagentModal" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editEmployeeModalLabel"><i class="fa fa-pencil"></i> تحديث</h4>
            </div>
            <form role="form" id="update_form" method="POST" class="editForm" data-id="" action="{{ url('/agent/update') }}" data-toggle="validator">
                <div class="modal-body">
                    @include('agent.form')
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submit" class="btn btn-primary">تحديث</button>
                </div>
            </form>
        </div>
    </div>
</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection

	@section('scripts')
	<script>
	// initialize and setup facebook js sdk
	window.fbAsyncInit = function() {
			FB.init({
				appId      : '313343109002079',
				xfbml      : true,
				version    : 'v2.5'
			});
			FB.getLoginStatus(function(response) {
				if (response.status === 'connected') {
					document.getElementById('status').innerHTML = 'We are connected.';
					document.getElementById('login').style.visibility = 'hidden';
				} else if (response.status === 'not_authorized') {
					document.getElementById('status').innerHTML = 'We are not logged in.'
				} else {
					document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
				}
			});
	};
	(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	// login with facebook with extened publish_actions permission
	function login() {
		FB.login(function(response) {
			if (response.status === 'connected') {
					document.getElementById('status').innerHTML = 'We are connected.';
					document.getElementById('login').style.visibility = 'hidden';
				} else if (response.status === 'not_authorized') {
					document.getElementById('status').innerHTML = 'We are not logged in.'
				} else {
					document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
				}
		}, {scope: 'publish_actions'});
	}
	// getting basic user info
	function getInfo() {
		FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
			document.getElementById('status').innerHTML = response.name;
		});
	}

	function post() {
		FB.api('/me/feed', 'post', {message: 'aaaa'}, function(response) {
			document.getElementById('status').innerHTML = response.id;
		});
	}
	// uploading photo on user timeline
	function uploadPhoto() {
		var imgURL="images/uploads/13590485_1242939712405277_5455481658250733322_n.jpg";
		FB.api('/me/feed', 'post',{
			message:'photo description',
	    url:imgURL
		}, function(response) {
			if (!response || response.error) {
				document.getElementById('status').innerHTML = "Error!";
			} else {
				document.getElementById('status').innerHTML = response.id;
			}
		});
	}
</script>
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
		//add country
    $("#addModal form").on('submit', function(e){
        if (!e.isDefaultPrevented())
        {
            var self = $(this);
            $.ajax({
                url: '{!!URL::route('addagent')!!}',
                type: "POST",
                data: self.serialize(),
                success: function(res){
                    $('.addForm')[0].reset();
                    $('.alerts-list').append(
                        '<li>\
                    <div class="alert alert-success alert-dismissable">\
                                <i class="icon-check-sign"></i> تمت الأضافه بنجـــــــــــاح!\
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            </div>\
                        </li>');
					oTable.ajax.reload();
                    oTable.draw();
                },
                error: function(){
                    $('#addModal').modal('hide')
                    $('.alerts-list').append(
                        '<li>\
                            <div class="alert alert-danger alert-dismissable">\
                                <i class="icon-remove-sign"></i> <strong>Opps!</strong> حدث خطأ.\
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            </div>\
                        </li>');
                }
            });
            e.preventDefault();
        }
     });


		     /* Edit Form */

		     $(document.body).validator().on('click', '.edit', function() {
		    var self = $(this);
		         self.button('loading');
		         $.ajax({
		             url: "{{ url('agent') }}" + "/" + self.data('id') + "/edit" ,
		             type: "GET",
		             success: function(res){
		                 self.button('reset');
		                 $data = JSON.parse(res.data);
		                 populateForm($data, document.getElementsByClassName("editForm")[0] );

		                 $('#editagentModal form').attr("data-id", self.data('id') );
		                 $('#editagentModal').modal('show');
		             },
		             error: function(){
		                 self.button('reset');
		 		                     $('.alerts-list').append(
                     '<li>\
                         <div class="alert alert-danger alert-dismissable">\
                             <i class="icon-remove-sign"></i> <strong>Opps!</strong>حدث خطأ.\
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                         </div>\
                     </li>');
		             }
		         });
		     });

				 /* update Form Submission */
		     $("#editagentModal form").validator().on('submit', function(e){
		         if (!e.isDefaultPrevented())
		         {
		             var self = $(this);
		             $.ajax({
		                 url: "{{ url('agent') }}" + "/" +  self.attr("data-id"),
		                 type: "POST",
		                 data: "_method=PUT&" + self.serialize(),
		                 success: function(res){
		                     $('#editagentModal').modal('hide');
		                     $('.alerts-list').append(
		                         '<li>\
		                             <div class="alert alert-success alert-dismissable">\
		                                 <i class="icon-check-sign"></i> Agent has been successfully updated!\
		                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
		                             </div>\
		                         </li>');
								oTable.ajax.reload();

		                 },
		                 error: function(){
		                     $('#editagentModal').modal('hide')
		         		 		                     $('.alerts-list').append(
                     '<li>\
                         <div class="alert alert-danger alert-dismissable">\
                             <i class="icon-remove-sign"></i> <strong>Opps!</strong>حدث خطأ.\
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                         </div>\
                     </li>');
		                         oTable.ajax.reload();
		                 }
		             });
		             e.preventDefault();
		         }
		      });


	oTable = $('#countries').DataTable({
		"processing": true,
		"serverSide": true,
		"responsive": true,
		"deferLoading": {{ $tableData->getData()->recordsFiltered }},
		"columns": [
				{data: 'name', name: 'name'},
				{data: 'addition_info', name: 'addition_info'},
				{data: 'actions', name: 'actions', orderable: false, searchable: false}
		]
	});
});
</script>
<script src="{{ asset('/admin-ui/js/for_pages/table.js') }}"></script>

	@endsection
