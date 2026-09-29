{if $_bills}

{foreach $_bills as $_bill}

<div class="box box-success">

<div class="box-header with-border">
    <h3 class="box-title">
        <i class="fa fa-wifi"></i>
        Paket Internet Aktif
    </h3>
</div>

<div class="box-body">


{assign var="expiredTime" value=strtotime($_bill['expiration']|cat:" "|cat:$_bill['time'])}
{assign var="currentTime" value=time()}

<div class="row">

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="small-box bg-aqua">
            <div class="inner" style="height:95px">
                <h3 style="font-size:28px;margin:0">
                    {$_bill['name_bw']}
                </h3>
                <p style="font-size:16px;margin-top:10px">
                    Bandwidth
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-tachometer"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">

        {if $expiredTime > $currentTime}

            <div class="small-box bg-green">
                <div class="inner" style="height:95px">
                    <h3 style="font-size:28px;margin:0">
                        Aktif
                    </h3>
                    <p style="font-size:16px;margin-top:10px">
                        Status
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-check-circle"></i>
                </div>
            </div>

        {else}

            <div class="small-box bg-red">
                <div class="inner" style="height:95px">
                    <h3 style="font-size:28px;margin:0">
                        Expired
                    </h3>
                    <p style="font-size:16px;margin-top:10px">
                        Status
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-times-circle"></i>
                </div>
            </div>

        {/if}

    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="small-box bg-yellow">
            <div class="inner" style="height:95px">
                <h3 style="font-size:24px;margin:0">
                    {$_bill['plan_type']}
                </h3>
                <p style="font-size:16px;margin-top:10px">
                    Tipe Paket
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-cube"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="small-box bg-red">
            <div class="inner" style="height:95px">
                <h3 style="font-size:24px;margin:0">
                    {$_bill['type']}
                </h3>
                <p style="font-size:16px;margin-top:10px">
                    Layanan
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-signal"></i>
            </div>
        </div>
    </div>

</div>

<div class="table-responsive">

    <table class="table table-hover table-striped">

        <tr>
            <td width="35%">
                <i class="fa fa-tag text-primary"></i>
                Nama Paket
            </td>
            <td>
                <strong>{$_bill['namebp']}</strong>
            </td>
        </tr>

        <tr>
            <td>
                <i class="fa fa-calendar text-success"></i>
                Aktif Sejak
            </td>
            <td>
                {Lang::dateAndTimeFormat($_bill['recharged_on'],$_bill['recharged_time'])}
            </td>
        </tr>

        <tr>
            <td>
                <i class="fa fa-clock-o text-danger"></i>
                Masa Aktif Sampai
            </td>
            <td>

                {if $expiredTime > $currentTime}

                    <span class="label label-success" style="font-size:13px">
                        {Lang::dateAndTimeFormat($_bill['expiration'],$_bill['time'])}
                    </span>

                {else}

                    <span class="label label-danger" style="font-size:13px">
                        {Lang::dateAndTimeFormat($_bill['expiration'],$_bill['time'])}
                    </span>

                {/if}

            </td>
        </tr>

        {if $nux_ip neq ''}
        <tr>
            <td>
                <i class="fa fa-globe text-info"></i>
                IP Address
            </td>
            <td>
                {$nux_ip}
            </td>
        </tr>
        {/if}

        {if $nux_mac neq ''}
        <tr>
            <td>
                <i class="fa fa-desktop text-warning"></i>
                MAC Address
            </td>
            <td>
                {$nux_mac}
            </td>
        </tr>
        {/if}

    </table>

</div>

<hr>

<div class="text-right">

    <a class="btn btn-warning btn-sm"
       href="{Text::url('home&sync=', $_bill['id'], '&stoken=', App::getToken())}"
       onclick="return ask(this, 'Sinkronkan akun internet?')">

        <i class="fa fa-refresh"></i>
        Sync

    </a>

    <a class="btn btn-primary btn-sm"
       href="{Text::url('home&recharge=', $_bill['id'], '&stoken=', App::getToken())}"
       onclick="return ask(this, 'Perpanjang paket internet?')">

        <i class="fa fa-credit-card"></i>
        Perpanjang Paket

    </a>

</div>


</div>

</div>

{/foreach}

{/if}
