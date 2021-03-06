@extends('admin')
@section('content')
<div class="content-wrapper">
	 <div class="container-fluid">
			  <div class="row">
				    <div class="col-md-12">
						<br>
						<ul class="alerts-list delete"></ul>
						<ul class="alerts-list" style="display:none;" id="show">
  						<li>
     							<div class="alert alert-success alert-dismissable">
           						<i class="icon-remove-sign"></i>تم أضافة خبر بنجـــــــــــاح!.
           						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       						</div>
							</li>
						</ul>
						<ul class="alerts-list" style="display:none;" id="showupdate">
							<li>
     							<div class="alert alert-success alert-dismissable">
           						<i class="icon-remove-sign"></i> تم تحديث الخبر بنجـــــــــــاح!.
           						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       						</div>
							</li>
						</ul>
						<a class="btn btn-primary add" data-toggle="modal" data-target="#addModal" style="margin-bottom:20px;" >
							<i class="fa fa-plus-circle"  style="font-size: 18px;"></i> أضافة خبر
						</a>
						<div class="widget-content-white glossed">
								<div class="padded">
										<table id="matchs" class="table table-striped table-bordered table-hover datatable">
													<thead>
															<tr>
																	<th class="col-md-3">عنوان الخبر</th>
                                  <th class="col-md-2">التاريخ</th>
																	<th class="col-md-3">خيارات</th>
																</tr>
													</thead>
													<tbody>
													@foreach ($tableData->getData()->data as $row)
															<tr>
																	<td>{{ $row->title }}</td>
																	<td>{{ $row->date }}</td>
																	<td>{!!$row->actions !!}</td>
															</tr>
													@endforeach
												  </tbody>
										</table>
							</div>
				</div>
				<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    				<div class="modal-dialog">
        				<div class="modal-content">
            				<div class="modal-header">
                				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                				<h4 class="modal-title" id="addModalLabel"><i class="fa fa-plus-circle"></i>أضافة  خبر</h4>

                            <form role="form" method="POST" class="addForm" action="{{ url('/snew/store') }}" data-toggle="validator">
                                <div class="modal-body">
                                        @include('snew.form')
                                </div>
                              <div class="modal-footer">
                                  <button type="submit" id="submitForm" class="btn btn-primary">موافق</button>
                                  <button type="submit" class="btn btn-primary" id="addNew">موافق وأضافة جديد</button>
                              </div>
												</form>
						</div>
        </div>
    </div>
</div>
<div class="modal fade" id="editgroupModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addModalLabel"><i class="fa fa-plus-circle"></i>أضافة خبر</h4>

                    <form role="form" method="POST" class="editForm" action="{{ url('/snew/update') }}" data-toggle="validator">
                        <div class="modal-body">
                                @include('snew.form')
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
</div>
@endsection

