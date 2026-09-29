{include file="sections/header.tpl"}

<div class="panel panel-default">
    <div class="panel-heading">
        PPPoE Online
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama Pelanggan</th>
                    <th>Paket</th>
		    <th>Status</th>
                    <th>IP Address</th>
                    <th>Login Time</th>
		    <th>Durasi</th>
                </tr>
            </thead>

            <tbody>
            {foreach $online as $o}
                <tr>
                    <td>{$o->username}</td>
                    <td>{$o->fullname}</td>
                    <td>{$o->paket}</td>
		    <td>
			 <span class="label label-success">Online</span>
		    </td>
                    <td>{$o->framedipaddress}</td>
		    <td>{$o->acctstarttime}</td>

		    <td>
		    {assign var=durasi value=$o->durasi_detik}

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
