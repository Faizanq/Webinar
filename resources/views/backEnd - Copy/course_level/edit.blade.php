<div class="modal-dialog modal-md">
    <div class="modal-content">
        {!! Form::model($courseLevel, ['name' => 'edit-course-level', 'id' => 'edit-course-level-form', 'class' => 'form-horizontal']) !!}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Course Level</h4>
        </div>
        <div class="modal-body">
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label"> Name <span aria-required="true" class="required"> * </span></label>
                    {{ Form::text('name', null, array('id' => 'name', 'class' => 'form-control', 'placeholder' => __('Name'))) }}
                </div>
                <div class="form-group">
                    <label class="control-label"> Status <span aria-required="true" class="required"> * </span></label>
                   {{ Form::select('status', $statusList, null, ["id" => "status", "placeholder" => "Select Status", 'class' => 'form-control select2 select-search']) }}
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
{!! HTML::script('js/plugins/validation/validate.min.js') !!}
<script type="text/javascript">
    //    $('.generated-password').hide();
    //== Class definition
    var FormValidation = function () {
        // Validation config
        var __addValidation = function () {
            if (!$().validate) {
                console.warn('Warning - validate.min.js is not loaded.');
                return;
            }
            // Initialize
            $('#edit-course-level-form').validate({
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
                    } else if (element.attr("name") == "status") {
                        error.appendTo(element.parent("div"));
                    }
                    // Other elements
                    else {
                        error.insertAfter(element);
                    }
                },
                rules: {
                    name: {
                        required: true,
                        remote: {
                            url: "/course-level/check-course-level",
                            type: "post",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {id: "<?= $courseLevel->id ?>"}
                        },
                        normalizer: function(value) {
                            return $.trim(value);
                        }
                    },
                    status: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: 'Please enter course level name.',
                        remote: "Course level name already exists."
                    },
                    status: {
                       required: 'Please select status.', 
                    }
                }
            });
        };

        return {
            init: function () {
                __addValidation();
            }
        }
    }();
    jQuery(document).ready(function () {
        FormValidation.init();
        $('.select2').select2()

    });
</script>