{include file="customer/header.tpl"}

<div class="row">


<!-- Welcome -->
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-body">

            <h2>
                <i class="fa fa-wifi"></i>
                Selamat Datang, {$_user['fullname']}
            </h2>

            <p>
                <strong>ID Pelanggan :</strong>
                {$_user['username']}
            </p>

            <p>
                <strong>Email :</strong>
                {$_user['email']}
            </p>

        </div>
    </div>
</div>

<!-- Announcement -->
<div class="col-md-6">
    {foreach $widgets as $w}
        {if $w.widget == 'announcement'}
            {$w.content}
        {/if}
    {/foreach}
</div>


</div>

<div class="row">


<div class="col-md-3">
    <a href="{Text::url('accounts/profile')}" class="btn btn-primary btn-block btn-lg">
        <i class="fa fa-user"></i><br><br>
        Profil
    </a>
</div>

<div class="col-md-3">
    <a href="{Text::url('accounts/change-password')}" class="btn btn-success btn-block btn-lg">
        <i class="fa fa-lock"></i><br><br>
        Password
    </a>
</div>

<div class="col-md-3">
    <a href="{Text::url('mail')}" class="btn btn-warning btn-block btn-lg">
        <i class="fa fa-envelope"></i><br><br>
        Inbox
    </a>
</div>

<div class="col-md-3">
    <a href="{Text::url('order/history')}" class="btn btn-danger btn-block btn-lg">
        <i class="fa fa-file-text"></i><br><br>
        Riwayat Pembayaran
    </a>
</div>


</div>

<br>

{function showWidget pos=0}


{foreach $widgets as $w}

    {if $w['position'] == $pos}

        {if $w.widget != 'announcement'
            && $w.widget != 'recharge_a_friend'
            && $w.widget != 'voucher_activation'}

            {$w['content']}

        {/if}

    {/if}

{/foreach}


{/function}

{assign rows explode(".", $_c['dashboard_Customer'])}
{assign pos 1}

{foreach $rows as $cols}


{if $cols == 12}

    <div class="row">
        <div class="col-md-12">
            {showWidget widgets=$widgets pos=$pos}
        </div>
    </div>

    {assign pos value=$pos+1}

{else}

    {assign colss explode(",", $cols)}

    <div class="row">

        {foreach $colss as $c}

            <div class="col-md-{$c}">
                {showWidget widgets=$widgets pos=$pos}
            </div>

            {assign pos value=$pos+1}

        {/foreach}

    </div>

{/if}


{/foreach}

{include file="customer/footer.tpl"}
