@extends('backEnd.layouts.admin_app')
@section('content')
<section class="content">
  <div class="row">
  <div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary"> 
    <!-- /.box-header --> 
    <!-- form start -->
    
    <div class="box-body">
      <div class="box-header">
        <h3 class="box-title">Live Webinars </h3>
      </div>
      @if($LiveWebinarsView->status !=1)
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"> Title : </label>
              {{$LiveWebinarsView->title}} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Webinar Type : </label>
              {{$LiveWebinarsView->webinar_type }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"> Course Description  : </label>
              @php echo $LiveWebinarsView->description; @endphp </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"> Learning Objectives  : </label>
              @php echo $LiveWebinarsView->learning_objectives; @endphp </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Instructional Method  : </label>
              {{str_replace('_',' ',$LiveWebinarsView->Instructional_method)}} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Fee ($) :</label>
              {{$LiveWebinarsView->fee == '' ? 'Free' : number_format($LiveWebinarsView->fee,2) }} </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">CPE Credits  :</label>
              {{$LiveWebinarsView->cpa_credit }} </div>
          </div>
          <!--<div class="col-md-6">
            <div class="form-group">
              <label class="control-label"> Webinar Transcription : </label>
              {{$LiveWebinarsView->webinar_transcription }} </div>
          </div>-->
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"> Time Zone : </label>
              {{ config('constants.TIME_ZONE')[$LiveWebinarsView->time_zone] }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Webinar Date :</label>
              {{ $LiveWebinarsView->recorded_date }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Start Time:</label>
              {{ $LiveWebinarsView->start_time }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">End Time:</label>
              {{ $LiveWebinarsView->end_time }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Fields of study : </label>
              {{  CommonHelper::getSubjectAreaName($LiveWebinarsView->subject_area) }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Course Level : </label>
              {{  CommonHelper::getCourseLevelName($LiveWebinarsView->course_level) }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Pre Requirement : </label>
              {{$LiveWebinarsView->pre_requirement }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Advance Preparation : </label>
              {{$LiveWebinarsView->advance_preparation }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Who should attend : </label>
              {{  CommonHelper::getWhoShouldAttendName($LiveWebinarsView->who_should_attend) }}  </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Topic of interest : </label>
              {{  CommonHelper::getTagName($LiveWebinarsView->tag) }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">FAQ : </label>
              @php echo $LiveWebinarsView->faq_1; @endphp
            </div>
          </div>
          <!--<div class="col-md-6">
            <div class="form-group">
              <label class="control-label">FAQ 2 : </label>
              {{$LiveWebinarsView->faq_2 }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">FAQ 3 : </label>
              {{$LiveWebinarsView->faq_3 }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">FAQ 4 : </label>
              {{$LiveWebinarsView->faq_4 }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">FAQ 5 : </label>
              {{$LiveWebinarsView->faq_5 }} </div>
          </div>-->
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Created At : </label>
              {{ date("Y-m-d",strtotime($LiveWebinarsView->created_at))  }} </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Created By : </label>
              {{$LiveWebinarsView->first_name }} {{$LiveWebinarsView->last_name }} </div>
          </div>
          <?php /*?><div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Video : </label>
              <p>Click <a href="/uploads/webinar_video/{{$LiveWebinarsView->video}}" target="_blank">Here</a> to see uploaded video.</p>
            </div>
          </div><?php */?>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Presentation Material  : </label>
              @if($LiveWebinarsView->documents != '')
              <p>Click <a href="/uploads/webinar_doc/{{$LiveWebinarsView->documents}}" target="_blank">Here</a> to see uploaded Presentation Material.</p>
              @else
              	-
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Image  : </label>
              @if($LiveWebinarsView->image != '')
              <p>Click <a href="/uploads/webinar_image/{{$LiveWebinarsView->image}}" target="_blank">Here</a> to see uploaded image.</p>
              @else
              	-
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
          <form id="live_webinar_status" name="live_webinar_status" data-parsley-validate class="form-horizontal form-label-left" action="{{route('live-webinar.updateStatus')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-12">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                     <label class="control-label">Status :</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                  <select name="status" id="live_status" class="form-control" required onchange="statusCheck(this.value);">
                    <option  value="" >Select Status</option>
                    <option  value="active"  @if($LiveWebinarsView->status == "active") selected= selected @endif>Active</option>
                    <option  value="inactive"  @if($LiveWebinarsView->status == "inactive") selected= selected @endif>Inactive</option>
                    <option  value="delete"  @if($LiveWebinarsView->status == "delete") selected= selected @endif>Delete</option>
                  </select>
                </div>
              </div>
                </div>
              </div>
            </div>
             <div class="col-md-6" @if($LiveWebinarsView->reason == "" ) style="display:none;" @endif id="reason_div">
               <div class="form-group">
                  <label class="control-label"> Reason <span aria-required="true" class="required"> * </span> </label>
                  <textarea id="reason" name="reason" class="form-control" required="required" ><?php echo $LiveWebinarsView->reason; ?></textarea>
                </div>
                     
             </div>
            <div class="box-footer" style="border: none;">
              <div class="col-md-12 text-right"> <a href="{{ route('live-webinar') }}" class="btn btn-danger" title="Cancel"> Cancel </a>
                <button type="submit" class="btn btn-primary ml-3">Save</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="id" value="{{$LiveWebinarsView->id}}">
                <input type="hidden" name="uri" value="{{Request::getQueryString() ? Request::getQueryString() : ''}}"  />
              </div>
            </div>
          </form>
        </div>
        </div>
        	
            <div class="col-md-6">
            <div class="form-group">
            @if(count($AcceptedSpeaker) > 0)
              <h3>Invitation Accepted Speakers</h3>
            	@foreach($AcceptedSpeaker as $speaker)
            		<p><b>{{$speaker->first_name}} {{$speaker->last_name}}</b></p>
              		<p><b>{{$speaker->email}} </b></p>
              		<p><b>{{$speaker->name}}</b></p>
               		<p><b>{{$speaker->contact_no}}</b></p>
                @endforeach 
            @else
            	 <h3>No Invitation Accepted Speakers found</h3>
            @endif       
            </div>
          </div>
      </div>
      <!-- /.box-body --> 
      
      @endif </div>
    <!-- /.box --> 
  </div>
</section>
<style>
    .datatable-highlight tfoot {
        display: table-header-group;
    }
</style>

@endsection
@section('css')
{{ HTML::style('/css/custom.css') }}
@endSection

@section('js')

{{ Html::script('/js/plugins/tables/datatables/datatables.min.js') }}
{{ HTML::script('/js/plugins/select2/dist/js/select2.full.min.js') }}
{{ HTML::script('js/plugins/validation/validate.min.js') }}

<script type="text/javascript">
  $('#live_webinar_status').validate({
		ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
		errorClass: 'validation-invalid-label',
		successClass: 'validation-valid-label',
		validClass: 'validation-valid-label',
		highlight: function (element, errorClass) {
			$(element).removeClass(errorClass);
		},
		unhighlight: function (element, errorClass) {
			$(element).removeClass(errorClass);
		},
		// Different components require proper error label placement
		errorPlacement: function (error, element) {

			// Unstyled checkboxes, radios
			if (element.parents().hasClass('form-check')) {
				error.appendTo(element.parents('.form-check').parent());
			}else {
				error.insertAfter(element);
			}
		}
	});
function statusCheck($val){
 
    if($val == 'inactive' || $val == 'delete'){
      $('#reason_div').show();
      $("#reason").prop('required',true);
    } else {
      $('#reason_div').hide();
      $('#reason').val('');
      $("#reason").prop('required',false);
    }
  }
  
</script>
@endSection 