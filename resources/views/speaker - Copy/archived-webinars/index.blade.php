@extends('speaker.layouts.speaker_app')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Archived Webinars</h3>
                    
                </div>
                <div class="box-body">
                    <table id="webinar-list" class="table table-bordered table-hover datatable-highlight">
                        <thead>
                            <tr class="heading">
                                <th class="listing-id">#</th>
                                <th width="20%">Name</th>
                                <th width="10%">Webinar Date</th>
                                <th width="15%">Status</th>
                                <th class="listing-action">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                        <form name="Filter" id="Filter" action="" method="get" >
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <tr class="filter">
                                <td></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="title" id="title" value="@if(isset($_REQUEST['title']) && !empty($_REQUEST['title'])){{$_REQUEST['title']}}@endif"></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="recorded_date" id="recorded_date" value="@if(isset($_REQUEST['recorded_date']) && !empty($_REQUEST['recorded_date'])){{$_REQUEST['recorded_date']}}@endif"></td>
                                <td>{{ Form::select('status', $statusList, null, ["id" => "status", "placeholder" => "Select Status", 'class' => 'form-control select2 select-search form-filter-dropdown', 'select'=>'select']) }}</td>
                                
                               
                                <td>
                                    <button class="btn btn-sm btn-default filter-submit" type="submit" title="Search"><i class="fa fa-search"></i> Search</button>
                                    <a href="/webinar" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Reset</a>
                                </td>
                            </tr>
                         </form>   
                            @include('speaker/archived-webinars/index-ajax')
                        </tfoot>
                        
                        <tbody>
                        </tbody>
                    </table>
                    <div class="pull-right">{{$archived_webinars->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /content area -->
<style>
    .datatable-highlight tfoot {
        display: table-header-group;
    }
</style>
@endsection
@section('css')
{{ HTML::style('/css/custom.css') }}
{!! HTML::style('css/timepicker/timePicker.min.css') !!}
{!! HTML::style('css/datetimepicker/bootstrap-datetimepicker.css') !!} 
@endSection

@section('js')
{{ HTML::script('js/plugins/datetimepicker/bootstrap-datetimepicker.min.js?t=20130302') }}
{{ Html::script('/js/plugins/tables/datatables/datatables.min.js') }}
{{ HTML::script('/js/plugins/select2/dist/js/select2.full.min.js') }}
<script language="javascript" type="application/javascript">
	$(function() {
		$('#recorded_date').datetimepicker({
			format: 'yyyy-mm-dd',
			minView:"month"
		});
		
	});
</script>
@endSection