@section('scripts')
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>

		$(function(){
	  		$('#datetime12').combodate();
	});
  	$(function(){
  			$('#datetime122').combodate();
});
  </script>
  <script type="text/javascript">
		$(document).ready(function()
		{
			jQuery('.tabs .tab-links a').on('click', function(e)
			{
	         var currentAttrValue = jQuery(this).attr('href');
	         // Show/Hide Tabs
	         jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
	         // Change/remove current tab to active
	         jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
	         e.preventDefault();
	     });



		function populateForm(response, frm)
		{
        var i;
        for (i in response) {
            if (i in frm.elements)
                frm.elements[i].value = response[i];
								if (response[i] instanceof Array)
									 {
											 var referees_ids = [];
											 for (var j = response[i].length - 1; j >= 0; j--) {
													 referees_ids.push( parseInt(response[i][j]['id']) );
											 };
											 $('.editForm .chosen-select-multiple').val(referees_ids).trigger("chosen:updated");
									 }
        }
    }

		$("#submitForm").on('click', function(e){
        $('#addModal').modal('hide');
    });
    $('.addForm').ajaxForm(function() {
    $('.addForm')[0].reset();
    $('#show').show(100);
    oTable.ajax.reload();
    oTable.draw();
        });

    //Update
    $('.editForm').ajaxForm(function() {
    $('#showupdate').show(100);
    $('#editgroupModal').modal('hide');
    oTable.ajax.reload();
    oTable.draw();
        });


   /* Edit Form */
   $(document.body).validator().on('click', '.edit', function() {
  var self = $(this);
       self.button('loading');
       $.ajax({
           url: "{{ url('snew') }}" + "/" + self.data('id') + "/edit" ,
           type: "GET",
           success: function(res){
               self.button('reset');
               $data = JSON.parse(res.data);
               populateForm($data, document.getElementsByClassName("editForm")[0] );
               $('#editgroupModal form').attr("data-id", self.data('id') );
               $('#editgroupModal').modal('show');
           },
           error: function(){
               self.button('reset');
               $('.alerts-list').append(
                   '<li>\
                       <div class="alert alert-danger alert-dismissable">\
                           <i class="icon-remove-sign"></i>حدث خطا ما.\
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                       </div>\
                   </li>');
           }
       });
   });

   /* update publish */
   $(document.body).validator().on('click', '.publish', function() {
       var self = $(this);
       self.button('loading');
       $.ajax({
           url: "{{ url('snew') }}" + "/" + self.data('id') + "/publish" ,
           type: "GET",
           success: function(res){
               self.button('reset');
               $('.alerts-list').append(
                   '<li>\
                       <div class="alert alert-success alert-dismissable">\
                           <i class="icon-remove-sign"></i>تم نشر الخبر بنجــــــــاح.\
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                       </div>\
                   </li>');
                   $('.nopublish').show();
                   $('.publish').hide();
           },
           error: function(){
               self.button('reset');
               $('.alerts-list').append(
                   '<li>\
                       <div class="alert alert-danger alert-dismissable">\
                           <i class="icon-remove-sign"></i>حدث خطا ما.\
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                       </div>\
                   </li>');
           }
       });
   });

   /* Disable publish */
   $(document.body).validator().on('click', '.nopublish', function() {
       var self = $(this);
       self.button('loading');
       $.ajax({
           url: "{{ url('snew') }}" + "/" + self.data('id') + "/nopublish" ,
           type: "GET",
           success: function(res){
               self.button('reset');
               $('.alerts-list').append(
                   '<li>\
                       <div class="alert alert-success alert-dismissable">\
                           <i class="icon-remove-sign"></i>تم  الغاء الخبر بنجاح.\
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                       </div>\
                   </li>');

                     $('.nopublish').hide();
                     $('.publish').show();

           },
           error: function(){
               self.button('reset');
               $('.alerts-list').append(
                   '<li>\
                       <div class="alert alert-danger alert-dismissable">\
                           <i class="icon-remove-sign"></i>حدث خطا ما.\
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                       </div>\
                   </li>');
           }
       });
   });

	oTable = $('#matchs').DataTable({
								"processing": true,
								"serverSide": true,
								"responsive": true,
								"deferLoading": {{ $tableData->getData()->recordsFiltered }},
								"columns": [
										{data: 'title', name: 'title'},
                    {data: 'date',  name: 'date'},
										{data: 'actions', name: 'actions', orderable: false, searchable: false}
								]
							});
							$('#addModal').on('shown.bs.modal', function () {
										$('.addForm')[0].reset();
										$('.chosen-select-it', this).chosen({disable_search_threshold: 10});
										$('.chosen-select-multiple', this).chosen({disable_search_threshold: 10}).trigger("chosen:updated");
								});

								$('#addModal form2').on('shown.bs.modal', function () {
											$('.addForm')[0].reset();
											$('.chosen-select-it', this).chosen({disable_search_threshold: 10});
											$('.gg', this).chosen({disable_search_threshold: 10}).trigger("chosen:updated");
									});
								$('#editgroupModal').on('shown.bs.modal', function () {
										$('.chosen-select-it', this).chosen({disable_search_threshold: 10});
										$('.chosen-select-multiple', this).chosen({disable_search_threshold: 10}).trigger("chosen:updated");
								});
								// $('#groupModal').on('shown.bs.modal', function () {
								//     $('.chosen-select-it', this).chosen({disable_search_threshold: 10});
								//     $('.chosen-select-multiple', this).chosen({disable_search_threshold: 10});
								// });
								$('.group-search').chosen({disable_search_threshold: 10});
								$('.gg').chosen({disable_search_threshold: 10});
});
</script>
<script src="{{ asset('/admin-ui/js/for_pages/table.js') }}"></script>

@endsection
