<div class="row update-form">
	<div class="span10">
		<section id="section-5" class="top-buffer">
			<legend>Current Openings in various companies</legend>
			<table id="openings_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th></th>
						<th>Opening Id</th>
						<th>Primary Skill</th>
						<th>Experience Required</th>
						<th>Company</th>
						<th>Location</th>
					</tr>
				</thead>
			</table>
		</section>
	</div>	
</div>

<script type="text/template" id="openings_more_details_template">
	<table cellpadding="5" cellspacing="0" border="0" style="margin-left:28px;">
		<tr>
			<td>Full name:</td>
			<td><%=primary_skill%></td>
		</tr>
		<tr>
			<td>Company:</td>
			<td><%=company%></td>
		</tr>
		<tr>
			<td>Experience:</td>
			<td><%=experience%></td>
		</tr>
		<tr>
			<td>Location:</td>
			<td><%=location%></td>
		</tr>
	</table>
</script>

<script type="text/javascript">
	function format (data) {
		return _.template($("#openings_more_details_template").html(), data);
	}
	$(document).ready(function() {
		var table = $('#openings_table').DataTable({
			"ajax": "ajax-openings.php",
			"columns": [
			{
				"data": null,
				"class": 'details-control',
				"orderable": false,
				"defaultContent": ''
			},
			{ "data": "opening_id" },
			{ "data": "primary_skill" },
			{ "data": "experience" },
			{ "data": "company" },
			{ "data": "location" }
			],
			"order": [[4, 'asc']]
		} );
    // Add event listener for opening and closing details
    $('#openings_table tbody').on('click', 'td', function (){
    	var tr = $(this).closest('tr');
    	var row = table.row(tr);
    	if (row.child.isShown()) {
    		row.child.hide();
    		tr.removeClass('shown');
    	}else {
    		row.child( format(row.data()) ).show();
    		tr.addClass('shown');
    	}
    });
});
</script>