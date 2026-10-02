{include file="sections/header.tpl"}

<div class="panel panel-default">

    <div class="panel-heading">
        Detail Ticket
    </div>

    <div class="panel-body">

        <table class="table table-bordered">

            <tr>
                <th width="200">No Ticket</th>
                <td>{$ticket->ticket_no}</td>
            </tr>

            <tr>
                <th>Pelanggan</th>
                <td>
                    {if $customer}
                        {$customer->fullname}
                    {else}
                        -
                    {/if}
                </td>
            </tr>

            <tr>
                <th>PPPoE</th>
                <td>
                    {if $customer}
                        {$customer->pppoe_username}
                    {else}
                        -
                    {/if}
                </td>
            </tr>

            <tr>
                <th>Subject</th>
                <td>{$ticket->subject}</td>
            </tr>

            <tr>
                <th>Deskripsi</th>
                <td>{$ticket->description}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>

                    {if $ticket->status eq 'open'}
                        <span class="label label-danger">Open</span>

                    {elseif $ticket->status eq 'assigned'}
                        <span class="label label-warning">Assigned</span>

                    {elseif $ticket->status eq 'approved'}
                    <span class="label label-primary">
                    Approved
                    </span>
                    
                    {elseif $ticket->status eq 'closed'}
                    <span class="label label-success">
                    Closed
                    </span>

                    {elseif $ticket->status eq 'closed'}
                        <span class="label label-success">Closed</span>

                    {else}
                        {$ticket->status}
                    {/if}

                </td>
            </tr>
            
            {if $installation}

            <tr>
                <th>Nama Calon Pelanggan</th>
                <td>{$installation->fullname}</td>
            </tr>
            
            <tr>
                <th>NIK</th>
                <td>{$installation->nik|default:'-'}</td>
            </tr>
            
            <tr>
                <th>No HP</th>
                <td>{$installation->phone}</td>
            </tr>
            
            <tr>
                <th>Alamat</th>
                <td>{$installation->address}</td>
            </tr>
            
            <tr>
                <th>Kecamatan</th>
                <td>{$installation->district}</td>
            </tr>
            
            <tr>
                <th>Kota</th>
                <td>{$installation->city}</td>
            </tr>
            
            <tr>
                <th>Provinsi</th>
                <td>{$installation->state}</td>
            </tr>
            
            <tr>
                <th>Email</th>
                <td>{$installation->email}</td>
            </tr>
            
            <tr>
                <th>Paket Langganan</th>
                <td>
                    {if $package}
                        {$package->name_plan}
                        (Rp {$package->price})
                    {else}
                        -
                    {/if}
            <tr>
                <th>Kode Sales</th>
                <td>{$installation->sales_code|default:'-'}</td>
            </tr>
                </td>
            </tr>
            
            {/if}

            <tr>
                <th>Teknisi</th>
                <td>
                    {if $ticket->technician_name}
                        {$ticket->technician_name}
                    {else}
                        Belum Ditugaskan
                    {/if}
                </td>
            </tr>

            <tr>
                <th>Assigned At</th>
                <td>{$ticket->assigned_at}</td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>{$ticket->created_at}</td>
            </tr>

	    <tr>
		 <th>Catatan Teknisi</th>
		 <td>
		     {$ticket->technician_note|default:'Belum ada catatan'}
		 </td>
	    </tr>

        </table>

        <hr>

        <h4>Catatan Teknisi</h4>

    	<form method="post"
    	      action="{Text::url('ticketing/save-note')}">
    
    	     <input type="hidden"
    	           name="id"
    	           value="{$ticket->id}">
    
    	    <div class="form-group">
    
    	        <textarea name="technician_note"
    	                  class="form-control"
    	                  rows="6">{$ticket->technician_note}</textarea>
    
    	    </div>
    
    	    <button type="submit"
    	            class="btn btn-success">
    
    	        Simpan Catatan
    
    	    </button>
    
    	</form>
    
    	<hr>
    	
    	<h4>Upload Foto Pekerjaan</h4>

        <form method="post"
              enctype="multipart/form-data"
              action="{Text::url('ticketing/upload-photo')}">
        
            <input type="hidden"
                   name="id"
                   value="{$ticket->id}">
        
            <div class="row">
        
                <div class="col-md-6">
                    <label>Foto Sebelum</label>
        
                    <input type="file"
                           name="before_photo"
                           class="form-control">
                </div>
        
                <div class="col-md-6">
                    <label>Foto Sesudah</label>
        
                    <input type="file"
                           name="after_photo"
                           class="form-control">
                </div>
        
            </div>
        
            <br>
        
            <button type="submit"
                    class="btn btn-primary">
                Upload Foto
            </button>
        
        </form>
        
        <hr>

        <h4>Assign Teknisi</h4>
        
        {if $ticket->before_photo || $ticket->after_photo}

        <hr>
        
        <div class="row">
        
            {if $ticket->before_photo}
            <div class="col-md-6">
        
                <h4>Foto Sebelum</h4>
        
                <img src="/uploads/tickets/{$ticket->before_photo}"
                     class="img-responsive img-thumbnail">
        
            </div>
            {/if}
        
            {if $ticket->after_photo}
            <div class="col-md-6">
        
                <h4>Foto Sesudah</h4>
        
                <img src="/uploads/tickets/{$ticket->after_photo}"
                     class="img-responsive img-thumbnail">
        </div>
        
        {/if}
        
        </div>

        {/if}

        <form method="post"
              action="{Text::url('ticketing/assign')}">

            <input type="hidden"
                   name="id"
                   value="{$ticket->id}">

            <div class="form-group">

                <label>Pilih Teknisi</label>

                <select name="technician_id"
                        class="form-control">

                    {foreach $users as $u}

                        <option value="{$u->id}"
                        {if $ticket->technician_id == $u->id}selected{/if}>

                            {$u->fullname}
                            ({$u->user_type})

                        </option>

                    {/foreach}

                </select>

            </div>

            {if $ticket->status eq 'open'}

            <button type="submit"
                    class="btn btn-warning">
                Assign Teknisi
            </button>
            
            {/if}
            
            </form>
            
            <br>
            
            {if $ticket->status eq 'assigned'}

            <a href="{Text::url('ticketing/progress')}&id={$ticket->id}"
               class="btn btn-primary">
            
                Progres
            
            </a>
            
            {/if}
            
            {if $ticket->status eq 'progress'
                && $ticket->technician_note
                && $ticket->before_photo
                && $ticket->after_photo}
            
            <a href="{Text::url('ticketing/close')}&id={$ticket->id}"
               class="btn btn-success">
            
                Close Ticket
            
            </a>
            
            {/if}
            
            <a href="{Text::url('ticketing/list')}"
               class="btn btn-default">
            
                Kembali
            
            </a>
    </div>
    
</div>

{include file="sections/footer.tpl"}
