{include file="sections/header.tpl"}

<div class="panel panel-default">

    <div class="panel-heading">
        Tambah Ticket
    </div>

    <div class="panel-body">

        <form method="post"
              action="{Text::url('ticketing/add-post')}">

            <div class="form-group">

                <label>Jenis Ticket</label>

                <select name="type"
                        id="ticket_type"
                        class="form-control">

                    <option value="">
                        -- Pilih Jenis Ticket --
                    </option>

                    <option value="trouble">
                        Gangguan
                    </option>

                    <option value="installation">
                        Pemasangan Baru
                    </option>

                </select>

            </div>

            <div id="trouble_form" style="display:none;">

                <hr>

                <div class="form-group">

                    <label>Pelanggan</label>

                    <select name="customer_id"
                            class="form-control">

                        <option value="">
                            -- Pilih Pelanggan --
                        </option>

                        {foreach $customers as $c}

                        <option value="{$c->id}">
                            {$c->fullname} | {$c->pppoe_username}
                        </option>

                        {/foreach}

                    </select>

                </div>

            </div>

            <div id="installation_form" style="display:none;">

                <hr>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text"
                           name="fullname"
                           class="form-control">
                </div>
                
                <div class="form-group">
                    <label>NIK</label>
                
                    <input type="text"
                           name="nik"
                           class="form-control"
                           maxlength="16"
                           placeholder="Masukkan NIK 16 digit">
                
                </div>

                <div class="form-group">
                    <label>No HP</label>
                    <input type="text"
                           name="phone"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="address"
                              class="form-control"
                              rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Kota</label>
                    <input type="text"
                           name="city"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text"
                           name="district"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Provinsi</label>
                    <input type="text"
                           name="state"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Kode Pos</label>
                    <input type="text"
                           name="zip"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="form-control">
                </div>
                <div class="form-group">
                
                    <label>Kode Sales</label>
                
                    <input type="text"
                           name="sales_code"
                           class="form-control"
                           placeholder="Contoh : SAKUNTUL">
                
                </div>
                
                <div class="form-group">
                    <label>Paket Langganan</label>
                
                    <select class="form-control" name="package_id">
                
                        <option value="">-- Pilih Paket --</option>
                
                        {foreach $plans as $plan}
                            <option value="{$plan.id}">
                                {$plan.name_plan} - Rp {$plan.price}
                            </option>
                        {/foreach}
                
                    </select>
                </div>

            </div>

            <div id="common_form" style="display:none;">

                <hr>

                <div class="form-group">

                    <label>Subject</label>

                    <input type="text"
                           name="subject"
                           class="form-control">

                </div>

                <div class="form-group">

                    <label>Deskripsi</label>

                    <textarea name="description"
                              class="form-control"
                              rows="5"></textarea>

                </div>

                <button class="btn btn-primary">

                    Simpan Ticket

                </button>

            </div>

        </form>

    </div>

</div>

<script>

document.addEventListener(
    'DOMContentLoaded',
    function() {

        var type =
            document.getElementById(
                'ticket_type'
            );

        type.addEventListener(
            'change',
            function() {

                document.getElementById(
                    'trouble_form'
                ).style.display = 'none';

                document.getElementById(
                    'installation_form'
                ).style.display = 'none';

                document.getElementById(
                    'common_form'
                ).style.display = 'none';

                if(this.value == 'trouble') {

                    document.getElementById(
                        'trouble_form'
                    ).style.display = 'block';

                    document.getElementById(
                        'common_form'
                    ).style.display = 'block';

                }

                if(this.value == 'installation') {

                    document.getElementById(
                        'installation_form'
                    ).style.display = 'block';

                    document.getElementById(
                        'common_form'
                    ).style.display = 'block';

                }

            }
        );

    }
);

</script>

{include file="sections/footer.tpl"}