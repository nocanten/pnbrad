{include file="sections/header.tpl"}

<style>
.ticket-card{
    border-radius:10px;
    color:#fff;
    padding:10px;
    text-align:center;
    margin-bottom:10px;
    box-shadow:0 1px 2px rgba(0,0,0,.15);
}

.ticket-card h1{
    font-size:20px;
    font-weight:700;
    margin:1px 0;
    color:#fff;
}

.ticket-card h4{
    color:#fff;
    margin:0;
    font-weight:600;
}

.ticket-card small{
    color:rgba(255,255,255,.8);
}

.bg-open{
    background:linear-gradient(135deg,#ff6b6b,#ee5253);
}

.bg-assigned{
    background:linear-gradient(135deg,#feca57,#ff9f43);
}

.bg-progress{
    background:linear-gradient(135deg,#54a0ff,#2e86de);
}

.bg-closed{
    background:linear-gradient(135deg,#1dd1a1,#10ac84);
}

.bg-install{
    background:linear-gradient(135deg,#5f27cd,#341f97);
}

.bg-trouble{
    background:linear-gradient(135deg,#ee5253,#b71540);
}

.bg-today{
    background:linear-gradient(135deg,#00d2d3,#01a3a4);
}

.bg-month{
    background:linear-gradient(135deg,#576574,#222f3e);
}
</style>

<div class="row">

    <div class="col-md-3">
        <div class="ticket-card bg-open">
            <h4>📂 Open</h4>
            <h1>{$open}</h1>
            <small>Ticket Baru</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="ticket-card bg-assigned">
            <h4>👨‍🔧 Assigned</h4>
            <h1>{$assigned}</h1>
            <small>Sudah Ditugaskan</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="ticket-card bg-progress">
            <h4>⚙️ Progress</h4>
            <h1>{$progress}</h1>
            <small>Sedang Dikerjakan</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="ticket-card bg-closed">
            <h4>✅ Closed</h4>
            <h1>{$closed}</h1>
            <small>Ticket Selesai</small>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6">
        <div class="ticket-card bg-install">
            <h4>📡 Ticket Pemasangan</h4>
            <h1>{$installation}</h1>
            <small>Total Ticket Pemasangan</small>
        </div>
    </div>

    <div class="col-md-6">
        <div class="ticket-card bg-trouble">
            <h4>🚨 Ticket Gangguan</h4>
            <h1>{$trouble}</h1>
            <small>Total Ticket Gangguan</small>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6">
        <div class="ticket-card bg-today">
            <h4>📅 Ticket Hari Ini</h4>
            <h1>{$today}</h1>
            <small>Dibuat Hari Ini</small>
        </div>
    </div>

    <div class="col-md-6">
        <div class="ticket-card bg-month">
            <h4>📈 Ticket Bulan Ini</h4>
            <h1>{$month}</h1>
            <small>Dibuat Bulan Ini</small>
        </div>
    </div>

</div>

{include file="sections/footer.tpl"}