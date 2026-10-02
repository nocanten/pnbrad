<?php
/* Smarty version 4.5.3, created on 2026-07-02 13:44:45
  from '/data/html/system/plugin/ui/genieacs_devices.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a4608dd8eb5e7_23770942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ecb495533c88ce5b09c03453dbb9eb09fb2c0d2' => 
    array (
      0 => '/data/html/system/plugin/ui/genieacs_devices.tpl',
      1 => 1778796844,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a4608dd8eb5e7_23770942 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Tailwind CSS -->
<?php echo '<script'; ?>
 src="https://cdn.tailwindcss.com"><?php echo '</script'; ?>
>

<!-- Google Fonts: DM Sans + DM Mono -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

<!-- Icons: Phosphor Icons (modern, clean) -->
<?php echo '<script'; ?>
 src="https://unpkg.com/@phosphor-icons/web@2.1.1/src/index.js"><?php echo '</script'; ?>
>
<!-- Network Mapping Custom CSS -->
<link rel="stylesheet" href="system/plugin/ui/css/network_mapping.css" />

<style>

/* ===================== GCS DEVICES — DESIGN SYSTEM ===================== */
* { box-sizing: border-box; }

/* ---- bk-* base ---- */
.bk-card { background: white; border: 1px solid #e2e8f0; border-radius: 14px; overflow: hidden; font-family: 'DM Sans', sans-serif; margin-bottom: 16px; }
.bk-card-header { display: flex; align-items: center; gap: 10px; padding: 14px 18px; border-bottom: 1px solid #f1f5f9; background: #fafcff; }
.bk-card-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.bk-card-title { font-size: 13px; font-weight: 700; color: #0f172a; }
.bk-card-subtitle { font-size: 11px; color: #94a3b8; }
.bk-label { font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 5px; }
.bk-input { width: 100%; height: 36px; padding: 0 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 13px; font-family: 'DM Sans', sans-serif; color: #0f172a; background: #f8fafc; outline: none; transition: border-color 0.15s, box-shadow 0.15s; box-sizing: border-box; }
.bk-input:focus { border-color: #0271c6; background: #fff; box-shadow: 0 0 0 3px rgba(2,113,198,0.10); }
.bk-input::placeholder { color: #cbd5e1; }
select.bk-select:not(#filterNavigateMenu),
#quickServerSwitch { width: 100% !important; height: 36px !important; min-height: 36px !important; max-height: 36px !important; padding: 0 32px 0 12px !important; border: 1px solid #e2e8f0 !important; border-radius: 8px !important; font-size: 13px !important; font-family: 'DM Sans', sans-serif !important; color: #0f172a !important; background: #f8fafc url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 256 256'%3E%3Cpath fill='%2364748b' d='M213.66 101.66l-80 80a8 8 0 0 1-11.32 0l-80-80a8 8 0 0 1 11.32-11.32L128 164.69l74.34-74.35a8 8 0 0 1 11.32 11.32z'/%3E%3C/svg%3E") no-repeat right 10px center / 14px !important; outline: none !important; cursor: pointer !important; appearance: none !important; -webkit-appearance: none !important; box-sizing: border-box !important; transition: border-color 0.15s, box-shadow 0.15s !important; }
select.bk-select:not(#filterNavigateMenu):focus,
#quickServerSwitch:focus { border-color: #0271c6 !important; background-color: #fff !important; box-shadow: 0 0 0 3px rgba(2,113,198,0.10) !important; }
.bk-btn { display: inline-flex; align-items: center; justify-content: center; gap: 6px; height: 36px; padding: 0 16px; border-radius: 8px; font-size: 13px; font-weight: 600; font-family: 'DM Sans', sans-serif; cursor: pointer; border: none; transition: all 0.15s; text-decoration: none; white-space: nowrap; box-sizing: border-box; }
.bk-btn-primary { background: #0271c6; color: white; box-shadow: 0 2px 8px rgba(2,113,198,0.25); }
.bk-btn-primary:hover { background: #0359a0; color: white; text-decoration: none; }
.bk-btn-success { background: #16a34a; color: white; box-shadow: 0 2px 8px rgba(22,163,74,0.25); }
.bk-btn-success:hover { background: #15803d; color: white; text-decoration: none; }
.bk-btn-warning { background: #fef3c7; color: #d97706; border: 1px solid #fde68a; }
.bk-btn-warning:hover { background: #fde68a; color: #d97706; text-decoration: none; }
.bk-btn-danger { background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; }
.bk-btn-danger:hover { background: #fecaca; color: #dc2626; text-decoration: none; }
.bk-btn-ghost { background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; }
.bk-btn-ghost:hover { background: #e2e8f0; color: #0f172a; text-decoration: none; }
.bk-btn-sm { height: 30px; padding: 0 12px; font-size: 12px; border-radius: 6px; }

/* ---- Stat Cards ---- */
.gd-stat-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; padding: 16px 18px; border-bottom: 1px solid #f1f5f9; }
.gd-stat-card { background: white; border: 1px solid #e2e8f0; border-radius: 14px; padding: 16px; display: flex; align-items: center; gap: 12px; transition: box-shadow 0.15s; }
.gd-stat-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
.gd-stat-icon { width: 44px; height: 44px; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 20px; }
.gd-stat-label { font-size: 11px; font-weight: 600; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; }
.gd-stat-value { font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.5px; line-height: 1.1; margin-top: 2px; }
.gd-stat-sub { font-size: 11px; color: #94a3b8; margin-top: 3px; }
.gd-stat-blue   { border-bottom: 3px solid #0271c6; }
.gd-stat-indigo { border-bottom: 3px solid #4f46e5; }
.gd-stat-green  { border-bottom: 3px solid #16a34a; }
.gd-stat-red    { border-bottom: 3px solid #dc2626; }
.gd-stat-yellow { border-bottom: 3px solid #d97706; }

/* Progress mini bar inside stat */
.gd-mini-bar { height: 3px; border-radius: 2px; background: #f1f5f9; margin-top: 6px; overflow: hidden; }
.gd-mini-fill { height: 100%; border-radius: 2px; transition: width 1.5s ease-in-out; }

/* Server stat card — fullwidth left col */
.gd-server-card {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
    grid-column: span 1;
}

/* ---- Filter Bar ---- */
.gd-filter-bar { display: flex; gap: 10px; flex-wrap: wrap; align-items: flex-end; padding: 14px 18px; border-bottom: 1px solid #f1f5f9; background: #fafcff; }
.gd-filter-group { display: flex; flex-direction: column; gap: 4px; flex: 1; min-width: 130px; }
.gd-filter-group.wide { flex: 2; min-width: 200px; }
.gd-filter-group.auto { flex: none; min-width: auto; }

/* ---- Table ---- */
.gd-table-wrap { overflow-x: auto; }
.gd-table { width: 100%; border-collapse: collapse; font-family: 'DM Sans', sans-serif; font-size: 12px; }
.gd-table thead tr { background: #f8fafc; border-bottom: 2px solid #e2e8f0; }
.gd-table thead th { padding: 10px 12px; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #94a3b8; text-align: left; white-space: nowrap; }
.gd-table thead th.center { text-align: center; }
.gd-table tbody tr { border-bottom: 1px solid #f1f5f9; transition: all 0.12s; cursor: pointer; }
.gd-table tbody tr:last-child { border-bottom: none; }
.gd-table tbody tr:hover { background: #f8fafc; box-shadow: inset 3px 0 0 #0271c6; }
.gd-table tbody td { padding: 10px 12px; color: #334155; vertical-align: middle; }
.gd-table tbody td.center { text-align: center; }
.selectable-text { user-select: text; }

/* ---- Status badges ---- */
.gd-status { display: inline-flex; align-items: center; gap: 5px; padding: 3px 8px; border-radius: 20px; font-size: 11px; font-weight: 600; white-space: nowrap; }
.gd-status-online  { background: #dcfce7; color: #15803d; }
.gd-status-offline { background: #fee2e2; color: #dc2626; }
.gd-pulse { width: 6px; height: 6px; border-radius: 50%; display: inline-block; flex-shrink: 0; }
.gd-pulse-green { background: #22c55e; animation: gdPulseGreen 2s infinite; }
.gd-pulse-red   { background: #ef4444; animation: gdPulseRed 2s infinite; }
@keyframes gdPulseGreen { 0%,100%{box-shadow:0 0 0 0 rgba(34,197,94,0.6)} 70%{box-shadow:0 0 0 5px rgba(34,197,94,0)} }
@keyframes gdPulseRed   { 0%,100%{box-shadow:0 0 0 0 rgba(239,68,68,0.6)}  70%{box-shadow:0 0 0 5px rgba(239,68,68,0)} }

/* ---- PON badge ---- */
.gd-pon { display: inline-flex; align-items: center; padding: 2px 7px; border-radius: 20px; font-size: 10px; font-weight: 700; }
.gd-pon-gpon     { background: #dbeafe; color: #1d4ed8; border: 1px solid #bfdbfe; }
.gd-pon-epon     { background: #ede9fe; color: #7c3aed; }
.gd-pon-ethernet { background: #ffedd5; color: #c2410c; }

/* ---- RX Power ---- */
.gd-rx { font-size: 11px; font-weight: 700; font-family: 'DM Mono', monospace; }
.gd-rx-good   { color: #16a34a; }
.gd-rx-fair   { color: #d97706; }
.gd-rx-poor   { color: #dc2626; }
.gd-rx-na     { color: #94a3b8; }

/* Colored value badges */
.gd-badge-rx-good { display:inline-flex;align-items:center;gap:4px;background:#dcfce7;border:1px solid #bbf7d0;color:#15803d;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace;white-space:nowrap; }
.gd-badge-rx-fair { display:inline-flex;align-items:center;gap:4px;background:#fef3c7;border:1px solid #fde68a;color:#d97706;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace;white-space:nowrap; }
.gd-badge-rx-poor { display:inline-flex;align-items:center;gap:4px;background:#fee2e2;border:1px solid #fecaca;color:#dc2626;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace;white-space:nowrap; }
.gd-badge-rx-na   { display:inline-flex;align-items:center;gap:4px;background:#f1f5f9;border:1px solid #e2e8f0;color:#94a3b8;font-size:11px;font-weight:600;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace;white-space:nowrap; }
.gd-badge-ip      { display:inline-flex;align-items:center;gap:4px;background:#f0f9ff;border:1px solid #bae6fd;color:#0284c7;font-size:11px;font-weight:600;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }
.gd-badge-user    { display:inline-flex;align-items:center;gap:4px;background:#eff6ff;border:1px solid #bfdbfe;color:#0271c6;font-size:12px;font-weight:700;border-radius:6px;padding:2px 9px;font-family:'DM Sans',monospace; }
.gd-badge-temp-ok   { display:inline-flex;align-items:center;gap:4px;background:#f0fdf4;border:1px solid #bbf7d0;color:#16a34a;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }
.gd-badge-temp-warm { display:inline-flex;align-items:center;gap:4px;background:#fef3c7;border:1px solid #fde68a;color:#d97706;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }
.gd-badge-temp-hot  { display:inline-flex;align-items:center;gap:4px;background:#fee2e2;border:1px solid #fecaca;color:#dc2626;font-size:11px;font-weight:700;border-radius:6px;padding:2px 8px;font-family:'DM Mono',monospace; }

/* ---- Misc chips ---- */
.gd-tag-chip { display: inline-flex; align-items: center; gap: 4px; background: #eff6ff; border: 1px solid #dbeafe; color: #0271c6; font-size: 11px; font-weight: 600; border-radius: 6px; padding: 2px 8px; }

/* ---- Hero Header (match device detail) ---- */
.dd-hero { display: flex; gap: 18px; padding: 20px 22px; background: linear-gradient(135deg, #fff 0%, #f0f9ff 55%, #eff6ff 100%); border-bottom: 1px solid #f1f5f9; position: relative; overflow: hidden; transition: background 0.4s ease; }
.dd-hero::before { content: ''; position: absolute; top: -40px; right: -40px; width: 180px; height: 180px; border-radius: 50%; background: radial-gradient(circle, rgba(2,113,198,0.08) 0%, transparent 70%); pointer-events: none; }
.dd-hero-avatar { width: 64px; height: 64px; border-radius: 16px; background: linear-gradient(135deg, #0271c6 0%, #0ea5e9 100%); display: flex; align-items: center; justify-content: center; color: #fff; flex-shrink: 0; box-shadow: 0 6px 16px rgba(2,113,198,0.3); position: relative; z-index: 1; }
.dd-hero-avatar-pulse { position: absolute; bottom: -4px; right: -4px; width: 18px; height: 18px; border-radius: 50%; background: #fff; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
.dd-hero-avatar-pulse-dot { width: 10px; height: 10px; border-radius: 50%; }
.dd-hero-avatar-pulse-dot.on { background: #22c55e; animation: ddHeroPulseGreen 2s infinite; }
.dd-hero-avatar-pulse-dot.off { background: #ef4444; animation: ddHeroPulseRed 2s infinite; }
@keyframes ddHeroPulseGreen { 0%,100%{box-shadow:0 0 0 0 rgba(34,197,94,0.6)} 70%{box-shadow:0 0 0 6px rgba(34,197,94,0)} }
@keyframes ddHeroPulseRed   { 0%,100%{box-shadow:0 0 0 0 rgba(239,68,68,0.6)}  70%{box-shadow:0 0 0 6px rgba(239,68,68,0)} }
.dd-hero-body { min-width: 0; flex: 1; z-index: 1; }
.dd-hero-row1 { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; margin-bottom: 4px; }
.dd-hero-user { font-size: 20px; font-weight: 800; color: #0f172a; line-height: 1.15; display: inline-flex; align-items: center; gap: 7px; }
.dd-hero-status { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px; }
.dd-hero-status.on { background: #dcfce7; color: #15803d; }
.dd-hero-status.off { background: #fee2e2; color: #dc2626; }
.dd-hero-row2 { display: flex; align-items: center; gap: 8px; margin-bottom: 8px; flex-wrap: wrap; }
.dd-hero-model { font-size: 13px; font-weight: 600; color: #475569; }
.dd-hero-model-vendor { color: #0271c6; font-weight: 700; }
.dd-hero-actions-desktop { display: flex; align-items: flex-start; gap: 6px; flex-shrink: 0; z-index: 1; }

/* Action bar + pill buttons */
.dd-action-bar { display: flex; align-items: center; justify-content: flex-end; padding: 8px 18px; gap: 6px; background: #fafcff; border-bottom: 1px solid #f1f5f9; }
.dd-action-bar-divider { width: 1px; height: 18px; background: #e2e8f0; margin: 0 2px; flex-shrink: 0; }
@media (min-width: 768px) { .dd-action-bar { display: none; } }
.dd-pill-btn { display: inline-flex !important; align-items: center !important; gap: 6px !important; height: 30px !important; min-height: unset !important; max-height: 30px !important; padding: 0 12px !important; border-radius: 20px !important; border: 1px solid #e2e8f0 !important; background: #f8fafc !important; font-size: 12px !important; font-weight: 600 !important; font-family: 'DM Sans', sans-serif !important; cursor: pointer !important; transition: all 0.12s !important; text-decoration: none !important; white-space: nowrap !important; flex-shrink: 0 !important; line-height: 1 !important; box-shadow: none !important; vertical-align: middle !important; }
.dd-pill-btn svg, .dd-pill-btn i { flex-shrink: 0; }
.dd-pill-btn.refresh { color: #0271c6 !important; border-color: #bfdbfe !important; background: #eff6ff !important; }
.dd-pill-btn.refresh:hover { background: #dbeafe !important; border-color: #93c5fd !important; text-decoration: none !important; }
.dd-pill-btn.reboot { color: #dc2626 !important; border-color: #fecaca !important; background: #fef2f2 !important; }
.dd-pill-btn.reboot:hover { background: #fee2e2 !important; border-color: #fca5a5 !important; text-decoration: none !important; }
.dd-pill-btn.back { color: #64748b !important; border: 1px solid #e2e8f0 !important; background: #f8fafc !important; }
.dd-pill-btn.back:hover { background: #e2e8f0 !important; color: #0f172a !important; text-decoration: none !important; }
.dd-pill-circle { width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.gd-loc-chip { display: inline-flex; align-items: center; gap: 4px; background: #f0fdf4; border: 1px solid #dcfce7; color: #16a34a; font-size: 11px; font-weight: 600; border-radius: 6px; padding: 2px 8px; }
.gd-mono { font-family: 'DM Mono', monospace; font-size: 11px; color: #475569; }
.gd-muted { color: #94a3b8; font-size: 11px; }

/* ---- Action buttons in table — transparent, colored icon ---- */
.gd-action-group { display: flex; gap: 4px; justify-content: flex-end; }
.gd-action-btn { width: 30px; height: 30px; border-radius: 7px; border: none; background: transparent; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; font-size: 15px; transition: all 0.12s; text-decoration: none; }
.gd-action-btn.view   { color: #0271c6; }
.gd-action-btn.view:hover   { background: #eff6ff; color: #0271c6; }
.gd-action-btn.summon { color: #16a34a; }
.gd-action-btn.summon:hover { background: #f0fdf4; color: #16a34a; }
.gd-action-btn.reboot { color: #dc2626; }
.gd-action-btn.reboot:hover { background: #fee2e2; color: #dc2626; }

/* ---- Mobile device cards ---- */
.gd-mobile-list { display: none; padding: 12px; }
.gd-mobile-card { background: white; border: 1px solid #e2e8f0; border-radius: 12px; margin-bottom: 10px; overflow: hidden; }
.gd-mobile-card.online-card  { border-left: 3px solid #22c55e; }
.gd-mobile-card.offline-card { border-left: 3px solid #ef4444; }
.gd-mobile-card-head { display: flex; align-items: center; justify-content: space-between; padding: 12px 14px 8px; }
.gd-mobile-card-body { padding: 0 14px 10px; }
.gd-mobile-row { display: flex; align-items: center; justify-content: space-between; padding: 5px 0; border-bottom: 1px solid #f8fafc; font-size: 12px; }
.gd-mobile-row:last-child { border-bottom: none; }
.gd-mobile-key { font-size: 10px; font-weight: 700; color: #334155; text-transform: uppercase; letter-spacing: 0.04em; }
.gd-mobile-val { font-size: 12px; color: #334155; font-weight: 500; text-align: right; max-width: 65%; word-break: break-word; }
.gd-mobile-actions { display: flex; border-top: 1px solid #f1f5f9; }
.gd-mobile-action-btn { flex: 1; display: flex; align-items: center; justify-content: center; gap: 5px; padding: 10px 4px; font-size: 12px; font-weight: 600; font-family: 'DM Sans', sans-serif; background: transparent; border: none; cursor: pointer; transition: background 0.12s; text-decoration: none; border-right: 1px solid #f1f5f9; }
.gd-mobile-action-btn.view   { color: #0271c6; background: #f0f7ff; border-top: 1px solid #e2e8f0; }
.gd-mobile-action-btn.summon { color: #16a34a; background: #f0fdf4; border-top: 1px solid #e2e8f0; }
.gd-mobile-action-btn.reboot { color: #dc2626; background: #fff5f5; border-top: 1px solid #e2e8f0; }
.gd-mobile-action-btn:last-child { border-right: none; }
.gd-mobile-action-btn i { font-size: 14px; }
.gd-mobile-action-btn.view   { color: #0271c6; }
.gd-mobile-action-btn.view:hover   { background: #eff6ff; text-decoration: none; }
.gd-mobile-action-btn.summon { color: #16a34a; }
.gd-mobile-action-btn.summon:hover { background: #f0fdf4; }
.gd-mobile-action-btn.reboot { color: #dc2626; }
.gd-mobile-action-btn.reboot:hover { background: #fee2e2; }

/* ---- Pagination ---- */
.gd-pagination { display: flex; align-items: center; justify-content: space-between; padding: 12px 18px; border-top: 1px solid #f1f5f9; background: #fafcff; flex-wrap: wrap; gap: 10px; }
.gd-pag-info { font-size: 12px; color: #64748b; }
.gd-pag-right { display: flex; align-items: center; gap: 8px; }
.gd-pag-btns { display: flex; gap: 4px; }
.gd-pag-btn { height: 30px; min-width: 30px; padding: 0 8px; display: inline-flex; align-items: center; justify-content: center; border-radius: 7px; font-size: 12px; font-weight: 500; font-family: 'DM Sans', sans-serif; border: 1px solid #e2e8f0; background: white; color: #475569; cursor: pointer; transition: all 0.1s; text-decoration: none; }
.gd-pag-btn:hover { background: #f1f5f9; color: #0f172a; text-decoration: none; }
.gd-pag-btn.active { background: #0271c6; color: white; border-color: #0271c6; }
.gd-pag-btn.disabled { opacity: 0.4; pointer-events: none; }

/* ---- Empty / Error states ---- */
.gd-empty { padding: 56px 24px; text-align: center; font-family: 'DM Sans', sans-serif; }
.gd-empty > i { font-size: 48px; color: #e2e8f0; display: block; margin-bottom: 14px; }
.gd-empty h4 { font-size: 15px; font-weight: 700; color: #0f172a; margin: 0 0 6px; }
.gd-empty p { font-size: 13px; color: #94a3b8; margin: 0 0 18px; }
.gd-empty-actions { display: flex; gap: 8px; justify-content: center; flex-wrap: wrap; }
.gd-empty-actions .bk-btn i { font-size: 13px; color: inherit; display: inline; margin-bottom: 0; }

.gd-error-box { padding: 32px 24px; text-align: center; font-family: 'DM Sans', sans-serif; }
.gd-error-icon { width: 64px; height: 64px; border-radius: 16px; background: #fee2e2; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; font-size: 28px; color: #dc2626; position: relative; }
.gd-error-badge { position: absolute; bottom: -4px; right: -4px; width: 20px; height: 20px; border-radius: 50%; background: #dc2626; display: flex; align-items: center; justify-content: center; font-size: 10px; color: white; border: 2px solid white; }
.gd-error-detail { display: flex; align-items: center; gap: 8px; font-size: 12px; color: #94a3b8; justify-content: center; margin-top: 6px; }

/* ---- Sync warning banner ---- */
.gd-sync-warn { display: inline-flex; align-items: center; gap: 8px; background: #fff7ed; border: 1px solid #fed7aa; border-radius: 8px; padding: 8px 14px; font-size: 12px; color: #c2410c; font-family: 'DM Sans', sans-serif; }

/* Swal override */
.swal2-container { z-index: 999999 !important; }

/* ---- Modal footer: buttons full-width split equally on desktop ---- */
@media (min-width: 768px) {
    #gdModalFooter {
        justify-content: stretch !important;
        gap: 8px !important;
    }
    #gdModalFooter > .bk-btn {
        flex: 1 1 0;
        justify-content: center;
        min-width: 0;
    }
}

/* ===================== TABLET ===================== */
@media (max-width: 991px) {
    .gd-stat-grid { grid-template-columns: repeat(2, 1fr); }
    .gd-server-card { grid-column: 1 / -1; flex-direction: row !important; align-items: center !important; }
}

/* ===================== MOBILE ===================== */
@media (max-width: 767px) {

    /* --- Hero header mobile --- */
    .dd-hero { padding: 14px 16px; gap: 12px; }
    .dd-hero-avatar { width: 44px; height: 44px; border-radius: 12px; }
    .dd-hero-avatar i { font-size: 20px !important; }
    .dd-hero-avatar-pulse { width: 14px; height: 14px; bottom: -3px; right: -3px; }
    .dd-hero-avatar-pulse-dot { width: 8px; height: 8px; }
    .dd-hero-user { font-size: 16px; }
    .dd-hero-actions-desktop { display: none; }
    .dd-action-bar { display: flex; }
    .dd-pill-btn .btn-text { display: none; }

    /* --- Stat grid: server card fullwidth, 3 kartu di bawah dalam grid 3-col --- */
    .gd-stat-grid {
        grid-template-columns: 1fr 1fr 1fr;
        gap: 8px;
        padding: 12px;
    }
    .gd-server-card {
        grid-column: 1 / -1;
        flex-direction: row !important;
        align-items: center !important;
        gap: 12px;
        padding: 12px 14px;
    }
    .gd-server-card > div { width: 100%; }
    .gd-stat-icon { width: 34px; height: 34px; font-size: 15px; border-radius: 8px; }
    /* 3 stat cards bawah: compact tanpa icon, teks saja */
    .gd-stat-card:not(.gd-server-card) { flex-direction: column; align-items: flex-start; gap: 4px; padding: 10px 12px; border-radius: 12px; }
    .gd-stat-card:not(.gd-server-card) .gd-stat-icon { display: none; }
    .gd-stat-value { font-size: 22px; }
    .gd-stat-label { font-size: 10px; }
    .gd-stat-sub { font-size: 10px; }

    /* --- Filter bar: 2 kolom grid (search fullwidth, filter 2 col) --- */
    .gd-filter-bar { padding: 12px; gap: 8px; flex-direction: column; }
    .gd-filter-group { flex: none; min-width: 100%; }
    .gd-filter-group.wide { min-width: 100%; }

    /* Status + RX Power â†’ 2 kolom sejajar */
    .gd-filter-row-2col {
        display: grid !important;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
        width: 100%;
    }
    .gd-filter-row-2col .gd-filter-group { min-width: 0 !important; flex: 1; }

    /* Clear button fullwidth */
    .gd-filter-group.auto { min-width: 100%; }
    .gd-filter-group.auto .bk-btn { width: 100%; justify-content: center; }

    /* Label filter lebih compact */
    .bk-label { font-size: 10px; margin-bottom: 3px; }

    /* Show mobile cards, hide desktop table */
    .gd-mobile-list { display: block; }
    .gd-table-wrap { display: none; }

    /* Pagination compact */
    .gd-pagination { flex-direction: column; align-items: flex-start; padding: 10px 12px; gap: 8px; }
    .gd-pag-right { width: 100%; justify-content: space-between; }
    .gd-pag-info { font-size: 11px; }
}

</style>

<!-- ===================== PAGE WRAPPER ===================== -->
<div class="bk-card" style="margin-bottom:16px;">

    <!-- ===================== HERO HEADER ===================== -->
    <div class="dd-hero">
                <div class="dd-hero-avatar">
            <i class="ph ph-devices" style="font-size:28px;color:#fff;"></i>
            <span class="dd-hero-avatar-pulse">
                <span class="dd-hero-avatar-pulse-dot <?php if ($_smarty_tpl->tpl_vars['current_server']->value->is_connected) {?>on<?php } else { ?>off<?php }?>"></span>
            </span>
        </div>

                <div class="dd-hero-body">
            <div class="dd-hero-row1">
                <span class="dd-hero-user">
                    <i class="ph ph-hard-drives" style="font-size:16px;color:#0271c6;"></i>
                    ACS Devices
                </span>
                <?php if ($_smarty_tpl->tpl_vars['current_server']->value->is_connected) {?>
                    <span class="dd-hero-status on"><span class="gd-pulse gd-pulse-green"></span> Connected</span>
                <?php } else { ?>
                    <span class="dd-hero-status off"><span class="gd-pulse gd-pulse-red"></span> Disconnected</span>
                <?php }?>
            </div>
            <div class="dd-hero-row2">
                <span class="dd-hero-model"><span class="dd-hero-model-vendor"><?php echo $_smarty_tpl->tpl_vars['current_server']->value->name;?>
</span> · <span class="count-up" data-target="<?php echo $_smarty_tpl->tpl_vars['device_count']->value;?>
">0</span> devices</span>
            </div>
        </div>

                <div class="dd-hero-actions-desktop">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_manager" class="dd-pill-btn back" title="Manage Servers">
                <i class="ph ph-hard-drives" style="font-size:13px;"></i>
                <span class="btn-text">Servers</span>
            </a>
            <button class="dd-pill-btn refresh" onclick="forceSync()" title="Force Sync">
                <i class="ph ph-arrow-clockwise" style="font-size:13px;"></i>
                <span class="btn-text">Force Sync</span>
            </button>
        </div>
    </div>

        <div class="dd-action-bar">
        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_manager" class="dd-pill-btn back" title="Manage Servers">
            <span class="dd-pill-circle" style="background:#f1f5f9;">
                <i class="ph ph-hard-drives" style="font-size:13px;color:#64748b;"></i>
            </span>
            Servers
        </a>
        <div class="dd-action-bar-divider"></div>
        <button class="dd-pill-btn refresh" onclick="forceSync()" title="Force Sync">
            <span class="dd-pill-circle" style="background:#eff6ff;">
                <i class="ph ph-arrow-clockwise" style="font-size:13px;color:#0271c6;"></i>
            </span>
            Sync
        </button>
    </div>

    <!-- ===================== STAT CARDS ===================== -->
    <div class="gd-stat-grid">

        <!-- Active Server + Device Count -->
        <div class="gd-stat-card gd-stat-blue gd-server-card">
            <div style="width:100%;">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;">
                    <div class="gd-stat-icon" style="background:linear-gradient(135deg,#dbeafe,#bfdbfe);flex-shrink:0;">
                        <i class="ph ph-hard-drives" style="color:#0271c6;"></i>
                    </div>
                    <div style="flex:1;min-width:0;">
                        <div style="display:flex;align-items:center;justify-content:space-between;gap:8px;">
                            <div class="gd-stat-label">Active Server</div>
                            <span style="display:inline-flex;align-items:center;gap:4px;background:#eff6ff;border:1px solid #bfdbfe;color:#0271c6;font-size:11px;font-weight:700;border-radius:20px;padding:2px 8px;font-family:'DM Sans',sans-serif;flex-shrink:0;">
                                <i class="ph ph-device-mobile" style="font-size:10px;"></i>
                                <span class="count-up" data-target="<?php echo $_smarty_tpl->tpl_vars['device_count']->value;?>
">0</span> devices
                            </span>
                        </div>
                        <div style="font-size:14px;font-weight:700;color:#0f172a;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo $_smarty_tpl->tpl_vars['current_server']->value->name;?>
</div>
                        <div style="margin-top:3px;">
                            <?php if ($_smarty_tpl->tpl_vars['current_server']->value->is_connected) {?>
                                <span class="gd-status gd-status-online"><span class="gd-pulse gd-pulse-green"></span> Connected</span>
                            <?php } else { ?>
                                <span class="gd-status gd-status-offline"><span class="gd-pulse gd-pulse-red"></span> Disconnected</span>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <select id="quickServerSwitch" class="bk-select" onchange="changeServer()">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['servers']->value, 'server');
$_smarty_tpl->tpl_vars['server']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['server']->value) {
$_smarty_tpl->tpl_vars['server']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['server']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['server']->value->id == $_smarty_tpl->tpl_vars['selected_server_id']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['server']->value->name;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>
        </div>

        <!-- Online -->
        <div class="gd-stat-card gd-stat-green">
            <div class="gd-stat-icon" style="background:linear-gradient(135deg,#dcfce7,#bbf7d0);">
                <i class="ph ph-check-circle" style="color:#16a34a;"></i>
            </div>
            <div style="flex:1;min-width:0;">
                <div class="gd-stat-label">Online</div>
                <div class="gd-stat-value count-up" data-target="<?php echo (($tmp = $_smarty_tpl->tpl_vars['online_count']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
">0</div>
                <div class="gd-mini-bar"><div class="gd-mini-fill" style="width:<?php echo (($tmp = $_smarty_tpl->tpl_vars['online_percentage']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
%;background:#16a34a;"></div></div>
                <div class="gd-stat-sub"><?php echo (($tmp = $_smarty_tpl->tpl_vars['online_percentage']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
% active</div>
            </div>
        </div>

        <!-- Offline -->
        <div class="gd-stat-card gd-stat-red">
            <div class="gd-stat-icon" style="background:linear-gradient(135deg,#fee2e2,#fecaca);">
                <i class="ph ph-x-circle" style="color:#dc2626;"></i>
            </div>
            <div style="flex:1;min-width:0;">
                <div class="gd-stat-label">Offline</div>
                <div class="gd-stat-value count-up" data-target="<?php echo (($tmp = $_smarty_tpl->tpl_vars['offline_count']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
">0</div>
                <div class="gd-mini-bar"><div class="gd-mini-fill" style="width:<?php echo (($tmp = $_smarty_tpl->tpl_vars['offline_percentage']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
%;background:#dc2626;"></div></div>
                <div class="gd-stat-sub"><?php echo (($tmp = $_smarty_tpl->tpl_vars['offline_percentage']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
% inactive</div>
            </div>
        </div>

        <!-- Warning -->
        <div class="gd-stat-card gd-stat-yellow">
            <div class="gd-stat-icon" style="background:linear-gradient(135deg,#fef3c7,#fde68a);">
                <i class="ph ph-warning" style="color:#d97706;"></i>
            </div>
            <div style="flex:1;min-width:0;">
                <div class="gd-stat-label">Warning</div>
                <div class="gd-stat-value count-up" data-target="<?php echo (($tmp = $_smarty_tpl->tpl_vars['warning_count']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
">0</div>
                <div class="gd-mini-bar"><div class="gd-mini-fill" style="width:<?php echo (($tmp = $_smarty_tpl->tpl_vars['warning_percentage']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
%;background:#d97706;"></div></div>
                <div class="gd-stat-sub">RX &lt; -25dBm</div>
            </div>
        </div>

    </div>

    <!-- ===================== FILTER BAR ===================== -->
    <form method="GET" action="index.php" style="display:contents;">
        <input type="hidden" name="_route" value="plugin/genieacs_devices">
        <div class="gd-filter-bar">

            <div class="gd-filter-group wide">
                <label class="bk-label"><i class="ph ph-magnifying-glass" style="font-size:10px;"></i> Search</label>
                <div style="position:relative;">
                    <i class="ph ph-magnifying-glass" style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:14px;"></i>
                    <input type="text" id="ajaxSearchInput" name="search" class="bk-input" placeholder="Search by username, IP, serial..." value="<?php echo (($tmp = $_GET['search'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" style="padding-left:32px;">
                </div>
                <small id="searchStatus" style="display:none;"></small>
            </div>

            <div class="gd-filter-row-2col" style="display:contents;">

            <div class="gd-filter-group">
                <label class="bk-label"><i class="ph ph-dot-outline" style="font-size:10px;"></i> Status</label>
                <select name="status" id="statusFilter" class="bk-select" onchange="this.form.submit()">
                    <option value="">All Status</option>
                    <option value="online"  <?php if ($_GET['status'] == 'online') {?>selected<?php }?>>Online</option>
                    <option value="offline" <?php if ($_GET['status'] == 'offline') {?>selected<?php }?>>Offline</option>
                </select>
            </div>

            <div class="gd-filter-group">
                <label class="bk-label"><i class="ph ph-wave-sine" style="font-size:10px;"></i> RX Power</label>
                <select name="rx_power" id="rxPowerFilter" class="bk-select" onchange="this.form.submit()">
                    <option value="">All RX Power</option>
                    <option value="good" <?php if ($_GET['rx_power'] == 'good') {?>selected<?php }?> style="color:#16a34a;">● Good (≥ -20 dBm)</option>
                    <option value="fair" <?php if ($_GET['rx_power'] == 'fair') {?>selected<?php }?> style="color:#d97706;">● Fair (-21 to -25 dBm)</option>
                    <option value="poor" <?php if ($_GET['rx_power'] == 'poor') {?>selected<?php }?> style="color:#dc2626;">● Poor (&lt; -25 dBm)</option>
                </select>
            </div>

            </div>

            <?php if ($_smarty_tpl->tpl_vars['available_locations']->value && count($_smarty_tpl->tpl_vars['available_locations']->value) > 0) {?>
            <div class="gd-filter-group">
                <label class="bk-label"><i class="ph ph-map-pin" style="font-size:10px;"></i> Location</label>
                <select name="location" id="locationFilter" class="bk-select" onchange="this.form.submit()">
                    <option value="">All Locations</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['available_locations']->value, 'location');
$_smarty_tpl->tpl_vars['location']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['location']->value) {
$_smarty_tpl->tpl_vars['location']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['location']->value;?>
" <?php if ($_GET['location'] == $_smarty_tpl->tpl_vars['location']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['location']->value;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>
            <?php }?>

            <div class="gd-filter-group auto">
                <label class="bk-label" style="visibility:hidden;">.</label>
                <a href="javascript:void(0)" onclick="clearAllFilters()" id="clearFiltersBtn"
                    class="bk-btn bk-btn-danger bk-btn-sm"
                    style="<?php if (!$_GET['search'] && !$_GET['status'] && !$_GET['rx_power'] && !$_GET['location']) {?>display:none;<?php }?>">
                    <i class="ph ph-x" style="font-size:12px;"></i> Clear
                </a>
            </div>

        </div>
    </form>

    <!-- ===================== MOBILE DEVICE CARDS ===================== -->
    <div class="gd-mobile-list" id="mobileDeviceList">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['devices']->value, 'device');
$_smarty_tpl->tpl_vars['device']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['device']->value) {
$_smarty_tpl->tpl_vars['device']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['device']->value['rx_power'] == 'N/A') {?>
            <?php $_smarty_tpl->_assignInScope('rx_level', "na");?>
        <?php } elseif (strpos($_smarty_tpl->tpl_vars['device']->value['rx_power'],'-') !== false) {?>
            <?php $_smarty_tpl->_assignInScope('rx_value', floatval($_smarty_tpl->tpl_vars['device']->value['rx_power']));?>
            <?php if ($_smarty_tpl->tpl_vars['rx_value']->value >= -20) {
$_smarty_tpl->_assignInScope('rx_level', "good");?>
            <?php } elseif ($_smarty_tpl->tpl_vars['rx_value']->value >= -25) {
$_smarty_tpl->_assignInScope('rx_level', "fair");?>
            <?php } else {
$_smarty_tpl->_assignInScope('rx_level', "poor");
}?>
        <?php } else { ?>
            <?php $_smarty_tpl->_assignInScope('rx_level', "na");?>
        <?php }?>

        <div class="gd-mobile-card <?php if ($_smarty_tpl->tpl_vars['device']->value['status'] == 'online') {?>online-card<?php } else { ?>offline-card<?php }?>"
            data-username="<?php echo $_smarty_tpl->tpl_vars['device']->value['pppoe_username'];?>
" data-ip="<?php echo $_smarty_tpl->tpl_vars['device']->value['ip'];?>
"
            data-tags="<?php echo $_smarty_tpl->tpl_vars['device']->value['tags'];?>
" data-lokasi="<?php echo $_smarty_tpl->tpl_vars['device']->value['lokasi'];?>
"
            data-status="<?php echo $_smarty_tpl->tpl_vars['device']->value['status'];?>
" data-rx-level="<?php echo $_smarty_tpl->tpl_vars['rx_level']->value;?>
" data-rx-value="<?php echo $_smarty_tpl->tpl_vars['device']->value['rx_power'];?>
">

            <div class="gd-mobile-card-head">
                <div style="display:flex;align-items:center;gap:8px;">
                    <input type="checkbox" class="device-checkbox" data-device-id="<?php echo $_smarty_tpl->tpl_vars['device']->value['id_raw'];?>
"
                        data-device-status="<?php echo $_smarty_tpl->tpl_vars['device']->value['status'];?>
">
                    <?php if ($_smarty_tpl->tpl_vars['device']->value['status'] == 'online') {?>
                        <span class="gd-status gd-status-online"><span class="gd-pulse gd-pulse-green"></span> Online</span>
                    <?php } else { ?>
                        <span class="gd-status gd-status-offline"><span class="gd-pulse gd-pulse-red"></span> Offline</span>
                    <?php }?>
                </div>
                <div style="display:flex;align-items:center;gap:5px;">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['display_params']->value, 'param');
$_smarty_tpl->tpl_vars['param']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['param']->value) {
$_smarty_tpl->tpl_vars['param']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['param']->value->param_key == 'pon_type') {?>
                            <?php $_smarty_tpl->_assignInScope('pon_val', (($tmp = $_smarty_tpl->tpl_vars['device']->value['pon_type'] ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp));?>
                            <?php if ($_smarty_tpl->tpl_vars['pon_val']->value == 'GPON') {?><span class="gd-pon gd-pon-gpon"><?php echo $_smarty_tpl->tpl_vars['pon_val']->value;?>
</span>
                            <?php } elseif ($_smarty_tpl->tpl_vars['pon_val']->value == 'EPON') {?><span class="gd-pon gd-pon-epon"><?php echo $_smarty_tpl->tpl_vars['pon_val']->value;?>
</span>
                            <?php } elseif ($_smarty_tpl->tpl_vars['pon_val']->value == 'Ethernet' || $_smarty_tpl->tpl_vars['pon_val']->value == 'ETHERNET' || $_smarty_tpl->tpl_vars['pon_val']->value == 'ethernet') {?><span class="gd-pon gd-pon-ethernet"><?php echo $_smarty_tpl->tpl_vars['pon_val']->value;?>
</span>
                            <?php } else { ?><span class="gd-muted"><?php echo $_smarty_tpl->tpl_vars['pon_val']->value;?>
</span><?php }?>
                            <?php break 1;?>
                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>

            <div class="gd-mobile-card-body">
                <?php $_smarty_tpl->_assignInScope('primary_params', array());?>
                <?php $_smarty_tpl->_assignInScope('shown_params', array());?>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['display_params']->value, 'param');
$_smarty_tpl->tpl_vars['param']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['param']->value) {
$_smarty_tpl->tpl_vars['param']->do_else = false;
?>
                    <?php $_smarty_tpl->_assignInScope('param_key', $_smarty_tpl->tpl_vars['param']->value->param_key);?>
                    <?php $_smarty_tpl->_assignInScope('param_value', (($tmp = $_smarty_tpl->tpl_vars['device']->value[$_smarty_tpl->tpl_vars['param_key']->value] ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp));?>

                    <?php if (in_array($_smarty_tpl->tpl_vars['param_key']->value,array('ppp_username','pppoe_username','device_id','serial_number'))) {?>
                        <?php if ($_smarty_tpl->tpl_vars['param_key']->value == 'ppp_username' || $_smarty_tpl->tpl_vars['param_key']->value == 'pppoe_username') {?>
                        <div class="gd-mobile-row">
                            <span class="gd-mobile-key"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
</span>
                            <span class="gd-mobile-val"><span class="gd-badge-user"><i class="ph ph-user" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
</span></span>
                        </div>
                        <?php $_smarty_tpl->_assignInScope('shown_params', array_merge($_smarty_tpl->tpl_vars['shown_params']->value,array($_smarty_tpl->tpl_vars['param_key']->value,'serial_number')));?>
                        <?php }?>
                    <?php } elseif (in_array($_smarty_tpl->tpl_vars['param_key']->value,array('vendor','manufacturer'))) {?>
                        <?php if (!in_array('vendor_model_shown',$_smarty_tpl->tpl_vars['shown_params']->value)) {?>
                        <div class="gd-mobile-row">
                            <span class="gd-mobile-key">Vendor / Model</span>
                            <span class="gd-mobile-val"><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['display_params']->value, 'mp');
$_smarty_tpl->tpl_vars['mp']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mp']->value) {
$_smarty_tpl->tpl_vars['mp']->do_else = false;
if ($_smarty_tpl->tpl_vars['mp']->value->param_key == 'model') {?> / <?php echo (($tmp = $_smarty_tpl->tpl_vars['device']->value['model'] ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);
break 1;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </span>
                        </div>
                        <?php $_smarty_tpl->_assignInScope('shown_params', array_merge($_smarty_tpl->tpl_vars['shown_params']->value,array('vendor_model_shown','model')));?>
                        <?php }?>
                    <?php } elseif (in_array($_smarty_tpl->tpl_vars['param_key']->value,array('pppoe_ip','tr069_ip','ip'))) {?>
                        <?php if (!in_array('network_shown',$_smarty_tpl->tpl_vars['shown_params']->value)) {?>
                                                <div class="gd-mobile-row">
                            <span class="gd-mobile-key">IP Address</span>
                            <span class="gd-mobile-val">
                                <?php if ($_smarty_tpl->tpl_vars['param_value']->value != 'N/A' && $_smarty_tpl->tpl_vars['param_value']->value != '') {?>
                                    <span class="gd-badge-ip"><i class="ph ph-wifi-high" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
</span>
                                <?php } else { ?><span class="gd-muted">N/A</span><?php }?>
                            </span>
                        </div>
                                                <div class="gd-mobile-row">
                            <span class="gd-mobile-key">RX Power</span>
                            <span class="gd-mobile-val">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['display_params']->value, 'rp');
$_smarty_tpl->tpl_vars['rp']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rp']->value) {
$_smarty_tpl->tpl_vars['rp']->do_else = false;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['rp']->value->param_key == 'rx_power') {?>
                                        <?php $_smarty_tpl->_assignInScope('rpv', (($tmp = $_smarty_tpl->tpl_vars['device']->value['rx_power'] ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp));?>
                                        <?php if ($_smarty_tpl->tpl_vars['rpv']->value != 'N/A' && $_smarty_tpl->tpl_vars['rpv']->value != '') {?>
                                            <?php $_smarty_tpl->_assignInScope('rpn', floatval($_smarty_tpl->tpl_vars['rpv']->value));?>
                                            <?php if ($_smarty_tpl->tpl_vars['rpn']->value >= -20) {?><span class="gd-badge-rx-good"><i class="ph ph-chart-bar" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['rpv']->value;?>
 dBm</span>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['rpn']->value >= -25) {?><span class="gd-badge-rx-fair"><i class="ph ph-chart-bar" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['rpv']->value;?>
 dBm</span>
                                            <?php } else { ?><span class="gd-badge-rx-poor"><i class="ph ph-chart-bar" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['rpv']->value;?>
 dBm</span><?php }?>
                                        <?php } else { ?><span class="gd-badge-rx-na">N/A</span><?php }?>
                                        <?php break 1;?>
                                    <?php }?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </span>
                        </div>
                        <?php $_smarty_tpl->_assignInScope('shown_params', array_merge($_smarty_tpl->tpl_vars['shown_params']->value,array('network_shown','rx_power')));?>
                        <?php }?>
                    <?php } elseif (in_array($_smarty_tpl->tpl_vars['param_key']->value,array('uptime','ppp_uptime'))) {?>
                        <?php if (!in_array('uptime_shown',$_smarty_tpl->tpl_vars['shown_params']->value)) {?>
                        <div class="gd-mobile-row">
                            <span class="gd-mobile-key">Uptime</span>
                            <span class="gd-mobile-val"><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
</span>
                        </div>
                        <?php $_smarty_tpl->_assignInScope('shown_params', array_merge($_smarty_tpl->tpl_vars['shown_params']->value,array('uptime_shown')));?>
                        <?php }?>
                    <?php } elseif (!in_array($_smarty_tpl->tpl_vars['param_key']->value,$_smarty_tpl->tpl_vars['shown_params']->value) && !in_array($_smarty_tpl->tpl_vars['param_key']->value,array('model','pon_type','serial_number'))) {?>
                        <div class="gd-mobile-row">
                            <span class="gd-mobile-key"><?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>
</span>
                            <span class="gd-mobile-val">
                                <?php if ($_smarty_tpl->tpl_vars['param_key']->value == 'rx_power') {?>
                                    <?php if ($_smarty_tpl->tpl_vars['param_value']->value != 'N/A' && $_smarty_tpl->tpl_vars['param_value']->value != '') {?>
                                        <?php $_smarty_tpl->_assignInScope('rpn2', floatval($_smarty_tpl->tpl_vars['param_value']->value));?>
                                        <?php if ($_smarty_tpl->tpl_vars['rpn2']->value >= -20) {?><span class="gd-badge-rx-good"><i class="ph ph-chart-bar" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
 dBm</span>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['rpn2']->value >= -25) {?><span class="gd-badge-rx-fair"><i class="ph ph-chart-bar" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
 dBm</span>
                                        <?php } else { ?><span class="gd-badge-rx-poor"><i class="ph ph-chart-bar" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
 dBm</span><?php }?>
                                    <?php } else { ?><span class="gd-badge-rx-na">N/A</span><?php }?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param_key']->value == 'temperature') {?>
                                    <?php if ($_smarty_tpl->tpl_vars['param_value']->value != 'N/A' && $_smarty_tpl->tpl_vars['param_value']->value != '') {?>
                                        <?php $_smarty_tpl->_assignInScope('temp_val', floatval($_smarty_tpl->tpl_vars['param_value']->value));?>
                                        <?php if ($_smarty_tpl->tpl_vars['temp_val']->value < 60) {?><span class="gd-badge-temp-ok"><i class="ph ph-thermometer" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
°C</span>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['temp_val']->value < 75) {?><span class="gd-badge-temp-warm"><i class="ph ph-thermometer-hot" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
°C</span>
                                        <?php } else { ?><span class="gd-badge-temp-hot"><i class="ph ph-thermometer-hot" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
°C</span><?php }?>
                                    <?php } else { ?><span class="gd-muted">N/A</span><?php }?>
                                <?php } else { ?>
                                    <?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>

                                <?php }?>
                            </span>
                        </div>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <?php if ($_smarty_tpl->tpl_vars['device']->value['tags'] || $_smarty_tpl->tpl_vars['device']->value['lokasi']) {?>
                <div class="gd-mobile-row">
                    <span class="gd-mobile-key">Tag / Lokasi</span>
                    <span class="gd-mobile-val" style="display:flex;gap:4px;flex-wrap:wrap;justify-content:flex-end;">
                        <?php if ($_smarty_tpl->tpl_vars['device']->value['tags']) {?><span class="gd-tag-chip"><i class="ph ph-user" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['device']->value['tags'];?>
</span><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['device']->value['lokasi']) {?><span class="gd-loc-chip"><i class="ph ph-map-pin" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['device']->value['lokasi'];?>
</span><?php }?>
                    </span>
                </div>
                <?php }?>
            </div>

            <div class="gd-mobile-actions">
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_device_detail/<?php echo $_smarty_tpl->tpl_vars['device']->value['id_raw'];?>
" class="gd-mobile-action-btn view">
                    <i class="ph ph-eye"></i> Details
                </a>
                <button class="gd-mobile-action-btn summon" onclick="summonDevice('<?php echo (($tmp = $_smarty_tpl->tpl_vars['device']->value['device_id'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['device']->value['id_raw'] ?? null : $tmp);?>
')">
                    <i class="ph ph-bell"></i> Summon
                </button>
                <button class="gd-mobile-action-btn reboot" onclick="rebootDevice('<?php echo (($tmp = $_smarty_tpl->tpl_vars['device']->value['device_id'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['device']->value['id_raw'] ?? null : $tmp);?>
')">
                    <i class="ph ph-power"></i> Reboot
                </button>
            </div>
        </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if ($_smarty_tpl->tpl_vars['device_count']->value == 0 && !$_smarty_tpl->tpl_vars['error']->value) {?>
        <div class="gd-empty">
            <i class="ph ph-device-mobile-slash"></i>
            <h4>No Devices Found</h4>
            <p>There are currently no devices registered in the GenieACS server.</p>
            <div class="gd-empty-actions">
                <button class="bk-btn bk-btn-ghost" onclick="location.reload()">
                    <i class="ph ph-arrows-clockwise" style="font-size:13px;"></i> Refresh Page
                </button>
                <button class="bk-btn bk-btn-ghost" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_manager'">
                    <i class="ph ph-hard-drives" style="font-size:13px;"></i> Check Server
                </button>
            </div>
        </div>
        <?php }?>
    </div>

    <!-- ===================== DESKTOP TABLE ===================== -->
    <div class="gd-table-wrap">
        <table id="deviceTable" class="gd-table">
            <thead>
                <tr>
                    <th style="width:36px;" class="center">
                        <input type="checkbox" id="selectAll" onclick="toggleSelectAll()">
                    </th>
                    <th style="width:80px;" class="center">Status</th>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['display_params']->value, 'param');
$_smarty_tpl->tpl_vars['param']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['param']->value) {
$_smarty_tpl->tpl_vars['param']->do_else = false;
?>
                        <th <?php if (strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'Serial') || strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'SN')) {?>style="width:100px;"
                            <?php } elseif (strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'Manufac') || strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'Vendor')) {?>style="width:80px;"
                            <?php } elseif (strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'Model')) {?>style="width:70px;"
                            <?php } elseif ($_smarty_tpl->tpl_vars['param']->value->param_label == 'PON' || strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'PON')) {?>style="width:60px;"class="center"
                            <?php } elseif (strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'RX') || strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'Power')) {?>style="width:90px;"
                            <?php } elseif (strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'Device ID') || strstr($_smarty_tpl->tpl_vars['param']->value->param_label,' ID')) {?>style="width:120px;"<?php }?>>
                            <?php echo $_smarty_tpl->tpl_vars['param']->value->param_label;?>

                        </th>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <th style="width:80px;">Tag</th>
                    <th style="width:80px;">Lokasi</th>
                    <th style="width:90px;">Last Inform</th>
                    <th style="width:90px;text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['devices']->value, 'device');
$_smarty_tpl->tpl_vars['device']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['device']->value) {
$_smarty_tpl->tpl_vars['device']->do_else = false;
?>
                <tr>
                    <td class="center">
                        <input type="checkbox" class="device-checkbox"
                            data-device-id="<?php echo $_smarty_tpl->tpl_vars['device']->value['id_raw'];?>
"
                            data-device-status="<?php echo $_smarty_tpl->tpl_vars['device']->value['status'];?>
">
                    </td>
                    <td class="center">
                        <?php if ($_smarty_tpl->tpl_vars['device']->value['status'] == 'online') {?>
                            <span class="gd-status gd-status-online"><span class="gd-pulse gd-pulse-green"></span> Online</span>
                        <?php } else { ?>
                            <span class="gd-status gd-status-offline"><span class="gd-pulse gd-pulse-red"></span> Offline</span>
                        <?php }?>
                    </td>

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['display_params']->value, 'param');
$_smarty_tpl->tpl_vars['param']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['param']->value) {
$_smarty_tpl->tpl_vars['param']->do_else = false;
?>
                        <?php $_smarty_tpl->_assignInScope('param_key', $_smarty_tpl->tpl_vars['param']->value->param_key);?>
                        <?php $_smarty_tpl->_assignInScope('param_value', (($tmp = $_smarty_tpl->tpl_vars['device']->value[$_smarty_tpl->tpl_vars['param_key']->value] ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp));?>
                        <td <?php if (in_array($_smarty_tpl->tpl_vars['param_key']->value,array('pppoe_username','pppoe_ip','ppp_username','ip','mac_address','ppp_mac','serial_number','sn'))) {?>class="selectable-text"<?php }?>
                            <?php if (strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'Serial') || strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'SN')) {?>
                                style="max-width:100px;word-break:break-all;font-size:11px;line-height:1.3;"
                            <?php } elseif (strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'Manufac') || strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'Vendor') || strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'Model')) {?>
                                style="max-width:80px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="<?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
"
                            <?php }?>>

                            <?php if ($_smarty_tpl->tpl_vars['param']->value->param_key == 'pon_type' || $_smarty_tpl->tpl_vars['param']->value->param_label == 'Pon Type' || $_smarty_tpl->tpl_vars['param']->value->param_label == 'PON tpe' || $_smarty_tpl->tpl_vars['param']->value->param_label == 'Pon Mode' || $_smarty_tpl->tpl_vars['param']->value->param_label == 'PON') {?>
                                <?php if ($_smarty_tpl->tpl_vars['param_value']->value == 'GPON') {?><span class="gd-pon gd-pon-gpon"><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param_value']->value == 'EPON') {?><span class="gd-pon gd-pon-epon"><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['param_value']->value == 'Ethernet' || $_smarty_tpl->tpl_vars['param_value']->value == 'ETHERNET' || $_smarty_tpl->tpl_vars['param_value']->value == 'ethernet') {?><span class="gd-pon gd-pon-ethernet"><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
</span>
                                <?php } else { ?><span class="gd-muted"><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
</span><?php }?>

                            <?php } elseif ($_smarty_tpl->tpl_vars['param_key']->value == 'pppoe_username' || $_smarty_tpl->tpl_vars['param_key']->value == 'ppp_username') {?>
                                <?php if ($_smarty_tpl->tpl_vars['param_value']->value != 'N/A' && $_smarty_tpl->tpl_vars['param_value']->value != '') {?>
                                    <span class="gd-badge-user"><i class="ph ph-user" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
</span>
                                <?php } else { ?><span class="gd-muted">—</span><?php }?>

                            <?php } elseif ($_smarty_tpl->tpl_vars['param_key']->value == 'pppoe_ip' || $_smarty_tpl->tpl_vars['param_key']->value == 'tr069_ip' || $_smarty_tpl->tpl_vars['param_key']->value == 'ip') {?>
                                <?php if ($_smarty_tpl->tpl_vars['param_value']->value != 'N/A' && $_smarty_tpl->tpl_vars['param_value']->value != '') {?>
                                    <span class="gd-badge-ip"><i class="ph ph-wifi-high" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
</span>
                                <?php } else { ?><span class="gd-muted">—</span><?php }?>

                            <?php } elseif ($_smarty_tpl->tpl_vars['param_key']->value == 'rx_power') {?>
                                <?php if ($_smarty_tpl->tpl_vars['param_value']->value != 'N/A' && $_smarty_tpl->tpl_vars['param_value']->value != '') {?>
                                    <?php $_smarty_tpl->_assignInScope('rx_value', floatval($_smarty_tpl->tpl_vars['param_value']->value));?>
                                    <?php if ($_smarty_tpl->tpl_vars['rx_value']->value >= -20) {?><span class="gd-badge-rx-good"><i class="ph ph-chart-bar" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
 dBm</span>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['rx_value']->value >= -25) {?><span class="gd-badge-rx-fair"><i class="ph ph-chart-bar" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
 dBm</span>
                                    <?php } else { ?><span class="gd-badge-rx-poor"><i class="ph ph-chart-bar" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
 dBm</span><?php }?>
                                <?php } else { ?><span class="gd-badge-rx-na">N/A</span><?php }?>

                            <?php } elseif ($_smarty_tpl->tpl_vars['param_key']->value == 'temperature') {?>
                                <?php if ($_smarty_tpl->tpl_vars['param_value']->value != 'N/A' && $_smarty_tpl->tpl_vars['param_value']->value != '') {?>
                                    <?php $_smarty_tpl->_assignInScope('temp_val', floatval($_smarty_tpl->tpl_vars['param_value']->value));?>
                                    <?php if ($_smarty_tpl->tpl_vars['temp_val']->value < 60) {?><span class="gd-badge-temp-ok"><i class="ph ph-thermometer" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
°C</span>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['temp_val']->value < 75) {?><span class="gd-badge-temp-warm"><i class="ph ph-thermometer-hot" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
°C</span>
                                    <?php } else { ?><span class="gd-badge-temp-hot"><i class="ph ph-thermometer-hot" style="font-size:10px;"></i><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
°C</span><?php }?>
                                <?php } else { ?><span class="gd-muted">N/A</span><?php }?>

                            <?php } elseif (strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'Serial') || strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'Vendor') || strstr($_smarty_tpl->tpl_vars['param']->value->param_label,'Model')) {?>
                                <span class="gd-mono" style="font-size:11px;"><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
</span>

                            <?php } else { ?>
                                <span style="font-size:12px;"><?php echo $_smarty_tpl->tpl_vars['param_value']->value;?>
</span>
                            <?php }?>
                        </td>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['device']->value['tags']) {?>
                            <span class="gd-tag-chip"><i class="ph ph-user" style="font-size:10px;"></i> <?php echo $_smarty_tpl->tpl_vars['device']->value['tags'];?>
</span>
                        <?php } else { ?>
                            <span class="gd-muted">—</span>
                        <?php }?>
                    </td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['device']->value['lokasi']) {?>
                            <span class="gd-loc-chip"><i class="ph ph-map-pin" style="font-size:10px;"></i> <?php echo $_smarty_tpl->tpl_vars['device']->value['lokasi'];?>
</span>
                        <?php } else { ?>
                            <span class="gd-muted">—</span>
                        <?php }?>
                    </td>
                    <td><span class="gd-muted" style="font-size:11px;"><?php echo $_smarty_tpl->tpl_vars['device']->value['last_inform'];?>
</span></td>
                    <td>
                        <div class="gd-action-group">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_device_detail/<?php echo $_smarty_tpl->tpl_vars['device']->value['id_raw'];?>
" class="gd-action-btn view" title="View Details">
                                <i class="ph ph-eye"></i>
                            </a>
                            <button class="gd-action-btn summon" onclick="summonDevice('<?php echo (($tmp = $_smarty_tpl->tpl_vars['device']->value['device_id'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['device']->value['id_raw'] ?? null : $tmp);?>
')" title="Summon Device">
                                <i class="ph ph-bell"></i>
                            </button>
                            <button class="gd-action-btn reboot" onclick="rebootDevice('<?php echo (($tmp = $_smarty_tpl->tpl_vars['device']->value['device_id'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['device']->value['id_raw'] ?? null : $tmp);?>
')" title="Reboot Device">
                                <i class="ph ph-power"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>

                <?php if ($_smarty_tpl->tpl_vars['device_count']->value == 0 && !$_smarty_tpl->tpl_vars['error']->value) {?>
        <div class="gd-empty">
            <i class="ph ph-device-mobile-slash"></i>
            <h4>No Devices Found</h4>
            <p>There are currently no devices registered in the GenieACS server.</p>
            <div class="gd-empty-actions">
                <button class="bk-btn bk-btn-ghost" onclick="location.reload()">
                    <i class="ph ph-arrows-clockwise" style="font-size:13px;"></i> Refresh Page
                </button>
                <button class="bk-btn bk-btn-ghost" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_manager'">
                    <i class="ph ph-hard-drives" style="font-size:13px;"></i> Check Server
                </button>
            </div>
        </div>
        <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
        <div class="gd-error-box">
            <div class="gd-error-icon">
                <i class="ph ph-plug"></i>
                <span class="gd-error-badge"><i class="ph ph-x" style="font-size:9px;"></i></span>
            </div>
            <h4 style="font-size:15px;font-weight:700;color:#0f172a;margin:0 0 6px;font-family:'DM Sans',sans-serif;">Connection Failed</h4>
            <p style="font-size:13px;color:#94a3b8;margin:0 0 12px;font-family:'DM Sans',sans-serif;">
                <?php if (strpos($_smarty_tpl->tpl_vars['error']->value,'Could not connect') !== false) {?>Unable to establish connection with GenieACS server
                <?php } elseif (strpos($_smarty_tpl->tpl_vars['error']->value,'port') !== false) {?>Server is not responding on the configured port
                <?php } else {
echo $_smarty_tpl->tpl_vars['error']->value;
}?>
            </p>
            <div class="gd-error-detail">
                <i class="ph ph-hard-drives" style="font-size:13px;"></i>
                <span style="font-family:'DM Mono',monospace;font-size:11px;"><?php echo $_smarty_tpl->tpl_vars['current_server']->value->host;?>
:<?php echo $_smarty_tpl->tpl_vars['current_server']->value->port;?>
</span>
            </div>
            <div style="display:flex;gap:8px;justify-content:center;margin-top:16px;flex-wrap:wrap;">
                <button class="bk-btn bk-btn-danger" onclick="location.reload()">
                    <i class="ph ph-arrows-clockwise" style="font-size:13px;"></i> Retry Connection
                </button>
                <button class="bk-btn bk-btn-primary" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_manager'">
                    <i class="ph ph-wrench" style="font-size:13px;"></i> Configure Server
                </button>
            </div>
        </div>
        <?php }?>

    </div>

    <!-- ===================== PAGINATION ===================== -->
    <div class="gd-pagination">
        <div class="gd-pag-info">
            <?php if ($_smarty_tpl->tpl_vars['devices']->value) {?>
                <?php $_smarty_tpl->_assignInScope('pag_start', (($_smarty_tpl->tpl_vars['current_page']->value-1)*10)+1);?>
                <?php $_smarty_tpl->_assignInScope('pag_end', min($_smarty_tpl->tpl_vars['current_page']->value*10,$_smarty_tpl->tpl_vars['total_devices']->value));?>
                Showing <?php echo $_smarty_tpl->tpl_vars['pag_start']->value;?>
–<?php echo $_smarty_tpl->tpl_vars['pag_end']->value;?>
 of <?php echo $_smarty_tpl->tpl_vars['total_devices']->value;?>
 devices
                <?php if ($_smarty_tpl->tpl_vars['search_term']->value) {?><span style="color:#0271c6;font-weight:600;"> Â· "<?php echo $_smarty_tpl->tpl_vars['search_term']->value;?>
"</span><?php }?>
            <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['search_term']->value) {?>No results for "<?php echo $_smarty_tpl->tpl_vars['search_term']->value;?>
"<?php } else { ?>No devices found<?php }?>
            <?php }?>
        </div>

        <div class="gd-pag-right">
            <?php if ((isset($_smarty_tpl->tpl_vars['sync_warning']->value))) {?>
                <div class="gd-sync-warn">
                    <i class="ph ph-warning" style="font-size:13px;color:#d97706;"></i>
                    <?php echo $_smarty_tpl->tpl_vars['sync_warning']->value;?>

                    <button class="bk-btn bk-btn-warning bk-btn-sm" onclick="forceSync()" style="height:26px;padding:0 10px;font-size:11px;">
                        <i class="ph ph-arrow-clockwise" style="font-size:11px;"></i> Sync Now
                    </button>
                </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['total_pages']->value > 1) {?>
                <?php $_smarty_tpl->_assignInScope('sp', '');?>
                <?php if ($_smarty_tpl->tpl_vars['search_term']->value) {
$_smarty_tpl->_assignInScope('sp', urlencode(("&search=").($_smarty_tpl->tpl_vars['search_term']->value)));
}?>
                <?php if ($_smarty_tpl->tpl_vars['status_filter']->value) {
$_smarty_tpl->_assignInScope('sp', (($_smarty_tpl->tpl_vars['sp']->value).("&status=")).($_smarty_tpl->tpl_vars['status_filter']->value));
}?>
                <?php if ($_smarty_tpl->tpl_vars['rx_power_filter']->value) {
$_smarty_tpl->_assignInScope('sp', (($_smarty_tpl->tpl_vars['sp']->value).("&rx_power=")).($_smarty_tpl->tpl_vars['rx_power_filter']->value));
}?>
                <?php if ($_smarty_tpl->tpl_vars['location_filter']->value) {
$_smarty_tpl->_assignInScope('sp', urlencode((($_smarty_tpl->tpl_vars['sp']->value).("&location=")).($_smarty_tpl->tpl_vars['location_filter']->value)));
}?>

                <div class="gd-pag-btns" id="pagination-controls">
                    <?php if ($_smarty_tpl->tpl_vars['current_page']->value > 1) {?>
                        <a href="index.php?_route=plugin/genieacs_devices/list/1<?php echo $_smarty_tpl->tpl_vars['sp']->value;?>
" class="gd-pag-btn" title="First">
                            <i class="ph ph-caret-double-left" style="font-size:11px;"></i>
                        </a>
                        <a href="index.php?_route=plugin/genieacs_devices/list/<?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;
echo $_smarty_tpl->tpl_vars['sp']->value;?>
" class="gd-pag-btn" title="Previous">
                            <i class="ph ph-caret-left" style="font-size:11px;"></i>
                        </a>
                    <?php } else { ?>
                        <span class="gd-pag-btn disabled"><i class="ph ph-caret-double-left" style="font-size:11px;"></i></span>
                        <span class="gd-pag-btn disabled"><i class="ph ph-caret-left" style="font-size:11px;"></i></span>
                    <?php }?>

                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? min($_smarty_tpl->tpl_vars['total_pages']->value,$_smarty_tpl->tpl_vars['current_page']->value+2)+1 - (max(1,$_smarty_tpl->tpl_vars['current_page']->value-2)) : max(1,$_smarty_tpl->tpl_vars['current_page']->value-2)-(min($_smarty_tpl->tpl_vars['total_pages']->value,$_smarty_tpl->tpl_vars['current_page']->value+2))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = max(1,$_smarty_tpl->tpl_vars['current_page']->value-2), $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                        <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['current_page']->value) {?>
                            <span class="gd-pag-btn active"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</span>
                        <?php } else { ?>
                            <a href="index.php?_route=plugin/genieacs_devices/list/<?php echo $_smarty_tpl->tpl_vars['i']->value;
echo $_smarty_tpl->tpl_vars['sp']->value;?>
" class="gd-pag-btn"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
                        <?php }?>
                    <?php }
}
?>

                    <?php if ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['total_pages']->value) {?>
                        <a href="index.php?_route=plugin/genieacs_devices/list/<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;
echo $_smarty_tpl->tpl_vars['sp']->value;?>
" class="gd-pag-btn" title="Next">
                            <i class="ph ph-caret-right" style="font-size:11px;"></i>
                        </a>
                        <a href="index.php?_route=plugin/genieacs_devices/list/<?php echo $_smarty_tpl->tpl_vars['total_pages']->value;
echo $_smarty_tpl->tpl_vars['sp']->value;?>
" class="gd-pag-btn" title="Last">
                            <i class="ph ph-caret-double-right" style="font-size:11px;"></i>
                        </a>
                    <?php } else { ?>
                        <span class="gd-pag-btn disabled"><i class="ph ph-caret-right" style="font-size:11px;"></i></span>
                        <span class="gd-pag-btn disabled"><i class="ph ph-caret-double-right" style="font-size:11px;"></i></span>
                    <?php }?>
                </div>
            <?php }?>
        </div>
    </div>

</div>

<!-- ===================== CUSTOM MODALS ===================== -->

<!-- Modal Overlay (shared) -->
<div id="gdModalOverlay" style="position:fixed;inset:0;z-index:9995;background:rgba(15,23,42,0.55);backdrop-filter:blur(3px);display:none;align-items:center;justify-content:center;padding:16px;">
    <div id="gdModalCard" style="background:white;border-radius:16px;width:100%;max-width:420px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,0.2);display:flex;flex-direction:column;animation:gdModalIn 0.25s cubic-bezier(0.34,1.56,0.64,1);">
        <div id="gdModalHeader" style="padding:18px 22px;display:flex;align-items:center;justify-content:space-between;flex-shrink:0;">
            <div id="gdModalTitle" style="font-size:15px;font-weight:700;font-family:'DM Sans',sans-serif;display:flex;align-items:center;gap:8px;color:white;"></div>
            <button id="gdModalClosebtn" onclick="gdCloseModal()" style="width:30px;height:30px;border-radius:8px;border:none;background:rgba(255,255,255,0.2);color:white;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:16px;transition:background 0.15s;flex-shrink:0;">
                <i class="ph ph-x"></i>
            </button>
        </div>
        <div id="gdModalBody" style="padding:22px;font-family:'DM Sans',sans-serif;"></div>
        <div id="gdModalFooter" style="padding:14px 22px;border-top:1px solid #f1f5f9;display:flex;gap:8px;justify-content:flex-end;background:#fafcff;flex-shrink:0;"></div>
    </div>
</div>

<style>

@keyframes gdModalIn { from{opacity:0;transform:translateY(-12px) scale(0.98)} to{opacity:1;transform:translateY(0) scale(1)} }
@keyframes gdSpin { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }
@keyframes gdSlideUp { from{transform:translateY(100%);opacity:0.6} to{transform:translateY(0);opacity:1} }
@keyframes gdCheckCircle { from{stroke-dashoffset:166} to{stroke-dashoffset:0} }
@keyframes gdCheckMark   { from{stroke-dashoffset:48}  to{stroke-dashoffset:0} }
@keyframes gdCheckScale  { 0%{transform:scale(0.8);opacity:0} 60%{transform:scale(1.1)} 100%{transform:scale(1);opacity:1} }
.gd-modal-spinner { display:inline-block;width:48px;height:48px;border:3px solid #e2e8f0;border-top-color:#0271c6;border-radius:50%;animation:gdSpin 0.7s linear infinite; }
.gd-check-svg { width:72px;height:72px;animation:gdCheckScale 0.4s cubic-bezier(0.34,1.56,0.64,1) forwards; }
.gd-check-circle { fill:none;stroke:#16a34a;stroke-width:4;stroke-dasharray:166;stroke-dashoffset:166;stroke-linecap:round;animation:gdCheckCircle 0.5s ease-in-out 0.1s forwards; }
.gd-check-mark   { fill:none;stroke:#16a34a;stroke-width:5;stroke-dasharray:48;stroke-dashoffset:48;stroke-linecap:round;stroke-linejoin:round;animation:gdCheckMark 0.35s ease-in-out 0.5s forwards; }
.gd-progress-bar { height:8px;background:#f1f5f9;border-radius:4px;overflow:hidden;margin:12px 0; }
.gd-progress-fill { height:100%;border-radius:4px;background:linear-gradient(90deg,#0271c6,#4f46e5);transition:width 0.3s ease; }
.gd-stat-row { display:flex;justify-content:center;gap:16px;margin-top:16px; }
.gd-stat-box { padding:12px 24px;border-radius:10px;text-align:center; }
.gd-stat-box span { display:block; }
.gd-stat-box .num { font-size:24px;font-weight:700; }
.gd-stat-box .lbl { font-size:11px;margin-top:2px; }
@media(max-width:767px) {
    #gdModalOverlay { align-items:flex-end !important; padding:0 !important; }
    #gdModalCard { border-radius:20px 20px 0 0 !important; max-width:100% !important; animation:gdSlideUp 0.32s cubic-bezier(0.32,0.72,0,1) !important; }
    #gdModalFooter { flex-direction:column-reverse; }
    #gdModalFooter .bk-btn { width:100%;justify-content:center; }
}

</style>

<!-- ===================== JAVASCRIPT ===================== -->
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
var gdBaseUrl = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
';

// ===================== MODAL ENGINE =====================
var gdModalCallback = null;

function gdOpenModal(opts) {
    // opts: { title, titleIcon, headerColor, body, footer, closable }
    var overlay = document.getElementById('gdModalOverlay');
    var header  = document.getElementById('gdModalHeader');
    var title   = document.getElementById('gdModalTitle');
    var body    = document.getElementById('gdModalBody');
    var footer  = document.getElementById('gdModalFooter');
    var closeBtn= document.getElementById('gdModalClosebtn');

    header.style.background = opts.headerColor || 'linear-gradient(135deg,#0271c6,#0359a0)';
    title.innerHTML = (opts.titleIcon ? '<i class="' + opts.titleIcon + '"></i> ' : '') + (opts.title || '');
    body.innerHTML  = opts.body   || '';
    footer.innerHTML= opts.footer || '';

    closeBtn.style.display = opts.closable === false ? 'none' : 'flex';
    overlay.style.display  = 'flex';
    document.body.style.overflow = 'hidden';
}

function gdCloseModal() {
    document.getElementById('gdModalOverlay').style.display = 'none';
    document.body.style.overflow = '';
    gdModalCallback = null;
}

// Close on overlay click
document.getElementById('gdModalOverlay').addEventListener('click', function(e) {
    if (e.target === this) gdCloseModal();
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') gdCloseModal();
});

// ===================== LOADING MODAL =====================
function gdShowLoading(title, subtitle) {
    gdOpenModal({
        title: title || 'Please Wait...',
        titleIcon: 'ph ph-circle-notch',
        headerColor: 'linear-gradient(135deg,#0271c6,#0359a0)',
        closable: false,
        body: '<div style="text-align:center;padding:16px 0;">' +
              '<div class="gd-modal-spinner" style="margin:0 auto 16px;"></div>' +
              '<p style="color:#64748b;font-size:13px;margin:0;">' + (subtitle || 'Processing request...') + '</p>' +
              '</div>',
        footer: ''
    });
}

// ===================== SELECT ALL =====================
function toggleSelectAll() {
    var isChecked = $('#selectAll').prop('checked');
    $('.device-checkbox:visible').prop('checked', isChecked);
}

// ===================== FORCE SYNC =====================
// ===================== FORCE SYNC =====================
function forceSync() {
    gdOpenModal({
        title: 'Force Sync',
        titleIcon: 'ph ph-arrow-clockwise',
        headerColor: 'linear-gradient(135deg,#d97706,#b45309)',
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div style="width:64px;height:64px;border-radius:16px;background:#fef3c7;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#d97706;">' +
              '<i class="ph ph-arrow-clockwise"></i></div>' +
              '<p style="font-size:14px;color:#334155;margin:0;font-weight:600;">Sync all devices?</p>' +
              '<p style="font-size:12px;color:#94a3b8;margin:8px 0 0;">This will re-fetch all device data from the ACS server.</p>' +
              '</div>',
        footer: '<button class="bk-btn bk-btn-ghost" onclick="gdCloseModal()"><i class="ph ph-x" style="font-size:13px;"></i> Cancel</button>' +
                '<button class="bk-btn bk-btn-warning" onclick="gdCloseModal();gdDoForceSync()"><i class="ph ph-arrow-clockwise" style="font-size:13px;"></i> Yes, Sync Now</button>'
    });
}

function gdDoForceSync() {
    var texts = [
        'Contacting ACS server...',
        'Fetching device list...',
        'Validating TR-069 data...',
        'Syncing ONU parameters...',
        'Menyimpan perubahan ke database...'
    ];

    gdOpenModal({
        title: 'Syncing...',
        titleIcon: 'ph ph-arrow-clockwise',
        headerColor: 'linear-gradient(135deg,#d97706,#b45309)',
        closable: false,
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div class="gd-modal-spinner" style="border-top-color:#d97706;margin:0 auto 20px;"></div>' +
              '<p id="gdSyncText" style="font-size:13px;color:#64748b;margin:0;min-height:20px;transition:opacity 0.3s;">' + texts[0] + '</p>' +
              '</div>',
        footer: ''
    });

    var idx = 1;
    var syncDone = false;
    var ajaxDone = false;
    var ajaxResult = null;

    function nextText() {
        if (syncDone) return;
        if (idx >= texts.length) { idx = 0; }
        var el = document.getElementById('gdSyncText');
        if (!el) return;
        el.style['opacity'] = '0';
        setTimeout(function() {
            var e = document.getElementById('gdSyncText');
            if (e) { e.textContent = texts[idx]; e.style['opacity'] = '1'; }
            idx++;
            if (!syncDone) setTimeout(nextText, 1800);
        }, 300);
    }
    setTimeout(nextText, 1800);

    var minDone = false;
    setTimeout(function() { minDone = true; tryShowResult(); }, 4000);

    $.ajax({
        url: 'index.php?_route=plugin/genieacs_devices/force-sync', type: 'GET', dataType: 'json', timeout: 60000,
        success: function(r) { ajaxResult = r; ajaxDone = true; tryShowResult(); },
        error:   function()  { ajaxResult = null; ajaxDone = true; tryShowResult(); }
    });

    function tryShowResult() {
        if (!ajaxDone || !minDone) return;
        syncDone = true;
        showSyncResult();
    }

    function showSyncResult() {
        if (!ajaxDone) return;
        if (ajaxResult && ajaxResult.success) {
            var hdr  = document.getElementById('gdModalHeader');
            var ttl  = document.getElementById('gdModalTitle');
            var body = document.getElementById('gdModalBody');
            var ftr  = document.getElementById('gdModalFooter');
            if (hdr) hdr.style['background'] = 'linear-gradient(135deg,#16a34a,#15803d)';
            if (ttl) ttl.innerHTML = '<i class="ph ph-check-circle"></i> Sync Success!';
            if (body) {
                body.innerHTML =
                    '<div style="text-align:center;padding:8px 0;">' +
                    '<svg class="gd-check-svg" viewBox="0 0 52 52" xmlns="http://www.w3.org/2000/svg" style="display:block;margin:0 auto 16px;">' +
                    '<circle class="gd-check-circle" cx="26" cy="26" r="24"/>' +
                    '<path class="gd-check-mark" d="M14 26 l8 8 l16 -16"/>' +
                    '</svg>' +
                    '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0;">All devices synced successfully!</p>' +
                    '</div>';
            }
            if (ftr) ftr.innerHTML = '<button class="bk-btn bk-btn-success" onclick="gdCloseModal();location.reload();"><i class="ph ph-check" style="font-size:13px;"></i> OK</button>';
        } else {
            gdOpenModal({
                title: 'Sync Failed',
                titleIcon: 'ph ph-warning',
                headerColor: 'linear-gradient(135deg,#dc2626,#b91c1c)',
                body: '<div style="text-align:center;padding:8px 0;">' +
                      '<div style="width:64px;height:64px;border-radius:16px;background:#fee2e2;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#dc2626;">' +
                      '<i class="ph ph-warning"></i></div>' +
                      '<p style="font-size:14px;color:#334155;margin:0;">' + ((ajaxResult && ajaxResult.error) || 'Failed to communicate with the server') + '</p>' +
                      '</div>',
                footer: '<button class="bk-btn bk-btn-ghost" onclick="gdCloseModal()">Close</button>'
            });
        }
    }
}

// ===================== SUMMON =====================
function summonDevice(deviceId) {
    gdOpenModal({
        title: 'Summon Device?',
        titleIcon: 'ph ph-bell-ringing',
        headerColor: 'linear-gradient(135deg,#0271c6,#0359a0)',
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div style="width:64px;height:64px;border-radius:16px;background:#eff6ff;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#0271c6;">' +
              '<i class="ph ph-bell-ringing"></i></div>' +
              '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0 0 6px;">Summon this device?</p>' +
              '<p style="font-size:12px;color:#94a3b8;margin:0;">The device will be called to establish a TR-069 session with the ACS.</p>' +
              '</div>',
        footer: '<button class="bk-btn bk-btn-ghost" onclick="gdCloseModal()"><i class="ph ph-x" style="font-size:13px;"></i> Cancel</button>' +
                '<button class="bk-btn bk-btn-primary" onclick="gdCloseModal();executeSummonSequence(\'' + deviceId + '\')"><i class="ph ph-bell-ringing" style="font-size:13px;"></i> Yes, Summon</button>'
    });
}

function executeSummonSequence(deviceId) {
    var texts = [
        'Sending signal to the device...',
        'Waiting for ONU response...',
        'Authenticating TR-069 session...'
    ];

    gdOpenModal({
        title: 'Summoning...',
        titleIcon: 'ph ph-bell-ringing',
        headerColor: 'linear-gradient(135deg,#0271c6,#0359a0)',
        closable: false,
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div class="gd-modal-spinner" style="margin:0 auto 20px;"></div>' +
              '<p id="gdSummonText" style="font-size:13px;color:#64748b;margin:0;min-height:20px;transition:opacity 0.3s;">' + texts[0] + '</p>' +
              '</div>',
        footer: ''
    });

    var ajaxDone = false;
    var ajaxResult = null;
    var animDone = false;

    $.ajax({
        url: gdBaseUrl + 'plugin/genieacs_devices/' + encodeURIComponent(deviceId) + '/summon',
        type: 'GET', dataType: 'json', timeout: 30000,
        success: function(r) { ajaxResult = r; ajaxDone = true; tryShowSummonResult(); },
        error:   function()  { ajaxResult = null; ajaxDone = true; tryShowSummonResult(); }
    });

    var idx = 1;
    function nextText() {
        if (idx >= texts.length) {
            animDone = true;
            tryShowSummonResult();
            return;
        }
        var el = document.getElementById('gdSummonText');
        if (!el) return;
        el.style['opacity'] = '0';
        setTimeout(function() {
            var e = document.getElementById('gdSummonText');
            if (e) { e.textContent = texts[idx]; e.style['opacity'] = '1'; }
            idx++;
            setTimeout(nextText, 1600);
        }, 300);
    }
    setTimeout(nextText, 1600);

    function tryShowSummonResult() {
        if (!ajaxDone || !animDone) return;
        var hdr  = document.getElementById('gdModalHeader');
        var ttl  = document.getElementById('gdModalTitle');
        var body = document.getElementById('gdModalBody');
        var ftr  = document.getElementById('gdModalFooter');
        if (ajaxResult && ajaxResult.success) {
            if (hdr) hdr.style['background'] = 'linear-gradient(135deg,#16a34a,#15803d)';
            if (ttl) ttl.innerHTML = '<i class="ph ph-check-circle"></i> Summon Success!';
            if (body) {
                body.innerHTML =
                    '<div style="text-align:center;padding:8px 0;">' +
                    '<svg class="gd-check-svg" viewBox="0 0 52 52" xmlns="http://www.w3.org/2000/svg" style="display:block;margin:0 auto 16px;">' +
                    '<circle class="gd-check-circle" cx="26" cy="26" r="24"/>' +
                    '<path class="gd-check-mark" d="M14 26 l8 8 l16 -16"/>' +
                    '</svg>' +
                    '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0 0 4px;">Device summoned successfully!</p>' +
                    '<p style="font-size:12px;color:#64748b;margin:0;">Reloading page...</p>' +
                    '</div>';
            }
            setTimeout(function() { window.location.reload(true); }, 2000);
        } else {
            if (hdr) hdr.style['background'] = 'linear-gradient(135deg,#dc2626,#b91c1c)';
            if (ttl) ttl.innerHTML = '<i class="ph ph-warning"></i> Summon Failed!';
            if (body) {
                body.innerHTML =
                    '<div style="text-align:center;padding:8px 0;">' +
                    '<div style="width:64px;height:64px;border-radius:16px;background:#fee2e2;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#dc2626;">' +
                    '<i class="ph ph-warning"></i></div>' +
                    '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0 0 6px;">Cannot reach the device!</p>' +
                    '<p style="font-size:12px;color:#94a3b8;margin:0;">' + ((ajaxResult && ajaxResult.error) ? ajaxResult.error.replace('Failed to send connection request: ', '') : 'Device is offline or unreachable. Connection request sent but device did not respond.') + '</p>' +
                    '</div>';
            }
            if (ftr) ftr.innerHTML = '<button class="bk-btn bk-btn-ghost" onclick="gdCloseModal()"><i class="ph ph-x" style="font-size:13px;"></i> Close</button>';
        }
    }
}


function executeAutoRefresh(deviceId) {
    // Update langsung elemen modal yang sudah ada — JANGAN buka modal baru
    var hdr = document.getElementById('gdModalHeader');
    var ttl = document.getElementById('gdModalTitle');
    var body = document.getElementById('gdModalBody');
    if (hdr) hdr.style['background'] = 'linear-gradient(135deg,#16a34a,#15803d)';
    if (ttl) ttl.innerHTML = '<i class="ph ph-arrows-clockwise"></i> Mengambil Data...';
    if (body) {
        body.innerHTML =
            '<div style="text-align:center;padding:8px 0;">' +
            '<div class="gd-modal-spinner" style="margin:0 auto 20px;"></div>' +
            '<p style="font-size:13px;color:#64748b;margin:0;">Pulling all parameters from the device...</p>' +
            '</div>';
    }

    $.ajax({
        url: 'index.php?_route=plugin/genieacs_devices/refresh', type: 'GET', data: { device_id: deviceId }, dataType: 'json',
        success: function(r) {
            var hdr2 = document.getElementById('gdModalHeader');
            var ttl2 = document.getElementById('gdModalTitle');
            var body2 = document.getElementById('gdModalBody');
            if (r && r.success) {
                if (hdr2) hdr2.style['background'] = 'linear-gradient(135deg,#16a34a,#15803d)';
                if (ttl2) ttl2.innerHTML = '<i class="ph ph-check-circle"></i> Sinkronisasi Selesai!';
                if (body2) {
                    body2.innerHTML =
                        '<div style="text-align:center;padding:8px 0;">' +
                        '<div style="width:64px;height:64px;border-radius:50%;background:#dcfce7;border:3px solid #16a34a;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:30px;color:#16a34a;animation:gdModalIn 0.4s cubic-bezier(0.34,1.56,0.64,1);">' +
                        '<i class="ph ph-check-bold"></i></div>' +
                        '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0 0 4px;">All data synced successfully!</p>' +
                        '<p style="font-size:12px;color:#64748b;margin:0;">Reloading page...</p>' +
                        '</div>';
                }
                setTimeout(function() { window.location.reload(true); }, 1500);
            } else {
                if (hdr2) hdr2.style['background'] = 'linear-gradient(135deg,#d97706,#b45309)';
                if (ttl2) ttl2.innerHTML = '<i class="ph ph-warning"></i> Failed';
                if (body2) {
                    body2.innerHTML =
                        '<div style="text-align:center;padding:8px 0;">' +
                        '<div style="width:64px;height:64px;border-radius:16px;background:#fef3c7;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#d97706;">' +
                        '<i class="ph ph-warning"></i></div>' +
                        '<p style="font-size:14px;color:#334155;margin:0;">Failed to fetch data. The page will reload...</p>' +
                        '</div>';
                }
                setTimeout(function() { window.location.reload(true); }, 1500);
            }
        },
        error: function() {
            var hdr3 = document.getElementById('gdModalHeader');
            var ttl3 = document.getElementById('gdModalTitle');
            var body3 = document.getElementById('gdModalBody');
            if (hdr3) hdr3.style['background'] = 'linear-gradient(135deg,#d97706,#b45309)';
            if (ttl3) ttl3.innerHTML = '<i class="ph ph-warning"></i> Connection Lost';
            if (body3) {
                body3.innerHTML =
                    '<div style="text-align:center;padding:8px 0;">' +
                    '<div style="width:64px;height:64px;border-radius:16px;background:#fef3c7;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#d97706;">' +
                    '<i class="ph ph-warning"></i></div>' +
                    '<p style="font-size:14px;color:#334155;margin:0;">Connection to the server was lost. Reloading...</p>' +
                    '</div>';
            }
            setTimeout(function() { window.location.reload(true); }, 1500);
        }
    });
}

// ===================== REBOOT =====================
function rebootDevice(deviceId) {
    gdOpenModal({
        title: 'Reboot Device?',
        titleIcon: 'ph ph-power',
        headerColor: 'linear-gradient(135deg,#dc2626,#b91c1c)',
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div style="width:64px;height:64px;border-radius:16px;background:#fee2e2;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#dc2626;">' +
              '<i class="ph ph-power"></i></div>' +
              '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0 0 6px;">Reboot this device?</p>' +
              '<p style="font-size:12px;color:#94a3b8;margin:0;">The device will restart. Connection will be temporarily lost.</p>' +
              '</div>',
        footer: '<button class="bk-btn bk-btn-ghost" onclick="gdCloseModal()"><i class="ph ph-x" style="font-size:13px;"></i> Cancel</button>' +
                '<button class="bk-btn bk-btn-danger" onclick="gdCloseModal();gdDoReboot(\'' + deviceId + '\')"><i class="ph ph-power" style="font-size:13px;"></i> Yes, Reboot</button>'
    });
}

function gdDoReboot(deviceId) {
    var texts = [
        'Sending reboot command...',
        'Disconnecting the device...',
        'Waiting for device to restart...'
    ];

    gdOpenModal({
        title: 'Rebooting...',
        titleIcon: 'ph ph-power',
        headerColor: 'linear-gradient(135deg,#dc2626,#b91c1c)',
        closable: false,
        body: '<div style="text-align:center;padding:8px 0;">' +
              '<div class="gd-modal-spinner" style="border-top-color:#dc2626;margin:0 auto 20px;"></div>' +
              '<p id="gdRebootText" style="font-size:13px;color:#64748b;margin:0;min-height:20px;transition:opacity 0.3s;">' + texts[0] + '</p>' +
              '</div>',
        footer: ''
    });

    var idx = 1;
    var rebootDone = false;
    var ajaxDone = false;
    var ajaxResult = null;

    function nextRebootText() {
        if (rebootDone) return;
        if (idx >= texts.length) { idx = 0; }
        var el = document.getElementById('gdRebootText');
        if (!el) return;
        el.style['opacity'] = '0';
        setTimeout(function() {
            var e = document.getElementById('gdRebootText');
            if (e) { e.textContent = texts[idx]; e.style['opacity'] = '1'; }
            idx++;
            if (!rebootDone) setTimeout(nextRebootText, 1600);
        }, 300);
    }
    setTimeout(nextRebootText, 1600);

    var minDone = false;
    setTimeout(function() { minDone = true; tryShowRebootResult(); }, 3000);

    $.ajax({
        url: 'index.php?_route=plugin/genieacs_devices/reboot', type: 'GET', data: { device_id: deviceId }, dataType: 'json',
        success: function(r) { ajaxResult = r; ajaxDone = true; tryShowRebootResult(); },
        error:   function()  { ajaxResult = null; ajaxDone = true; tryShowRebootResult(); }
    });

    function tryShowRebootResult() {
        if (!ajaxDone || !minDone) return;
        rebootDone = true;
        var hdr  = document.getElementById('gdModalHeader');
        var ttl  = document.getElementById('gdModalTitle');
        var body = document.getElementById('gdModalBody');
        var ftr  = document.getElementById('gdModalFooter');
        if (ajaxResult && ajaxResult.success) {
            if (hdr) hdr.style['background'] = 'linear-gradient(135deg,#16a34a,#15803d)';
            if (ttl) ttl.innerHTML = '<i class="ph ph-check-circle"></i> Reboot Sent!';
            if (body) {
                body.innerHTML =
                    '<div style="text-align:center;padding:8px 0;">' +
                    '<svg class="gd-check-svg" viewBox="0 0 52 52" xmlns="http://www.w3.org/2000/svg" style="display:block;margin:0 auto 16px;">' +
                    '<circle class="gd-check-circle" cx="26" cy="26" r="24"/>' +
                    '<path class="gd-check-mark" d="M14 26 l8 8 l16 -16"/>' +
                    '</svg>' +
                    '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0 0 4px;">Reboot command sent successfully!</p>' +
                    '<p style="font-size:12px;color:#64748b;margin:0;">The device is restarting.</p>' +
                    '</div>';
            }
            if (ftr) ftr.innerHTML = '<button class="bk-btn bk-btn-success" onclick="gdCloseModal()"><i class="ph ph-check" style="font-size:13px;"></i> OK</button>';
        } else {
            if (hdr) hdr.style['background'] = 'linear-gradient(135deg,#dc2626,#b91c1c)';
            if (ttl) ttl.innerHTML = '<i class="ph ph-warning"></i> Reboot Failed';
            if (body) {
                body.innerHTML =
                    '<div style="text-align:center;padding:8px 0;">' +
                    '<div style="width:64px;height:64px;border-radius:16px;background:#fee2e2;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#dc2626;">' +
                    '<i class="ph ph-warning"></i></div>' +
                    '<p style="font-size:14px;font-weight:600;color:#0f172a;margin:0 0 6px;">Cannot reach the device!</p>' +
                    '<p style="font-size:12px;color:#94a3b8;margin:0;">' + ((ajaxResult && ajaxResult.error) ? ajaxResult.error.replace('Failed to send connection request: ', '') : 'Device is offline or unreachable. Connection request sent but device did not respond.') + '</p>' +
                    '</div>';
            }
            if (ftr) ftr.innerHTML = '<button class="bk-btn bk-btn-ghost" onclick="gdCloseModal()"><i class="ph ph-x" style="font-size:13px;"></i> Close</button>';
        }
    }
}

// ===================== CHANGE SERVER =====================
function changeServer() {
    var serverId = $('#quickServerSwitch').val() || $('#serverSelector').val();
    gdShowLoading('Switching Server...', 'Menghubungkan ke server baru...');
    $.ajax({
        url: 'index.php?_route=plugin/genieacs_devices/set-server', type: 'POST', data: { server_id: serverId }, dataType: 'json',
        success: function(r) { window.location.href = 'index.php?_route=plugin/genieacs_devices'; },
        error:   function()  { window.location.href = 'index.php?_route=plugin/genieacs_devices'; }
    });
}

// ===================== MISC =====================
function viewDeviceDetail(deviceId) { window.location.href = 'index.php?_route=plugin/genieacs_device_detail/' + deviceId; }
function clearSearch() { $('#searchInput').val(''); }
function clearAllFilters() {
    $('#ajaxSearchInput').val(''); $('#searchInput').val('');
    $('#statusFilter').val(''); $('#rxPowerFilter').val('');
    if ($('#locationFilter').length) $('#locationFilter').val('');
    window.location.href = 'index.php?_route=plugin/genieacs_devices';
}

function animateCountUp() {
    $('.count-up').each(function() {
        var $this = $(this), target = parseInt($this.data('target')), duration = 1500, steps = 60,
            stepDuration = duration / steps, increment = target / steps, current = 0;
        var timer = setInterval(function() {
            current += increment;
            if (current >= target) { current = target; clearInterval(timer); }
            $this.text(Math.floor(current));
        }, stepDuration);
    });
    setTimeout(function() { $('.gd-mini-fill').css('transition','width 1.5s ease-in-out'); }, 100);
}

// Row click â†’ detail
$(document).on('click', '#deviceTable tbody tr', function(e) {
    if ($(e.target).closest('.device-checkbox, .gd-action-btn').length) return;
    if (window.getSelection().toString().length > 0) return;
    var deviceId = $(this).find('.device-checkbox').data('device-id');
    if (deviceId) window.location.href = 'index.php?_route=plugin/genieacs_device_detail/' + deviceId;
});

// AJAX search
var searchTimeout;
$('#ajaxSearchInput').on('input', function() {
    clearTimeout(searchTimeout);
    var term = $(this).val();
    searchTimeout = setTimeout(function() {
        if (term.length >= 2) {
            $('#searchStatus').text('Searching...');
            $.ajax({ url: 'index.php?_route=plugin/genieacs_devices/ajax-search', type: 'GET', data: { q: term, page: 1 }, dataType: 'json',
                success: function(r) {
                    if (r.success) { updatePagination(r.page, r.total_pages, term); $('#searchStatus').text(r.total + ' results'); }
                }
            });
        } else if (term.length === 0) { $('#searchStatus').text(''); }
    }, 400);
});

function updatePagination(currentPage, totalPages, searchTerm) {
    var html = '';
    if (currentPage > 1) {
        html += '<a href="javascript:void(0)" onclick="performAjaxSearchPage(\'' + searchTerm + '\',1)" class="gd-pag-btn"><i class="ph ph-caret-double-left" style="font-size:11px;"></i></a>';
        html += '<a href="javascript:void(0)" onclick="performAjaxSearchPage(\'' + searchTerm + '\',' + (currentPage-1) + ')" class="gd-pag-btn"><i class="ph ph-caret-left" style="font-size:11px;"></i></a>';
    } else {
        html += '<span class="gd-pag-btn disabled"><i class="ph ph-caret-double-left" style="font-size:11px;"></i></span>';
        html += '<span class="gd-pag-btn disabled"><i class="ph ph-caret-left" style="font-size:11px;"></i></span>';
    }
    for (var i = Math.max(1,currentPage-2); i <= Math.min(totalPages,currentPage+2); i++) {
        if (i === currentPage) html += '<span class="gd-pag-btn active">' + i + '</span>';
        else html += '<a href="javascript:void(0)" onclick="performAjaxSearchPage(\'' + searchTerm + '\',' + i + ')" class="gd-pag-btn">' + i + '</a>';
    }
    if (currentPage < totalPages) {
        html += '<a href="javascript:void(0)" onclick="performAjaxSearchPage(\'' + searchTerm + '\',' + (currentPage+1) + ')" class="gd-pag-btn"><i class="ph ph-caret-right" style="font-size:11px;"></i></a>';
        html += '<a href="javascript:void(0)" onclick="performAjaxSearchPage(\'' + searchTerm + '\',' + totalPages + ')" class="gd-pag-btn"><i class="ph ph-caret-double-right" style="font-size:11px;"></i></a>';
    } else {
        html += '<span class="gd-pag-btn disabled"><i class="ph ph-caret-right" style="font-size:11px;"></i></span>';
        html += '<span class="gd-pag-btn disabled"><i class="ph ph-caret-double-right" style="font-size:11px;"></i></span>';
    }
    $('#pagination-controls').html(html);
}

function performAjaxSearchPage(searchTerm, page) {
    $.ajax({ url: 'index.php?_route=plugin/genieacs_devices/ajax-search', type: 'GET', data: { q: searchTerm, page: page }, dataType: 'json',
        success: function(r) { if (r.success) { updatePagination(r.page, r.total_pages, searchTerm); } }
    });
}

$(document).ready(function() { animateCountUp(); });

<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
