Hi Admin, a new job applied by <strong>{{$candidate_name}}</strong>,
<br><br>
Details are below:
<br><br>
<table cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #ccc;">
	<tr style="border-bottom:1px solid #ccc; background-color:#f4f4f4;">
		<td style=" padding:2px 5px 2px; text-align:center;" colspan="2"><strong>Candidate Details</strong></td>
	</tr>
	
	<tr style="border-bottom:1px solid #ccc;">
		<td style=" padding:2px 5px 2px;"><strong>Name : </strong></td>
		<td>{{$candidate_name}}</td>
	</tr>
	
	<tr style="border-bottom:1px solid #ccc;">
		<td style=" padding:2px 5px 2px;"><strong>Mobile No : </strong></td>
		<td>{{$candidate_mobile}}</td>
	</tr>
	
	<tr style="border-bottom:1px solid #ccc;">
		<td style=" padding:2px 5px 2px;"><strong>Email : </strong></td>
		<td>{{$candidate_email}}</td>
	</tr>
	
	<tr style="border-bottom:1px solid #ccc;">
		<td style=" padding:2px 5px 2px;"><strong>Address : </strong></td>
		<td>{{$candidate_address}}</td>
	</tr>
	
	
	<tr style="border-bottom:1px solid #ccc; background-color:#f4f4f4;">
		<td style=" padding:2px 5px 2px; text-align:center;" colspan="2"><strong>Job Details</strong></td>
	</tr>
	
	<tr style="border-bottom:1px solid #ccc;">
		<td style=" padding:2px 5px 2px;"><strong>Job Title : </strong></td>
		<td>{{$job_title}}</td>
	</tr>
	
	<tr style="border-bottom:1px solid #ccc;">
		<td style=" padding:2px 5px 2px;"><strong>Job Location : </strong></td>
		<td>{{$job_location_name}}</td>
	</tr>
	
	<tr style="border-bottom:1px solid #ccc;">
		<td style=" padding:2px 5px 2px;"><strong>Company Name : </strong></td>
		<td>{{$company_name}}</td>
	</tr>
	
	<tr>
		<td style=" padding:2px 5px 2px;"><strong>Company Location : </strong></td>
		<td>{{$company_city_name['name'].', '.$company_state_name['name']}}</td>
	</tr>
	
</table>