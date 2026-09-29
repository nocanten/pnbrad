{include file="sections/header.tpl"}

<div class="panel panel-default">
    <div class="panel-heading">
        PPPoE Offline
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama Pelanggan</th>
                    <th>Paket</th>
		    <th>Status</th>
		    <th>Last Seen</th>
		    <th>Offline Sejak</th>
                </tr>
            </thead>

            <tbody>
            {foreach $offline as $o}
                <tr>
                    <td>{$o->username}</td>
                    <td>{$o->fullname}</td>
                    <td>{$o->paket}</td>
		    <td>
			<span class="label label-danger">Offline</span>
		    </td>
		    <td>{$o->last_online}</td>
		    <td>
        		{assign var=durasi value=$o->offline_detik}

        		{if $durasi >= 86400}
            		    {math equation="floor(x/86400)" x=$durasi} Hari
          		    {math equation="floor((x%86400)/3600)" x=$durasi} Jam
       		        {elseif $durasi >= 3600}
            		    {math equation="floor(x/3600)" x=$durasi} Jam
            		    {math equation="floor((x%3600)/60)" x=$durasi} Menit
        		{else}
            		    {math equation="floor(x/60)" x=$durasi} Menit
        		{/if}
    		     </td>

                </tr>
            {/foreach}
            </tbody>

        </table>
    </div>
</div>

{include file="sections/footer.tpl"}
