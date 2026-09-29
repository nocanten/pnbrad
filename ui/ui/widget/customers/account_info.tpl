<div class="box box-primary">


<div class="box-header with-border">
    <h3 class="box-title">
        <i class="fa fa-user-circle"></i>
        Informasi Pelanggan
    </h3>
</div>

<div class="box-body text-center">

    <img src="{$app_url}/{$UPLOAD_PATH}{$_user['photo']}.thumb.jpg"
         onerror="this.src='{$app_url}/{$UPLOAD_PATH}/user.default.jpg'"
         class="img-circle"
         style="width:90px;height:90px;object-fit:cover;">

    <h3>{$_user['fullname']}</h3>

    <span class="label label-success">
        {$_user['status']}
    </span>

    <hr>

</div>

<table class="table table-hover">

    <tr>
        <td width="40%">
            <i class="fa fa-user"></i>
            Username
        </td>
        <td>
            <b>{$_user['username']}</b>
        </td>
    </tr>

    <tr>
        <td>
            <i class="fa fa-lock"></i>
            Password
        </td>
        <td>
            <input type="password"
                   value="{$_user['password']}"
                   style="width:100%;border:0;background:none;"
                   onmouseenter="this.type='text'"
                   onmouseleave="this.type='password'">
        </td>
    </tr>

    <tr>
        <td>
            <i class="fa fa-wifi"></i>
            Service
        </td>
        <td>
            <span class="label label-info">
                {$_user['service_type']}
            </span>
        </td>
    </tr>

    {if $_c['enable_balance']=='yes'}
    <tr>
        <td>
            <i class="fa fa-money"></i>
            Saldo
        </td>
        <td>
            <b>{Lang::moneyFormat($_user['balance'])}</b>
        </td>
    </tr>
    {/if}

    <tr>
        <td>
            <i class="fa fa-phone"></i>
            Telepon
        </td>
        <td>
            {$_user['phonenumber']}
        </td>
    </tr>

    <tr>
        <td>
            <i class="fa fa-envelope"></i>
            Email
        </td>
        <td>
            {$_user['email']}
        </td>
    </tr>

</table>


</div>
