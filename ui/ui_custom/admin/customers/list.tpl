{include file="sections/header.tpl"}

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                <i class="ion ion-android-people"></i> {Lang::T('Manage Contact')}
                <div class="pull-right">
                    {if in_array($_admin['user_type'],['SuperAdmin','Admin'])}
                        <a class="btn btn-primary btn-xs" title="save"
                            href="{Text::url('customers/csv&token=', $csrf_token)}"
                            onclick="return ask(this, '{Lang::T("
                                                                                                                            This will export to CSV")}?')">
                            <i class="glyphicon glyphicon-download"></i> <span class="hidden-xs">CSV</span>
                        </a>
                    {/if}
                    <span class="badge badge-info">{$total_customer} customers</span>
                </div>
            </div>
            <div class="panel-body">
                <form id="site-search" method="post" action="{Text::url('customers')}">
                    <input type="hidden" name="csrf_token" value="{$csrf_token}">

                    <!-- Desktop Search Form -->
                    <div class="hidden-xs">
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{Lang::T('Sort By')}</label>
                                    <div class="row">
                                        <div class="col-xs-7">
                                            <select class="form-control" id="order" name="order">
                                                <option value="username" {if $order eq 'username' }selected{/if}>
                                                    {Lang::T('Username')}</option>
                                                <option value="fullname" {if $order eq 'fullname' }selected{/if}>
                                                    {Lang::T('First Name')}</option>
                                                <option value="lastname" {if $order eq 'lastname' }selected{/if}>
                                                    {Lang::T('Last Name')}</option>
                                                <option value="created_at" {if $order eq 'created_at' }selected{/if}>
                                                    {Lang::T('Created Date')}</option>
                                                <option value="balance" {if $order eq 'balance' }selected{/if}>
                                                    {Lang::T('Balance')}</option>
                                                <option value="status" {if $order eq 'status' }selected{/if}>
                                                    {Lang::T('Status')}</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-5">
                                            <select class="form-control" id="orderby" name="orderby">
                                                <option value="asc" {if $orderby eq 'asc' }selected{/if}>ASC</option>
                                                <option value="desc" {if $orderby eq 'desc' }selected{/if}>DESC</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>{Lang::T('Search')}</label>
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="{Lang::T('Search username, name, email, phone')}..."
                                            value="{$search}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-search"></i> {Lang::T('Search')}
                                            </button>
                                            <button class="btn btn-info" type="submit" name="export" value="csv">
                                                <i class="glyphicon glyphicon-download"></i> CSV
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <a href="{Text::url('customers/add')}" class="btn btn-success btn-block">
                                        <i class="ion ion-android-add"></i> {Lang::T('Add Customer')}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Search Form -->
                    <div class="visible-xs">
                        <div class="panel panel-default" style="margin-bottom: 15px;">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#searchFilters">
                                        <i class="fa fa-filter"></i> {Lang::T('Search & Filter')}
                                        <i class="fa fa-chevron-down pull-right"></i>
                                    </a>
                                </h4>
                            </div>
                            <div id="searchFilters" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <!-- Search Input -->
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control input-lg"
                                            placeholder="{Lang::T('Search')}..." value="{$search}">
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label class="small">{Lang::T('Status')}</label>
                                                <select class="form-control" name="filter">
                                                    {foreach $statuses as $status}
                                                        <option value="{$status}" {if $filter eq $status }selected{/if}>
                                                            {Lang::T($status)}
                                                        </option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="small">{Lang::T('Order')}</label>
                                            <select class="form-control" name="orderby">
                                                <option value="asc" {if $orderby eq 'asc' }selected{/if}>
                                                    {Lang::T('Ascending')}</option>
                                                <option value="desc" {if $orderby eq 'desc' }selected{/if}>
                                                    {Lang::T('Descending')}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-block" type="submit">
                                            <i class="fa fa-search"></i> {Lang::T('Search')}
                                        </button>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-xs-6">
                                        <a href="{Text::url('customers/add')}" class="btn btn-success btn-block">
                                            <i class="ion ion-android-add"></i> {Lang::T('Add')}
                                        </a>
                                    </div>
                                    <div class="col-xs-6">
                                        <button class="btn btn-info btn-block" type="submit" name="export" value="csv">
                                            <i class="glyphicon glyphicon-download"></i> Export CSV
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>

            <div class="form-group">
                <span>Show</span>
                <select class="page-item" id="per_page" name="per_page" onchange="changePerPage(this)">
                    <option value="10" {if $cookie eq 10}selected{/if}>10</option>
                    <option value="25" {if $cookie eq 25}selected{/if}>25</option>
                    <option value="50" {if $cookie eq 50}selected{/if}>50</option>
                    <option value="100" {if $cookie eq 100}selected{/if}>100</option>
                    <option value="200" {if $cookie eq 200}selected{/if}>200</option>
                    <option value="500" {if $cookie eq 500}selected{/if}>500</option>
                    <option value="1000" {if $cookie eq 1000}selected{/if}>1000</option>
                </select>
                <span>entries</span>
            </div>

            <!-- Mobile View -->
            <div class="visible-xs">
                {if $d}
                    {foreach $d as $ds}
                        <div class="panel panel-default mb-2">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <strong>Status:</strong>
                                        {if $ds['status'] == 'Active'}
                                            <span class="label label-success">{Lang::T($ds['status'])}</span>
                                        {else}
                                            <span class="label label-danger">{Lang::T($ds['status'])}</span>
                                        {/if}
                                    </div>
                                    <div class="col-xs-6">
                                        <strong>Balance:</strong>
                                        <span class="text-primary">{Lang::moneyFormat($ds['balance'])}</span>
                                    </div>
                                </div>
                                <hr class="mb-2 mt-2">
                                <div class="row mb-1">
                                    <div class="col-xs-12">
                                        <strong>Username:</strong> {$ds['username']}<br>
                                        <small class="text-muted">ID: {$ds['id']}</small>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xs-12">
                                        <strong>Full Name:</strong> {$ds['fullname']}
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xs-6">
                                        <strong>Type:</strong> {$ds['account_type']}
                                    </div>
                                    <div class="col-xs-6">
                                        <strong>Service:</strong> {$ds['service_type']}
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xs-12">
                                        <strong>Package:</strong>
                                        <span api-get-text="{Text::url('autoload/plan_is_active/')}{$ds['id']}">
                                            <span class="label label-default">&bull;</span>
                                        </span>
                                    </div>
                                </div>
                                {if $ds['phonenumber'] || $ds['email'] || $ds['coordinates']}
                                    <div class="row mb-1">
                                        <div class="col-xs-12">
                                            <strong>Contact:</strong>
                                            <div class="btn-group btn-group-sm">
                                                {if $ds['phonenumber']}
                                                    <a href="tel:{$ds['phonenumber']}" class="btn btn-default btn-xs"
                                                        title="{$ds['phonenumber']}"><i class="glyphicon glyphicon-earphone"></i></a>
                                                {/if}
                                                {if $ds['email']}
                                                    <a href="mailto:{$ds['email']}" class="btn btn-default btn-xs"
                                                        title="{$ds['email']}"><i class="glyphicon glyphicon-envelope"></i></a>
                                                {/if}
                                                {if $ds['coordinates']}
                                                    <a href="https://www.google.com/maps/dir//{$ds['coordinates']}/" target="_blank"
                                                        class="btn btn-default btn-xs" title="{$ds['coordinates']}"><i
                                                            class="glyphicon glyphicon-map-marker"></i></a>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                {/if}
                                <div class="row mb-1">
                                    <div class="col-xs-12">
                                        <small><strong>Created:</strong> {Lang::dateTimeFormat($ds['created_at'])}</small>
                                    </div>
                                </div>
                                <hr class="mb-2 mt-2">
                                <div class="row mb-1">
                                    <div class="col-xs-12">
                                        <input type="checkbox" name="customer_ids[]" value="{$ds['id']}">
                                        <strong>Select for bulk action</strong>
                                    </div>
                                </div>
                                <div class="btn-group btn-group-justified">
                                    <div class="btn-group">
                                        <a href="{Text::url('customers/view/')}{$ds['id']}" class="btn btn-success btn-sm">
                                            <i class="fa fa-eye"></i> {Lang::T('View')}
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{Text::url('customers/edit/', $ds['id'], '&token=', $csrf_token)}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i> {Lang::T('Edit')}
                                        </a>
                                    </div>
                                </div>
                                <div class="btn-group btn-group-justified" style="margin-top: 5px;">
                                    {if file_exists('system/plugin/genieacs_manager.php')}
                                    <div class="btn-group">
                                        <button onclick="findONTDevice('{$ds['username']}')" class="btn btn-warning btn-sm">
                                            <i class="fa fa-wifi"></i> ONT
                                        </button>
                                    </div>
                                    {/if}
                                    <div class="btn-group">
                                        <a href="{Text::url('customers/sync/', $ds['id'], '&token=', $csrf_token)}"
                                            class="btn btn-success btn-sm">
                                            <i class="fa fa-refresh"></i> {Lang::T('Sync')}
                                        </a>
                                    </div>
                                </div>
                                <div class="btn-group btn-group-justified" style="margin-top: 5px;">
                                    <div class="btn-group">
                                        <a href="{Text::url('plan/recharge/', $ds['id'], '&token=', $csrf_token)}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-bolt"></i> {Lang::T('Recharge')}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                {/if}
            </div>

            <!-- Desktop View -->
            <div class="table-responsive table_mobile hidden-xs">
                <table id="customerTable" class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>{Lang::T('Username')}</th>
                            <th>Photo</th>
                            <th>{Lang::T('Account Type')}</th>
                            <th>{Lang::T('Full Name')}</th>
                            <th>{Lang::T('District')}</th>
                            <th>{Lang::T('Balance')}</th>
                            <th>{Lang::T('Contact')}</th>
                            <th>{Lang::T('Package')}</th>
                            <th>{Lang::T('Service Type')}</th>
                            <th>PPPOE</th>
                            <th>{Lang::T('Status')}</th>
                            <th>{Lang::T('Created On')}</th>
                            <th>{Lang::T('Manage')}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {if $d}
                            {foreach $d as $ds}
                                <tr {if $ds['status'] !='Active' }class="danger" {/if}>
                                    <td><input type="checkbox" name="customer_ids[]" value="{$ds['id']}"></td>
                                    <td onclick="window.location.href = '{Text::url('customers/view/', $ds['id'])}'"
                                        style="cursor:pointer;">{$ds['username']}</td>
                                    <td>
                                        <a href="{$app_url}/{$UPLOAD_PATH}{$ds['photo']}" target="photo">
                                            <img src="{$app_url}/{$UPLOAD_PATH}{$ds['photo']}.thumb.jpg" width="32" alt="">
                                        </a>
                                    </td>
                                    <td>{$ds['account_type']}</td>
                                    <td onclick="window.location.href = '{Text::url('customers/view/', $ds['id'])}'"
                                        style="cursor: pointer;">{$ds['fullname']}</td>
                                    <td>{$ds['district']}</td>
                                    <td>{Lang::moneyFormat($ds['balance'])}</td>
                                    <td align="center">
                                        {if $ds['phonenumber']}
                                            <a href="tel:{$ds['phonenumber']}" class="btn btn-default btn-xs"
                                                title="{$ds['phonenumber']}"><i class="glyphicon glyphicon-earphone"></i></a>
                                        {/if}
                                        {if $ds['email']}
                                            <a href="mailto:{$ds['email']}" class="btn btn-default btn-xs" title="{$ds['email']}"><i
                                                    class="glyphicon glyphicon-envelope"></i></a>
                                        {/if}
                                        {if $ds['coordinates']}
                                            <a href="https://www.google.com/maps/dir//{$ds['coordinates']}/" target="_blank"
                                                class="btn btn-default btn-xs" title="{$ds['coordinates']}"><i
                                                    class="glyphicon glyphicon-map-marker"></i></a>
                                        {/if}
                                    </td>
                                    <td align="center" api-get-text="{Text::url('autoload/plan_is_active/')}{$ds['id']}">
                                        <span class="label label-default">&bull;</span>
                                    </td>
                                    <td>{$ds['service_type']}</td>
                                    <td>
                                        {$ds['pppoe_username']}
                                        {if !empty($ds['pppoe_username']) && !empty($ds['pppoe_ip'])}:{/if}
                                        {$ds['pppoe_ip']}
                                    </td>
                                    <td>{Lang::T($ds['status'])}</td>
                                    <td>{Lang::dateTimeFormat($ds['created_at'])}</td>
                                    <td align="center" style="min-width: 80px; padding: 3px;">
                                        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 2px;">
                                            <a href="{Text::url('customers/view/')}{$ds['id']}" class="btn btn-success btn-xs"
                                                title="{Lang::T('View')}" style="padding: 2px 6px;">
                                                <i class="fa fa-eye"></i></a>
                                            <a href="{Text::url('customers/edit/', $ds['id'], '&token=', $csrf_token)}"
                                                class="btn btn-info btn-xs" title="{Lang::T('Edit')}" style="padding: 2px 6px;">
                                                <i class="fa fa-edit"></i></a>
                                            {if file_exists('system/plugin/genieacs_manager.php')}
                                            <a href="javascript:void(0)" onclick="findONTDevice('{$ds['username']}')"
                                                class="btn btn-warning btn-xs" title="ONT Device" style="padding: 2px 6px;">
                                                <i class="fa fa-wifi"></i></a>
                                            {/if}
                                            <a href="{Text::url('customers/sync/', $ds['id'], '&token=', $csrf_token)}"
                                                class="btn btn-success btn-xs" title="{Lang::T('Sync')}"
                                                style="padding: 2px 6px;">
                                                <i class="fa fa-refresh"></i></a>
                                            <a href="{Text::url('plan/recharge/', $ds['id'], '&token=', $csrf_token)}"
                                                class="btn btn-primary btn-xs" title="{Lang::T('Recharge')}"
                                                style="padding: 2px 6px;">
                                                <i class="fa fa-bolt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            {/foreach}
                        {/if}
                    </tbody>
                </table>
            </div>

            <div class="row" style="padding: 5px">
                <div class="col-lg-3 col-lg-offset-9">
                    <div class="btn-group btn-group-justified" role="group">
                        <div class="btn-group" role="group">
                            <button id="sendMessageToSelected" class="btn btn-success btn-block">{Lang::T('Send
                                    Message')}</button>
                        </div>
                    </div>
                </div>
            </div>

            {if empty($d)}
                <div class="alert alert-info text-center">
                    <i class="fa fa-info-circle"></i> {Lang::T('No customers found')}
                </div>
            {/if}

            {include file="pagination.tpl"}
        </div>
    </div>
</div>
</div>

<!-- Modal for Sending Messages -->
<div id="sendMessageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sendMessageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendMessageModalLabel">{Lang::T('Send Message')}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select style="margin-bottom: 10px;" id="messageType" class="form-control">
                    <option value="all">{Lang::T('All')}</option>
                    <option value="email">{Lang::T('Email')}</option>
                    <option value="inbox">{Lang::T('Inbox')}</option>
                    <option value="sms">{Lang::T('SMS')}</option>
                    <option value="wa">{Lang::T('WhatsApp')}</option>
                </select>
                <input type="text" style="margin-bottom: 10px;" class="form-control" id="subject-content" value=""
                    placeholder="{Lang::T('Enter message subject here')}">
                <textarea id="messageContent" class="form-control" rows="4"
                    placeholder="{Lang::T('Enter your message here...')}"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{Lang::T('Close')}</button>
                <button type="button" id="sendMessageButton" class="btn btn-primary">{Lang::T('Send Message')}</button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Mobile optimization */
    @media (max-width: 767px) {
        .panel-body {
            padding: 10px;
        }

        .mb-1 {
            margin-bottom: 5px;
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        .mt-2 {
            margin-top: 10px;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .form-group select {
            margin-left: 10px;
            margin-right: 10px;
        }

        .page-item {
            width: 100px;
            display: block;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Search form mobile adjustments */
        #site-search .col-lg-4,
        #site-search .col-lg-3,
        #site-search .col-lg-1 {
            margin-bottom: 10px;
        }

        .md-whiteframe-z1 {
            padding: 10px !important;
        }

        /* Row adjustments for mobile */
        .row-no-gutters {
            margin-left: 0;
            margin-right: 0;
        }

        .row-no-gutters>[class*="col-"] {
            padding-left: 5px;
            padding-right: 5px;
        }
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 5px;
        border: 1px solid #ccc;
        background-color: #fff;
        color: #333;
        cursor: pointer;
    }

    /* Clean form styling */
    .form-group label {
        font-weight: 600;
        margin-bottom: 5px;
        display: block;
    }

    .form-group label.small {
        font-size: 12px;
        font-weight: 600;
    }

    /* Search panel mobile - no background color to follow theme */
    #searchFilters .input-lg {
        font-size: 16px;
        height: 45px;
    }

    /* Collapsible panel styling */
    .panel-title a {
        text-decoration: none;
        display: block;
    }

    .panel-title a:hover {
        text-decoration: none;
    }

    .panel-title a[data-toggle="collapse"] .fa-chevron-down {
        transition: transform 0.3s ease;
    }

    .panel-title a[data-toggle="collapse"].collapsed .fa-chevron-down {
        transform: rotate(-90deg);
    }

    /* Desktop search form styling */
    @media (min-width: 768px) {
        .form-group {
            margin-bottom: 0;
        }

        .form-group label {
            font-size: 13px;
        }
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Select or deselect all checkboxes
    document.getElementById('select-all').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('input[name="customer_ids[]"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });

    $(document).ready(function() {
        let selectedCustomerIds = [];

        // Collect selected customer IDs when the button is clicked
        $('#sendMessageToSelected').on('click', function() {
            selectedCustomerIds = $('input[name="customer_ids[]"]:checked').map(function() {
                return $(this).val();
            }).get();

            if (selectedCustomerIds.length === 0) {
                Swal.fire({
                    title: 'Error!',
                    text: "{Lang::T('Please select at least one customer to send a message.')}",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Open the modal
            $('#sendMessageModal').modal('show');
        });

        // Handle sending the message
        $('#sendMessageButton').on('click', function() {
            const message = $('#messageContent').val().trim();
            const messageType = $('#messageType').val();
            const subject = $('#subject-content').val().trim();


            if (!message) {
                Swal.fire({
                    title: 'Error!',
                    text: "{Lang::T('Please enter a message to send.')}",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            if (messageType == 'all' || messageType == 'inbox' || messageType == 'email' && !subject) {
                Swal.fire({
                    title: 'Error!',
                    text: "{Lang::T('Please enter a subject for the message.')}",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Disable the button and show loading text
            $(this).prop('disabled', true).text('{Lang::T('Sending...')}');

            $.ajax({
                url: '?_route=message/send_bulk_selected',
                method: 'POST',
                data: {
                    customer_ids: selectedCustomerIds,
                    message_type: messageType,
                    message: message
                },
                dataType: 'json',
                success: function(response) {
                    // Handle success response
                    if (response.status === 'success') {
                        Swal.fire({
                            title: 'Success!',
                            text: "{Lang::T('Message sent successfully.')}",
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: "{Lang::T('Error sending message: ')}" + response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                    $('#sendMessageModal').modal('hide');
                    $('#messageContent').val(''); // Clear the message content
                },
                error: function() {
                    Swal.fire({
                        title: 'Error!',
                        text: "{Lang::T('Failed to send the message. Please try again.')}",
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                },
                complete: function() {
                    // Re-enable the button and reset text
                    $('#sendMessageButton').prop('disabled', false).text('{Lang::T('Send Message')}');
                }
            });
        });
    });

    $(document).ready(function() {
        $('#sendMessageModal').on('show.bs.modal', function() {
            $(this).attr('inert', 'true');
        });
        $('#sendMessageModal').on('shown.bs.modal', function() {
            $('#messageContent').focus();
            $(this).removeAttr('inert');
        });
        $('#sendMessageModal').on('hidden.bs.modal', function() {
            // $('#button').focus();
        });
    });

    // Toggle collapse icon
    $('#searchFilters').on('show.bs.collapse', function() {
        $(this).parent().find('.fa-chevron-down').removeClass('collapsed');
    });
    $('#searchFilters').on('hide.bs.collapse', function() {
        $(this).parent().find('.fa-chevron-down').addClass('collapsed');
    });
</script>
<script>
    document.getElementById('messageType').addEventListener('change', function() {
        const messageType = this.value;
        const subjectField = document.getElementById('subject-content');

        subjectField.style.display = (messageType === 'all' || messageType === 'email' || messageType ===
            'inbox') ? 'block' : 'none';

        switch (messageType) {
            case 'all':
                subjectField.placeholder = 'Enter a subject for all channels';
                subjectField.required = true;
                break;
            case 'email':
                subjectField.placeholder = 'Enter a subject for email';
                subjectField.required = true;
                break;
            case 'inbox':
                subjectField.placeholder = 'Enter a subject for inbox';
                subjectField.required = true;
                break;
            default:
                subjectField.placeholder = 'Enter message subject here';
                subjectField.required = false;
                break;
        }
    });

    function changePerPage(select) {
        setCookie('customer_per_page', select.value, 365);
        setTimeout(() => {
            location.reload();
        }, 1000);
    }
</script>
<script>
    // Disable duplicate fields based on screen size
    $(document).ready(function() {
        function toggleFormFields() {
            if ($(window).width() >= 768) {
                // Desktop view - disable mobile fields
                $('.visible-xs input, .visible-xs select').prop('disabled', true);
                $('.hidden-xs input, .hidden-xs select').prop('disabled', false);
            } else {
                // Mobile view - disable desktop fields
                $('.hidden-xs input, .hidden-xs select').prop('disabled', true);
                $('.visible-xs input, .visible-xs select').prop('disabled', false);
            }
        }

        // Run on load
        toggleFormFields();

        // Run on resize
        $(window).resize(toggleFormFields);
    });
</script>
<script>
    function findONTDevice(username) {
        // Show loading
        Swal.fire({
            title: 'Searching ONT Device...',
            text: 'Looking for device with tag: ' + username,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Ajax call to find device
        $.ajax({
            url: '{$_url}plugin/genieacs_devices/find-by-tag',
            type: 'GET',
            data: { tag: username },
            dataType: 'json',
            success: function(response) {
                if (response.success && response.device_id) {
                    // Redirect to device detail
                    window.location.href = '{$_url}plugin/genieacs_device_detail/' + encodeURIComponent(response.device_id);
                } else {
                    Swal.fire('ONT Not Found!', 'No ONT device found with tag: ' + username, 'warning');
                }
            },
            error: function() {
                Swal.fire('Error!', 'Failed to search for ONT device', 'error');
            }
        });
    }
</script>
{include file = "sections/footer.tpl" }