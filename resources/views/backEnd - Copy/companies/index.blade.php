@extends('backEnd.layouts.admin_app')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> Companies </h3>
                    <div class="action pull-right">
                        <a href="{{ route('create.company') }}" class="btn btn-primary" title="Add Company">
                            <b><i class="fa fa-plus-circle"></i></b> Add Company
                        </a>
                        <a href="{{ route('delete-all.companies') }}" class="btn btn-danger delete-all" title="Delete All">Delete All</a>
                    </div>
                </div>
                <div class="box-body">
                    <table id="city-list" class="table table-bordered table-hover datatable-highlight">
                        <thead>
                            <tr class="heading">
                                <th class="listing-id"><input type="checkbox" id="check-all" name="check-all"></th>
                                <th width="45%">Company</th>
                                <th width="30%">Contact Number</th>
                                <th class="listing-action">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="filter">
                                <td></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="name" id="name"></td>
                                <td><input type="text" class="form-control form-filter input-sm" name="contact_number" id="contact_number"></td>
                                <td>
                                    <button class="btn btn-sm btn-default filter-submit" title="Search"><i class="fa fa-search"></i> <?= __('Search'); ?></button>
                                    <button class="btn btn-sm btn-default filter-cancel" title="Reset"><i class="fa fa-times"></i> <?= __('Reset'); ?></button>
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="add-city-modal"></div>
<style>
    .datatable-highlight tfoot {
        display: table-header-group;
    }
</style>
@endsection
@section('js') 
{{ HTML::script('/js/datatables/companies.js') }}
{{ HTML::script('/js/plugins/tables/datatables/datatables.min.js') }}
{{ HTML::script('/js/plugins/select2/dist/js/select2.full.min.js') }}
@endSection