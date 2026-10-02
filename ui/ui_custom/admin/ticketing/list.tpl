{include file="sections/header.tpl"}

<div class="panel panel-default">

    <div class="panel-heading">
        Daftar Ticket
    </div>

    <div class="panel-body">

        <a href="{Text::url('ticketing/add')}"
           class="btn btn-primary">
            Tambah Ticket
        </a>

        <hr>

        <div class="btn-group" style="margin-bottom:15px;">
        
            <a href="{Text::url('ticketing/list')}&status=open"
               class="btn btn-danger">
               Open
            </a>
        
            <a href="{Text::url('ticketing/list')}&status=assigned"
               class="btn btn-warning">
               Assigned
            </a>
        
            <a href="{Text::url('ticketing/list')}&status=progress"
               class="btn btn-info">
               Progress
            </a>
        
            <a href="{Text::url('ticketing/list')}&status=closed"
               class="btn btn-success">
               Closed
            </a>
            
            <a href="{Text::url('ticketing/list')}&type=installation"
               class="btn btn-primary">
               Pemasangan
            </a>
        
            <a href="{Text::url('ticketing/list')}&type=trouble"
               class="btn btn-danger">
               Gangguan
            </a>
            
            <a href="{Text::url('ticketing/list')}"
               class="btn btn-default">
               Semua
            </a>
        
        </div>

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>No Ticket</th>
                    <th>Pelanggan</th>
                    <th>PPPoE</th>
                    <th>Type</th>
                    <th>Subject</th>
		    <th>Teknisi</th>
                    <th>Status</th>
		    <th>Assigned</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            {foreach $tickets as $t}

                <tr>
                    <td>{$t.ticket_no}</td>

                    <td>
                        {$t.fullname|default:'-'}
                    </td>

                    <td>
                        {$t.pppoe_username|default:'-'}
                    </td>

                    <td>
                        {$t.type}
                    </td>

                    <td>
                        {$t.subject}
                    </td>

		    <td>
			{$t.technician_name|default:'-'}
		    </td>

                    <td>
                        {if $t.status eq 'open'}
                            <span class="label label-danger">Open</span>

                        {elseif $t.status eq 'assigned'}
                            <span class="label label-warning">Assigned</span>

                        {elseif $t.status eq 'progress'}
                            <span class="label label-info">Progress</span>

                        {elseif $t.status eq 'closed'}
                            <span class="label label-success">Closed</span>

                        {else}
                            {$t.status}
                        {/if}
                    </td>

		    <td>
			{$t.assigned_at|default:'-'}
		    </td>

                    <td>
                        {$t.created_at}
                    </td>

                    <td>
                        <a href="{Text::url('ticketing/view')}&id={$t.id}"
                           class="btn btn-xs btn-info">
                            Detail
                        </a>
                    </td>

                </tr>

            {/foreach}

            </tbody>

        </table>

    </div>

</div>

{include file="sections/footer.tpl"}
