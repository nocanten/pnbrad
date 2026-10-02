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
                    <th>IP Address</th>
                    <th>Login Time</th>
                </tr>
            </thead>

            <tbody>
            {foreach $online as $o}
                <tr>
                    <td>{$o->username}</td>
                    <td>{$o->framedipaddress}</td>
                    <td>{$o->acctstarttime}</td>
                </tr>
            {/foreach}
            </tbody>

        </table>
    </div>
</div>

{include file="sections/footer.tpl"}
