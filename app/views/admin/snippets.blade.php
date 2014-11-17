@extends('admin.layout')

@section('content')
{{ HTML::style('../css/plugins/dataTables/dataTables.bootstrap.css') }}
            
            <table class="table table-striped table-bordered table-hover" id="snippets">
             <thead>
             <tr>
             		<th>Id</th>
                  <th>Title</th>
                    <th>Category</th>
                    <th>Public Visible</th>
                    <th>Delete</th>
                    </tr>
             </thead>

         <tbody>

         </tbody>
         </table>
@stop

@section('js')
{{ HTML::script('../js/plugins/dataTables/jquery.dataTables.js') }}
{{ HTML::script('../js/plugins/dataTables/dataTables.bootstrap.js') }}
    <script>
    var sites = $('#snippets');
$(document).ready(function() {
    sites.dataTable( {
        "bProcessing": true,
        "bServerSide": true,
            "aoColumnDefs": [
      {
        "mData": null,
        "sDefaultContent": "<a class=\"btn btn-danger btn-sm delete\" href=\"#\"><span class=\"glyphicon glyphicon-remove\"></span></a>",
        "aTargets": [ -1 ]
      }
    ],
        "sAjaxSource": "snippets"
    } );

} );
    $(document).on("click", ".delete", function(e) {
        var tr = $(this).parent().parent();
        var id = tr.find('td:first-child').html();
        $.get('deletesnippet?id='+id);
        sites.dataTable().fnDraw();
        
    });
</script>

@stop