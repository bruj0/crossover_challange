@extends('index')

@section('content')
  <div class="container">
      <div class="row text-center">
        <h2>Welcome to the Crossover Challenge for Rodrigo</h2>
		<h4>This proyect is using Laravel as framework and bootstrap for the html</h4>
		<h4>It also send your number with an Ajax call to the server and shows the output</h4>
      </div>
	  <br>
	  <form class="form-inline">
		<div class="form-group">
		  <label class="sr-only" for="exampleInputNumber">Number</label>
		  <div class="input-group">
			<input type="text" class="form-control" id="InputNumber" placeholder="Number">
		  </div>
		</div>
		<button id="sendbutton" type="submit" class="btn btn-primary">Beautify</button>
	  </form>
		<br><br>
		<table class="table table-condensed" id="result_table">
		<thead>
		  <tr>
			<th>#</th>
			<th>Input</th>
			<th>Beautify</th>
		  </tr>
		</thead>
		</table>
  </div>
@stop
@push('scripts')
<script type="text/javascript">
$(document).ready(function(){
  var i=0;
  $("#sendbutton").click(function(event){
  var number = $("#InputNumber").val();
         $.ajax({
            url: '/work',
            type: 'POST',
            data: { 'number' : number },
			dataType: "json",
			 headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
            success: function(response) {
			
			  if (response['error']==true) {
				alert('Error: '+response['text']);
			  }
			  else
			  {
						$("#result_table").append('<tr id="addr'+i+'"></tr>');
						  $('#addr'+i).html(
						   "<td>"+(i+1)+"</td>"+
						   "<td>"+number+"</td>"+
						   "<td>"+response['number']+"</td>");
				
						i++;
						$("#InputNumber").val('');
			  }
			},
			error: function() {
			  alert('error')
			}
		});
			
  event.preventDefault();
  });
});
</script>
@endpush