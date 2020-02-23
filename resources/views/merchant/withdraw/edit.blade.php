<!-- Modal -->
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">All Details</h4>
	      </div>
	      <div class="modal-body">
	        <table class="table table-striped">
	        	<tr>
	        		<th>Vendors ID#</th>
	        		<td>{{ $details->id }}</td>
	        	</tr>
	        	<tr>
	        		<th>Vendor Company</th>
	        		<td></td>
	        	</tr>
	        	<tr>
	        		<th>Withdraw Amount</th>
					<td>{{ $details->amount }}</td>
	        	</tr>
	        	<tr>
	        		<th>Withdraw Process Date</th>
	        		<td>{{ $details->created_at }}</td>
	        	</tr>
	        	<tr>
	        		@php
	        			$status = \App\Model\WithdrawStatus::where('id',$details->status)->first()->status;
	        		@endphp
	        		<th>Withdraw Status</th>
	        		<td><span class="label label-{{ $status }}">{{ $status }}</span></td>
	        	</tr>
	        	<tr>
	        		<th>Account Name</th>
	        		<td>{{ $details->account_name }}</td>
	        	</tr>
				<tr>
					<th>Account Number</th>
					<td>{{ $details->account_no }}</td>
				</tr>

				<tr>
					<th>Account Status</th>
					<td>
						@if( $details->approve == 1 )
							<span class="btn btn-primary btn-xs" data-id="{{$details->id}}">Verify</span>
						@else
							<span class="btn btn-danger btn-xs" data-id="{{$details->id}}">Non-Verify</span>
						@endif
					</td>
				</tr>
	        	<tr>
	        		<th>Vendors Email</th>
	        		<td>{{ $details->email }}</td>
	        	</tr>
	        	<tr>
	        		<th>Withdraw Method</th>
	        		<td>{{ $details->method }}</td>
	        	</tr>
	        </table>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>