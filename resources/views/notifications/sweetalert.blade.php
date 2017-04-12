@if(Session::has('message'))
        <script>
	        swal(
	        	"{{ Session::get('status') }}",
	        	"{{ Session::get('message') }}",
	        	"{{ Session::get('type') }}"
	        	)
        </script>
@endif